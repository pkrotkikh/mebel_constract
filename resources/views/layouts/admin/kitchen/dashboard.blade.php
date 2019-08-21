@extends('layouts.app')

@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">

            {{ Html::ul($errors->all()) }}
            {{ Form::open(['url' => 'admin/dashboard/update_cupboard/', 'method' => 'post', 'files'=>true]) }}
            {{--{{ Form::hidden('configuration_id', $configuration->id,  ['class' => 'form-control' ]) }}--}}

            <div class="container-fluid">
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Конфигурации
                        <h4 class="c-grey-900 mB-20"><a href="{{ route('dashboard.create') }}"
                                                        class="badge badge-success">Добавить</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Изображение</th>
                                    <th style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($kitchens as $kitchen)
                                    <tr>
                                        <th>{{ $kitchen->id }}</th>
                                        <td>{{ $kitchen->title }}</td>
                                        <td><img src="{{ $kitchen->getFirstMediaUrl('posters', 'thumb') }}"></td>
                                        <td style="text-align: center">
                                            <a href="{{ route('dashboard.edit',$kitchen->id) }}"
                                               class="btn-true">Редактировать</a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['dashboard.destroy', $kitchen->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                            {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn-false']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        </div>
    </div>
@endsection
