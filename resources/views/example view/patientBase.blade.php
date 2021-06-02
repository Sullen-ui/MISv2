@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <form action="{{ route('patientBase') }}">
                    <div class="row justify-content-center">
                        <div class="col-md-6"><input type="text" id="search" name="search" value="{{ old('search') }}" placeholder="ФИО или Полис"></div>
                        <div class="col-md-4"><button type="submit" id="search-button" class="blue">Поиск</button></div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="container-base">
                    @if($patients->count() > 0)
                        @foreach($patients as $patient)
                            <div class="row hover">
                                <div class="col-md-7"><div class="base-item">{{ $patient['name'] }}</div></div>
                                <div class="col-md-3"><div class="base-item">{{ $patient['born_date'] }}</div></div>
                                <div class="col-md-2"><div class="base-item font-link"><a href="{{ route('patient', ["id"=>$patient['id']]) }}"><i class="fas fa-eye"></i></a></div></div>
                            </div>
                        @endforeach
                        {{ $patients->links() }}
                    @else
                        <div class="col-md-12"><div class="base-item center">Ничего не найдено</div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
