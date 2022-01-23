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

    public function fetchAllEquipmentsTypeWeb(Request $request) {
        $results['data'] = DB::select("SELECT `equiptypeid`, `equipname` FROM `equipmenttypetbl`");
        return $results;
    }

    public function fetchAllEquipments(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, e.eqtypeid, et.equipname, w.workname from equipmenttbl e, equipmenttypetbl et, workstbl w WHERE (w.workid=e.workid AND e.eqtypeid=et.equiptypeid) LIMIT ?",[$request->limits]);
        return $results;
    }

    public function fetchEquipmentsByType(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, e.eqtypeid, et.equipname, w.workname from equipmenttbl e, equipmenttypetbl et, workstbl w WHERE (w.workid=e.workid AND e.eqtypeid=et.equiptypeid AND et.equiptypeid=?)",[$request->id]);
        return $results;
    }

    public function fetchEquipmentsByWork(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, e.eqtypeid, et.equipname, w.workname from equipmenttbl e, equipmenttypetbl et, workstbl w WHERE (w.workid=e.workid AND e.eqtypeid=et.equiptypeid AND w.workid=?)",[$request->id]);
        return $results;
    }

    public function saveEquipments(Request $request)
    {
        $eqtypeid=$request->post('eqtypeid');
        $workid=$request->post('workid');
        $stock=$request->post('stock');
        $remarks=$request->post('remarks');


        $saveEquipments=DB::insert('INSERT INTO equipmenttbl(eqtypeid,workid,stock,remarks) VALUES (?,?,?,?)',[$eqtypeid,$workid,$stock,$remarks]);

        if($saveEquipments)
        {
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }



    public function saveEquipmentsWeb(Request $request)
    {
        $eqtypeid=$request->post('eqtypeid');
        $workid=$request->post('workid');
        $stock=$request->post('stock');
        $remarks=$request->post('remarks');


        $saveEquipments=DB::insert('INSERT INTO equipmenttbl(eqtypeid,workid,stock,remarks) VALUES (?,?,?,?)',[$eqtypeid,$workid,$stock,$remarks]);

        if($saveEquipments)
        {
            echo "Data Inserted Successfully";
        }
        else
         {
            echo "Insertion Error";
         }

    }




    public function saveEquipmentType(Request $request)
    {
        $equipmenttypename=$request->post('equipmenttypename');


        $saveEquipmentsType=DB::insert('INSERT INTO equipmenttypetbl(equipname) VALUES (?)',[$equipmenttypename]);

        if($saveEquipmentsType)
        {
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }




    public function saveEquipmentTypeWeb(Request $request)
    {
        $equipmenttypename=$request->post('equipmenttypename');


        $saveEquipmentsType=DB::insert('INSERT INTO equipmenttypetbl(equipname) VALUES (?)',[$equipmenttypename]);

        if($saveEquipmentsType)
        {
            echo "Data Inserted Successfully";
        }
        else
         {
            echo "Insertion Error";
         }

    }







}
