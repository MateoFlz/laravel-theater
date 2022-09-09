@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1"><h5>Reservas</h5></div>
        <div class="p-2"><a href="{{ route('bokings') }}">Atras</a></div>
    </div>
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        @foreach($bookings as $booking)
        <li class="list-group-item">

            <div class="d-flex">
                <div class="p-2 flex-grow-1">
                    {{ $loop->iteration }} -
                    {{ $booking->partner->name . ' ' . $booking->partner->surnames}} -
                    Fecha: [{{ $booking->date }}]

                    @foreach ($booking->seat as $item)
                    <button class="btn btn-secondary  btn-sm p-1 m-1 fs-6" role='button'>
                        {{ $item->position_x . ' - ' . $item->position_y}}
                    </button>
                    @endforeach
                </div>
                <div class="p-2"><a class="btn btn-light" href="{{ route('boking.edit', $booking)}}">Editar</a></div>
                <div class="p-2">
                    <form action="{{ route('boking.destroy', $booking) }}" method="get">
                        <button class="btn btn-danger" onclick="return confirm('Desea eliminar esta reserva?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach


    </ul>

</div>
@endsection
