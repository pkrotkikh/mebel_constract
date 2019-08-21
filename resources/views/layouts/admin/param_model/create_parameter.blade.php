@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>{{ Html::ul($errors->all()) }}</h4>
                        <div class="card-header">Добавление параметров</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/parameters', 'files' => true, 'id' => 'parameters', 'method' => 'post']) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('kitchen_model_id', 'Кухня') }}
                                {{ Form::select('kitchen_model_id', $kitchens, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('type_modules_id', 'Тип модуля') }}
                                {{ Form::select('type_modules_id', $types, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('type', 'Тип') }}
                                {{Form::select('type', array(
                                    'corner' => 'Угловой',
                                    'standard' => 'Тумба',
                                    'twoBlocks' => 'Высокий шкаф')
                                ,''
                                ,['class' => 'form-control']
                                )}}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                <div class="col-sm-12">
                                    {{ Form::label('image', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                    {!! Form::file('image', ['class' => 'custom-file-input']) !!}
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
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
