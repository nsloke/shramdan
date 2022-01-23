<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class WorksController extends Controller
{
    //fetch All Works

    public function fetchWorksSys(Request $request)
    {
        $informa="[";
        $informa=$informa."{";
        $iterwork=0;
        $resultwork['data']=DB::select("SELECT `workid`, `worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt` FROM `workstbl`");
        return $resultwork;

    }


    public function fetchWorks(Request $request)
    {
        $informa="[";
        $informa=$informa."{";
        $iterwork=0;
        $resultwork['data']=DB::select("SELECT `workid`, `worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt` FROM `workstbl` LIMIT ?",[$request->limits]);
        return $resultwork;

    }



     //fetch All WorkType
    public function fetchWorkType(Request $request)
    {
        $works['data'] = DB::table('workstypetbl')->get();

        return $works;


    }



    



     //fetch Work By ID

    public function fetchWorksById(Request $request)
    {

         $fetchWorksById['data']=DB::select('SELECT `workid`, `worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt` FROM `workstbl`',[$request->id]);

         return $fetchWorksById;
    }


    public function fetchWorkProgressById(Request $request)
    {

         $fetchWorkProgress['data']=DB::select('SELECT `workid`, `workimg`, `workstatus` FROM `worksprogresstbl` WHERE workid=?',[$request->id]);

         return $fetchWorkProgress;
    }

    public function fetchWorkProgressByIdStatus(Request $request)
    {

         $fetchWorkProgress['data']=DB::select('SELECT `workid`, `workimg`, `workstatus` FROM `worksprogresstbl` WHERE workid=? AND workstatus=?',[$request->id,$request->statuswork]);

         return $fetchWorkProgress;
    }

    //savework
    public function saveWork(Request $request)
    {
         $worktypeid=$request->post('worktypeid');
         $workname=$request->post('workname');
         $worklocation=$request->post('worklocation');
         $workrequirements=$request->post('workrequirements');
         
         $datetime1=$request->post('workstartdate');
         $workstartdate=date("Y-m-d H:i:s",strtotime($datetime1));

         $datetime2=$request->post('workenddate');
         $workenddate=date("Y-m-d H:i:s",strtotime($datetime2));
         //$workstartdt=$request->post('workstartdt');
        // $workenddt=$request->post('');
        $saveWork=DB::insert('INSERT INTO `workstbl`(`worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt`) VALUES (?,?,?,?,?,?)',[$worktypeid,$workname,$worklocation,$workrequirements,$workstartdate,$workenddate]);

        if($saveWork)
       {
        echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
       }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }



    public function saveWorkWeb(Request $request)
    {
         $worktypeid=$request->post('worktypeid');
         $workname=$request->post('workname');
         $worklocation=$request->post('worklocation');
         $workrequirements=$request->post('workrequirements');
         
         $datetime1=$request->post('workstartdate');
         $workstartdate=date("Y-m-d H:i:s",strtotime($datetime1));

         $datetime2=$request->post('workenddate');
         $workenddate=date("Y-m-d H:i:s",strtotime($datetime2));
         //$workstartdt=$request->post('workstartdt');
        // $workenddt=$request->post('');
        $saveWork=DB::insert('INSERT INTO `workstbl`(`worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt`) VALUES (?,?,?,?,?,?)',[$worktypeid,$workname,$worklocation,$workrequirements,$workstartdate,$workenddate]);

        if($saveWork)
       {
        echo "Data Inserted Successfully";
       }
        else
         {
            echo "Insertion Error";
         }

    }



    public function editWork(Request $request) {
         $workid=$request->post('workid');
         $worktypeid=$request->post('worktypeid');
         $workname=$request->post('workname');
         $worklocation=$request->post('worklocation');
         $workrequirements=$request->post('workrequirements');

         $datetime1=$request->post('workstartdate');
         $workstartdate=date("Y-m-d",strtotime($datetime1));

        // echo $datetime1;
      //   echo $workstartdate."<br>";
         $datetime2=$request->post('workenddate');
         $workenddate=date("Y-m-d",strtotime($datetime2));
         
       //  echo $datetime2;
       //  echo $workenddate."<br>";
         //$workstartdt=$request->post('workstartdt');
        // $workenddt=$request->post('');
        
        $saveWork=DB::statement('UPDATE `workstbl` SET `worktypeid`=?, `workname`=?, `worklocation`=?, `workrequirements`=?, `workstartdt`=?, `workenddt`=? WHERE workid=?',[$worktypeid,$workname,$worklocation,$workrequirements,$workstartdate,$workenddate,$workid]);

        //echo $saveWork;
        if($saveWork)
       {
        echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
       }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }

    //saveworktype
    public function saveWorkType(Request $request)
    {
        $workstype=$request->post('workstype');
        $worksdescription=$request->post('worksdescription');


        $saveWorkType=DB::insert('INSERT INTO `workstypetbl`(`workstype`,`worksdescription`) VALUES (?,?)',[$workstype,$worksdescription]);

        if($saveWorkType)
       {
        echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
       }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }




    public function saveWorkTypeWeb(Request $request)
    {
        $workstype=$request->post('workstype');
        $worksdescription=$request->post('worksdescription');


        $saveWorkType=DB::insert('INSERT INTO `workstypetbl`(`workstype`,`worksdescription`) VALUES (?,?)',[$workstype,$worksdescription]);

        if($saveWorkType)
       {
        echo "Data Inserted Successfully";
       }
        else
         {
            echo "Insertion Error";
         }

    }




    public function editWorkType(Request $request)
    {
        $worktypeid=$request->post('workstypeid');
        $workstype=$request->post('workstype');
        $worksdescription=$request->post('worksdescription');


        $saveWorkType=DB::insert('UPDATE `workstypetbl` SET `workstype`=?,`worksdescription`=? WHERE workstypeid=?',[$workstype,$worksdescription,$worktypeid]);

        if($saveWorkType)
       {
        echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
       }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }


    public function workprogressupd(Request $request) {
        $workid=$request->post('workid');
        $workstatus=$request->post('status');


        if ($image = $request->file('image')) {
            $destinationPath = 'workimg/';
            $workImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $workImage);
            $input['image'] = "$workImage";

            $finalpath=$destinationPath.$workImage;

            $saveProgress=DB::insert('INSERT INTO `worksprogresstbl`(`workid`, `workimg`, `workstatus`) VALUES (?,?,?)',[$workid,$finalpath,$workstatus]);

            if($saveProgress)
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






}
