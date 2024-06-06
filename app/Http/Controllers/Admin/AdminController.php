<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $students =User::where('usertype','student')->get();
        return view('admin.dashboard',compact( 'students'));
    }

    public function getstudentdata(Request $request){
        $students =DB::table('users')
        ->join('students','students.user_id','=','users.id')
        ->where('usertype','student')
        ->get();
        
        return response()->json($students);
    }

    public function create(){
        return view('admin.addstudent');
    }


        public function store( Request $request){

            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|email',
                'password' => [
                    'required',
                    'min:6',
                    'confirmed'
                ],
            ]);
            
            $name = $request->input('name');
            $email = $request->input('email');
            $password = bcrypt($request->input('password'));
            $usertype = 'student';

            $user = User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'usertype'=>$usertype
            ]);

            return response()->json($user);
    
        }
}