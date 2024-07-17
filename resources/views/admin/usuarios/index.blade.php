@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Pagina de usuarios</li>
                </ol>
            </div>
        </div>

        <br>

        <div class="row card card-outline card-primary">
            <div class="card-header">
                <h1 class="card-title">Lista de usuarios</h1>

                <div class="card-tools">
                    <a href="{{ url('admin/usuarios/create') }}" class="btn btn-primary">
                        <i class="bi bi-person-fill-add"></i>
                        Nuevo Usuario
                    </a>
                </div>
            </div>

        </div>

        <div class="row-md-12">
            <!-- Datatables -->
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead">
                    <tr>
                        <th>Nro</th>
                        <th>Nombres y apellidos</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador = 0;
                    ?>
                    @foreach ($usuarios as $usuario)
                    <?php 
                        $contador = $contador + 1; 
                        $id = $usuario->id;
                    ?>
                        <tr>
                            <td><?php echo $contador; ?></td>

                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>

                            <td style="text-align: center;">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a type="button" class="btn btn-info"
                                        href="{{ route('usuarios.show', $usuario->id) }}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a type="button" class="btn btn-success"
                                        href="{{ route('usuarios.edit', $usuario->id) }}">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>

                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" onclick="preguntar<?=$id;?>(event)" method="post" 
                                        method="post" id="miformulario<?=$id;?>">

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                    <script>
                                        function preguntar<?= $id;?>(event) {
                                            event.preventDefault();
                                            
                                            swal.fire({
                                                title: 'Eliminar registro',
                                                text: '¿Desea eliminar este registro?',
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonText: 'Eliminar',
                                                confirmButtonColor: '#a5161d',
                                                cancelButtonText: 'Cancelar',
                                                cancelButtonColor: '#270a0a'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    var form = $('#miformulario<?=$id;?>');
                                                    form.submit();
                                                } 
                                            });
                                        }
                                    </script>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Datatables Idioma Español-->
            <script>
                $(function() {
                    $("#example1").DataTable({
                        "pageLenght": 10,
                        "language": {
                            "semptyTable": "No hay informacion.",
                            "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ Usuarios",
                            "sInfoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                            "sInfoFiltered": "(filtrado de _MAX_ total Usuarios)",
                            "sInfoPostFix": "",
                            "thousands": ",",
                            "sLengthMenu": "Mostrar _MENU_ Usuarios",
                            "sLoadingRecords": "Cargando...",
                            "sProcessing": "Procesando...",
                            "sSearch": "Buscar:",
                            "sZeroRecords": "No se encontraron resultados",

                            "paginate": {
                                "sFirst": "Primero",
                                "sLast": "Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            }
                        },

                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": false,
                        buttons: [{
                                text: 'Reportes',
                                extend: 'collection',
                                orientation: 'landscape',

                                buttons: [{
                                    text: 'Copiar',
                                    extend: 'copy'
                                }, {
                                    extend: 'pdf'
                                }, {
                                    extend: 'csv'
                                }, {
                                    extend: 'excel'
                                }, {
                                    Text: 'Imprimir',
                                    extend: 'print'
                                }],
                            },
                            {
                                extend: 'colvis',
                                text: 'Visor de columnas',
                                collectionLayout: 'fidex three-column'
                            }
                        ],
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                })
            </script>
        </div>
    </div>
@endsection
