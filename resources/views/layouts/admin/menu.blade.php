<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Кухни</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('param_kitchens.index') }}">
            <i class="fas fa-fw  fa-align-center"></i>
            <span>Параметры кухни</span>
        </a>
    </li>
{{--    <li class="nav-item dropdown">--}}
{{--        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--            <i class="fas fa-fw fas fa-chart-line"></i>--}}
{{--            <span>Типы конфигурации</span>--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--            <a class="dropdown-item" href="{{ route('type-color.index') }}">Тип цвета</a>--}}
{{--            <a class="dropdown-item" href="{{ route('type-facade.index') }}">Тип фасада</a>--}}
{{--        </div>--}}
{{--    </li>--}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('colors.index') }}">
            <i class="fas fa-fw far fa-palette"></i>
            <span>Цвета</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('additions.index') }}">
            <i class="fas fa-fw fa-plus"></i>
            <span>Дополнительная комплектация</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('parameters.index') }}">
            <i class="fas fa-fw far fa-pencil-ruler"></i>
            <span>Параметры модулей</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('items.index') }}">
            <i class="fas fa-fw far fa-square"></i>
            <span>Шкафы</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('param_items.index',1) }}">
            <i class="fas fa-fw fa-external-link-alt"></i>
            <span>Параметры шкафа</span>
        </a>
    </li>

</ul>
