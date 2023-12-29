<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\Task;

class TodoListController extends Controller
{
    public function index()
    {
        return view('tdl');
    }

    public function createList(Request $request)
    {
        $request->validate([
            'tdl_title' => 'required|string|max:255',
            'tdl_date' => 'required|date',
        ]);

        $user = auth()->user();

        $list = $user->todoLists()->create([
            'tdl_title' => $request->input('tdl_title'),
            'tdl_date' => $request->input('tdl_date'),
        ]);

        return redirect()->route('todo.showAllLists');
    }


    public function showAllLists()
    {
        // Get all to-do lists for the authenticated user
        $lists = auth()->user()->todoLists;

        return view('tdl', compact('lists'));
    }


    public function addTask(Request $request, $tdl_id)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
        ]);

        $task = auth()->user()->tasks()->create([
            'tdl_id' => $tdl_id,
            'task_name' => $request->input('task_name'),
            'completed' => false, // Default to not completed
        ]);

        $todoList = TodoList::findOrFail($tdl_id);
        $todoList->tasks()->save($task);

        return redirect()->route('todo.showAllLists');
    }

    public function updateTaskStatus($taskId)
    {
        try {
            $task = Task::where('task_id', $taskId)->firstOrFail();
            $task->update(['completed' => !$task->completed]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($tdl_id)
    {
        try {
            $todoList = TodoList::findOrFail($tdl_id);

            $todoList->tasks()->delete();
            $todoList->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
