<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Assignment;

class SetAssignmentController extends Controller
{
    public function index(){
        return view("admin.setassignment");    
    }

    public function create(Request $request,$id){
        $student = User::where('id',$id)->first();
        return view("admin.setassignmentform",compact('student'));
    }


    public function getstudentassignmentdata(Request $request){
        $students =DB::table('users')
        ->join('students','students.user_id','=','users.id')
        ->where('usertype','student')
        ->get();

        return response()->json($students);
    }

    public function store(Request $request, $student_id ){
        $request->validate([
            'assignment_details'=>'required',
            'assignment_deadline'=>'required',
            'assignment_file'=>'required'
        ]);

        $student_id = $student_id;
        $assignment_details = $request['assignment_details'];
        $assignment_deadline = $request['assignment_deadline'];
        
        $fileName = time().$request->file('assignment_file')->getClientOriginalName();
        $path = $request->file('assignment_file')->storeAs('assigment_question',$fileName,'public');
        $filepath = "storage/".$path;
        
        Assignment::create([ 
            'student_id'=>$student_id,
            'assignment_details'=>$assignment_details,
            'assignment_deadline'=>$assignment_deadline,
            'filepath'=>$filepath
        ]);

        return redirect("admin/dashboard");
    }


    public function show($id){
        
        return view('admin.checkassignment',compact('id'));

    }

    public function checkstudentassignment(Request $request,$student_id){
        
        $student_assignments = DB::table('assignments')
        ->join('student_assignments','assignments.id','=','student_assignments.assignment_id')
        ->where('student_id','=',$student_id)
        ->get();

        return response()->json($student_assignments);

    }
}