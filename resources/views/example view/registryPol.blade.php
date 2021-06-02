@extends('layouts.app')

@section('content')

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <form id="general-form" class="general-form" action="">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-4 mb-2">
                                    <select name="section" id="section">
                                        <option disabled>Выберите отделение</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2"><input class="form__date center" type="text" id="datepicker" name="date" placeholder="Дата" autocomplete="off" readonly required></div>
                                <div class="col-md-4"><input id="send-button" class="send-button red" data-tooltip="" type="submit" value="Показать"></div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div id="content-section" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-wrapper mb-3" style="">
                    Специальность:
                    <select id="filter">
                        <option value="item">Все</option>
                    </select>

                </div>
                <div id="doc-list" class="doc-list">

                </div>
            </div>
        </div>
    </div>






@endsection
