@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-header">Добавление параметров кухни</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/param_kitchens', 'id' => 'param_kitchens', 'method' => 'post', 'files'=>true]) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('kitchen_model_id', 'Кухня') }}
                                {{ Form::select('kitchen_model_id', $kitchens, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('depth_top', 'Глубаина вверха', ['class' => 'col-form-label']) }}
                                {{ Form::text('depth_top', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('depth_bottom', 'Глубина низа', ['class' => 'col-form-label']) }}
                                {{ Form::text('depth_bottom', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
