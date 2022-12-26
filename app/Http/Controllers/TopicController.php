<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index($slug) {
        $topic = Topic::where('slug', $slug)->with('courses')->first();
        $title = 'Courses/Books on '.$topic->name;
        $courses = $topic->courses()->latest()->paginate(12);

        // return $topic;

        return view('archive.single', [
            'title' => $title,
            'topic' => $topic,
            'courses' => $courses,
        ]);
    }
}
