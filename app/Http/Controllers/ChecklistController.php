<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function getAllChecklists()
    {
        return response()->json([
            'data' => Checklist::with('tasks:id,name,checklist_id')->get()->makeHidden(['created_at', 'updated_at']),
            'message' => 'Checklists and associated tasks successfully retrieved'
        ]);
    }
}
