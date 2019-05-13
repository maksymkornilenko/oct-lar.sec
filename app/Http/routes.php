<?php

use Illuminate\Http\Request;
use App\Task;

Route::get('/',function(){
    return view('index');
})->name('home');

Route::group(['prefix' => 'tasks'], function () {

    Route::get('/', function () {
        $tasks = Task::all();
        //TODO delete debug info
        return view('tasks.index', [
            'tasks' => $tasks, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('tasks_index');

    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::delete('/{task}', function (Task $task) {
        $task->delete();
        return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::get(' /{task}/edit', function( Task $task) {
        return view('edit.update', [
            'task' => $task,
        ]);
    })->name('tasks_edit');

    Route::put('/{task}', function(Request $request, Task $task) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_edit', $task->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_update');
});
Route::group(['prefix'=>news],function(){
    Route::get('/', function () {
        $tasks = News::all();
        //TODO delete debug info
        return view('tasks.index', [
            'tasks' => $tasks, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('tasks_index');
});