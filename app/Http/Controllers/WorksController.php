<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class WorksController extends Controller
{
    //fetch All Works
    public function fetchWorks(Request $request)
    {
        $informa="[";
        $informa=$informa."{";
        $iterwork=0;
        $resultwork=DB::select("SELECT `workid`, `worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt` FROM `workstbl` ");
        if(count($resultwork))
        {
            $informa=$informa."\"WorkList\":[";
        }

        foreach ($resultwork as $work)
        {

            if($iterwork>0)
            {
                $informa=$informa.",";
            }
            $informa=$informa."{
                                \"WorkID\":\"".$work->workid."\",
                                \"WorkTypeID\":\"".$work->worktypeid."\",
                                \"WorkName\":\"".$work->workname."\",
                                \"WorkLocation\":\"".$work->worklocation."\",
                                \"Workrequirements\":\"".$work->workrequirements."\",
                                \"Workstartdt\":\"".$work->workstartdt."\",
                                \"workenddt\":\"".$work->workenddt."\"";


                $informa=$informa."}";
                $iterwork=$iterwork+1;

        }
        $informa=$informa."]";
        $informa=$informa."}";
        $informa=$informa."]";
        echo $informa;

    }

     //fetch All WorkType
    public function fetchWorkType(Request $request)
    {
        $users = DB::table('workstypetbl')->get();

        return response()->json($users);


    }

     //fetch Work By ID

    public function fetchWorksById(Request $request)
    {

         $fetchWorksById=DB::select('SELECT `workid`, `worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt` FROM `workstbl`',[$request->id]);

         return response()->json($fetchWorksById);
    }

    //savework
    public function saveWork(Request $request)
    {
         $worktypeid=$request->post('worktypeid');
         $workname=$request->post('workname');
         $worklocation=$request->post('worklocation');
         $workrequirements=$request->post('workrequirements');
         $workstartdt=$request->post('workstartdt');
         $workenddt=$request->post('workenddt');
        $saveWork=DB::insert('INSERT INTO `workstbl`(`worktypeid`, `workname`, `worklocation`, `workrequirements`, `workstartdt`, `workenddt`) VALUES (?,?,?,?,?,?)',[$worktypeid,$workname,$worklocation,$workrequirements,$workstartdt,$workenddt]);

        if($saveWork)
       {
         echo "Data Inserted Successfully";
       }
        else
         {
         echo "Insertion Error";
         }

    }
}
