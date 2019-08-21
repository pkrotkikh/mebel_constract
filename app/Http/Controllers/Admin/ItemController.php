<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreItem;
use App\Models\Item;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('media', 'parametersModels')->get();
        return view('layouts.admin.cupboard.items', compact( 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = Parameter::pluck('title', 'id')->toArray();
        $paramsType = Parameter::pluck('type', 'id')->toArray();
        $paramsTypeModel = Parameter::pluck('type_modules_id', 'id')->toArray();
        $rgData = array_map(
            function($params, $paramsType, $paramsTypeModel){
                return 'Тип модуля: "' .$params . '";  Тип шкафа: "' . $paramsType . '"; ' .$paramsTypeModel;
                },$params, $paramsType, $paramsTypeModel
        );
        $combined = array_combine(array_merge(array_slice(array_keys($rgData), 1),
            array(count($rgData))), array_values($rgData));
        $items = Item::all();
        return view('layouts.admin.cupboard.create_item', compact('items', 'combined'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $data = $request->all();
        $item = [
            'title' => $data['title'],
            'description' =>  $data['description'],
            'price' =>  $data['price'],
            'parameters_models_id' => $data['parameters_models_id'],
        ];
        $ids = Item::create($item)->id;
        $media = Item::find($ids);
        $request->image == '' ? : $media->addMedia($request->image)->toMediaCollection('posters');
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('items.index');
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
        $item = Item::find($id);
        $params = Parameter::pluck('title', 'id')->toArray();
        $paramsType = Parameter::pluck('type', 'id')->toArray();
        $paramsTypeModel = Parameter::pluck('type_modules_id', 'id')->toArray();
        $rgData = array_map(
            function($params, $paramsType, $paramsTypeModel){
                return 'Тип модуля: "' .$params . '";  Тип шкафа: "' . $paramsType . '"; ' .$paramsTypeModel;
            },$params, $paramsType, $paramsTypeModel
        );
        $combined = array_combine(array_merge(array_slice(array_keys($rgData), 1),
            array(count($rgData))), array_values($rgData));
        if (empty($item)) {
            abort(404);
        }
        return view('layouts.admin.cupboard.edit_item', compact('item','combined'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Item::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $item);
        $item->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('items.index');
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
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('items.index');
    }
}
