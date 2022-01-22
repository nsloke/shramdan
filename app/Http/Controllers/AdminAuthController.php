<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class AdminAuthController extends Controller
{

    public static function generateRandomString(int $n=0)
    {
    $al = ['a','b','c','d','e','f','g','h','i','j','k'
    , 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
    'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E',
    'F','G','H','I','J','K', 'L', 'M', 'N', 'O', 'P',
    'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    '0', '2', '3', '4', '5', '6', '7', '8', '9'];

    $len = !$n ? random_int(7, 12) : $n; // Chose length randomly in 7 to 12

    $ddd = array_map(function($a) use ($al){
        $key = random_int(0, 60);
        return $al[$key];
    }, array_fill(0,$len,0));
    return implode('', $ddd);
    }


    //
    public function loginAdmin(Request $request) {
       // dd($request->all());
       $admInputUsername=$request->post('username');
       $admInputPassword=$request->post('password');
       $admRoles=$request->post('selroles');

       //echo $admInputUsername;
       //echo $admInputPassword;
       $results = DB::select("select userid, passwd from admins where email='$admInputUsername' AND roleId=$admRoles");

       //echo $results[0]->passwd;
       if(isset($results[0]->passwd)) {
            $userId=$results[0]->userid;
            $minutes = 1440;
                if (Hash::check($admInputPassword, $results[0]->passwd)) {
                    // The passwords match...
                    Cookie::queue('userid',$userId,$minutes);
                    Cookie::queue('admrole',$admRoles,$minutes);
                    return redirect('/home');
                }
                else {

                    echo '<script> alert("Username or Passwords do not match")</script>';
                    return redirect('/admin');
                    //die();
                }
        }
        else {
            echo '<script> alert("Username or Passwords do not match")</script>';
            return redirect('/admin');

        }




    }



    public function loginAdminApi(Request $request) {
        // dd($request->all());
        $admInputUsername=$request->post('username');
        $admInputPassword=$request->post('password');
        $admRoles=$request->post('selroles');
 
        //echo $admInputUsername;
        //echo $admInputPassword;
        $results = DB::select("select userid, passwd from admins where email='$admInputUsername' AND roleId=$admRoles");
 
        //echo $results[0]->passwd;
        if(isset($results[0]->passwd)) {
             $userId=$results[0]->userid;
             $minutes = 1440;
                 if (Hash::check($admInputPassword, $results[0]->passwd)) {
                     // The passwords match...
                     Cookie::queue('userid',$userId,$minutes);
                     echo "{\"error\":false ,\"msg\":\"User Authentication Successful\",\"userid\":\"".$userId."\"}";
                     //return redirect('/home');
                 }
                 else {
 
//                     echo '<script> alert("Username or Passwords do not match")</script>';
                    echo "{\"error\":true ,\"msg\":\"User Authentication Failed. Passwords Mismatched\"}";  
//return redirect('/admin');
                     //die();
                 }
         }
         else {
            echo "{\"error\":true ,\"msg\":\"User Authentication Failed. Passwords Mismatched\"}";   
            //            echo '<script> alert("Username or Passwords do not match")</script>';
             //return redirect('/admin');
 
         }
 
 
 
 
     }



    
     

    public function saveadmusr(Request $request) {
        $useremail=$request->post('useremail');
        $username=$request->post('username');
        $password=$request->post('password');
        $admRoles=$request->post('role');
        //$masteradmin=$request->post('masteradmin');

        $opiro="9082fty90";


       // $results = DB::select("select userid from admins where username='$masteradmin'");


        $adminUpdate=DB::statement("INSERT INTO admins(email,username,passwd,roleId) VALUES(?,?,?,?)",array($useremail,$username,Hash::make($password),$admRoles));
        if($adminUpdate==1) {
            echo "User Created Successfully.";
        }
        else {
            echo "User Creation Failed.";
        }

    }




    public function saveadmusrapi(Request $request) {
        $useremail=$request->post('useremail');
        $username=$request->post('username');
        $password=$request->post('password');
        $admRoles=$request->post('role');
        //$masteradmin=$request->post('masteradmin');

        $opiro="9082fty90";


       // $results = DB::select("select userid from admins where username='$masteradmin'");


        $adminUpdate=DB::statement("INSERT INTO admins(email,username,passwd,roleId) VALUES(?,?,?,?)",array($useremail,$username,Hash::make($password),$admRoles));
        if($adminUpdate==1) {
//            echo "User Created Successfully.";
            echo "{\"error\":false ,\"msg\":\"User Creation Successful\"}";
        }
        else {
            echo "{\"error\":false ,\"msg\":\"User Creation Failed\"}";
        }

    }




    public function delUser(Request $request) {
        $userid=$request->val;
        $adminUpdate=DB::statement("UPDATE admins SET status=2 WHERE userId=?",array($userid));
        if($adminUpdate==1) {
            //echo "User Deleted Successfully.";
        }
        else {
            //echo "User Deletion Failed.";
        }
        return redirect('/deleteuser');

    }


    public static function getAdminInfo() {
       $ckuser = Cookie::get('userid');
     //  echo $ckuser;
       $results = DB::select("select username from admins where userId=$ckuser");
       $userName="Undefined";
       if(isset($results[0]->username)) {
        $userName=$results[0]->username;
       }
       return $userName;
    }


    public static function fetchAdminPrivileges() {
        $ckuser = Cookie::get('userid');
        $results = DB::select("select px.privelegeCode from privelegesTbl px,adminPrivelegeTbl ap,admins as where ap.privelegeId=px.privelegeId AND userId=$ckuser");
        return $results;
    }

    public function fetchPrivilegeList() {
        $results['data'] = DB::select("select * from privelegesTbl");
        return $results;
    }

    public static function fetchAdminRoles() {
        //$ckuser = Cookie::get('userid');
        $results['data'] = DB::select("select roleid, roles from rolestbl");
        return $results;
    }

    public static function fetchCrudUser() {
        $ckuser = Cookie::get('userid');
        $results['data'] = DB::select("select a.userId,a.email,a.username,r.roleName from admins a, rolesTbl r WHERE parent=? AND a.roleId=r.roleId AND status=1",[$ckuser]);
        return $results;
    }



    public function logoutAdmin(Request $request) {
        Cookie::forget('userid');
        return redirect('/admin');
    }

}
