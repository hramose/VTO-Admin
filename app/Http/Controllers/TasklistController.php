<?php

namespace App\Http\Controllers;

use App\Tasklist;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Jobs\ChangeLocale;

class TasklistController extends Controller {

    public function index() {

        $tasklists = Tasklist::paginate(7);
        return view('back.tasklist.index', compact('tasklists'));
    }


    public function create() {

        return view('back.tasklist.create');
    }


    public function store(Requests\TasklistRequest $request) {

        Tasklist::create($request->all());        
        \Session::flash('flash_message',trans('back/tasklist.tasklist-added'));

        return redirect('tasklist');
    }


    public function edit($id) {

        $tasklists = Tasklist::findOrFail($id);        
        return view('back.tasklist.edit', compact('tasklists'));
    }


    public function update($id, Requests\TasklistRequest $request) {

        $tasklists = Tasklist::findOrFail($id);
        $tasklists->update($request->all());
        \Session::flash('flash_message', trans('back/tasklist.tasklist-taken'));
        return redirect('tasklist');
        
    }


    public function delete($id) {

        Tasklist::find($id)->delete();
        \Session::flash('flash_message', trans('back/tasklist.tasklist-delete'));
        return redirect('tasklist');
    }

    
public function json_tasklist_all() {

         $tasklists = Tasklist::all();
         return View('back.tasklist.json', compact('tasklists'));
    }


public function json_disabled() {

         $tasklists = Tasklist::all();
         return View('back.tasklist.json_disabled', compact('tasklists'));
    }    


    public function search() {

        $headline = Request::input('headline');

        return View('back.tasklist.search')->with('tasklists', Tasklist::where('headline', 'like', '%' . $headline . '%')->paginate(7));
    }

}
