<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\PublicComCode;
use App\Models\PublicComRegion;
use App\Models\TrxTower;
use App\Models\VwTower;
use App\Models\TrxTowerBerkas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = "Beranda";
        
        return view('home', compact('title'));
    }
}
