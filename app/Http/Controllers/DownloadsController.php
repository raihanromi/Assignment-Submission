<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentAssignment;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
        public function download(Request $request,$id) {
            $assignment = Assignment::where('id',$id)->first();
            $file_path=$assignment->filepath;
            return response()->download($file_path);
        }

        
        public function student_assignment_download( $id){
            $student_assignment = StudentAssignment::where('id',$id)->first();
            $file_path= $student_assignment->filepath;
            return response()->download($file_path);
        }
    }