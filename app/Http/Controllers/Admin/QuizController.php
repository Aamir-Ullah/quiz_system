<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\mcqs\Mcq;
use App\Models\Quiz\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function addQuiz()
    {
        // dd( Session::get('quizDetails')->id);
        $admin = Session::get('admin');
        $categories = Category::get();
        // $totalMCQs = Mcq::where('admin_id', $admin->id)->count();
        if ($admin) {
            $quizName = request('quiz');
            $categoryId = request('category_id');
            if ($quizName && $categoryId && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $categoryId;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                    return redirect()->route('admin.add-quiz');
                }
            }
            return view('admin.quizes.add-quiz', compact('admin', 'categories'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function storeQuiz(Request $request)
    {
        $admin = Session::get('admin');

        if (!$admin) {
            return redirect()->route('admin.login')
                ->with('error', 'Please login first');
        }

        $quizDetails = Session::get('quizDetails');

        if (!$quizDetails) {
            return redirect()->route('admin.add-quiz')
                ->with('error', 'Quiz session expired');
        }

        // Validation
        $request->validate([
            'question' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'correct_ans' => 'required|in:a,b,c,d'
        ]);

        try {
            $mcq = new Mcq();
            $mcq->question = $request->question;
            $mcq->a = $request->a;
            $mcq->b = $request->b;
            $mcq->c = $request->c;
            $mcq->d = $request->d;
            $mcq->correct_ans = $request->correct_ans;
            $mcq->admin_id = $admin->id;
            $mcq->quiz_id = $quizDetails->id;
            $mcq->category_id = $quizDetails->category_id;

            $mcq->save();

            if ($request->submit == "add-more") {
                return redirect()->route('admin.add-quiz')
                    ->with('success', 'Question added successfully');
            }

            Session::forget('quizDetails');

            return redirect()->route('admin.categories')
                ->with('success', 'Quiz completed successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
