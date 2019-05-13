<?php 
use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/', function() {
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
Route::group(['prefix' => 'news'], function() {
    Route::get('/', function () {
        $news = News::all();
        //TODO delete debug info
        return view('news.index', [
            'news' => $news, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('news_index');
    Route::get('/add', function (){
        return view('add.add');
    })->name('news_add');
    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'head' => 'required|max:255',
                    'text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news = new News();
        $news->head = $request->head;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_store');
    Route::get('/{news}',function(News $news){
    return view('news.one', [
            'news' => $news,
        ]);
    })->name('news_show');
    Route::delete('/{news}', function (News $news) {
        $news->delete();
        return redirect(route('news_index'));
    })->name('news_destroy');

    Route::get(' /{news}/edit', function(News $news) {
        return view('edit.edit', [
            'news' => $news,
        ]);
    })->name('news_edit');

    Route::put('/{news}', function(Request $request, News $news) {
        $validator = Validator::make($request->all(), [
                    'head' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_edit', $news->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news->head = $request->head;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_update');
});
