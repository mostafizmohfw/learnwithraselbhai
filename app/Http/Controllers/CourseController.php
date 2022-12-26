<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function videos(Request $request){
        $search = $request->search;
        $level = $request->level;
        $courses = Course::where('type',0)->where(function ($query) use ($search) {
            if(!empty($search)) {
                $query->where('name', 'like', '%' . $search . '%');
            }
        })->when($level, function ($query) use ($level) {
            if($level == 'beginner') {
                $field = 0;
            } elseif($level == 'intermediate') {
                $field = 1;
            } else {
                $field = 2;
            }

            $query->where('difficulty_level', $field);
        })->paginate(12);


        return view('course.index', [
            'courses' => $courses
        ]);
    }

    public function books(Request $request){
        $search = $request->search;
        $level = $request->level;
        $courses = Course::where('type',1)->where(function ($query) use ($search) {
            if(!empty($search)) {
                $query->where('name', 'like', '%' . $search . '%');
            }
        })->when($level, function ($query) use ($level) {
            if($level == 'beginner') {
                $field = 0;
            } elseif($level == 'intermediate') {
                $field = 1;
            } else {
                $field = 2;
            }

            $query->where('difficulty_level', $field);
        })->paginate(12);


        return view('course.index', [
            'courses' => $courses
        ]);
    }

    public function show($slug) {
        $course = Course::where('slug', $slug)->with([
            'platform',
            'topics',
            'series',
            'authors',
            'reviews'
            ])->firstorFail();

        // return response()->json($course);

        return view('course.single', [
            'course' => $course
        ]);
    }
}
