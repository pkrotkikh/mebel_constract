@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">Редактирование кухни</div>
                    <div class="card-header">
                        {{ Html::ul($errors->all()) }}
                        {{ Form::model($paramItem, array('route' => array('param_items.update', $paramItem->id),'files'=>true, 'method' => 'PUT')) }}
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('items_models_id', 'Шкаф') }}
                            {{ Form::select('items_models_id', $names, old($paramItem->items_models_id) , ['class' => 'form-control' ]) }}
                        </div>
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('width', 'Ширина', ['class' => 'col-form-label']) }}
                            {{ Form::text('width', isset($paramItem->width) ? $paramItem->width  : 'Ширина', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('height', 'Высота', ['class' => 'col-form-label']) }}
                            {{ Form::text('height', isset($paramItem->height) ? $paramItem->height  : 'Высота', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
