<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;


class EquipmentsController extends Controller
{
    //
    public function fetchEquipmentsByType(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, e.eqtypeid, et.equipname, w.workname from equipmenttbl e, equipmenttypetbl et, workstbl w WHERE (w.workid=e.workid AND e.eqtypeid=et.equiptypeid AND et.equiptypeid=?)",[$request->id]);
        return $results;
    }

    public function fetchEquipmentsByWork(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, e.eqtypeid, et.equipname, w.workname from equipmenttbl e, equipmenttypetbl et, workstbl w WHERE (w.workid=e.workid AND e.eqtypeid=et.equiptypeid AND w.workid=?)",[$request->id]);
        return $results;
    }
}
