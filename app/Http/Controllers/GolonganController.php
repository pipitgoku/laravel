<?php
namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BkdGolongan;

class GolonganController extends Controller{
    private $folder_path = 'golongan';
    
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
        $title 			= 'Data Golongan/Pangkat';
		
		return view('sistem.' . $this->folder_path . '.' . $filename_page, compact('title'));
    }

    /**
     * Show : DataTables
     *
     * @return \Illuminate\Http\Response
     */
    function getData(Request $request){
        // $data = BkdGolongan::all()->sortBy('golongan_nama');
		$data = BkdGolongan::select('*')
				->orderBy('golongan_nama');
				
		return DataTables::of($data)
		->addColumn('actions',function($data){
            $actions = '';
            $actions .= "<button type='button' id='ubah'  class='btn btn-warning btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Ubah Data'><i class='icon icon-pencil7'></i> </button> &nbsp";
			if ( Auth::user()->user_id == 'admin' ) {
            $actions .= "<button type='button' id='hapus' class='btn btn-danger btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Hapus Data'><i class='icon icon-trash'></i> </button> &nbsp";
			}
            //$actions .= "<button type='button' id='detail' class='btn btn-info btn-flat btn-sm' data-toggle='tooltip' data-placement='top' title='Detail Data'><i class='icon icon-menu-open'></i> </button>";
            
            return $actions;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    /**
     * Create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request){
		$this->validate($request,[
            'golongan_cd'	=> 'required',
            'golongan_nama'	=> 'required',
        ],
		[
            'golongan_cd.required'	=> 'Kode harus Diisi',
			'golongan_nama.required'=> 'Nama tidak boleh kosong',
        ]);
		
        $golongan             	= new BkdGolongan;
        $golongan->golongan_cd	= str_replace(' ','',$request->golongan_cd);
        $golongan->golongan_nama= $request->golongan_nama;
		$golongan->pangkat_nama	= $request->pangkat_nama;
		$golongan->created_id 	= Auth::user()->user_id;
        $golongan->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /**
     * Show by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id){
        $golongan = BkdGolongan::find($id);

        if($golongan){
            return response()->json(['status' => 'ok', 'data' => $golongan],200);
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
            'golongan_cd'	=> 'required',
            'golongan_nama'	=> 'required',
        ],
		[
            'golongan_cd.required' 	=> 'Kode harus Diisi',
			'golongan_nama.required'=> 'Nama tidak boleh kosong',
        ]);
        
        $golongan             	= BkdGolongan::find($id);
        $golongan->golongan_nama= $request->golongan_nama;
		$golongan->pangkat_nama	= $request->pangkat_nama;
		$golongan->updated_id = Auth::user()->user_id;

        $golongan->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /** 
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id){
        BkdGolongan::destroy($id);

        return response()->json(['status' => 'ok'],200);
    }

    function getListData(Request $request, $id=NULL){
        $searchParam = $request->get('term');
        $golongans = BkdGolongan::select("golongan_cd as id", "golongan_nama as text") 
                        ->where("golongan_nama", "ILIKE", "%$searchParam%")
                        ->get()
                        ->toArray();

        array_unshift($golongans,array('id' => '','text'=>'=== Pilih Golongan ==='));
        return response()->json($kodes);
    }
}
