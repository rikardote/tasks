<?php

namespace App\Http\Controllers;

use Request;
use Amranidev\Ajaxis\Ajaxis;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'DESC')->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $api = '/tasks/store';

         $Ajaxis = Ajaxis::MtCreateFormModal([
            ['type' => 'text', 'value' => '', 'name' => 'task', 'key' => 'Tarea :'],
            ['type' => 'text', 'value' => '', 'name' => 'description', 'key' => 'Descripcion :'],
         ], $api);
         
        if (Request::ajax()) {
            return $Ajaxis;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');
        //dd($input);
        $task = new Task();
        $task->task = $input['task'];
        $task->description = $input['description'];
        $task->done = "0";
      
        $task->save();

        return URL::To('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::FindOrFail($id);
        $api = '/tasks/' . $id . '/update';
        $Ajaxis = Ajaxis::MtEditFormModal([
            ['type' => 'text', 'value' => $task->task, 'name' => 'task', 'key' => 'Tarea :'],
            ['type' => 'text', 'value' => $task->description, 'name' => 'description', 'key' => 'Descripcion :'],
        ], $api);

        if (Request::ajax()) {
            return $Ajaxis;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Request::except('_token');
        $task = Task::FindOrFail($id);
        $task->task = $input['task'];
        $task->description = $input['description'];
        $task->done = "0";
      
        $task->save();

        return URL::To('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::FindOrFail($id);
        $task->delete();
        return URL::to('tasks');
    }
    public function delete($id)
    {

        $api = '/tasks/' . $id . '/destroy';
        $Ajaxis = Ajaxis::MtDeleting('Delete', 'Seguro de borrar esta tarea ?', $api);

        if (Request::ajax()) {
            return $Ajaxis;
        }
    }
}
