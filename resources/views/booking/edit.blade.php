@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1">Editar reserva</div>
        <div class="p-2"><a href="{{ route('boking.index') }}">atras</a></div>
    </div>

</div>
<div class="card-body">
    <div class="card">
        <div class="card-body">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($booking->partner)
            <div class="card">
                <div class="card-header">
                    <div class="mb-3 row">
                        <label for="dni" class="col-sm-1 col-form-label"><strong>Dni: </strong></label>
                        <div class="col-sm-11">
                        <input type="text" class="form-control" id="dni" value="{{ $booking->partner->dni }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-1 col-form-label"><strong>Nombre: </strong></label>
                        <div class="col-sm-11">
                        <input type="text" readonly class="form-control" value="{{ $booking->partner->name }} {{ $booking->partner->surnames }}">
                        </div>
                    </div>
                    <form action="{{ route('boking.update', $booking) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="partner_id" value="{{ $booking->partner->id }}">
                        <input type="hidden" name="state" value="1">
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-1 col-form-label"><strong>Fecha: </strong></label>
                            <div class="col-sm-11">
                                <input type="date" class="form-control " name="date" min="{{ date('Y-m-d') }}" value="{{ $booking->date }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-1 col-form-label"><strong>Estado: </strong></label>
                            <div class="col-sm-11">
                                <select class="form-select" name="state" aria-label="Default select example">
                                    <option value="1"
                                    @if ($booking->state == '1')
                                    selected
                                    @endif>Activa</option>
                                    <option value="2"
                                    @if ($booking->state == '2')
                                    selected
                                    @endif>Cancelada</option>
                                  </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Editar reserva</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                @if ($booking->seat)
                <div class="d-flex flex-wrap" role="group" aria-label="Basic example">
                   @foreach($booking->seat as $value)
                   <form action="{{ route('bokingseat.destroy', [$value->pivot->booking_id, $value->pivot->seat_id ]) }}" method="get">
                        <button class="btn btn-secondary  btn-sm p-1 m-1 fs-6" type="submit" role='button'>{{ $value->position_x . '-' . $value->position_y }}
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
            <a href=" {{ route('bokingseat.save', [$booking, $seat]) }}" class="badge bg-secondary p-4 m-3 fs-3" role='button' type="submit">{{ $seat->position_x }}-{{ $seat->position_y }}</a>
        @endforeach
    </div>
</div>
@endsection
