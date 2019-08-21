@extends('layouts.app')

@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Параметры
                        <h4 class="c-grey-900 mB-20"><a href="{{ route('parameters.create') }}"
                                                        class="badge badge-success">Добавить</a></h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Кухня</th>
                                    <th>Тип модуля</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Кухня</th>
                                    <th>Тип модуля</th>
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($parameters as $parameter)
                                    <tr>
                                        <th>{{ $parameter->id }}</th>
                                        <td>{{ $parameter->title }}</td>
                                        <td>
                                            @if($parameter->type == 'corner')
                                                {{ 'Угловой' }}
                                            @elseif($parameter->type == 'standard')
                                                {{ 'Тумба' }}
                                            @else
                                                {{ 'Высокий шкаф' }}
                                            @endif
                                        </td>
                                        <td>{{ $parameter->kitchenModel->title }}</td>
                                        <td>{{ $parameter->typeModules->title }}</td>
                                        <td><img src="{{ $parameter->getFirstMediaUrl('posters', 'thumb') }}"></td>
                                        <td style="text-align: center">
                                            <a href="{{ route('parameters.edit',$parameter->id) }}"
                                               class="badge badge-primary">Редактировать</a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['parameters.destroy', $parameter->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
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
