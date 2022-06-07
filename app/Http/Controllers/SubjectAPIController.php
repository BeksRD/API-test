<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectAPIController extends Controller
{
    public function index(){
        return view('homepage',['subjects'=>Subject::all()]);
    }

    public function show(Subject $subject){
        return $subject;
    }
    public function store(){

        \request()->validate([
            'name'=>'required'
        ]);
        return Subject::create(\request()->all());
    }
    public function update(Subject $subject){
        \request()->validate([
            'name'=>'required'
        ]);
        $result =  $subject->update(\request()->all());
        return [
          'success'=>$result
        ];

    }
    public function destroy(Subject $subject){
        $result =  $subject->delete();
        return [
            'success'=>$result
        ];
    }
    public function search($name){
        return Subject::where('name','like','%'.$name.'%')->get();
    }
}
