<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public array $task = [
        'Write' => 'qwertyuiopasdfghjklzxcvbnm',
        'Read' => 'mnbvcxzlkjhgfdsapoiuytrewq',
        'Listen' => 'zxcvbnmasdfghjklqwertyuiop'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = "TaskController index display a listing of the tasks:";
        $result .= '<ul>';
        foreach ($this->task as $task => $description) {
            $result .= '<li>' . $task . '</li>
                                <button>
                                    <a href="' . route('task.show', ['task' => $task])
                                    . '" style="text-decoration: none; color: black">
                                    Show this Task</a>
                                </button>';
        }
        $result .= '</ul>
                    <button>
                        <a href="' . route('task.create')
                        . '" style="text-decoration: none; color: black">Create new Task</a>
                    </button>';
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "<h1>Form for creating a new task</h1>";
        return view('task-form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->task[$request->input('task')] = $request->input('description');
        echo 'New Task "' . $request->input('task') . '" written to TaskController store! <br>';
        echo '<button><a href="' . route('task.index') . '" style="text-decoration: none; color: black">Show Task list</a></button>';
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = "TaskController show <h3>Task $id</h3>";
        $show .= 'Description:<br>';
        $show .= $this->task[$id];
        $show .='<br><button>
                            <a href="' . route('task.edit', ['task' => $id])
                            . '" style="text-decoration: none; color: black">Edit this Task</a>
                         </button>';
        $show .= '<br><form method="post" action="' . route('task.destroy', ['task' => $id]) . '">
                            <input type="hidden" name="_method" value="DELETE">'
                            . csrf_field()
                            . '<button>Delete this Task
                            </button>
                         </form>';
        return $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '<form action="' . route('task.update', ['task' => $id]) . '" method="post">
                <input type="hidden" name="_method" value="PUT">'
                . csrf_field()
                . 'Task
                <br>
                <input type="text" name="task" value="' . $id . '">
                <br>
                <br>
                Description
                <br>
                <textarea name="description">' . $this->task[$id] . '</textarea>
                <br>
                <br>
                <button type="submit">Update</button>
            </form>';
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
        if ($request->input('task') !== $id) {
            unset($this->task[$id]);
            $updateMessage = 'TaskController update task "' . $id
                . '" to task: <br>' . $request->input('task')
                . '<br>with description: <br>' . $request->input('description');
        } elseif ($request->input('description') !== $this->task[$id]) {
            $updateMessage = 'TaskController update description task "' . $id
                . '"<br>from:<br>"' . $this->task[$id]
                . '"<br>to:<br>"' . $request->input('description') . '"';
        } else {
            $updateMessage = "TaskController don`t update task $id";
        }

        $this->task[$request->input('task')] = $request->input('decsription');

        return $updateMessage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'TaskController destroy task "' . $id . '"!';
    }
}
