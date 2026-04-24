<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function addQuiz()
    {
        $admin = Session::get('admin');
        $categories=Category::get();
        if ($admin) {
            $quizName=request('quiz');
            $categoryId=request('category_id');
            if($quizName && $categoryId && !Session::has('quizDetails')){
                $quiz=new Quiz();
                $quiz->name=$quizName;
                $quiz->category_id=$categoryId;
                if($quiz->save()){
                    Session::put('quizDetails', $quiz);
                    return redirect()->route('admin.add-quiz');
                }
            }
            return view('admin.quizes.add-quiz', compact('admin', 'categories'));
        } else {
            return redirect()->route('admin.login');
        }
    }
}
