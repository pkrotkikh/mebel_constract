@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-header">Добавление параметров шкафа</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/param_items', 'id' => 'param_items', 'method' => 'post', 'files'=>true]) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('items_models_id', 'Шкаф') }}
                                {{ Form::select('items_models_id', $names, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('width', 'Ширина', ['class' => 'col-form-label']) }}
                                {{ Form::text('width', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('height', 'Высота', ['class' => 'col-form-label']) }}
                                {{ Form::text('height', '', ['class' => 'form-control']) }}
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
