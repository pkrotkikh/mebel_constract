<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreParamItem;
use App\Models\Item;
use App\Models\ParamItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ParamItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paramItems = ParamItem::with('itemsModels')->get();
        return view('layouts.admin.item_param.index', compact('paramItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paramItem = ParamItem::all();
        $names = Item::pluck('title', 'id')->toArray();
        return view('layouts.admin.item_param.create', compact('paramItem','names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParamItem $request)
    {
        $data = $request->all();
        $paramItem = [
            'width' => $data['width'] ?: null,
            'height' => $data['height'] ?: null,
            'items_models_id' => $data['items_models_id'] ?: null
        ];
        ParamItem::create($paramItem)->id;
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('param_items.index');
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
        $paramItem = ParamItem::find($id);
        $names = Item::pluck('title', 'id')->toArray();
        if (empty($paramItem)) {
            abort(404);
        }
        return view('layouts.admin.item_param.edit', compact('paramItem', 'names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreParamItem $request, $id)
    {
        $data = $request->all();
        $paramItem = ParamItem::find($id);
        $paramItem->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('param_items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paramItem = ParamItem::find($id);
        $paramItem->delete();
        return redirect()->route('param_items.index');
    }
}
