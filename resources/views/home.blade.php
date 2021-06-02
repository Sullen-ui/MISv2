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
                    <a href="{{ route('Timetable') }}">
                        <div>Запись пациента на прием</div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('Timetable') }}">
                        <div>Регистрация пациента в системе</div>
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
        @if(\App\Http\Controllers\UserController::RoleCheck('0'))
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('Admin') }}">
                        Админ панель
                    </a>
                </div>
            </div>
            @endif
            
            <div class="col-md-3">
                <div class="menu-button">
                    <a href="{{ route('BasePatient') }}">
                        База пациентов
                    </a>
                </div>
            </div>
            
        </div>
    </div>
  

    
@endsection
