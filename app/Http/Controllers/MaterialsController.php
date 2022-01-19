<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    //
    public function fetchMaterialsByType(Request $request) {
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid AND m.materialtypeid=?)",[$request->id]);
        return $results;
    }

    public function fetchMaterialsByWork(Request $request) {
        $results['data'] = DB::select("select m.materialid, m.workid, m.materialtypeid, mt.materialtypename, w.workname from materialtbl m, materialtypetbl mt, workstbl w WHERE (w.workid=m.workid AND m.materialtypeid=mt.materialtypeid AND m.workid=?)",[$request->id]);
        return $results;
    }
}
