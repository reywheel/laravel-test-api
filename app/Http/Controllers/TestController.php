<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\StoreTestRequest;
use App\Http\Requests\Test\UpdateTestRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Test::class);

        $tests = Test::all();
        return response($tests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        $this->authorize('create', Test::class);

        $test = new Test();
        $test->fill($request->validated());
        $test->save();

        return response('Test was created');
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Test::class);

        $test = Test::findOrFail($id);
        return response($test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, $id)
    {
        $this->authorize('update', Test::class);

        $test = Test::findOrFail($id);
        $test->fill($request->validated());
        $test->save();

        return response('Test was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Test::class);

        $test = Test::findOrFail($id);
        $test->delete();

        return response('Test was deleted');
    }
}
