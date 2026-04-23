<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\AuthMenu;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(){
        $this->middleware('auth');
    }

    function getMenuSide($segment1 = '',$segment2 = '',$segment3 = '',$segment4 = '') {
        $id=Auth::user()->user_id;

        $data = AuthMenu::getUserMenu($id);

        $ulrSegement = array($segment1, $segment2,$segment3,$segment4);
        $ulrSegement = implode('/', $ulrSegement);
        $ulrSegement = trim($ulrSegement, '/');

        $menu_active = AuthMenu::getUserMenu($id,$ulrSegement);

        if(count($menu_active) > 0) {
            $menu_active = json_decode(json_encode($menu_active), true);
            if(count($menu_active) > 0) {
                if($ulrSegement != '' || $ulrSegement != NULL){
                    $menu_active = $menu_active[0];
                }else{
                    $menu_active = [];
                }
            }
        }

        $side = [];
        $side_status;
        foreach ($data as $key => $menu) {
            if ($menu->menu_level == 1) {
                $side['level1'][] = $menu;
            } elseif ($menu->menu_level == 2) {
                $side['level2'][$menu->menu_root][] = $menu;
            } elseif ($menu->menu_level == 3) {
                $side['level3'][$menu->menu_root][] = $menu;
            } elseif ($menu->menu_level == 4) {
                $side['level4'][$menu->menu_root][] = $menu;
            }
        }
        
        if(count($side) <= 0) {
            return '';
        }
        
        $menu_html = '';
        foreach ($side['level1'] as $key1 => $level1) {
            if (isset($side['level2'][$level1->menu_cd])) {
                $menu_html .= '<li class="nav-item nav-item-submenu';
                //add class active
                if(count($menu_active) > 0) {
                    if (in_array($level1->menu_cd, $menu_active)) {
                        $menu_html .= ' nav-item-expanded nav-item-open';
                    }
                }

                $menu_html .= ' ">';

                $menu_html .= '
                    <a href="#" class="nav-link"><i class="'.$level1->menu_image.'"></i> <span>'.$level1->menu_nm.'</span></a>
                ';

                //level 2 start
                $menu_html .= '<ul class="nav nav-group-sub" data-submenu-title="'.$level1->menu_nm.'">';
                
                foreach ($side['level2'][$level1->menu_cd] as $key2 => $level2) {
                    if (isset($side['level3'][$level2->menu_cd])) {
                        $menu_html .= '<li class="nav-item nav-item-submenu';
                        //add class active
                        if(count($menu_active) > 0) {
                            if (in_array($level2->menu_cd, $menu_active)) {
                                $menu_html .= ' nav-item-expanded nav-item-open';
                            }
                        }

                        $menu_html .= ' ">';

                        $menu_html .= '
                                <a href="#" class="nav-link"><i class="icon-circles"></i> '.$level2->menu_nm.'</a>
                            ';
                        
                        //level 3 start
                        $menu_html .= '<ul class="nav nav-group-sub" data-submenu-title="'.$level2->menu_nm.'">';
		                foreach ($side['level3'][$level2->menu_cd] as $key3 => $level3) {
		                    if (isset($side['level4'][$level3->menu_cd])) {
		                        $menu_html .= '<li class="';
		                        //add class active
		                        if(count($menu_active) > 0) {
		                            if (in_array($level3->menu_cd, $menu_active)) {
		                                $menu_html .= ' nav-item-expanded nav-item-open';
		                            }
		                        }

		                        $menu_html .= ' ">';

		                        $menu_html .= '<a href="#" class="nav-link"><i class="icon-circles"></i> '.$level3->menu_nm.'</a>';

		                        //level 4 start
		                        $menu_html .= '<ul class="nav nav-group-sub" data-submenu-title="'.$level3->menu_nm.'">';
		                        foreach ($side['level4'][$level3->menu_cd] as $key4 => $level4) {
		                            $menu_html .= '<li class=" ';
		                            //add class active
		                            if ($level4->menu_url == $ulrSegement) {
		                                $menu_html .= ' active ';
		                            }

		                            $menu_html .= ' ">';
                                    $menu_html .= '<a href="'.url($level4->menu_url).'" class="nav-link"><i class="icon-circles"></i><span>' . $level4->menu_nm . '</span></a>';
                                }
		                        $menu_html .= '
		                                    </ul>';
		                        // level 4 end
		                    } else {
		                        $menu_html .= '<li class=" ';
		                        //add class active
		                        if ($level3->menu_url == $ulrSegement) {
		                            $menu_html .= ' active ';
		                        }
		                        $menu_html .= ' ">';
                                $menu_html .= '<a href="'.url($level3->menu_url).'" class="nav-link"><i class="icon-circles"></i><span>' . $level3->menu_nm . '</span></a>';
                            }
		                    $menu_html .= '
		                                </li>';
			                }
		                $menu_html .= '
		                            </ul>';
			            //level 3 end
                    } else {
                        $menu_html .= '<li class=" nav-item';
                        //add class active
                        if ($level2->menu_url == $ulrSegement) {
                            $menu_html .= ' nav-item-open ';
                        }

                        $menu_html .= ' ">';
                        $menu_html .= '<a href="'.url($level2->menu_url).'" class="nav-link"><i class="icon-circles"></i><span>' . $level2->menu_nm . '</span></a>';
                    }
                    $menu_html .= '
                                </li>';
                }
                $menu_html .= '
                            </ul>';
                //level 2 end
            } else {
                $menu_html .= '
                        <li class="  nav-item';
                //add class active
                $openSt = '';
                if ($level1->menu_url == $ulrSegement) {
                    // $menu_html .= ' active ';
                    $openSt = 'active';
                }

                $menu_html .= ' ">';
                $menu_html .= '
                            <a href="'.url($level1->menu_url).'" class="nav-link '.$openSt.'"><i class="' . $level1->menu_image . '"></i> <span>' . $level1->menu_nm . '</span></a>';
            }
            $menu_html .= '
                        </li>';
        }

        return $menu_html;
    }
}
