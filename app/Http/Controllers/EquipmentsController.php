<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    //
    public function fetchEquipmentsByType(Request $request) {
        $results['data'] = DB::select("select e.equipid, e.workid, from equipmenttbl WHERE equipid=?",[$request->id]);
        return $results;
    }

    public function fetchEquipmentsByWork(Request $request) {
        $results['data'] = DB::select("select subtopicId, subtopicName from equipmenttbl WHERE equipid=?",[$request->id]);
        return $results;
    }
}
