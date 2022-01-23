<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialsController extends Controller
{
    //


    public function fetchAllMaterialsTypeWeb(Request $request) {
        //echo $request->id;
        $results['data'] = DB::select("SELECT * FROM `materialtypetbl`");
        return $results;
       // return response()->json($results['data']);
    }


    public function fetchAllMaterialsType(Request $request) {
        //echo $request->id;
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid) LIMIT ?",[$request->limits]);
        return $results;
       // return response()->json($results['data']);
    }


    public function fetchAllMaterialsSys(Request $request) {
        //echo $request->id;
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid)");
        return $results;
       // return response()->json($results['data']);
    }

    public function fetchMaterialsByType(Request $request) {
        //echo $request->id;
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid AND m.materialtypeid=?)",[$request->id]);
        return $results;
       // return response()->json($results['data']);
    }

    public function fetchMaterialsByWork(Request $request) {
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid AND m.workid=?)",[$request->id]);
        return $results;
    }



    public function saveMaterials(Request $request)
    {
        $materialtypeid=$request->post('materialtypeid');
        $workid=$request->post('workid');
        $stock=$request->post('stock');
        $remarks=$request->post('remarks');


        $saveEquipments=DB::insert('INSERT INTO materialtbl(materialtypeid,workid,stock,remarks) VALUES (?,?,?,?)',[$materialtypeid,$workid,$stock,$remarks]);

        if($saveEquipments)
        {
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }



    public function saveMaterialsWeb(Request $request)
    {
        $materialtypeid=$request->post('materialtypeid');
        $workid=$request->post('workid');
        $stock=$request->post('stock');
        $remarks=$request->post('remarks');


        $saveEquipments=DB::insert('INSERT INTO materialtbl(materialtypeid,workid,stock,remarks) VALUES (?,?,?,?)',[$materialtypeid,$workid,$stock,$remarks]);

        if($saveEquipments)
        {
            echo "Data Inserted Successfully";
        }
        else
         {
            echo "Insertion Error";
         }

    }




    public function saveMaterialsType(Request $request)
    {
        $materialtypename=$request->post('materialtypename');


        $saveMaterialsType=DB::insert('INSERT INTO materialtypetbl(materialtypename) VALUES (?)',[$materialtypename]);

        if($saveMaterialsType)
        {
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }




    public function saveMaterialsTypeWeb(Request $request)
    {
        $materialtypename=$request->post('materialtypename');


        $saveMaterialsType=DB::insert('INSERT INTO materialtypetbl(materialtypename) VALUES (?)',[$materialtypename]);

        if($saveMaterialsType)
        {
            echo "Data Inserted Successfully";
        }
        else
         {
            echo "Insertion Error";
         }

    }







}
