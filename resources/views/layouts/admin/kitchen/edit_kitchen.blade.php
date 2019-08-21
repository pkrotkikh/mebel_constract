@extends('layouts.app')
@section('content')

    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">

            {{ Html::ul($errors->all()) }}
            {{ Form::open(array('route' => array('cupboard.update', $kitchen->id), 'method' => 'post', 'files'=>true) ) }}
            {{ Form::hidden('kitchen_id',  $kitchen->id ) }}

            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">Редактирование кухни</div>
                    <div class="card-header">

                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('kitchen_title', 'Название', ['class' => 'col-form-label']) }}
                            {{ Form::text('kitchen_title', isset($kitchen->title) ? $kitchen->title  : 'Заголовок', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('kitchen_price', 'Цена', ['class' => 'col-form-label']) }}
                            {{ Form::text('kitchen_price', isset($kitchen->price) ? $kitchen->price  : 'Цена', ['class' => 'form-control']) }}
                        </div>
                        @if(!empty($kitchen->image))
                        <div class="form-group" style="margin: 1rem">
                            <div class="col-sm-12">
                                <img class="image-thumb" src="{{ $kitchen->image_fullname }}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group" style="margin: 1rem">
                            <div class="col-sm-12">
                                {{ Form::label('kitchen_image', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                {!! Form::file('kitchen_image', ['class' => 'custom-file-input']) !!}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Параметры кухни ' {{$kitchen->title}} '
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Глубина верха</th>
                                    <th>Глубина низа</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{ Form::text('param_depth_top', isset($kitchen->kitchenParams->depth_top) ? $kitchen->kitchenParams->depth_top  : 'Глубина верха', ['class' => 'form-control']) }}</td>
                                    <td>{{ Form::text('param_depth_bottom', isset($kitchen->kitchenParams->depth_bottom) ? $kitchen->kitchenParams->depth_bottom  : 'Глубина низа', ['class' => 'form-control']) }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Цвета кухни ' {{$kitchen->title}} '

                        <h4 class="c-grey-900 mB-20">
                            <button class="badge badge-success add_click_kitchen_color">Добавить</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableColors" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($kitchen->colors as $color)
                                    <tr>
                                        <th>{{ $color->id }}</th>
                                        <td>{{ Form::text('color_title['.$color->id.']', isset($color->title) ? $color->title  : '', ['class' => 'form-control']) }}</td>
                                        <td>{{Form::select('color_type['.$color->id.']', \App\Models\Color::COLOR_TYPE, $color->type,['class' => 'form-control'])}}</td>
                                        <td>
                                            @if(!empty($color->image))
                                                <div class="form-group" style="margin: 1rem">
                                                    <div class="col-sm-12">
                                                        <img class="image-thumb" src="{{ $color->image_fullname }}">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group" style="margin: 1rem">
                                                <div class="col-sm-12">
                                                    {{ Form::label('kitchen_color_images['.$color->id.']', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                    {!! Form::file('kitchen_color_images['.$color->id.']', ['class' => 'custom-file-input']) !!}
                                                </div>
                                            </div>
                                        </td>

                                        <td style="text-align: center">
                                            <button class="btn btn-danger btn-sm kitchen-color-delete" data-id="{{$color->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Типы дополнительной комплектации
                        <h4 class="c-grey-900 mB-20">
                            <button class="badge badge-success add_click_kitchen_addition_type">Добавить</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableAdditionTypes" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Комментарий</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Комментарий</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($kitchen_addition_types as $type)
                                    <tr>
                                        <th>{{ $type->id }}</th>
                                        <td>{{ Form::text('addition_type_title['.$type->id.']', isset($type->title) ? $type->title  : '', ['class' => 'form-control']) }}</td>
                                        <td>{{ Form::text('addition_type_comment['.$type->id.']', isset($type->comment) ? $type->comment  : '',['class' => 'form-control'])}}</td>
                                        <td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-addition-type-delete" data-id="{{$type->id}}">Delete</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Дополнительная комплектация
                        <h4 class="c-grey-900 mB-20">
                            <button class="badge badge-success add_click_kitchen_addition">Добавить</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableAdditions" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($kitchen_addition_types->isEmpty())
                                    <tr>
                                        <td colspan="5">
                                            <h2 style="text-align: center; font-weight: bold;">
                                                Типы комплектации отсутствуют.
                                                <br>
                                                Перед добавление комплектации - добавьте по крайней мере один "тип дополнительной комлектации" кухни.
                                            </h2>
                                        </td>
                                    </tr>
                                @elseif($kitchen_additions->isEmpty())
                                <tr>
                                    <th>0</th>
                                    <td>{{ Form::text('addition_title_new[]','', ['class' => 'form-control']) }}</td>
                                    <td>{{Form::select('addition_type_new[]', $kitchen_addition_type_titles, '',['class' => 'form-control'])}}</td>
                                    <td>
                                        <div class="form-group" style="margin: 1rem">
                                            <div class="col-sm-12">
                                                {{ Form::label('addition_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                {!! Form::file('addition_image_new[]', ['class' => 'custom-file-input']) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @else
                                    @foreach($kitchen_additions as $additions)
                                    @foreach($additions as $addition)
                                        <tr>
                                            <th>{{ $addition->id }}</th>
                                            <td>{{ Form::text('addition_title['.$addition->id.']', isset($addition->title) ? $addition->title  : '', ['class' => 'form-control']) }}</td>
                                            <td>{{ Form::select('addition_type['.$addition->id.']', $kitchen_addition_type_titles, isset($addition->additionType->title) ? $addition->additionType->title  : '',['class' => 'form-control'])}}</td>
                                            <td>
                                                @if(!empty($addition->image))
                                                    <div class="form-group" style="margin: 1rem">
                                                        <div class="col-sm-12">
                                                            <img class="image-thumb" src="{{ $addition->image_fullname }}">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group" style="margin: 1rem">
                                                    <div class="col-sm-12">
                                                        {{ Form::label('addition_image['.$addition->id.']', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                        {!! Form::file('addition_image['.$addition->id.']', ['class' => 'custom-file-input']) !!}
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align: center">
                                                <button class="btn btn-danger btn-sm kitchen-addition-delete" data-id="{{$addition->id}}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Типы модулей кухни
                        <h4 class="c-grey-900 mB-20">
                            <button class="badge badge-success add_click_kitchen_module_type">Добавить</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableModuleTypes" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Категория модуля</th>
                                    <th>Угловой модуль(да/нет)</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Категория модуля</th>
                                    <th>Угловой модуль(да/нет)</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($kitchen->types->isEmpty())
                                    <tr>
                                        <td>1</td>
                                        <td>{{Form::text('module_type_title_new[]', '', ['class' => 'form-control']) }}</td>
                                        <td>{{Form::select('module_type_category_new[]', $kitchen_module_category_titles, '',['class' => 'form-control'])}}</td>
                                        <td>{{Form::checkbox('module_type_favicon_new[]', '1')}}</td>
                                        <td>
                                            <div class="form-group" style="margin: 1rem">
                                                <div class="col-sm-12">
                                                    {{ Form::label('module_type_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                    {!! Form::file('module_type_image_new[]', ['class' => 'custom-file-input']) !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-danger btn-sm kitchen-module-type-new-delete">Delete</button></td>
                                    </tr>
                                @else
                                @foreach($kitchen->types as $type)
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{Form::text('module_type_title['.$type->id.']', $type->title, ['class' => 'form-control']) }}</td>
                                        <td>{{Form::select('module_type_category['.$type->id.']', $kitchen_module_category_titles, $type->module_category_id,['class' => 'form-control'])}}</td>
                                        <td>{{Form::checkbox('module_type_favicon['.$type->id.']', '1',$type->favicon)}}</td>
                                        <td>
                                            @if(!empty($type->image))
                                            <div class="form-group" style="margin: 1rem">
                                                <div class="col-sm-12">
                                                    <img class="image-thumb" src="{{ $type->image_fullname }}">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group" style="margin: 1rem">
                                                <div class="col-sm-12">
                                                    {{ Form::label('module_type_image['.$type->id.']', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                    {!! Form::file('module_type_image['.$type->id.']', ['class' => 'custom-file-input']) !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td><button class="btn btn-danger btn-sm kitchen-module-type-delete" data-id="{{$type->id}}">Delete</button></td>
                                    </tr>
                                @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Модуль кухни
                        <h4 class="c-grey-900 mB-20">
                            <button class="badge badge-success add_click_kitchen_module">Добавить</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableModules" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Комментарий</th>
                                    <th>Цена</th>
                                    <th>Изображение</th>
                                    <th>Ширина/Высота</th>
                                    <th>Тип модуля</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Комментарий</th>
                                    <th>Цена</th>
                                    <th>Изображение</th>
                                    <th>Ширина/Высота</th>
                                    <th>Тип модуля</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @if($kitchen->types->isEmpty())
                                    <tr>
                                        <th colspan="8" style="text-align: center">Для добавления модуля кухни необходимо создать по крайней мере один "тип модулей кухни"!</th>
                                    </tr>
                                @elseif($kitchen->modules->isEmpty())
                                    <tr>
                                        <th>0</th>
                                        <td>{{ Form::text('module_title_new[]', '', ['class' => 'form-control']) }}</td>
                                        <td>{{ Form::text('module_comment_new[]', '', ['class' => 'form-control']) }}</td>
                                        <td>{{ Form::text('module_price_new[]', '',['class' => 'form-control'])}}</td>
                                        <td>
                                            <div class="form-group" style="margin: 1rem">
                                                <div class="col-sm-12">
                                                    {{ Form::label('module_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                    {!! Form::file('module_image_new[]', ['class' => 'custom-file-input']) !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td>Сперва создайте модуль</td>
                                        <td>{{ Form::select('module_type_new[]',$kitchen_module_type_titles,'',['class' => 'form-control available_module_type'])}}</td>
                                        <td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-module-new-delete">Delete</button></td>
                                    </tr>
                                @else
                                    @foreach($kitchen->modules as $module)
                                        <tr>
                                            <th>{{ $module->id }}</th>
                                            <td>{{ Form::text('module_title['.$module->id.']', isset($module->title) ? $module->title  : '', ['class' => 'form-control']) }}</td>
                                            <td>{{ Form::text('module_comment['.$module->id.']', isset($module->comment) ? $module->comment  : '', ['class' => 'form-control']) }}</td>
                                            <td>{{ Form::text('module_price['.$module->id.']', $module->price,['class' => 'form-control'])}}</td>
                                            <td>
                                                @if(!empty($module->image))
                                                    <div class="form-group" style="margin: 1rem">
                                                        <div class="col-sm-12">
                                                            <img class="image-thumb" src="{{ $module->image_fullname }}">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group" style="margin: 1rem">
                                                    <div class="col-sm-12">
                                                        {{ Form::label('module_image['.$module->id.']', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                                        {!! Form::file('module_image['.$module->id.']', ['class' => 'custom-file-input']) !!}
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="" data-id="{{$module->id}}" class="show-height-width-modal">Просмотреть</a></td>
                                            <td>{{ Form::select('module_type['.$module->id.']',$kitchen_module_type_titles ,isset($module->type->id) ? $module->type->id  : '',['class' => 'form-control available_module_type'])}}</td>
                                            <td style="text-align: center">
                                                <button class="btn btn-danger btn-sm kitchen-module-delete" data-id="{{$module->id}}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="module-width-height-modal">
        <div class="module-width-height-modal-body">

            <input class="module-id" type="hidden" value="">

            <div class="module-heights">
                <p>Высота</p>
                <div class="modal-body"></div>
            </div>

            <div class="module-widths">
                <p>Ширина</p>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <script>

        //Кнопки удаления полей
        $(function () {

            $(".kitchen-color-delete").click(function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                    {
                        url: '/admin/dashboard/kitchen/color/' + id + '/delete',
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            $(event.target).closest('tr').remove();
                        },
                        error: function () {
                            console.log('error');
                        }
                    }
                );

            });
            $(".kitchen-addition-delete").click(function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                    {
                        url: '/admin/dashboard/kitchen/addition/' + id + '/delete',
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            $(event.target).closest('tr').remove();
                        },
                        error: function () {
                            console.log('error');
                        }
                    });

            });
            $(".kitchen-addition-type-delete").click(function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                        url: '/admin/dashboard/kitchen/additionType/' + id + '/delete',
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function () {
                            $(event.target).closest('tr').remove();
                        },
                        error: function () {
                            console.log('error');
                        }
                    });

            });
            $(".kitchen-module-delete").click(function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: '/admin/dashboard/kitchen/module/' + id + '/delete',
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        $(event.target).closest('tr').remove();
                    },
                    error: function () {
                        console.log('error');
                    }
                });

            });
            $(".kitchen-module-type-delete").click(function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: '/admin/dashboard/kitchen/module/type/' + id + '/delete',
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        $(event.target).closest('tr').remove();
                    },
                    error: function () {
                        console.log('error');
                    }
                });

            });

            $(".module-width-height-modal").on('click','.kitchen-module-heights-delete',function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: '/api/kitchen/module/AJAX/height/'+id+'/delete',
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        $(event.target).closest('.module_height_item').remove();
                    },
                    error: function () {
                        console.log('error');
                    }
                });

            });
            $(".module-width-height-modal").on('click','.kitchen-module-widths-delete',function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: '/api/kitchen/module/AJAX/width/'+id+'/delete',
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function () {
                        $(event.target).closest('.module_width_item').remove();
                    },
                    error: function () {
                        console.log('error');
                    }
                });

            });
        });

        //Кнопки добавления полей
        $(function () {

            var kitchenColor = 0;
            var kitchenAdditionType = 0;
            var kitchenAddition = 0;
            var kitchenModuleType = 0;
            var kitchenModule = 0;

            var kitchenModuleHeghts = 0;
            var kitchenModuleWidths = 0;

            $('.add_click_kitchen_color').click(function (event) {
                event.preventDefault();
                kitchenColor++;
                var tr = '<tr>' +
                            '<th>'+kitchenColor+'</th>'+
                            '<td>{{ Form::text('color_title_new[]',"", ['class' => 'form-control']) }}</td>'+
                            '<td>{{ Form::select('color_type_new[]',\App\Models\Color::COLOR_TYPE, '', ['class' => 'form-control']) }}</td>'+
                            '<td>' +
                                '<div class="form-group" style="margin: 1rem">'+
                                    '<div class="col-sm-12">'+
                                        '{{ Form::label('kitchen_color_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}'+
                                        '{!! Form::file('kitchen_color_image_new[]', ['class' => 'custom-file-input']) !!}'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-color-new-delete">Delete</button></td>'+
                        '</tr>';


                $('#dataTableColors tbody').append(tr);
            });
            $('.add_click_kitchen_addition_type').click(function (event) {
                event.preventDefault();
                kitchenAdditionType++;
                var tr =
                    '<tr>' +
                        '<th>'+kitchenAdditionType+'</th>'+
                        '<td>{{ Form::text('addition_type_title_new[]','', ['class' => 'form-control']) }}</td>'+
                        '<td>{{ Form::text('addition_type_comment_new[]','', ['class' => 'form-control']) }}</td>'+
                        '<td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-addition-new-delete">Delete</button></td>'+
                    '</tr>';

                $('#dataTableAdditionTypes tbody').append(tr);
            });
            $('.add_click_kitchen_addition').click(function (event) {
                event.preventDefault();
                kitchenAddition++;
                var tr =
                    '<tr>' +
                        '<th>'+kitchenAddition+'</th>'+
                        '<td>{{ Form::text('addition_title_new[]',"", ['class' => 'form-control']) }}</td>'+
                        '<td>{{ Form::select('addition_type_new[]',$kitchen_addition_type_titles, '', ['class' => 'form-control']) }}</td>'+
                        '<td>' +
                            '<div class="form-group" style="margin: 1rem">'+
                                '<div class="col-sm-12">'+
                                    '{{ Form::label('addition_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}'+
                                    '{!! Form::file('addition_image_new[]', ['class' => 'custom-file-input']) !!}'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                        '<td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-addition-new-delete">Delete</button></td>'+
                    '</tr>';

                $('#dataTableAdditions tbody').append(tr);
            });
            $('.add_click_kitchen_module_type').click(function (event) {
                event.preventDefault();
                kitchenModuleType++;
                var tr =
                    '<tr>' +
                        '<th>'+kitchenModuleType+'</th>'+
                        '<td>{{Form::text('module_type_title_new[]', '', ['class' => 'form-control']) }}</td>'+
                        '<td>{{Form::select('module_type_category_new[]', $kitchen_module_category_titles, '',['class' => 'form-control'])}}</td>'+
                        '<td>{{Form::checkbox('module_type_favicon_new[]', '1')}}</td>'+
                        '<td>' +
                            '<div class="form-group" style="margin: 1rem">'+
                                '<div class="col-sm-12">'+
                                    '{{ Form::label('module_type_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}'+
                                    '{!! Form::file('module_type_image_new[]', ['class' => 'custom-file-input']) !!}'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                        '<td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-module-type-new-delete">Delete</button></td>'+
                    '</tr>';

                $('#dataTableModuleTypes tbody').append(tr);
            });
            $('.add_click_kitchen_module').click(function (event) {
                event.preventDefault();
                kitchenModule++;
                var tr =
                    '<tr>' +
                        '<th>'+kitchenAddition+'</th>'+
                        '<td>{{ Form::text('module_title_new[]', '', ['class' => 'form-control']) }}</td>'+
                        '<td>{{ Form::text('module_comment_new[]', '', ['class' => 'form-control']) }}</td>'+
                        '<td>{{ Form::text('module_price_new[]', '',['class' => 'form-control'])}}</td>'+
                        '<td>' +
                            '<div class="form-group" style="margin: 1rem">'+
                                '<div class="col-sm-12">'+
                                    '{{ Form::label('module_image_new[]', 'Загрузить изображение', ['class' => 'custom-file-label']) }}'+
                                    '{!! Form::file('module_image_new[]', ['class' => 'custom-file-input']) !!}'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                        '<td>Сперва создайте модуль</td>'+
                        '<td>{{ Form::select('module_type_new[]',$kitchen_module_type_titles ,'',['class' => 'form-control available_module_type'])}}</td>'+
                        '<td style="text-align: center"><button class="btn btn-danger btn-sm kitchen-module-new-delete">Delete</button></td>'+
                    '</tr>';

                $('#dataTableModules tbody').append(tr);
            });

            $('.module-width-height-modal').on('click', '.add_click_kitchen_module_heights', function (event) {
                event.preventDefault();
                var inputToAppendHeights = '';
                inputToAppendHeights += '<div class="module_height_item">';
                    inputToAppendHeights += '<span>'+kitchenModuleHeghts+'</span>';
                    inputToAppendHeights += '<input type="text" name="module_heights_new[]" value="">';
                    inputToAppendHeights += '<button class="btn btn-danger btn-sm kitchen-module-heights-new-delete">Delete</button>';
                inputToAppendHeights += '</div>';


                $('.module-width-height-modal .module-heights .modal-body').append(inputToAppendHeights);
                kitchenModuleHeghts++;
            });
            $('.module-width-height-modal').on('click', '.add_click_kitchen_module_widths', function (event) {
                event.preventDefault();
                var inputToAppendWidths = '';
                inputToAppendWidths += '<div class="module_width_item">';
                    inputToAppendWidths += '<span>'+kitchenModuleWidths+'</span>';
                    inputToAppendWidths += '<input type="text" name="module_widths_new[]" value="">';
                    inputToAppendWidths += '<button class="btn btn-danger btn-sm kitchen-module-widths-new-delete">Delete</button>';
                inputToAppendWidths += '</div>';


                $('.module-width-height-modal .module-widths .modal-body').append(inputToAppendWidths);
                kitchenModuleWidths++;
            });
        });

        //Кнопки удаления недавно созданных полей
        $(function () {

            $('#dataTableColors tbody').on('click', '.kitchen-color-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('tr').remove();
            });
            $('#dataTableAdditions tbody').on('click', '.kitchen-addition-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('tr').remove();
            });
            $('#dataTableModules tbody').on('click', '.kitchen-module-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('tr').remove();
            });
            $('#dataTableModuleTypes tbody').on('click', '.kitchen-module-type-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('tr').remove();
            });

            $('.module-width-height-modal').on('click', '.kitchen-module-widths-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('.module_width_item').remove();
            });
            $('.module-width-height-modal').on('click', '.kitchen-module-heights-new-delete', function (event) {
                event.preventDefault();
                $(event.target).closest('.module_height_item').remove();
            });
        });

        //Открыть модалку редактирования размеров модуля кухни
        $('.show-height-width-modal').click(function (e) {
            e.preventDefault();
            $('.module-width-height-modal').slideDown().delay(2000);

            let id = $(this).data("id");
            $.ajax({
                    url: '/api/kitchen/module/'+id+'/AJAX/params',
                    type: 'GET',
                    success: function (response) {

                        var inputToAppendHeights = '';
                        var inputToAppendWidths = '';

                        var addHeightsButton = '<button class="badge badge-success add_click_kitchen_module_heights">Добавить</button>';
                        var addWidthsButton = '<button class="badge badge-success add_click_kitchen_module_widths">Добавить</button>';

                        $(response.heights).each(function (index,elem) {
                            inputToAppendHeights += '<div class="module_height_item">';
                                inputToAppendHeights += '<span>'+index+'</span>';
                                inputToAppendHeights += '<input type="text" name="module_heights[]" data-id="' + elem.id + '" value="' + elem.value + '">';
                                inputToAppendHeights += '<button class="btn btn-danger btn-sm kitchen-module-heights-delete" data-id="' + elem.id + '" >Delete</button>';
                            inputToAppendHeights += '</div>';
                        });
                        $(response.widths).each(function (index,elem) {
                            inputToAppendWidths += '<div class="module_width_item">';
                                inputToAppendWidths += '<span>'+index+'</span>';
                                inputToAppendWidths += '<input type="text" name="module_widths[]" data-id="' + elem.id + '" value="' + elem.value + '">';
                                inputToAppendWidths += '<button class="btn btn-danger btn-sm kitchen-module-widths-delete" data-id="' + elem.id + '" >Delete</button>';
                            inputToAppendWidths += '</div>';
                        });

                        $('.module-width-height-modal-body .module-id').val(id);
                        $('.module-width-height-modal-body .module-heights .modal-body').html(inputToAppendHeights);
                        $('.module-width-height-modal-body .module-widths .modal-body').html(inputToAppendWidths);

                        if(response.module_category_id == 1){
                            $('.module-width-height-modal-body .module-heights .modal-body').prepend(addHeightsButton);
                        }else{
                            let content = '<p style="color:gray;font-size:10px">Для категории модуля "Нижние модули" доступен один вариант высоты</p>';
                            if($(inputToAppendHeights).length < 1){
                                content += '<div class="module_height_item">';
                                    content += '<span>1</span>';
                                    content += '<input type="text" name="module_heights_new[]" value="">';
                                content += '</div>';
                            }
                            $('.module-width-height-modal-body .module-heights .modal-body').prepend(content);
                        }
                        $('.module-width-height-modal-body .module-widths .modal-body').prepend(addWidthsButton);
                    },
                    error: function (response) {
                        console.log(response);
                    }
            });
        });

        //Обработка события нажатия пользователя за край модалки
        $('.module-width-height-modal').click(function (e) {
            if(e.target != this){
                //Пользователь нажал на модалку
            }else {
                //Пользователь нажал за край модалки

                //Сбор данных с инпутов
                let module_id = $('.module-width-height-modal-body .module-id').val();
                let token = $("meta[name='csrf-token']").attr("content");

                let heights = {};
                let widths = {};
                let heights_new = {};
                let widths_new = {};

                let height_inputs = $(".module-heights input[name='module_heights[]']");
                let width_inputs = $(".module-widths input[name='module_widths[]']");
                let height_new_inputs = $(".module-heights input[name='module_heights_new[]']");
                let width_new_inputs = $(".module-widths input[name='module_widths_new[]']");

                $(height_inputs).each(function (index,elem) {
                    heights[index] = {
                            'id': $(elem).data('id'),
                            'value': $(elem).val(),
                    };
                });
                $(width_inputs).each(function (index,elem) {
                    widths[index] = {
                        'id': $(elem).data('id'),
                        'value': $(elem).val(),
                    };
                });

                if($(height_new_inputs).length > 0){
                    $(height_new_inputs).each(function (index,elem) {
                        heights_new[index] = {
                            'value': $(elem).val(),
                        };
                    });
                }
                if($(width_new_inputs).length > 0){
                    $(width_new_inputs).each(function (index,elem) {
                        widths_new[index] = {
                            'value': $(elem).val(),
                        };
                    });
                }
                //Конец сбора данных с инпутов

                //Отправка запроса
                $.ajax({
                        url: '/api/kitchen/module/'+module_id+'/AJAX/params/update',
                        data:{
                            "_token":token,
                            "module_id":module_id,
                            "heights":heights,
                            "widths":widths,
                            "heights_new":heights_new,
                            "widths_new":widths_new,
                        },
                        type: 'POST',
                        success: function () {
                            $('.module-width-height-modal').slideUp().dequeue(); //Свернуть модалку
                        },
                    error: function (response) {
                        console.log(response);
                    }
                    });
                //Конец отправки запроса
            }
        })

    </script>

@endsection
