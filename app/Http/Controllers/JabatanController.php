<?php
namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BkdJabatan;

class JabatanController extends Controller{
    private $folder_path = 'jabatan';
    
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
        $title 			= 'Data Jabatan';
		
		return view('sistem.' . $this->folder_path . '.' . $filename_page, compact('title'));
    }

    /**
     * Show : DataTables
     *
     * @return \Illuminate\Http\Response
     */
    function getData(Request $request){
        // $data = BkdJabatan::all()->sortBy('jabatan_nama');
		$data = BkdJabatan::select('*')
				->orderBy('jabatan_nama');
				
		$data = BkdJabatan::select(
					'jabatan_id',
					'jabatan_cd',
					'jabatan_nama',
					'jabatan_kelompok',
					'jabatan_tp',
					'B.code_nm as jabatan_tp_nama'
				)
				->leftJoin('com_code as B','B.com_cd','bkd_jabatan.jabatan_tp')
				->orderBy('jabatan_nama','asc');
				
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
            'jabatan_cd'	=> 'required',
            'jabatan_nama'	=> 'required',
        ],
		[
            'jabatan_cd.required'	=> 'Kode harus Diisi',
			'jabatan_nama.required'	=> 'Nama tidak boleh kosong',
        ]);
		
        $jabatan             	= new BkdJabatan;
        $jabatan->jabatan_cd	= str_replace(' ','',$request->jabatan_cd);
        $jabatan->jabatan_nama	= $request->jabatan_nama;
		$jabatan->jabatan_kelompok	= $request->jabatan_kelompok;
		$jabatan->jabatan_tp		= $request->jabatan_tp;
		$jabatan->created_id 		= Auth::user()->user_id;
        $jabatan->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /**
     * Show by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id){
        $jabatan = BkdJabatan::find($id);

        if($jabatan){
            return response()->json(['status' => 'ok', 'data' => $jabatan],200);
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
            'jabatan_cd'	=> 'required',
            'jabatan_nama'	=> 'required',
        ],
		[
            'jabatan_cd.required'	=> 'Kode harus Diisi',
			'jabatan_nama.required' => 'Nama tidak boleh kosong',
        ]);
        
        $jabatan             	= BkdJabatan::find($id);
        $jabatan->jabatan_nama	= $request->jabatan_nama;
		$jabatan->jabatan_kelompok	= $request->jabatan_kelompok;
		$jabatan->jabatan_tp		= $request->jabatan_tp;
		$jabatan->updated_id 		= Auth::user()->user_id;

        $jabatan->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /** 
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id){
        BkdJabatan::destroy($id);

        return response()->json(['status' => 'ok'],200);
    }

    function getListData(Request $request, $id=NULL){
        $searchParam = $request->get('term');
        $jabatans = BkdJabatan::select("jabatan_cd as id", "jabatan_nama as text") 
                        ->where("jabatan_nama", "ILIKE", "%$searchParam%")
                        ->get()
                        ->toArray();

        array_unshift($jabatans,array('id' => '','text'=>'=== Pilih Jabatan ==='));
        return response()->json($kodes);
    }
}
