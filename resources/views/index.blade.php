<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Users</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
    <?php
    $contador = 0;
    ?>
    <div class="w-100 d-flex flex-column">
        <header class="encabezado w-100 p-3">
            <h1 class="white text-center">Crud de usuarios</h1>
        </header>
        <div class="w-75 d-flex m-auto mt-3 mb-3 justify-content-center">
            <h1 class="text-center">Listado de usuarios</h1>
            <button type="button" class="btn btn-primary ms-2" id="btnAbrirModal">
                Añadir usuario
            </button>
            <a href="usuarios-registrados">
            <button class="btn btn-success ms-2 h-100">
                Reporte de registro
            </button>
            </a>
            <a href="http://localhost:8000/api/user/export">
                <button class="btn btn-secondary ms-2 h-100">Excel Usuarios</button>
            </a>
          
        </div>
      
        <table class="table ">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Acciones</th>
            </thead>
            <tbody>

            @if ($data)
                @foreach ($usuarios as $usuario )
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->password}}</td>
                        <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal{{$contador}}">
                                        Modificar 
                                    </button>
                                    
                                  
                                    <div class="modal" id="myModal{{$contador}}">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                    
                                          
                                            <div class="modal-header">
                                            <h4 class="modal-title">Modificar Informacion</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                    
                                 
                                            <div class="modal-body">
                                                <form class="w-75 m-auto" method="POST">
                                                    <div class="col-12">
                                                        <label for="">Id</label>
                                                        <input disabled  class="form-control" type="number" name="id_actualizar" id="id_actualizar" value="{{$usuario->id}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="">Name</label>
                                                        <input class="form-control"  type="text" name="name_actualizar" id="name_actualizar"  value="{{$usuario->name}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="">Email</label>
                                                        <input  class="form-control" type="email" name="email_actualizar" id="email_actualizar" value="{{$usuario->email}}">
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <label for="">Password</label>
                                                        <input  class="form-control" type="password" name="password_actualizar" id="password_actualizar" value="{{$usuario->password}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <button id="actualizar" class="btn btn-success" type="submit">Actualizar Información</button>
                                                    </div>
                                                </form>
                                            </div>
                                    
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                    
                                        </div>
                                        </div>
                                    </div>
                            
                        <button id="eliminar"  class="btn btn-danger eliminar-btn">Eliminar</button>
                        </td>
                    </tr>
                    <?php $contador ++;?>
                    @endforeach
            @else
            <tr>
             <p class="w-25 m-auto alert alert-danger text-center">No hay usuarios registrados</p>
            </tr>
           
            @endif
                 
            </tbody>
        </table>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Cabecera del modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Añadir usuario</h4>
                    <button type="button" class="close btn btn-danger" id="btnCierra"  data-dismiss="modal">&times;</button>
                    
                </div>
                
                <div class="modal-body">
                    <form method="POST" id="formulario_insert" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="nombre">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="mt-2 d-flex justify-content-center">
                        <button type="submit" id="enviar" class="btn btn-primary w-25">Enviar</button>
                    </div>
                    </form>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/registro_user.js') }}"></script>
<script src="{{ asset('js/actualizar_user.js') }}"></script>
<script src="{{ asset('js/eliminar_user.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


