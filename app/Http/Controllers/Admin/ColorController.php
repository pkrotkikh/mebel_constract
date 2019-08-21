<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreColor;
use App\Models\Color;
use App\Models\Kitchen_model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::with('kitchenModel', 'media')->get();
        return view('layouts.admin.color.colors', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        $color = Color::all();
        return view('layouts.admin.color.create_color', compact('color', 'kitchens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColor $request)
    {
        $data = $request->all();
        $color = [
            'title' => $data['title'],
            'type' =>  $data['type'],
            'kitchen_model_id' => $data['kitchen_model_id'],
        ];
        $ids = Color::create($color)->id;
        $media = Color::find($ids);
        $request->image == '' ? : $media->addMedia($request->image)->toMediaCollection('posters');
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('colors.index');
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
        $color = Color::find($id);
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        if (empty($color)) {
            abort(404);
        }
        return view('layouts.admin.color.edit_color', compact('color','kitchens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColor $request, $id)
    {
        $data = $request->all();
        $color = Color::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $color);
        $color->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('colors.index');
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
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('colors.index');
    }
}
