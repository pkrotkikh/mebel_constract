<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreKitchenParam;
use App\Models\Kitchen_model;
use App\Models\KitchenParam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ParamKitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = KitchenParam::with('kitchenModel')->get();

        return view('layouts.admin.param_kitchen.index', compact('params'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $param = KitchenParam::all();
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        return view('layouts.admin.param_kitchen.create', compact('param','kitchens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKitchenParam $request)
    {
        $data = $request->all();
        $param = [
            'depth_top' => $data['depth_top'] ?: null,
            'depth_bottom' => $data['depth_bottom'] ?: null,
            'kitchen_model_id' => $data['kitchen_model_id'] ?: null
        ];
        KitchenParam::create($param)->id;
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('param_kitchens.index');
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
        $param = KitchenParam::find($id);
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        if (empty($param)) {
            abort(404);
        }
        return view('layouts.admin.param_kitchen.edit', compact('param', 'kitchens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKitchenParam $request, $id)
    {
        $data = $request->all();
        $param = KitchenParam::find($id);
        $param->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('param_kitchens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $param = KitchenParam::find($id);
        $param->delete();
        return redirect()->route('param_kitchens.index');
    }
}
