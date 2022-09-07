@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1"><h5>Socios</h5></div>
        <div class="p-2"><a href="{{ route('partner.create')}}">Crear Socios</a></div>
        <div class="p-2"><a href="{{ route('bokings') }}">Atras</a></div>
    </div>
</div>
<div class="card-body">
    <ul class="list-group list-group-flush">
        @foreach($partners as $partner)
        <li class="list-group-item">

            <div class="d-flex">
                <div class="p-2 flex-grow-1">
                {{ $partner->dni }} -
                {{ strtoupper($partner->name) }}
                {{ strtoupper($partner->surnames) }}
                </div>
                <div class="p-2"><a class="btn btn-light" href="{{ route('partner.edit', $partner)}}">Editar</a></div>
                <div class="p-2">
                    <form action="{{ route('partner.destroy', $partner) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Desea eliminar este socio?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach


    </ul>
</div>
@endsection
