<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialsController extends Controller
{
    //
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
}
