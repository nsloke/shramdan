<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class ShramdataController extends Controller
{
    //
    public function fetchShramdataInfo(Request $request) {
        $results['data'] = DB::select("select * from shramdatastbl LIMIT ?",[$request->limits]);
        return $results;
    }

   
    public function saveShramdataInfo(Request $request) {
        $firstname=$request->post('firstname');
        $surname=$request->post('surname');
        $mobno=$request->post('mobno');
        $village=$request->post('village');
        $district=$request->post('district');
        $taluka=$request->post('taluka');


        if ($image = $request->file('image')) {
            $destinationPath = 'profileimg/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

            $finalpath=$destinationPath.$profileImage;

            $saveShramdatas=DB::insert('INSERT INTO `shramdatastbl`(`firstname`, `surname`, `mobno`, `village`, `taluka`, `district`, `imgurl`) VALUES (?,?,?,?,?,?,?)',[$firstname,$surname,$mobno,$village,$taluka,$district,$finalpath]);

            if($saveShramdatas)
            {
              echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
            }
            else
            {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
            }


        }else{
            //unset($input['image']);
           
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
            
        }

        

    }


    public function fetchShramdataWorkLogByWorkId(Request $request) {
        $results['data'] = DB::select("select TIMESTAMPDIFF(HOUR, wt.checkintime, wt.checkouttime) AS hours_worked from shramdatastbl st,worktrackertbl wt, workstbl w WHERE  w.workid=wt.workid AND st.shrid=wt.shrid AND wt.workid=? AND wt.shrid=?",[$request->workid,$request->shrid]);
        return $results;
    }


    public function assignWorkShramdata(Request $request) {
        $workid=$request->post('workid');
        $shrid=$request->post('shrid');


        $asgnShramdatas=DB::insert('INSERT INTO `worktrackertbl`(`workid`, `shrid`, `workdate`) VALUES (?,?,NOW())',[$workid,$shrid]);
        if($asgnShramdatas==1) {
            //echo "User Deleted Successfully.";
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else {
            //echo "User Deletion Failed.";
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
        }
    }


    public function setShramdataWorkStartTime(Request $request) {
        $workid=$request->post('workid');
        $shrid=$request->post('shrid');

        $datetime=$request->post('workdate');
        $workdate=date("Y-m-d",strtotime($datetime));


        $workupd=DB::statement("UPDATE worktrackertbl SET checkintime=NOW() WHERE workid=? AND shrid=? AND DATE(workdate)=?",array($workid,$shrid,$workdate));
        if($workupd==1) {
            //echo "User Deleted Successfully.";
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else {
            //echo "User Deletion Failed.";
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
        }
    }

    public function setShramdataWorkEndTime(Request $request) {
        $workid=$request->post('workid');
        $shrid=$request->post('shrid');

        $datetime=$request->post('workdate');
        $workdate=date("Y-m-d",strtotime($datetime));


        $workupd=DB::statement("UPDATE worktrackertbl SET checkouttime=NOW() WHERE workid=? AND shrid=? AND DATE(workdate)=?",array($workid,$shrid,$workdate));
        if($workupd==1) {
            //echo "User Deleted Successfully.";
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else {
            //echo "User Deletion Failed.";
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
        }
    }

}
