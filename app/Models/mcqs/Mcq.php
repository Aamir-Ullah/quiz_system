<?php

namespace App\Models\mcqs;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    protected $table="mcqs";

    protected $fillable=[
        "question",
        "a",
        "b",
        "c",
        "d",
        "correct_ans",
        "admin_id",
        "quiz_id",
        "category_id"
    ];
}
