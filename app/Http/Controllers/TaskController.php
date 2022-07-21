<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::query()->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::query()->get();
        $statuses = Status::query()->get();
        $usersId = User::query()->get('id');
        return view('tasks.create', ['users' => $users, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::get();
        foreach($users as $user) {
            $usersId[] = $user->id;
        }
        $statuses = Status::get();
        foreach($statuses as $status) {
            $statusesId[] = $status->id;
        }
        $validated = $request->validate([
            'creator_id' => ['required', Rule::in($usersId), 'integer'],
            'title' => ['required', 'min:5', 'max:50'],
            'content' => ['required', 'min:10', 'max:250'],
            'status_id' => ['required', Rule::in($statusesId), 'integer'],
        ]);
        Task::query()->insert([
            'creator_id' => $validated['creator_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status_id' => $validated['status_id'],
            'created_at' => now(),
        ]);
        $task = Task::query()->latest()->first();
        return view('tasks.store', ['task' => $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::query()->where('id', $id)->with(['user', 'status'])->first();
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::query()->get();
        $statuses = Status::query()->get();
        $task = Task::query()->where('id', $id)->first();
        return view('tasks.edit', ['users' => $users, 'statuses' => $statuses, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::get();
        foreach($users as $user) {
            $usersId[] = $user->id;
        }
        $statuses = Status::get();
        foreach($statuses as $status) {
            $statusesId[] = $status->id;
        }
        $validated = $request->validate([
            'creator_id' => ['required', Rule::in($usersId), 'integer'],
            'title' => ['required', 'min:5', 'max:50'],
            'content' => ['required', 'min:10', 'max:250'],
            'status_id' => ['required', Rule::in($statusesId), 'integer'],
        ]);
        $oldTask = Task::query()->where('id', $id)->with(['user', 'status'])->first();
        Task::query()->where('id', $id)->update([
            'creator_id' => $validated['creator_id'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status_id' => $validated['status_id'],
            'updated_at' => now(),
        ]);
        $task = Task::query()->where('id', $id)->with(['user', 'status'])->first();
        return view('tasks.update', ['task' => $task, 'oldTask' => $oldTask]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $task = Task::query()->where('id', $id)->first();
        Task::query()->where('id', $id)->delete();
        return view('tasks.view', ['task' => $task]);
    }
}
