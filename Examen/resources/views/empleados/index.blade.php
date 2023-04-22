@extends('adminlte::page')

@section('title', 'listar')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="m-5 card">
                <div class="row card-header">
                    <div class="col">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Crear</a>
                    </div>
                    <div class="col d-flex justify-content-first">
                        <a href="{{ route('imprimir') }}" class="btn btn-danger float-right"> <i class="fas fa-file-pdf"></i>
                            Generar Reporte</a>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <!--Search form-->
                        <form action="{{ route('employees.index') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" placeholder="Buscar por nombre">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>


                <div class="card-body">
                    <table class="table table-striped-mt-2">
                        <thead style="background-color: #6777ef">
                            <th style="color: #fff">ID</th>
                            <th style="color: #fff">Cedula</th>
                            <th style="color: #fff">Nombre</th>
                            <th style="color: #fff">Correo</th>
                            <th style="color: #fff">Cargo</th>
                            <th style="color: #fff">Ciudad</th>
                            <th style="color: #fff">Salario</th>
                            <th style="color: #fff">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($employee as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->cedula }}</td>
                                    <td>{{ $employee->nombre }}</td>
                                    <td>{{ $employee->correo}}</td>
                                    <td>{{ $employee->cargo }}</td>
                                    <td>{{ $employee->ciudad }}</td>
                                    <td>{{ $employee->salario }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-warning">Editar</a>
                                                {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'DELETE']) !!}

                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('¿Esta seguro de eliminar este registro?')">Eliminar</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
