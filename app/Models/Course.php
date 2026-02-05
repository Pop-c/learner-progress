<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * DESIGN PATTERN: Active Record
     * Represents the courses table.
     */

    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * One course can have many enrollments.
     */
     public function enrollments(){
        return $this->hasMany(Enrolment::class);
    }


}
