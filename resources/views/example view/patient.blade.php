@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>{{ $patient['name'] }} ({{ $patient['old'] }})</h2>
            </div>
            <div class="col-md-5">
                <div class="container-block container-information_patient">
                    <div class="mb-1"><b>Дата рождения: </b>{{ $patient['born_date'] }}</div>
                    <div class="mb-1"><b>Пол: </b>{{ $patient['gender'] }}</div>
                    <div class="mb-1"><b>Социальное положение: </b>{{ $patient['social_text'] }}</div>
                    <div class="mb-1"><b>Инвалидность: </b>{{ $patient['type_disability_text'] }}</div>
                    <div class="mb-1"><b>Место работы: </b>{{ $patient['job'] }}</div>
                    <div class="mb-1"><b>Полис: </b>{{ $patient['policy_num'] }}</div>
                    <div class="mb-1"><b>Тип полиса: </b>{{ $patient['policy_type_text'] }}</div>
                    <div class="mb-1"><b>Страховая компания: </b>{{ $patient['policy_comp'] }}</div>
                    <div class="mb-1"><b>Паспорт серия: </b>{{ $patient['pasport_serial'] }}</div>
                    <div class="mb-1"><b>Паспорт номер: </b>{{ $patient['pasport_num'] }}</div>
                    <div class="mb-1"><b>Кем выдан: </b>{{ $patient['pasport_who'] }}</div>
                    <div class="mb-1"><b>Когда выдан: </b>{{ $patient['pasport_date'] }}</div>
                    <div class="mb-1"><b>Место рождения: </b>{{ $patient['born_addr'] }}</div>
                    <div class="mb-1"><b>Регистрация: </b>{{ $patient['registration'] }}</div>
                    <div class="mb-1"><b>Териториальная принадлежность: </b>{{ $patient['resident_text'] }}</div>
                    <div class="mb-1"><b>Снилс: </b>{{ $patient['snills'] }}</div>
                    <div class="mb-3"><b>Телефон: </b>{{ $patient['phone'] }}</div>
                    <button id="button-edit_patient" class="red">Редактировать информацию</button>
                </div>
            </div>
            <div class="col-md-7">
                <div class="container-block mb-3">
                    <h3>Активные карты</h3>
                    @foreach($patient['carts'] as $cart)
                        @if($cart['status'] == 1)
                            <div class="row">
                                <div class="col-md-10"><div>{{ ($cart['cart_type'] == 0)?"Амбулаторная":"Стационарная" }} карта № {{ ($cart['cart_id'])?$cart['cart_id']:$cart['id'] }} от {{ $cart['create_date'] }}</div></div>
                                <div class="col-md-2 font-link"><a href="{{ route('cart', ["id"=>$cart['id']]) }}"><i class="fas fa-notes-medical"></i></a></div>
                            </div>
                        @else
                            Нет активных карт
                        @endif
                    @endforeach
                </div>
                <div class="container-block">
                    <h3>Архивные карты</h3>
                    @foreach($patient['carts'] as $cart)
                        @if($cart['status'] == 0)
                            <div class="row">
                                <div class="col-md-10"><div>{{ ($cart['cart_type'] == 0)?"Амбулаторная":"Стационарная" }} карта № {{ ($cart['cart_id'])?$cart['cart_id']:$cart['id'] }} от {{ $cart['create_date'] }} по {{ $cart['discharge_date'] }}</div></div>
                                <div class="col-md-2 font-link"><a href=""><i class="fas fa-notes-medical"></i></a></div>
                            </div>
                        @else
                            Нет архивных карт
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
