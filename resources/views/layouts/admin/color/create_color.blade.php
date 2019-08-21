@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.admin.menu')
        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>{{ Html::ul($errors->all()) }}</h4>
                        <div class="card-header">Добавление цвета</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => 'admin/colors', 'files' => true, 'id' => 'colors', 'method' => 'post']) }}
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('kitchen_model_id', 'Кухня') }}
                                {{ Form::select('kitchen_model_id', $kitchens, '', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('type', 'Тип') }}
                                {{Form::select('type', array(
                                    'body_color' => 'Цвет корпуса',
                                    'kitchen_facade' => 'Цвет фасада')
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
                                    {{ Form::label('title', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
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
