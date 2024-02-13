<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasksByChecklistId($checklistId)
    {
        $tasks = Task::where('checklist_id', $checklistId)->get();

        return response()->json(['tasks' => $tasks]);
    }
}
