<?php

namespace App\Http\Controllers;

use App\Question;
use App\Video;
use Illuminate\Http\Request;

class SelectController extends Controller
{
   public function index(){
       $type = request('type','');
       $title = request('title','');

       if ($type == 'question'){
           $data = Question::where('title','like','%'.$title.'%')->paginate(20);
       }elseif ($type == 'video'){
           $data = Video::where('title','like','%'.$title.'%')->paginate(20);
       }

       return view('select.index',compact('data','type'));

   }
}
