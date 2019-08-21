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
                        {{ Form::model($param, array('route' => array('param_kitchens.update', $param->id),'files'=>true, 'method' => 'PUT')) }}
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('kitchen_model_id', 'Кухня') }}
                            {{ Form::select('kitchen_model_id', $kitchens, old($param->items_models_id) , ['class' => 'form-control' ]) }}
                        </div>
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('depth_top', 'Глубина вверха', ['class' => 'col-form-label']) }}
                            {{ Form::text('depth_top', isset($param->depth_top) ? $param->depth_top  : 'Глубина вверха', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group" style="margin: 1rem">
                            {{ Form::label('depth_bottom', 'Глубина низа', ['class' => 'col-form-label']) }}
                            {{ Form::text('depth_bottom', isset($param->depth_bottom) ? $param->depth_bottom  : 'Глубина низа', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
