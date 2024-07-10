@extends('tasks.layouts')

@section('content')
    <div class="container py-3">
        <h1 class="mb-4">Tarea #: {{ $task->id }}</h1>
        <hr>
        <h2 class="mb-4">Tarea: {{ $task->name }}</h2>
        <hr>
        <h2 class="mb-4">Descripción: {{ $task->description }}</h2>
        <hr>
        <h2 class="mb-4">Prioridad: {{ optional($task->priority)->name }}</h2>
        <hr>
        <h2 class="mb-4">Usuario: {{ optional($task->user)->name }}</h2>

        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-outline-primary me-2">Editar</a>
        <form action="/tasks/{{ $task->id }}/delete" method="POST" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection

