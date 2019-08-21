@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-header">Добавление кухни</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/dashboard', 'id' => 'kitchen', 'method' => 'post', 'files'=>true]) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
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
