<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialsController extends Controller
{
    //


    public function fetchAllMaterials(Request $request) {
        //echo $request->id;
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid) LIMIT ?",[$request->limits]);
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
        $materialpid=$request->post('materialid');
        $materialtypeid=$request->post('materialtypeid');
        $workid=$request->post('workid');
        $stock=$request->post('stock');
        $remarks=$request->post('remarks');


        $saveEquipments=DB::insert('INSERT INTO materialtbl(materialid,materialtypeid,workid,stock,remarks) VALUES (?,?,?,?,?)',[$materialid,$materialtypeid,$workid,$stock,$remarks]);

        if($saveEquipments)
        {
            echo "{\"error\":false ,\"msg\":\"Data Inserted Successfully\"}";
        }
        else
         {
            echo "{\"error\":true ,\"msg\":\"Insertion Error\"}";
         }

    }



}
