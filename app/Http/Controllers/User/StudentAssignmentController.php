<?php

namespace App\Http\Controllers\User;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentAssignmentController extends Controller
{
    public function index(){

        // $user_id = Auth::user()->id;        
        // $assignments  = Assignment::where('student_id',$user_id)->get();
        // $submitted_assignment =  DB::table('student_assignments')
        // ->join('assignments','student_assignments.assignment_id','=',"assignments.id")
        // ->where('student_id',Auth::user()->id)
        // ->get();

        // if ($assignments=== null) {
        //     return view('student.checkassignment')->with('message', 'No Assigment Assigned yet...');
        // } else {
        //     return view('student.checkassignment',compact('assignments','submitted_assignment'));
        // }

        return view('student.checkassignment');
    }

    public function getassignments(){

        $user_id = Auth::user()->id;        
        $assignments  = Assignment::where('student_id',$user_id)->get();
        $submitted_assignment =  DB::table('student_assignments')
        ->join('assignments','student_assignments.assignment_id','=',"assignments.id")
        ->where('student_id',Auth::user()->id)
        ->get();

        
        return response()->json( $assignments );

    }


    public function create($id){
        return view('student.submitassignmentform',compact('id'));  
    }


    public function store(Request $request){
        
        //TODO: validate the $request
        $assignment_id = $request['assignment_id'];
        $fileName = time().$request->file('assignment_file')->getClientOriginalName();
        $path = $request->file('assignment_file')->storeAs('student_assignment',$fileName,'public');
        $filepath = 'storage/'.$path;

        StudentAssignment::create([
            'assignment_id'=>$assignment_id,
            'filepath' =>$filepath
        ]);

        return redirect('/checkassignment');
    }
}
