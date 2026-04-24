<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table="quizzes";
    protected $fillable=[
        "name",
        "category_id"
    ];
}
