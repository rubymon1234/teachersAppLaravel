<?php

namespace App\Http\Controllers\Web;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\UserBasicDetail;
use App\Models\UserSecondaryDetails;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\UserQualification;
use Illuminate\Support\Facades\Hash;
use Toastr;

class MenuController extends Controller
{
    

    public function getMenuList() {
        try {
                $menuList = \DB::table('menu')
                            ->where('is_active', '=',1)
                            ->get();
            $menuData = '<ul>';
            foreach($menuList as $row) {
                $menuData .= '<li><a href="'. $row->url .'">'. $row->menu_name .'</a></li>';
            }
            $menuData .='</ul>';
            return response($menuData);
        } catch (Exception $e) {

        }
    }

   
}
