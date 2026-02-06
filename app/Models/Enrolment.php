<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{

/**
     * DESIGN PATTERN: Association Object
     * Enrollment exists to connect Learners and Courses
     * and hold progress.
     */


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enrolments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'learner_id',
        'course_id',
        'progress',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'progress' => 'decimal:2',
    ];



    /**
     * Each enrollment belongs to ONE learner.
     * Progress belongs to Enrollment
     */
     public function learner(){
        return $this->belongsTo(Learner::class);
    }

     /**
     * Each enrollment belongs to ONE course.
     * Progress belongs to Enrollment
     */
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
