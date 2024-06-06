<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('student.dashboard');

    }

    public function getstudentinfo(){

        $user_id =Auth::user()->id;
        
        $student =DB::table('users')
        ->select('users.name','users.email','students.id_num','students.photo','students.section')
        ->join('students','students.user_id','=','users.id')
        ->where('users.id',$user_id)
        ->first();

        return response()->json($student);

    }
}
