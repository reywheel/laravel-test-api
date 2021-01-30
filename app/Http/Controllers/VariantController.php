<?php

namespace App\Http\Controllers;

use App\Http\Requests\Variant\StoreVariantRequest;
use App\Http\Requests\Variant\UpdateVariantRequest;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreVariantRequest $request)
    {
        $this->authorize('create', new Variant());

        $variant = new Variant();
        $variant->fill($request->validated());
        $variant->save();

        return response('Variant was created');
    }

    public function show($id)
    {
        $variant = Variant::findOrFail($id);
        $this->authorize('view', $variant);

        return response($variant);
    }

    public function update(UpdateVariantRequest $request, $id)
    {
        $variant = Variant::findOrFail($id);
        $this->authorize('update', $variant);

        $variant->fill($request->validated());
        $variant->save();

        return response('Variant was updated');
    }

    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $this->authorize('delete', $variant);

        $variant->delete();

        return response('Variant was deleted');
    }
}
