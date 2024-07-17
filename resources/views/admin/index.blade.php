@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Pagina Principal</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <h1>Pagina Principal</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        @php
                            $contador_de_usuario = 0;
                        @endphp
                        @foreach ($usuarios as $usuario)
                            @php
                                $contador_de_usuario++;
                            @endphp
                        @endforeach
                        <h3>{{$contador_de_usuario}}</h3>
                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                        Mas info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
