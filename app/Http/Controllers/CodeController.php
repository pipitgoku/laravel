<?php
namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComCode;

class CodeController extends Controller{
    private $folder_path = 'code';
    
    function __construct(){
        $this->middleware('auth');
    }

    /**
     * Index
     *
     * @return \Illuminate\Http\Response
     */
    function index($id = NULL){
        $filename_page 	= 'index';
        $title 			= 'Kode Sistem';
		
		//$groups		= ComCode::all(['code_group']);
		$groups			= ComCode::getAllGroup();
		
        return view('sistem.' . $this->folder_path . '.' . $filename_page, compact('title','groups'));
    }

    /**
     * Show : DataTables
     *
     * @return \Illuminate\Http\Response
     */
    function getData(Request $request){
        $data = ComCode::query();
		// $data = ComCode::all()->sortBy('com_cd');
		/* $data = ComCode::select('*')
				->where('code_group','DAY_TP')
				//->where('code_nm','Senin')
				->whereIn('code_nm',['Senin','Kamis'])
				->orderBy('code_nm'); */

        return DataTables::of($data)
		->addColumn('actions',function($data){
            $actions = '';
            $actions .= "<button type='button' id='ubah'  class='btn btn-warning btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Edit Data'><i class='icon icon-pencil7'></i> </button> &nbsp";
            $actions .= "<button type='button' id='hapus' class='btn btn-danger btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Hapus Data'><i class='icon icon-trash'></i> </button> &nbsp";
            //$actions .= "<button type='button' id='detail' class='btn btn-info btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Detail Data'><i class='icon icon-menu-open'></i> </button>";
            
            return $actions;
        })
        ->rawColumns(['actions'])
        ->make(true);
		
		/* $data   =  ComCode::all();
		
		return DataTables::of($data)->make(true); */
    }

    /**
     * Create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request){
		$this->validate($request,[
            'com_cd'      => 'required|min:3|max:20',
            'code_nm'     => 'required',
			'code_group'  => 'required'
        ]);
		
		$check = ComCode::find($request->com_cd);
		if($check){
            return response()->json(['status' => 'error', 'data' => 'Kode sudah ada di database'],400);
        }
		
        $kode             = new ComCode;
        $kode->com_cd     = str_replace(' ','',$request->com_cd);
        $kode->code_nm    = ucwords($request->code_nm);
        $kode->code_group = ucwords($request->code_group);
		$kode->code_value = $request->code_value;
		$kode->created_id = Auth::user()->user_id;
        $kode->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /**
     * Show by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id){
        $kode = ComCode::find($id);

        if($kode){
            return response()->json(['status' => 'ok', 'data' => $kode],200);
        }else{
            return response()->json(['status' => 'failed', 'data' => 'not found'],200);
        }
    }

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $id){
        $this->validate($request,[
            'com_cd'       => 'required',
			'code_nm'      => 'required',
			'code_group'   => 'required'
        ]);
        
        $kode             = ComCode::find($id);
        $kode->code_nm    = ucwords($request->code_nm);
		$kode->code_group = ucwords($request->code_group);
		$kode->code_value = ucwords($request->code_value);
		$kode->updated_id = Auth::user()->user_id;

        $kode->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /** 
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id){
        //ComCode::destroy($id);
		DB::table('com_code')->where('com_cd','=',$id)->delete();

        return response()->json(['status' => 'ok'],200);
    }

    function getListData(Request $request, $id=NULL){
        $searchParam = $request->get('term');
        $kodes = ComCode::select("com_cd as id", "code_nm as text") 
                        ->where("code_nm", "ILIKE", "%$searchParam%")
                        ->get()
                        ->toArray();

        array_unshift($kodes,array('id' => '','text'=>'=== Pilih Kode ==='));
        return response()->json($kodes);
    }
}
