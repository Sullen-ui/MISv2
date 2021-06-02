@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-5">
                <select id="section" name="section" required="">
                    <option disabled="">Отделение</option>
                    @foreach($sections as $section)
                        <option value="{{ $section['id'] }}" {{ ($section['id'] == Auth::user()->section_id)?"selected":"" }}>{{ $section['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row cart-head">
            <div class="col-md-2 br"><div class="cart-head_item">Номер истории болезни</div></div>
            <div class="col-md-2 br"><div class="cart-head_item">Дата госп.</div></div>
            <div class="col-md-2 br"><div class="cart-head_item">Палата.</div></div>
            <div class="col-md-4 br"><div class="cart-head_item">ФИО</div></div>
        </div>
    </div>
    <div class="container" id="doctorContent">

    </div>
@endsection
