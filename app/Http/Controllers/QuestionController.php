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
        $this->authorize('create', new Question());

        $question = new Question();
        $question->fill($request->validated());
        $question->save();

        return response('Question was created');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        $this->authorize('view', $question);

        return response($question);
    }

    public function update(UpdateQuestionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $this->authorize('update', $question);


        $question->fill($request->validated());
        $question->save();

        return response('Question was updated');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $this->authorize('delete', $question);

        $question->delete();

        return response('Question was deleted');
    }
}
