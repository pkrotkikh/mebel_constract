@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>{{ Html::ul($errors->all()) }}</h4>
                        <div class="card-header">Добавление шкафа</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/items', 'files' => true, 'id' => 'items', 'method' => 'post']) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('parameters_models_id', 'Тип модуля, Тип шкафа:(corner=угловой, standard=тумбочка, twoBlocks=Высокий шкаф)  Нижний модуль = 1 Вверхний = 2') }}
                                {{ Form::select('parameters_models_id', $combined, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('description', 'Описание', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::textarea('description', '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('price', 'Цена', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::text('price', '', ['class' => 'form-control']) }}
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
