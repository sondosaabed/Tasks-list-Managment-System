<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
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

/*
Route::get('/', function () {
    return view('Main page');
});
*/

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

# this is when we want to redirect 
Route::get('/', function() {
    return redirect()->route('tasks.index');
});

# this end point will be used to show the tasks
# because $tasks variable aanonymous function so we add a use stmt
Route::get('/tasks',function() use($tasks) {
    # return 'Main page';
    # in the blade tempalate we used isset better check if there is a vriable
    # use view to render the page
    return view('index', [
        'tasks' => $tasks
    ]);# in this second argument the keys are the name sof the variables
    # if i pass an html tag here it will be escaped
    # to avoid the cross side scripting attack
})->name('tasks.index');

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

Route::fallback(function(){
    return 'Still got somewhere!';
});
