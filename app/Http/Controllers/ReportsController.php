<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class ReportsController extends Controller
{
    //

//SELECT * FROM workstbl w, worktrackertbl wt, workstypetbl wx, shramdatastbl st WHERE w.workid=wt.workid AND w.worktypeid=wx.workstypeid AND st.supervisorid=2


    public function fetchReports(Request $request) {
        $resultwork['data']=DB::select("SELECT w.workid, w.workname, wx.workstypeid, wx.workstype, TIMESTAMPDIFF(HOUR, wt.checkintime, wt.checkouttime) AS hours_worked, st.shrid, st.firstname, st.surname FROM workstbl w, worktrackertbl wt, workstypetbl wx, shramdatastbl st WHERE w.workid=wt.workid AND w.worktypeid=wx.workstypeid AND st.supervisorid=? AND w.workid=?",[$request->supervisorid,$request->workid]);
        return $resultwork;
    }
}
