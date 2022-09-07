@extends('template.template')
@section('content')
<div class="card-header">
    <div class="d-flex">
        <div class="p-2 flex-grow-1">Crear Socios</div>
        <div class="p-2"><a href="{{ route('partners') }}">Atras</a></div>
    </div>
</div>
<div class="card-body">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('partner.store') }}" method="post">
        @include('partner._form')
    </form>
</div>
@endsection
