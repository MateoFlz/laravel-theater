@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1">Sistema de reserva</div>
        <div class="p-2"><a href="{{ route('partners') }}">Socio</a></div>
        <div class="p-2"><a href="{{ route('seat.create') }}">Butacas</a></div>
    </div>

</div>
<div class="card-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('partner.index') }}" method="get">
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="dni" checked>
                            <label class="form-check-label" for="inlineRadio1">Dni</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="name">
                            <label class="form-check-label" for="inlineRadio2">Nombre</label>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="search" placeholder="Buscar socio por dni" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
            @if (session()->has('partner'))
            <div class="card">
                <div class="card-header">
                    <div class="mb-3 row">
                        <label for="dni" class="col-sm-1 col-form-label"><strong>Dni: </strong></label>
                        <div class="col-sm-11">
                        <input type="text" class="form-control" id="dni" value="{{ session('partner')->dni }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-1 col-form-label"><strong>Nombre: </strong></label>
                        <div class="col-sm-11">
                        <input type="text" readonly class="form-control" value="{{ session('partner')->name }} {{ session('partner')->surnames }}">
                        </div>
                    </div>
                    <form action="{{ route('boking.store') }}" method="post">
                        @method('post')
                        @csrf
                        <input type="hidden" name="partner_id" value="{{ session('partner')->id }}">
                        <input type="hidden" name="state" value="1">
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-1 col-form-label"><strong>Fecha: </strong></label>
                            <div class="col-sm-11">
                            <input type="date" class="form-control " name="date" value="{{ date('Y-m-d') }}">
                        </div>
                        @if (session()->has('seat'))
                            @if (count(session('seat')) > 0)
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Realizar reserva</button>
                            </div>
                            @endif
                        @endif
                    </form>

                </div>
                <div class="card-body">
                @if (session()->has('seat'))
                <div class="d-flex flex-wrap" role="group" aria-label="Basic example">
                   @foreach(session('seat') as $value)
                   <form action="{{ route('boking.delete', $value['id_seat']) }}" method="get">
                        <button class="btn btn-secondary  btn-sm p-1 m-1 fs-6" role='button'>{{ $value['position'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                              </svg>
                        </button>
                   </form>
                   @endforeach
                </div>
                @endif
                </div>
            </div>
            @endif

            @if (session()->has('errors'))
            <div class="alert alert-danger alert-dismissible m-2" role="alert">
                {{ session('errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        </div>
    </div>
    <div class="d-flex flex-wrap">
        @foreach($seats as $seat)
            <a href=" {{ route('boking.save', $seat) }}" class="badge bg-secondary p-4 m-3 fs-3" role='button' type="submit">{{ $seat->position_x }}-{{ $seat->position_y }}</a>
        @endforeach
    </div>
</div>
@endsection
