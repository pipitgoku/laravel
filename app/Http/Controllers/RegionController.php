<?php
namespace App\Http\Controllers;

use DB;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PublicComRegion;
use App\Models\PublicVwRegion;

class RegionController extends Controller{
    private $folder_path = 'region';
    
    function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index($id = NULL){
        $filename_page  = 'index';
        $judul          = 'Data Wilayah';
        $root           = $id;

        return view('datamaster::' . $this->folder_path . '.' . $filename_page, compact('judul', 'root'));
    }

    /**
     * Display a listing of the resource for datatables.
     *
     * @return \Illuminate\Http\Response
     */
    function getData(Request $request){
        $data   = PublicVwRegion::select('vw_region.region_cd',
                                    'vw_region.region_nm',
                                    'vw_region.region_level_nm',
                                    'vw_region.region_root_nm',
                                    'vw_region.region_capital'
                                );
        
        if(!empty($request->root)) {
            $data->where('vw_region.region_root', $request->root);
        }else{
            // $data->where('com_region.region_level', 1);
        }

        return Datatables::of($data)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request){
        $this->validate($request,[
            'region_cd'      => 'required|unique:com_region',
            'region_nm'      => 'required',
            'region_capital' => 'nullable',
            'region_root'    => 'nullable',
        ]);
        
        if (!empty($request->region_root)) {
            $regionRoot=PublicComRegion::find($request->region_root);
            $regionLevel=$regionRoot->region_level+1;
        }else{
            $regionLevel=1;
        }
        
        $region = PublicComRegion::create([
            'region_cd'     => $request->region_cd,
            'region_nm'     => $request->region_nm,
            'region_root'   => $request->region_root,
            'region_capital'=> $request->region_capital,
            'region_level'  => $regionLevel,
            'created_id'    => Auth::user()->user_id
        ]);

        return response()->json(['status' => 'ok'],200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function show($id){
        $region = PublicVwRegion::select(DB::Raw("*, trim(concat(region_nm_kel, ', ', region_nm_kec, ', ', region_nm_kab, ', ', region_nm_prop),', ') as long_region"))->find($id);

        if($region){
            return response()->json(['status' => 'ok', 'data' => $region],200);
        }else{
            return response()->json(['status' => 'failed', 'data' => 'not found'],200);
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $id){
        $this->validate($request,[
            'region_nm'      => 'required',
            'region_capital' => 'nullable',
            'region_root'    => 'nullable',
        ]);
        
        if (!empty($request->region_root)) {
            $regionRoot=PublicComRegion::find($request->region_root);
            $regionLevel=$regionRoot->region_level+1;
        }else{
            $regionLevel=1;
        }
        
        $region = PublicComRegion::find($id);

        $region->region_nm     = $request->region_nm;
        $region->region_root   = $request->region_root;
        $region->region_capital= $request->region_capital;
        $region->region_level  = $regionLevel;
        $region->updated_id    = Auth::user()->user_id;

        $region->save();

        return response()->json(['status' => 'ok'],200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id){
        Region::destroy($id);

        return response()->json(['status' => 'ok'],200);
    }

    /**
     * Display a listing of the resource for select2.
     *
     * @return \Illuminate\Http\Response
     */
    function getRegionList(Request $request, $id=NULL){
        $regionNmParam  = $request->get('term');
        $level          = $request->get('level');
        $action         = $request->route()->getAction();

        $regions        = PublicVwRegion::select(DB::raw("region_cd as id, 
                            region_nm as text, 
                            region_root,
                            region_cd_prop,
                            region_nm_prop,
                            region_cd_kab,
                            region_nm_kab,
                            region_cd_kec,
                            region_nm_kec,
                            region_cd_kel,
                            region_nm_kel,
                            concat(region_nm_kel, ' || ', region_nm_kec, ' || ', region_nm_kab, ' || ', region_nm_prop) as long_region"))
                            ->where("region_nm", "LIKE", "%$regionNmParam%");

        if (!empty($action['region_level'])) {
            $regions->where('region_level','=',$action['region_level']);
        }

        if ($id) {
            $regions->where('region_root', $id);
        }

        $regions->limit(100);
        
        return response()->json($regions->get());
    }

    public static function getRegionById($id){
        return PublicVwRegion::find($id);
    }
}
