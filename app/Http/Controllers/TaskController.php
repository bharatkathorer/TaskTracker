<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DateTime;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return Inertia::render('Task/Index',[ 'tasks' => Task::latest()->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Task/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name'=>'required',
            'start_task'=>'required',
            'end_task'=>'required',
        ]);
        $task = new Task();

        $task->task_name =$request->input('task_name');
        $task->start_task =$request->input('start_task');
        $task->end_task =$request->input('end_task');
        

        $time1 = new DateTime($request->input('start_task'));
        $time2 = new DateTime($request->input('end_task'));
        $interval = $time1->diff($time2);
        $task->total_time = $interval->format('%h Hr %i Min %s Sec');

        if($time1>$time2){
            return redirect()->back()->withErrors([
                'end_task'=>'Invalid End Time',
            ]);
        }

        $task->save();

        return Inertia::location(route('tasks.index'));


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return Inertia::render('Task/Create',[ 'task' => $task ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name'=>'required',
            'start_task'=>'required',
            'end_task'=>'required',
        ]);
        
        $task->task_name =$request->input('task_name');
        $task->start_task =$request->input('start_task');
        $task->end_task =$request->input('end_task');
        
        $time1 = new DateTime($request->input('start_task'));
        $time2 = new DateTime($request->input('end_task'));
        $interval = $time1->diff($time2);
        $task->total_time = $interval->format('%h Hr %i Min %s Sec');

        // echo $time1 < $time2;
        
        $task->update();

        return Inertia::location(route('tasks.index'));
        // return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        
        return Inertia::location(route('tasks.index'));
    }
}
