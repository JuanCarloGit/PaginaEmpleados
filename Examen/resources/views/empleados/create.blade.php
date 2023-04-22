@extends('adminlte::page')

@section('title', 'Registrar')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <object data="/img/category_create.svg" type="image/svg+xml"width="400px"
                                height="400px" style="margin-top: 30px; margin-left: 70px"></object>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Añadir Empleado</h1>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-dark" role="alert">
                                        <Strong>¡Revise los campos!</Strong>
                                        @foreach ($errors->all() as $error)
                                            <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                {{ Form::open(['route' => 'employees.store', 'method' => 'POST', 'files' => true]) }}
                                    <div class="form-group">
                                        {{ Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Correo']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Cargo']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::number('salario', null, ['class' => 'form-control', 'placeholder' => 'Salario', 'step' => '0.01']) }}
                                    </div>


                                    <div class="form-group">
                                        <center>
                                            <br>
                                        {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                                        </center>
                                    </div>
                                </center>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
