<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreParameter;
use App\Models\Parameter;
use App\Models\Kitchen_model;
use App\Models\TypeModules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = Parameter::with('media', 'kitchenModel', 'typeModules')->get();
        return view( 'layouts.admin.param_model.parameters', compact( 'parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        $types = TypeModules::pluck('title', 'id')->toArray();
        $parameter = Parameter::all();
        return view('layouts.admin.param_model.create_parameter', compact('parameter', 'types', 'kitchens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParameter $request)
    {
        $data = $request->all();
        $parameter = [
            'title' => $data['title'],
            'type' =>  $data['type'],
            'kitchen_model_id' => $data['kitchen_model_id'],
            'type_modules_id' => $data['type_modules_id'],
        ];
        $ids = Parameter::create($parameter)->id;
        $media = Parameter::find($ids);
        $request->image == '' ? : $media->addMedia($request->image)->toMediaCollection('posters');
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('parameters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parameter = Parameter::find($id);
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        $types = TypeModules::pluck('title', 'id')->toArray();
        if (empty($parameter)) {
            abort(404);
        }
        return view('layouts.admin.param_model.edit_parameter', compact('parameter','kitchens', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreParameter $request, $id)
    {
        $data = $request->all();
        $parameter = Parameter::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $parameter);
        $parameter->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('parameters.index');
    }

    public function checkAndUploadImage($request, $fileName, $collection, $model): void
    {
        if ($file = $request->file($fileName)) {
            if ($model->getMedia($collection)->first()) {
                $model->getMedia($collection)->first()->delete();
            }
            $model->addMediaFromRequest($fileName)->toMediaCollection($collection);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parameter = Parameter::find($id);
        $parameter->delete();
        return redirect()->route('parameters.index');
    }
}
