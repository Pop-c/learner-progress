<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    /**
     * DESIGN PATTERN: Active Record
     * This model directly represents the learners table.
     */

   
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
    ];

     /**
     * DESIGN PATTERN: One-to-Many Relationship
     * A learner can have many enrollments.
     */
    public function enrollments(){
        return $this->hasMany(Enrolment::class);
    }
}
