@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1">Crear salon</div>
        <div class="p-2"><a href="{{ route('bokings') }}">Atras</a></div>
    </div>
</div>

<div class="card-body">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$seats)
    <form action="{{ route('seat.store') }}" method="post">
        @include('seat._form')
    </form>
    @else
        <div class="alert alert-success" role="alert">
            Butacas creadas
        </div>
        <form action="{{ route('seat.destroy', $seats) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Desea eliminar el salon de butacas?')">Eliminar salon de butacas</button>
        </form>
    @endif
</div>
@endsection
