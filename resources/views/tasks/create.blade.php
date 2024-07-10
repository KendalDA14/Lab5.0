@extends('tasks.layouts')

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Nueva Tarea</h2>
            </div>
            <div class="card-body">
                <form action="/tasks" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre de la Tarea</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Escribe el nombre de la tarea">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Describe la tarea"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="priority" class="form-label">Prioridad</label>
                        <select class="form-select" name="priority" id="priority">
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="user" class="form-label">Asignar a Usuario</label>
                        <select class="form-select" name="user" id="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Crear Tarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
