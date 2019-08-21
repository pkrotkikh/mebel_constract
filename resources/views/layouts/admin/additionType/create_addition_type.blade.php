@extends('layouts.app')
@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>{{ Html::ul($errors->all()) }}</h4>
                        <div class="card-header">Добавление нового типа комплектации</div>
                        <div class="card">
                            {{ Html::ul($errors->all()) }}
                            {{ Form::open(['url' => route('kitchen.additionType.create',['id'=>$kitchen->id]), 'files' => true, 'method' => 'post']) }}

                            <div class="form-group" style="margin: 1rem">
                                {{ Form::label('title', 'Название типа', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
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
