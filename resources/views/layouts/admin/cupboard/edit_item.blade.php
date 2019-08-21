@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">Редактирование параметров модуля</div>
                    <div class="card-header">
                        {{ Html::ul($errors->all()) }}
                        {{ Form::model($item, array('route' => array('items.update', $item->id),'files'=>true, 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('parameters_models_id', 'Тип модуля, Тип шкафа:(corner=угловой, standard=тумбочка, twoBlocks=Высокий шкаф)  Нижний модуль = 1 Вверхний = 2') }}
                            {{ Form::select('parameters_models_id', $combined, old($item->parameters_models_id), ['class' => 'form-control' ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'Название', ['class' => 'col-form-label']) }}
                            {{ Form::text('title', isset($item->title) ? $item->title  : 'Заголовок', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Описание', ['class' => 'col-form-label']) }}
                            {{ Form::text('description', isset($item->description) ? $item->description  : 'Описание', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('price', 'Цена', ['class' => 'col-form-label']) }}
                            {{ Form::text('price', isset($item->price) ? $item->price  : 'Цена', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <img src="{{ $item->getFirstMediaUrl('posters', 'thumb') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                {{ Form::label('image', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                {!! Form::file('image', ['class' => 'custom-file-input']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
