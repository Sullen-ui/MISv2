@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>{{ $patient['name'] }} ({{ $patient['old'] }})</h2>
            </div>
            <div class="col-md-5">
                <div class="container-block container-information_patient">
                    <div class="mb-1"><b>Дата рождения: </b>{{ $patient['dob'] }}</div>
                    <div class="mb-1"><b>Пол: </b>{{ $patient['gender'] }}</div>
                    <div class="mb-1"><b>Социальное положение: </b>{{ $patient['soc_status'] }}</div>
                    <div class="mb-1"><b>Инвалидность: </b>{{ $patient['invalid'] }}</div>
                    <div class="mb-1"><b>Место работы: </b>{{ $patient['work_place'] }}</div>
                    <div class="mb-1"><b>Полис: </b>{{ $patient['polis_num'] }}</div>
                    <div class="mb-1"><b>Тип полиса: </b>{{ $patient['polis_type'] }}</div>
                    <div class="mb-1"><b>Страховая компания: </b>{{ $patient['polis_comp'] }}</div>
                    <div class="mb-1"><b>Паспорт серия: </b>{{ $patient['pasport_serial'] }}</div>
                    <div class="mb-1"><b>Паспорт номер: </b>{{ $patient['pasport_num'] }}</div>
                    <div class="mb-1"><b>Кем выдан: </b>{{ $patient['pasport_who'] }}</div>
                    <div class="mb-1"><b>Когда выдан: </b>{{ $patient['pasport_date'] }}</div>
                    <div class="mb-1"><b>Место рождения: </b>{{ $patient['dob_place'] }}</div>
                    <div class="mb-1"><b>Регистрация: </b>{{ $patient['registration'] }}</div>
                    <div class="mb-1"><b>Териториальная принадлежность: </b>{{ $patient['resident'] }}</div>
                    <div class="mb-1"><b>Снилс: </b>{{ $patient['snils'] }}</div>
                    <div class="mb-3"><b>Телефон: </b>{{ $patient['phone'] }}</div>
                    <button id="button-edit_patient" class="red">Редактировать информацию</button>
                </div>
            </div>

            <!-- @if(\App\Http\Controllers\UserController::RoleCheck('0,1')) -->
            <div class="col-md-7">
            <div class="container-block" >
                <div class="row mb-3"><div class="col-md-9"><h4>Амбулаторная карта</h4></div> <div class="col-md-3"><button id="addPost" class="red">Добавить запись</button></div></div>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2 font-link"></div>
                        </div>
                    <div id="post-container">
                        @foreach($emhs as $emh)
                            <div class="row post-item" data-id="{{ $emh['id'] }}">
                                <div class="col-md-5">{{ $emh['name'] }}</div>
                                <div class="col-md-5">{{ $emh['doctor']['name'] . " (" . $emh['doctor']['prof_name'] . ")" }}</div>
                                <div class="col-md-2">{{ $emh['create_date'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- @endif -->
        </div>
    </div>
@endsection
