@csrf
<div class="row">
    <div class="col-md-5">
        <label for="dni" class="form-label">Posicion X</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-position_x">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
                    <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                </svg>
            </span>
            <input type="number" name="position_x" pattern="^[1-9]\d*$" class="form-control" value="{{ old('position_x', $seat->position_x) }}" placeholder="Posicion X" aria-label="position_x" aria-describedby="basic-position_x">
        </div>
        @error('position_x')
        <p class=" fw-light text-danger mb-0">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="col-md-5">
        <label for="dni" class="form-label">Posicion Y</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-position_y">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
                    <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                </svg>
            </span>
            <input type="number" name="position_y" pattern="^[1-9]\d*$" class="form-control" value="{{ old('position_y', $seat->position_y) }}" placeholder="Posicion Y" aria-label="position_y" aria-describedby="basic-position_y">
        </div>
        @error('position_y')
        <p class=" fw-light text-danger mb-0">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="col-md-2">
        <label for="dni" class="form-label"></label>
        <div class="input-group p-2">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </div>
</div>
