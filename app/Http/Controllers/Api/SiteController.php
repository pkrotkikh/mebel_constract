<?php

namespace App\Http\Controllers\Api;

use App\Models\Color;
use App\Models\KitchenModule;
use App\Models\KitchenModuleHeight;
use App\Models\KitchenModuleWidth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{


    public function index(Request $request){

        $color = Color::where('kitchen_model_id', 1)
            ->where('type', 'kitchen_facade')
            ->get();
        dd($color);

        $data = [
            'kitchenFasad' => '',
            'bodyColor' => '',
            'depthTop' => '',
            'depthBottom' => '',
            'bottomModules' => [
                'item' => ''
            ],
            'topModules' => [
                'item' => ''
            ],
            'tableTopColor' => '',
            'baseColor' => '',
            'eavesColor' => ''
        ];

        return response()->json($data);
    }

    public function moduleAJAXparams($id){
        $module = KitchenModule::find($id);
        $module_category_id = $module->type->module_category_id;

        $heights = array();
        if(!empty($module->heights)){
            foreach ($module->heights as $key=>$height){
                $heights[$key]['id'] = $height->id;
                $heights[$key]['value'] = $height->longitude;
            }
        }
        $widths = array();
        if(!empty($module->widths)) {
            foreach ($module->widths as $key=>$width) {
                $widths[$key]['id'] = $width->id;
                $widths[$key]['value'] = $width->longitude;
            }
        }

        return
            [
            'heights'=>$heights,
            'widths'=>$widths,
            'module_category_id'=>$module_category_id,
            ];
    }

    public function moduleAJAXparamsUpdate(Request $request){

        $kitchen_module = KitchenModule::find($request['module_id']);

        //Обновление имеющихся размерностей модуля
        if(!empty($request['heights'])) {
            foreach ($request['heights'] as $i => $height) {
                if($request['heights'][$i]['value'] == null) continue;
                $height = KitchenModuleHeight::find($request['heights'][$i]['id']);
                $height->longitude = $request['heights'][$i]['value'];
                $height->update();
            }
        }
        if(!empty($request['widths'])) {
            foreach ($request['widths'] as $i => $width) {
                if($request['widths'][$i]['value'] == null) continue;
                $width = KitchenModuleWidth::find($request['widths'][$i]['id']);
                $width->longitude = $request['widths'][$i]['value'];
                $width->update();
            }
        }
        //Конец обновления имеющихся размерностей модуля


        //Создание новых вариантов размерностей модуля
        if(!empty($request['heights_new'])) {
            foreach ($request['heights_new'] as $i => $height) {
                if($request['heights_new'][$i]['value'] == null) continue;
                KitchenModuleHeight::create([
                    'module_id'=>$kitchen_module->id,
                    'longitude'=>$request['heights_new'][$i]['value'],
                ]);
            }
        }
        if(!empty($request['widths_new'])) {
            foreach ($request['widths_new'] as $i => $width) {
                if($request['widths_new'][$i]['value'] == null) continue;
                KitchenModuleWidth::create([
                    'module_id'=>$kitchen_module->id,
                    'longitude'=>$request['widths_new'][$i]['value'],
                ]);
            }
        }
        //Конец создания новых вариантов размерностей модуля

        return 'Success';
    }

    public function moduleHeightAJAXdelete($id){
        $height = KitchenModuleHeight::find($id);
        $height->delete();
        return 'Success';
    }
    public function moduleWidthAJAXdelete($id){
        $width = KitchenModuleWidth::find($id);
        $width->delete();
        return 'Success';
    }
}
