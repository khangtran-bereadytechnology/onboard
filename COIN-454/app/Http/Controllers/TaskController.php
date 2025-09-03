<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //lấy user id hiện tại
        $userId = Auth::user()->id;

        //lấy tasks theo id người dùng
        $query = Task::where('user_id', $userId);

        //lấy tổng số task
        $totalTasks = $query->count();
        //lấy tổng số task hoàn thành
        $totalTaskCompleted = Task::where('user_id', $userId)->where('is_completed', true)->count();

        //truy vấn nếu có từ khóa
        if ($request->filled('searchTerm')) {
            $query->where('title', 'LIKE', '%' . $request->searchTerm . '%'); //Model::where('column', 'LIKE', '%value%')->get();
        }

        //truy vấn lọc  theo status is_completed
        if ($request->status === 'done') {
            $query->where('is_completed', true);
        } elseif ($request->status === 'notDone') {
            $query->where('is_completed', false);
        }

        //lấy tasks list mới nhất
        $tasks = $query->latest()->get();
        session(['success' => 'Get tasks successfull!']);
        //toast khong dung duoc with vì view trả về flash chứ không phải session như redirect
        return view('tasks.index', compact('tasks', 'totalTasks', 'totalTaskCompleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $task = Task::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'is_completed' => false,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Get tasks successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return redirect()->back()->with('error', 'You can not edit this task!');
        }
        $task->update(['title' => $request->title, 'is_completed' =>  $request->has('is_completed')]);
        return redirect()->route('tasks.index')->with('success', 'Update task successfull!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return redirect()->back()->with('error', 'You are not allowed!');
        }
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Soft delete task successfull!');
    }
}
