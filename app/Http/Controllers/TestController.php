<?php
namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComTest;

class TestController extends Controller{
    private $folder_path = 'test';
    
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
        $title 			= 'Data Test';
		
		return view('sistem.' . $this->folder_path . '.' . $filename_page, compact('title'));
    }

    /**
     * Show : DataTables
     *
     * @return \Illuminate\Http\Response
     */
    function getData(Request $request){
        /* $data = ComTest::query()->where(function($where) use($request){
					if ($request->tahun_param != '') {
						$where->where('tahun', $request->tahun_param);
					}
					if ($request->bulan_param != '') {
						$where->where('bulan', $request->bulan_param);
					}
				})
				->orderBy('tahun','asc')
				->orderBy('bulan','desc'); */
		$data = ComTest::select(
					'test_cd',
					'test_nm',
					'keterangan',
					'tahun',
					'bulan',
					'B.code_nm as nama_bulan'
				)
				->leftJoin('com_code as B','B.code_value','com_test.bulan')
				->where(function($where) use($request){
					if ($request->tahun_param != '') {
						$where->where('tahun', $request->tahun_param);
					}
					if ($request->bulan_param != '') {
						$where->where('bulan', $request->bulan_param);
					}
				})
				->orderBy('tahun','asc')
				->orderBy('bulan','desc');
				
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
		
		/* $data   =  ComTest::all();
		
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
            'test_cd'	=> 'required',
            'test_nm'	=> 'required|min:5',
        ],
		[
            'test_cd.required' => 'Kode harus Diisi',
			'test_nm.required' => 'Nama tidak boleh kosong',
			'test_nm.min' 	   => 'Nama minimal lima karakter',
        ]);
		
        $test             	= new ComTest;
        $test->test_cd    	= str_replace(' ','',$request->test_cd);
        $test->test_nm    	= ucwords($request->test_nm);
		$test->keterangan	= $request->keterangan;
		$test->tahun    	= $request->tahun;
		$test->bulan    	= $request->bulan;
		$test->created_id 	= Auth::user()->user_id;
        $test->save();

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
            'test_cd'	=> 'required',
            'test_nm'	=> 'required|min:5',
        ],
		[
            'test_cd.required' => 'Kode harus Diisi',
			'test_nm.required' => 'Nama tidak boleh kosong',
			'test_nm.min' 	   => 'Nama minimal lima karakter',
        ]);
        
        $test             	= ComTest::find($id); //--Query DB: SELECT * FROM com_test WHERE test_cd=$id;
        $test->test_nm    	= ucwords($request->test_nm);
		$test->keterangan	= $request->keterangan;
		$test->tahun    	= $request->tahun;
		$test->bulan    	= $request->bulan;
		$test->updated_id = Auth::user()->user_id;

        $test->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /** 
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id){
        ComTest::destroy($id);

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
