@extends('layouts.app')

@section('content')
    <div id="wrapper">
        @include('layouts.admin.menu')
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>  Дополнительная комплектация
                        <h4 class="c-grey-900 mB-20"><a href="{{ route('additions.create') }}"
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
                                    <th>Изображение</th>
                                    <th  style="text-align: center">Действия</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($additions as $addition)
                                    <tr>
                                        <th>{{ $addition->id }}</th>
                                        <td>{{ $addition->title }}</td>
                                        <td>
                                        @if($addition->type == 'tableTopColor')
                                            {{ 'Цвет столещницы' }}
                                            @elseif($addition->type == 'baseColor')
                                            {{ 'Цвет цоколя МДФ' }}
                                            @else
                                            {{ 'Цвет карниза кухни' }}
                                        @endif
                                        </td>
                                        <td>{{ $addition->kitchenModel->title }}</td>
                                        <td><img src="{{ $addition->getFirstMediaUrl('posters', 'thumb') }}"></td>
                                        <td style="text-align: center">
                                            <a href="{{ route('additions.edit',$addition->id) }}"
                                               class="badge badge-primary">Редактировать</a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['additions.destroy', $addition->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
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
