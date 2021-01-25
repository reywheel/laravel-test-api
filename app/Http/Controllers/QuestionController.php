<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(StoreQuestionRequest $request)
    {
        $question = new Question();
        $question->fill($request->validated());
        $question->save();

        return response('Question was created');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return response($question);
    }

    public function update(UpdateQuestionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->fill($request->validated());
        $question->save();

        return response('Question was updated');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response('Question was deleted');
    }
}
