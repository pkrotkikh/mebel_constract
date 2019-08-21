@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">Редактирование цвета</div>
                    <div class="card-header">

                        {{ Html::ul($errors->all()) }}
                        {{ Form::model($color, array('route' => array('colors.update', $color->id),'files'=>true, 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('kitchen_model_id', 'Кухня') }}
                            {{ Form::select('kitchen_model_id', $kitchens, old($color->kitchen_model_id), ['class' => 'form-control' ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('type', 'Тип') }}
                            {{Form::select('type', array(
                                'body_color' => 'Цвет корпуса',
                                'kitchen_facade' => 'Цвет фасада')
                            , old($color->type)
                            ,['class' => 'form-control']
                            )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('title', 'Название', ['class' => 'col-form-label']) }}
                            {{ Form::text('title', isset($color->title) ? $color->title  : 'Заголовок', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <img src="{{ $color->getFirstMediaUrl('posters', 'thumb') }}">
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
