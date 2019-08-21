<?php

namespace App\Http\Controllers\Admin;

use App\Models\Addition;
use App\Models\AdditionType;
use App\Models\Item;
use App\Models\Kitchen_model;
use App\Models\KitchenModule;
use App\Models\KitchenModuleCategory;
use App\Models\KitchenModuleHeight;
use App\Models\KitchenModuleType;
use App\Models\KitchenParam;
use App\Models\Parameter;
use App\Models\ParamItem;
use Faker\Provider\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKitchen;
use App\Http\Controllers\Controller;
use App\Models\Color;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kitchens = Kitchen_model::latest()->with('kitchenParams')->get();


        return view('layouts.admin.kitchen.dashboard', [
            'kitchens'=>$kitchens,

/*          'params'=>$params,
            'colors'=>$colors,
            'additions'=>$additions,
            'parameters'=>$parameters,
            'items'=>$items,
            'paramItems'=>$paramItems,
*/
        ]);
    }



    public function deleteKitchenAdditionType($id)
    {
        $additionType = AdditionType::find($id);
        $additionType->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function deleteKitchenAddition($id)
    {
        $addition = Addition::find($id);
        $addition->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function deleteKitchenColor($id)
    {
        $param = Color::find($id);
        $param->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function deleteKitchenModuleType($id)
    {
        $type = KitchenModuleType::find($id);
        $type->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    public function deleteKitchenModule($id)
    {
        $module = KitchenModule::find($id);
        $module->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kitchen = Kitchen_model::all();
        return view('layouts.admin.kitchen.create_kitchen', compact('kitchen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKitchen $request)
    {
            $data = $request->all();
                $kitchen = [
                    'title' => $data['title'] ?: null,
                    'price' => $data['price'] ?: null
                ];
                $ids =  Kitchen_model::create($kitchen)->id;
                $media = Kitchen_model::find($ids);
                $media->addMedia($request->image)->toMediaCollection('posters');
                Session::flash('message', 'Успешно добавлено');
                return redirect()->route('dashboard.index');
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

        $kitchen = Kitchen_model::with('kitchenParams','colors','parametersModels','modules')->find($id);
        $kitchen_addition_types = $kitchen->additionTypes;

        $kitchen_module_categories = KitchenModuleCategory::all();
        $kitchen_module_category_titles = [];
        foreach ($kitchen_module_categories as $category){
            $kitchen_module_category_titles[$category->id] = $category->title;
        }

        $kitchen_module_types = $kitchen->types;
        $kitchen_module_type_titles = [];
        foreach ($kitchen_module_types as $type){
            $kitchen_module_type_titles[$type->id] = $type->title;
        }

        $kitchen_additions = collect();
        $kitchen_addition_type_titles = collect();
        if(!empty($kitchen_addition_types)) {
            foreach ($kitchen_addition_types as $addition_type) {
                $kitchen_addition_type_titles[$addition_type->title] = $addition_type->title;
                !$addition_type->additions->isEmpty() ? $kitchen_additions->push($addition_type->additions) : '';
            }
        }

         /*
           $items = Item::with('media', 'parametersModels')->get();
           $paramItems = ParamItem::with('itemsModels')->get();
         */


        if (empty($kitchen)) {
            abort(404);
        }
        return view('layouts.admin.kitchen.edit_kitchen', [
            'kitchen'=>$kitchen,
            'kitchen_addition_type_titles'=>$kitchen_addition_type_titles->toArray(),
            'kitchen_addition_types'=>$kitchen_addition_types,
            'kitchen_additions'=>$kitchen_additions,
            'kitchen_module_category_titles'=>$kitchen_module_category_titles,
            'kitchen_module_type_titles'=>$kitchen_module_type_titles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKitchen $request, $id)
    {
        $data = $request->all();
        $kitchen = Kitchen_model::find($id);
        $this->checkAndUploadImage($request, 'image', 'posters', $kitchen);
        $kitchen->update($data);
        Session::flash('message', 'Успешно изменено');
        return redirect()->route('dashboard.index');
    }

    /**
     * @param StoreKitchen $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cupboardUpdate(StoreKitchen $request, $id)
    {

//      /*---------------- Редактирование кухни -------------------------------*/
        $kitchen = Kitchen_model::find($request['kitchen_id']);
        $kitchen_image = $request->file('kitchen_image');

        if(!empty($kitchen_image) ) {
            if (isset($kitchen->image)) {
                \Illuminate\Support\Facades\File::delete($kitchen->image_fullpath);
            }
            $kitchen_image_name = time() . rand(0, 99) . '.' . $kitchen_image->getClientOriginalExtension();
            $destinationPath = public_path('/img/kitchen/');
            $kitchen_image->move($destinationPath, $kitchen_image_name);
        }

        $kitchen_data = [
            'title' => $request['kitchen_title'],
            'price' => $request['kitchen_price'],
            'image' => isset($kitchen_image_name) ? $kitchen_image_name : $kitchen->image,
        ];
        $kitchen->update($kitchen_data);
//      /*---------------- Конец редактирования кухни -------------------------*/



//      /*---------------- Редактирование параметров кухни -------------------------------*/
        if(!empty($request['param_depth_top']) || !empty($request['param_depth_bottom'])) {
            $param = $kitchen->kitchenParams;
            if($param != null){
                $kitchen_params_data = [
                    'depth_top' => !empty($request['param_depth_top']) ? $request['param_depth_top'] : '',
                    'depth_bottom' => !empty($request['param_depth_bottom']) ? $request['param_depth_bottom'] : '',
                ];
                $param->update($kitchen_params_data);
            }else{
                $kitchen_params_data = [
                    'kitchen_model_id'=>$kitchen->id,
                    'depth_top' => !empty($request['param_depth_top']) ? $request['param_depth_top'] : '',
                    'depth_bottom' => !empty($request['param_depth_bottom']) ? $request['param_depth_bottom'] : '',
                ];
                KitchenParam::create($kitchen_params_data);
            }
        }
//      /*---------------- Конец Редактирование параметров кухни -------------------------*/



//      /*---------------- Обновление цветов кухни -------------------------------*/
        if(!empty($request['color_title']) || !empty($request['color_type'])) {
            foreach ($request['color_title'] as $id => $value) {
                $color = Color::find($id);
                $kitchen_color_image = $request->file('kitchen_color_images');
                if(!empty($kitchen_color_image[$id]) ) {
                    if (isset($color->image)) {
                        \Illuminate\Support\Facades\File::delete($color->image_fullpath);
                    }
                    $kitchen_color_image_name = time() . rand(0, 99) . '.' . $kitchen_color_image[$id]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/color/');
                    $kitchen_color_image[$id]->move($destinationPath, $kitchen_color_image_name);
                }

                $kitchen_colors_data = [
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'title' => !empty($request['color_title'][$id]) ? $request['color_title'][$id] : '',
                    'type' => !empty($request['color_type'][$id]) ? $request['color_type'][$id] : '',
                    'image' => isset($kitchen_color_image_name) ? $kitchen_color_image_name : $color->image,
                ];
                $color->update($kitchen_colors_data);
                $kitchen_color_image_name = null;
            }
        }
//      /*---------------- Конец обновления цветов кухни -------------------------*/



//      /*---------------- Добавление цветов кухни -------------------------------*/
        if(!empty($request['color_title_new']) || !empty($request['color_type_new'])) {
            foreach ($request['color_title_new'] as $i => $value) {
                $kitchen_color_new_image = $request->file('kitchen_color_image_new');
                if(!empty($kitchen_color_new_image[$i]) ) {
                    $kitchen_color_image_name = time() . rand(0, 99) . '.' . $kitchen_color_new_image[$i]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/color/');
                    $kitchen_color_new_image[$i]->move($destinationPath, $kitchen_color_image_name);
                }

                $kitchen_colors_data = [
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'title' => !empty($request['color_title_new'][$i]) ? $request['color_title_new'][$i] : '',
                    'type' => !empty($request['color_type_new'][$i]) ? $request['color_type_new'][$i] : '',
                    'image' => !empty($kitchen_color_image_name) ? $kitchen_color_image_name : '',
                ];
                Color::create($kitchen_colors_data);
                $kitchen_color_image_name = null;
            }
        }
//      /*---------------- Конец добавления цветов кухни -------------------------*/



//      /*---------------- Обновление доп комплектации кухни -------------------------------*/
        if(!empty($request['addition_title']) || !empty($request['addition_type'])) {
            foreach ($request['addition_title'] as $id => $value) {
                $addition = Addition::find($id);
                $addition_type_id = AdditionType::where('title',$request['addition_type'][$id])->first()->id;

                $addition_image = $request->file('addition_image');
                if(!empty($addition_image[$id]) ) {
                    if (isset($addition->image)) {
                        \Illuminate\Support\Facades\File::delete($addition->image_fullpath);
                    }
                    $addition_image_name = time() . rand(0, 99) . '.' . $addition_image[$id]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/addition/');
                    $addition_image[$id]->move($destinationPath, $addition_image_name);
                }

                $kitchen_addition_data = [
                    'addition_type_id' => $addition_type_id,
                    'title' => !empty($request['addition_title'][$id]) ? $request['addition_title'][$id] : '',
                    'image' => !empty($addition_image_name) ? $addition_image_name : $addition->image,
                ];
                $addition->update($kitchen_addition_data);
                $addition_image_name = null;
            }
        }
//      /*---------------- Конец обновления доп комплектации кухни -------------------------*/



//      /*---------------- Добавление доп комплектации кухни -------------------------------*/
        if(!empty($request['addition_title_new']) || !empty($request['addition_type_new'])) {
            foreach ($request['addition_title_new'] as $i => $value) {
                if($value == null) continue;
                $addition_type_id = AdditionType::where('title',$request['addition_type_new'][$i])->first()->id;

                $addition_image_new = $request->file('addition_image_new');
                if(!empty($addition_image_new[$i])) {
                    $addition_image_name_new = time() . rand(0, 99) . '.' . $addition_image_new[$i]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/addition/');
                    $addition_image_new[$i]->move($destinationPath, $addition_image_name_new);
                }

                $kitchen_additions_data = [
                    'addition_type_id' => $addition_type_id,
                    'title' => !empty($request['addition_title_new'][$i]) ? $request['addition_title_new'][$i] : '',
                    'image' => !empty($addition_image_name_new) ? $addition_image_name_new : '',
                ];
                Addition::create($kitchen_additions_data);
                $addition_image_name_new = null;
            }
        }
//      /*---------------- Конец добавления доп комплектации кухни -------------------------*/



//      /*---------------- Обновление типов доп комплектации кухни -------------------------------*/
        if(!empty($request['addition_type_title']) || !empty($request['addition_type_comment'])) {
            foreach ($request['addition_type_title'] as $id => $value) {
                $kitchen_addition_type_data = [
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'title' => $request['addition_type_title'][$id],
                    'comment' => !empty($request['addition_type_comment'][$id]) ? $request['addition_type_comment'][$id] : '',
                ];
                $addition_type = AdditionType::find($id);
                $addition_type->update($kitchen_addition_type_data);
            }
        }
//      /*---------------- Конец обновления типов доп комплектации кухни -------------------------*/



//      /*---------------- Добавление типов доп комплектации кухни -------------------------------*/
        if(!empty($request['addition_type_title_new']) || !empty($request['addition_type_comment_new'])) {
            foreach ($request['addition_type_title_new'] as $i => $value) {
                $kitchen_addition_type_data = [
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'title' => $request['addition_type_title_new'][$i],
                    'comment' => !empty($request['addition_type_comment_new'][$i]) ? $request['addition_type_comment_new'][$i] : '',
                ];
                AdditionType::create($kitchen_addition_type_data);
            }
        }
//      /*---------------- Конец добавления типов доп комплектации кухни -------------------------*/


//      /*---------------- Обновление типов модулей кухни -------------------------------*/
        if(!empty($request['module_type_title']) ) {
            foreach ($request['module_type_title'] as $id=>$module_type_title){
                $module_category = KitchenModuleCategory::find($request['module_type_category'][$id]);
                $module_type = KitchenModuleType::find($id);

                $module_type_image = $request->file('module_type_image');
                if(!empty($module_type_image[$id]) ) {
                    if (isset($module_type->image)) {
                        \Illuminate\Support\Facades\File::delete($module_type->image_fullpath);
                    }
                    $module_type_image_name = time() . rand(0, 99) . '.' . $module_type_image[$id]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/module_type/');
                    $module_type_image[$id]->move($destinationPath, $module_type_image_name);
                }

                $kitchen_module_type_data = [
                    'title' => $request['module_type_title'][$id],
                    'module_category_id'=>$module_category->id,
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'favicon'=>isset($request['module_type_favicon'][$id]) ? $request['module_type_favicon'][$id] : 0,
                    'image' => !empty($module_type_image_name) ? $module_type_image_name : $module_type->image,
                ];
                $module_type->update($kitchen_module_type_data);
                $module_type_image_name = null;
            }
        }
//      /*---------------- Конец обновления модулей кухни -------------------------*/



//      /*---------------- Добавление новых типов модулей кухни -------------------------------*/
        if(!empty($request['module_type_title_new']) ) {
            foreach ($request['module_type_title_new'] as $i=>$module_type_title){
                if($module_type_title == null) continue;
                $module_category = KitchenModuleCategory::find($request['module_type_category_new'][$i]);

                $module_type_image_new = $request->file('module_type_image_new');
                if(!empty($module_type_image_new[$i])) {
                    $module_type_image_name_new = time() . rand(0, 99) . '.' . $module_type_image_new[$i]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/module_type/');
                    $module_type_image_new[$i]->move($destinationPath, $module_type_image_name_new);
                }

                $kitchen_module_type_data = [
                    'title' => $request['module_type_title_new'][$i],
                    'module_category_id'=>$module_category->id,
                    'kitchen_model_id'=>$request['kitchen_id'],
                    'favicon'=>isset($request['module_type_favicon_new'][$i]) ? $request['module_type_favicon_new'][$i] : 0 ,
                    'image' => !empty($module_type_image_name_new) ? $module_type_image_name_new : '',
                ];

                KitchenModuleType::create($kitchen_module_type_data);
                $module_type_image_name_new = null;
            }
        }
//      /*---------------- Конец добавления новых типов модулей кухни -------------------------*/



//      /*---------------- Добавление новых модулей кухни -------------------------------*/
        if(!empty($request['module_title_new'])) {
            foreach ($request['module_title_new'] as $i=>$module_title){
                if($module_title == null) continue;
                $module_type = KitchenModuleType::find($request['module_type_new'][$i]);

                $module_image_new = $request->file('module_image_new');
                if(!empty($module_image_new[$i])) {
                    $module_image_name_new = time() . rand(0, 99) . '.' . $module_image_new[$i]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/module/');
                    $module_image_new[$i]->move($destinationPath, $module_image_name_new);
                }

                $kitchen_module_data = [
                    'title' => $request['module_title_new'][$i],
                    'comment' => $request['module_comment_new'][$i],
                    'price' => $request['module_price_new'][$i],
                    'kitchen_id'=>$request['kitchen_id'],
                    'module_type_id'=>$module_type->id,
                    'image' => !empty($module_image_name_new) ? $module_image_name_new : '',
                ];
                KitchenModule::create($kitchen_module_data);
                $module_image_name_new = null;
            }
        }
//      /*---------------- Конец добавления новых модулей кухни -------------------------*/


//      /*---------------- Обновление модулей кухни -------------------------------*/
        if(!empty($request['module_title']) ) {
            foreach ($request['module_title'] as $id=>$module_title){
                $module_type = KitchenModuleType::find($request['module_type'][$id]);
                $kitchen_module = KitchenModule::find($id);

                $module_image = $request->file('module_image');
                if(!empty($module_image[$id]) ) {
                    if (isset($kitchen_module->image)) {
                        \Illuminate\Support\Facades\File::delete($kitchen_module->image_fullpath);
                    }
                    $module_image_name = time() . rand(0, 99) . '.' . $module_image[$id]->getClientOriginalExtension();
                    $destinationPath = public_path('/img/module/');
                    $module_image[$id]->move($destinationPath, $module_image_name);
                }

                $kitchen_module_data = [
                    'title' => $request['module_title'][$id],
                    'comment' => $request['module_comment'][$id],
                    'price' => $request['module_price'][$id],
                    'kitchen_id'=>$request['kitchen_id'],
                    'module_type_id'=>$module_type->id,
                    'image' => !empty($module_image_name) ? $module_image_name : $kitchen_module->image,
                ];


                $kitchen_module->update($kitchen_module_data);
                $module_image_name = null;

                //Для модулей, которые принадлежат категории "Нижние модули"
                //доступен только один вариант высоты. Поэтому надо ограничить их количество
                //при изменении категории модуля:
                if($kitchen_module->type->module_category_id == 2 && !empty($kitchen_module->heights)){
                    $excessHeights = $kitchen_module->heights->filter(function ($value, $key) {
                        return $key > 0 ;
                    }) ;
                    foreach ($excessHeights as $height){
                        $height->delete();
                    }
                }
            }
        }
//      /*---------------- Конец обновления модулей кухни -------------------------*/


        Session::flash('message', 'Успешно изменено');
        return back();
        //return redirect()->route('dashboard.index');
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
        $kitchen = Kitchen_model::find($id);
        $kitchen->delete();
        return redirect()->route('dashboard.index');
    }
}
