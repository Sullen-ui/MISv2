@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('patient', ["id"=>$cart->patient->id]) }}">Назад</a>
                <h3>{{ $cart->patient->name }} ({{ $cart->patient->born_date }} {{ $cart->patient->old }}) карта №: {{ $cart->cart_id }}</h3>
                <p>{{ ($cart->cart_type == 1)?"Дата поступления":"Карта от" }}: {{ $cart->create_date }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">Записи</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Услуги</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
                    <div class="container-block">
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <h4>Записи врача</h4>
                            </div>
                            <div class="col-md-3">
                                <button id="addPost" class="red">Добавить запись</button>
                            </div>
                        </div>
                        <div id="post-container">
                            @if($cart['posts'] && $cart['posts']->count() != 0)
                                @foreach($cart['posts'] as $post)
                                    <div class="row post-item" data-id="{{ $post->id }}">
                                        <div class="col-md-9">{{ $post->post_name }}</div>
                                        <div class="col-md-3 center">{{ $post->create_date }}</div>
                                    </div>
                                @endforeach
                            @else
                                Нет записей
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                    <div class="container-block">
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <h4>Назначенные услуги</h4>
                            </div>
                            <div class="col-md-3">
                                <button class="red">Добавить услугу</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
