@extends('layouts.app')

@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Параметры кухни
                        <h4 class="c-grey-900 mB-20"><a href="{{ route('param_kitchens.create') }}"
                                                        class="badge badge-success">Добавить</a></h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Кухня</th>
                                    <th>Глубина вверха</th>
                                    <th>Глубина низа</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Кухня</th>
                                    <th>Глубина вверха</th>
                                    <th>Глубина низа</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($params as $param)
                                    <tr>
                                        <th>{{ $param->id }}</th>
                                        <td>{{ $param->kitchenModel->title }}</td>
                                        <td>{{ $param->depth_top }}</td>
                                        <td>{{ $param->depth_bottom }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('param_kitchens.edit',$param->id) }}"
                                               class="badge badge-primary">Редактировать</a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['param_kitchens.destroy', $param->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                            {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
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
        </div>
    </div>
@endsection
