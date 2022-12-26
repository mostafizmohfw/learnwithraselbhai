<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    public function submitedBy() {
        return $this->belongsTo(User::class, 'submited_by');
    }


    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'course_topic', 'course_id', 'topic_id');
    }

    public function Authors()
    {
        return $this->belongsToMany(Author::class, 'course_author', 'course_id', 'author_id');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'course_series', 'course_id', 'series_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function convertDuration($value) {
        if($value === 0) {
            return '01-04 hours';
        } elseif($value === 1) {
            return '05-08 hours';
        } else {
            return '08+ hours';
        }
    }

    public function convertDifficultyLevel($value) {
        if($value == 0) {
            return 'Beginner';
        } elseif($value == 1) {
            return 'Intermideate';
        } else {
            return 'Advanced';
        }
    }

    function reviewsCalculation($reviews){
        $totalStar = 0;
        foreach ($reviews as $review) {
            $totalStar += $review->star;
        }
        if (count($reviews)!=0){
            $star = $totalStar / count($reviews);
        }else{
            $star = 0;
        }
        return $star;
    }

}
