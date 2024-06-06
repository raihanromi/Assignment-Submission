<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;


class CreateStudentController extends Controller
{
    public function create(){
        $students =User::where('usertype','student')->get();
        return view('admin.createstudentprofile',['students'=>$students]);
    }


    public function store(Request $request){
        
        $request->validate([
            'email'=>'required|exists:users,email',
            'id_num'=>'required',
            'section'=>'required',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        $email = $request['email'];
        $id_num = $request['id_num'];
        $section =$request['section'];

        $user = User::where('email',$email)->first();
        if(!$user){
            return redirect('admin/studentprofile');
        }
    
        //TODO :check if same user_id exits or not  
        $user_id = $user->id;
        $user_exist=Student::where('user_id',$user_id)->first();
        if($user_exist){
            return response()->json(['error' => 'User already exists in students table'], 409);
        }
        
    
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path=$request->file('photo')->storeAs('images', $fileName,'public');
        $photopath = 'storage/'.$path;

        Student::create([
            'id_num'=>$id_num,
            'user_id'=>$user_id,
            'section'=>$section,
            'photo'=>$photopath
        ]);

        return response()->json(['message' => 'Student profile created successfully'], 200);
        
    }
}