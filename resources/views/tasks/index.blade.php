@extends('tasks.layouts')

@section('content')
    <div class="container py-4">
        <main>
            <h2 class="display-4 text-center mb-4">Gestión de Tareas</h2>
            <div class="d-flex justify-content-between mb-4">
                <a href="/tasks/create" class="btn btn-success">Añadir Nueva Tarea</a>
                <form class="form-inline" action="/tasks/search" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="query">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Lista de Tareas</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Prioridad</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr class="{{ $task->completed ? 'table-success' : '' }}">
                                        <th scope="row">{{ $task->id }}</th>
                                        <td><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></td>
                                        <td>{{ $task->description }}</td>
                                        <td
                                            class="text-center"
                                            style="color:
                                            @if (optional($task->priority)->id == 1) red
                                            @elseif (optional($task->priority)->id == 2)
                                                orange
                                            @elseif (optional($task->priority)->id == 3)
                                                green @endif">
                                            {{ optional($task->priority)->name }}
                                        </td>
                                        <td>{{ optional($task->user)->name }}</td>
                                        <td>
                                            @if ($task->completed)
                                                <span class="badge bg-success">Completada</span>
                                            @else
                                                <form action="/tasks/{{ $task->id }}/complete" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-success btn-sm">Completar</button>
                                                </form>
                                            @endif
                                            <a href="/tasks/{{ $task->id }}/edit" class="btn btn-outline-warning btn-sm">Editar</a>
                                            <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
