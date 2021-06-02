@extends('layouts.app')

@section('content')
    <div class="container menu">
        <div class="head-container">
            <h4 class="menu-head_text"><i class="fas fa-pen-square"></i> Модули регистрации</h4>
            <span class="menu-head_line"></span>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('registryPol') }}">
                        <div>Запись пациента на прием</div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('registryHospital') }}">
                        <div>Приемное отделение стационара</div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="https://profosm.ru" target="_blank">
                        <div>Профилактические осмотры</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container menu">
        <div class="head-container">
            <h4 class="menu-head_text"><i class="fas fa-user-cog"></i> Основной функционал</h4>
            <span class="menu-head_line"></span>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('doctor') }}">
                        Лечащий врач
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('patientBase') }}">
                        База пациентов
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container menu">
        <div class="head-container">
            <h4 class="menu-head_text"><i class="fas fa-cogs"></i> Дополнительный функционал</h4>
            <span class="menu-head_line"></span>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="/lis">
                        Печать направлений на анализы
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container menu">
        <div class="head-container">
            <h4 class="menu-head_text"><i class="fas fa-chart-bar"></i> Статистика</h4>
            <span class="menu-head_line"></span>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="/statistics">
                        Статистика по отделениям
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="https://dogovor.zdb-omsk.ru/" target="_blank">
                        Реестр договоров
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
