<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Auth\Middleware\Authorize;

Route::get('/', function () {
 
    return view('home');
});

// index
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs'=> $jobs 
    ]);
});

// create
Route::get('/jobs/create', function(){
    return view('jobs.create');
});

// store
Route::post('/jobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=> ['required']
    ]);
    Job::create([
        'title' => request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1,
    ]);

    return redirect('/jobs');
});

// show
Route::get('/jobs/{id}', function ($id)  {

    $job = Job::find($id);
    
    return view('jobs.show', ['job'=> $job]);
});

// edit
Route::get('/jobs/{id}/edit', function ($id)  {

    $job = Job::find($id);
    
    return view('jobs.edit ', ['job'=> $job]);
});

// update
Route::patch('/jobs/{id}', function ($id)  {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=> ['required']
    ]);

    // Authorize

    // Update
    $job = Job::findOrFail($id);
    $job->update([
        'title'=> request('title'),
        'salary'=> request('salary'),
    ]);
    
    return redirect('/jobs/'.$job->id);


});

// delete
Route::delete('/jobs/{id}', function ($id)  {
    Job::findOrFail($id)->delete();

    return redirect('/jobs');

});

Route::get('/contact', function () {
    return view('contact');  
});
