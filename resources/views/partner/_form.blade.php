@csrf
<label for="dni" class="form-label">DNI</label>
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-dni">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
        </svg>
    </span>
    <input type="text" name="dni" class="form-control" value="{{ old('dni', $partner->dni) }}" placeholder="DNI" aria-label="DNI" aria-describedby="basic-dni">
</div>
@error('dni')
<p class=" fw-light text-danger mb-0">
    {{ $message }}
</p>
@enderror
<label for="name" class="form-label">Nombre</label>
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-name">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
        </svg>
    </span>
    <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name) }}" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-name">
</div>
@error('name')
<p class=" fw-light text-danger mb-0">
    {{ $message }}
</p>
@enderror
<label for="surnames" class="form-label">Apellidos</label>
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-surnames">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
        </svg>
    </span>
    <input type="text" name="surnames" class="form-control" value="{{ old('surnames', $partner->surnames) }}" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-surnames">
</div>
@error('surnames')
<p class=" fw-light text-danger mb-0">
    {{ $message }}
</p>
@enderror
<label for="date" class="form-label">Fecha de alta</label>
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-date">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
            <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
        </svg>
    </span>
    <input type="date" name="date" class="form-control" value="{{ old('date', $partner->date) }}" placeholder="Fecha de alta" aria-label="Fecha de alta" aria-describedby="basic-date">
</div>
@error('date')
<p class=" fw-light text-danger mb-0">
    {{ $message }}
</p>
@enderror
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>

