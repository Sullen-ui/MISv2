@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="hospital-reg-modal" class="menu-button">
                <a href="#">
                    <div>Регистрация пациента</div>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div id="hospital-reg-modal" class="menu-button">
                <a href="{{ route('patientBase') }}">
                    <div>База пациентов</div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
