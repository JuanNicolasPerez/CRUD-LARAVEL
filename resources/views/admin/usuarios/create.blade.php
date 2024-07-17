@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Crear nuevo usuario</li>
                </ol>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Cargue los datos</h1>
                    </div>
        
                    <div class="card-body">
                        <form action="{{url('/admin/usuarios')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del usuario: </label>
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name" id="" required>
                                        @error('name')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Correo: </label>
                                        <input type="email" class="form-control" value="{{old('email')}}" name="email" id="" required>
                                        @error('email')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Contraseña: </label>
                                        <input type="password" class="form-control" name="password" id="" required>
                                        @error('password')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Repetir Contraseña: </label>
                                        <input type="password" class="form-control" name="password_confirmation" id="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-floppy2"></i>
                                            Guardar
                                        </button>
                                        <a href="{{url('/admin/usuarios')}}" class="btn btn-secondary">
                                            Cancelar
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection