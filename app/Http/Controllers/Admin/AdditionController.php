<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAddition;
use App\Models\Addition;
use App\Models\AdditionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kitchen_model;
use Illuminate\Support\Facades\Session;

class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additions = Addition::with('media', 'kitchenModel')->get();
        return view('layouts.admin.addition.additions' , compact('additions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        $addition = Addition::all();
        return view('layouts.admin.addition.create_addition', compact('addition', 'kitchens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddition $request)
    {
        $data = $request->all();
        $addition = [
            'title' => $data['title'],
            'type' =>  $data['type'],
            'kitchen_model_id' => $data['kitchen_model_id'],
        ];
        $ids = Addition::create($addition)->id;
        $media = Addition::find($ids);
        $request->image == '' ? : $media->addMedia($request->image)->toMediaCollection('posters');
        Session::flash('message', 'Успешно добавлено');
        return redirect()->route('additions.index');
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
        $addition = Addition::find($id);
        $kitchens = Kitchen_model::pluck('title', 'id')->toArray();
        if (empty($addition)) {
            abort(404);
        }
        return view('layouts.admin.addition.edit_addition', compact('addition','kitchens'));
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
        $addition = Addition::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $addition);
        $addition->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('additions.index');
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
        $addition = Addition::find($id);
        $addition->delete();
        return redirect()->route('additions.index');
    }

    public function additionTypeCreateForm($id){
        $kitchen = Kitchen_model::find($id);
        return view('layouts.admin.additionType.create_addition_type',[
            'kitchen'=>$kitchen
        ]);
    }

    public function additionTypeCreate(Request $request,$id){
        $addition_type_new_data = [
            'kitchen_model_id'  => $id,
            'title'             => $request['title'],
        ];

        AdditionType::create($addition_type_new_data);
        return redirect(route('dashboard.edit',['id'=>$id]));
    }
}
