<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Series;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $series = Series::take(7)->get();
        $courses = Course::take(6)->get();
        return view('index',[
            'series' => $series,
            'courses' => $courses,
        ]);
    }

    public function dashboard() {
        if(Auth::user()->type === 1) {
            return view('dashboard');
        } else {
            return redirect()->route('home.index');
        }
    }

    public function archive($archive_type, $slug) {
        $allowed_archive_types = ['series', 'duration', 'level', 'platform', 'topic'];
        if(!in_array($archive_type, $allowed_archive_types)) {
            return abort(404);
        }

        // duration check
        if($archive_type === 'duration') {
            $allowed_durations = ['01-05-hours', '05-08-hours', '08-plus-hours'];
            if(!in_array($slug, $allowed_durations)) {
                return abort(404);
            }
        }

        // series check
        if($archive_type === 'series') {
            $item = Series::where('slug', $slug)->first();
            if(empty($item)) {
                return abort(404);
            }
            $title = 'Courses/Books on ' . $item->name;
            $courses = $item->courses()->paginate(12);
        }

        // level check
        if($archive_type === 'level') {
            if($slug == 'beginner') {
                $item = 'Beginner';
                $level_db_key = 0;
            }
            elseif($slug == 'intermediate') {
                $item = 'Intermediate';
                $level_db_key = 1;
            } else {
                $item = 'Advanced';
                $level_db_key = 2;
            }
            $title = $item.' Level Courses/Books';
            $courses = Course::where('difficulty_level', $level_db_key)->paginate(12);
        }

        // Platform check
        if($archive_type === 'platform') {
            $item = Platform::where('slug', $slug)->first();
            if(empty($item)) {
                return abort(404);
            }
            $title = 'Courses/Books from ' . $item->name;
            $courses = $item->courses()->paginate(12);
        }

         // Topic check
         if($archive_type === 'topic') {
            $item = Topic::where('slug', $slug)->first();
            if(empty($item)) {
                return abort(404);
            }
            $title = 'Courses/Books on ' . $item->name;
            $courses = $item->courses()->paginate(12);
        }

        // Duration check
        elseif($archive_type === 'duration') {
            if($slug == '01-05-hours') {
                $item = '01-05 hours';
                $duration_db_key = 0;
            } elseif($slug == '05-08-hours') {
                $item = '05-08 hours';
                $duration_db_key = 1;
            } else {
                $item = '08+ hours';
                $duration_db_key = 2;
            }
            $title = 'Courses/Books within ' . $item;
            $courses = Course::where('duration', $duration_db_key)->paginate(12);
        }

        return view('archive.single', [
            'title' => $title,
            'courses' => $courses
        ]);
    }
}
