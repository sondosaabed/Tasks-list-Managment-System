<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Response;
use Illuminate\Http\Request;
## to use the response we nee dto add this lib
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

  Route::get('/', function() {
    return redirect()->route('tasks.index');
  });

  Route::get('/tasks',function() {
      return view('index', [
        'tasks'=> Task::latest()->paginate(10) //to devide into pages
      ]);
  })->name('tasks.index');

  Route::view('/tasks/create', 'create')
    ->name('tasks.create');

  Route::get('/tasks/{task}/edit', function (Task $task){
    return view('edit', [
      'task'=>$task
    ]);
  })->name('tasks.edit');
  
  Route::get('/tasks/{task}', function (Task $task){
    return view('show', [
      'task' =>$task
    ]);
  })->name('tasks.show');

  Route::post('/tasks', function(TaskRequest $request){
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
      ->with('success', 'Task created successfully!'); 
  })->name('tasks.store');

  Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){  
    $task -> update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
      ->with('success', 'Task updated successfully!'); 
  })->name('tasks.update');

  Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
      ->with('success', 'Task deleted successfully!');
  })->name('tasks.destroy');

  Route::put('tasks/{task}/toggle-complete', function(Task $task){
  $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfully!');
  })->name('tasks.toggle-complete');

  Route::fallback(function(){
    return 'MMMMMMMMMMM get back!';
  });







  /**
   * ---------------------This part is comments on my code that I wrote while watching the course
   * 
   */

   /*
Route::get('/', function () {
    return view('Main page');
});
*/

/*
// Because I don't need the task anymore since I crated a model and 
// will be using the db to fetch it's commneted out
# here we have task class
class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

# array of tasks objects
$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];
*/
# this end point will be used to show the tasks
# because $tasks variable aanonymous function so we add a use stmt
//Route::get('/tasks',function() {
//use($tasks) { becuase we used an array before now use db
    # return 'Main page';
    # in the blade tempalate we used isset better check if there is a vriable
    # use view to render the page
//    return view('index', [
      // Where,Select Queries Builders
      // We most of the time fetch by some sort in this case the lates
      //'tasks' => \App\Models\Task::latest() ->get()
      //let's say  Ionly want to show the completed tasks
//      'tasks'=> Task::latest()->where('completed', true)->get()
//      'tasks'=> Task::latest()->paginate() //to devide into pages

       // 'tasks' => \App\Models\Task::all() // the all method is used to get all the data
//    ]);# in this second argument the keys are the name sof the variables
    # if i pass an html tag here it will be escaped
    # to avoid the cross side scripting attack
//})->name('tasks.index');

// Route::get('/tasks/{task}', function (Task $task){
//   return view('show', [
//     //'task'=> \App\Models\Task::find($id)
//     // So that of not found in the db it will 404 instead of null
//     //'task'=> Task::findOrFail($id)
//     'task' =>$task
//   ]);
// })->name('tasks.show');

// Route::get('/tasks/{task}/edit', function (Task $task){
//   return view('edit', [
//     //'task'=> \App\Models\Task::find($id)
//     // So that of not found in the db it will 404 instead of null
//     //'task'=> Task::findOrFail($id)
//     // Binding that we don't have to worry abot the fetching
//     'task'=>$task
//   ]);
// })->name('tasks.edit');

// Route::post('/tasks', function(TaskRequest $request){//Request $request){
//   //dd dump and dash?
//   //dd($request->all());
//   // cretae an array of the submitted based on the validatiopn

//   /*
//   This is commented because I am writing instead using the PHP reqeust
//   It is the class under task request

//   $data = $request->validate([
//     'title' => 'required|max:255',
//     'description' => 'required',
//     'long_description' => 'required'
//   ]);
  
//   $data = ;// it will first validate it will not pass
//   $task = new Task;
//   $task->title = $data['title'];
//   $task->description = $data['description'];
//   $task->long_description = $data['long_description'];

//   $task->save(); // will update or insert quesry to the table
  
//   */
//   $task = Task::create($request->validated());

//   return redirect()->route('tasks.show', ['task' => $task->id])
//     ->with('success', 'Task created successfully!'); // add a flash message
// })->name('tasks.store');


// Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
//   //dd dump and dash?
//   //dd($request->all());
//   // cretae an array of the submitted based on the validatiopn
  
//   /*
//   This commented because the task request class will validate instead

//   $data = $request->validate([
//     'title' => 'required|max:255',
//     'description' => 'required',
//     'long_description' => 'required'
//   ]);
//   */
//   //$task = Task::findOrFail($id); because it will be already loaded using model binding
  
//   /*
//   $data = $request->validated();
//   $task->title = $data['title'];
//   $task->description = $data['description'];
//   $task->long_description = $data['long_description'];

//   $task->save(); // will update or insert quesry to the table
//   */

//   $task -> update($request->validated());
//   return redirect()->route('tasks.show', ['task' => $task->id])
//     ->with('success', 'Task updated successfully!'); // add a flash message
// })->name('tasks.update');

/*
# generate the links for each one
Route::get('tasks/{id}', function ($id) use ($tasks){
    # to get the task by ID we will use some laravel magic using coolection object
    # in php array are premetive 
    # collect turns this array into an object
    $task = collect($tasks)->firstwhere('id', $id);
    
    if(!$task){
        abort(Response::HTTP_NOT_FOUND); # will abort with a specif response 
    }
    
    return view('show', ['task'=> $task]);
})->name('tasks.show');
*/

// Route::delete('/tasks/{task}', function(Task $task){
//     $task->delete();
//     return redirect()->route('tasks.index')
//       ->with('success', 'Task deleted successfully!');
// })->name('tasks.destroy');

// Route::put('tasks/{task}/toggle-complete', function(Task $task){
//   /*
//   instead let's make it using the model
//   $task->completed = !$task->completed;
//   $task->save();
//   */
//   $task->toggleComplete();
  
//   return redirect()->back()->with('success', 'Task updated successfully!');
// })->name('tasks.toggle-complete');
/*

now I have two pages when a spectic URL is typed

Route::get('/hello',function(){
    return 'Hello';
});


When I have a rout that have some kind of more dynamic stuff 
so I would do this
Ssynamic Parts to my URLS


Route::get('/greet/{name}', function($name){
return 'Hello '.$name.' !';
});


//First thing in routs: the verbs

HTTPs: browses uses HTTPs to communicates with he web servers
this protocol have diffrent methods:
    - the GET is the deafult of the verbs because I'm fetching the URLs
    by deafult.
    - diffrent methods called VERBS:
        - GET: Fetch documnets, read data
        - POST: to store the (create sth on the server), sent forms
        - PUT: to modify an exissting thing
        - Delete: deletes the data
        these 3 are called the dangerous 


//Second thing in routs: the redirecting: change from the old one to the new one
// by returning a redirect function 

  So here if we type the wrong one it will redirect us to the new one

Route::get('/hallo', function(){
    return redirect('/hello');
})->name('misspell');


Or instead I could use this way calling the route method to use the name that 
I used to name the route 


Route::get('/hallo0', function(){
    return redirect()->route('misspell');
});
*/
/*
what if there is more optons
So all the routes that doesn't exist will redirct me to this fallback functions
*/