<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        $tasks = Task::all();

        return response()->json(['tasks' => $tasks->makeHidden(['created_at', 'updated_at'])]);
    }

    public function getTasksByChecklistId($checklistId)
    {
        $tasks = Task::where('checklist_id', $checklistId)->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks yet for this checklist']);
        }

        return response()->json(['tasks' => $tasks->makeHidden(['created_at', 'updated_at'])]);
    }
}
