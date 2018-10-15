@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">

    console.log($('#nombre').val());
    console.log($('#email').val());

    window.addEventListener("keypress", function(event){
        if (event.keyCode == 13){
            event.preventDefault();
        }
    }, false);


    function validarNombre(){
        var nombre = document.getElementById('nombre');

        console.log(nombre.value);

        if(nombre.value == ""){
            alert("Campo vacío [nombre]. Es obligatorio.");
        }
    }

    function validarEmail(){
        var email  = document.getElementById('email');

        console.log(email.value);
        
        if(email.value == ""){
            alert("Campo vacío [email]. Es obligatorio.");
        }
    }


</script>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
                	<div class="card-header">
                		<div class="row">
                			<div class="col-md-4">
                				Información Personal
                			</div>
                		</div>
                	</div>
                        @foreach( $usuario as $usuario)
                        {!! Form::open(['url' => 'modificar/'.$usuario->id]) !!}
                                <input type="hidden" name="remember_token" value="{{csrf_token()}}">
                		<div class="card-body">	
                			<div class="row justify-content-center mb-4">
                				<div class="col-md-3 text-center">
                					<img src="../src/user.png" width="80%" style="border-radius: 360px; background: #0E0031FF">
                				</div>
                			</div>
                                        <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                        @include('flash::message')
                                                </div>
                                        </div>
                			<div class="row justify-content-center align-items-center">
                				<div class="col-md-4 text-right ">
                					<span>Nombre: </span>
                				</div>
                				<div class="col-md-4">
                					<input class="form-control" type="text" id="nombre" name="nombre" value="{!! $usuario->nombre !!}" onchange="javascript:validarNombre();" required>
                				</div>
                			</div>
                			<div class="row justify-content-center align-items-center mt-2">
                				<div class="col-md-4 text-right">
                					Apellido Paterno:
                				</div>
                				<div class="col-md-4">
                					<input class="form-control" type="text" name="ap_paterno" value="{!! $usuario->ap_paterno !!}">
                				</div>
                			</div>
                                        <div class="row justify-content-center align-items-center mt-2">
                                                <div class="col-md-4 text-right">
                                                        Apellido Materno:
                                                </div>
                                                <div class="col-md-4">
                                                        <input class="form-control" type="text" name="ap_materno" value="{!! $usuario->ap_materno !!}">
                                                </div>
                                        </div>
                			<div class="row justify-content-center align-items-center mt-2">
                				<div class="col-md-4 text-right">
                					Correo Electrónico:
                				</div>
                				<div class="col-md-4">
                					<input class="form-control" type="text" id="email" name="email" value="{!! $usuario->email !!}" onchange="javascript:validarEmail();" required>
                				</div>
                			</div>
                                        <div class="row justify-content-center align-items-center mt-2">
                                                <div class="col-md-4 text-right">
                                                        Contraseña Actual:
                                                </div>
                                                <div class="col-md-4">
                                                        <input class="form-control" type="password" name="actual_password">
                                                </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center mt-2">
                                                <div class="col-md-4 text-right">
                                                        Nueva Contraseña:
                                                </div>
                                                <div class="col-md-4">
                                                        <input class="form-control" type="password" name="nuevo_password">
                                                </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center mt-2">
                                                <div class="col-md-4 text-right">
                                                        Repetir Contraseña:
                                                </div>
                                                <div class="col-md-4">
                                                        <input class="form-control" type="password" name="repetir_password">
                                                </div>
                                        </div>
                			<div class="row justify-content-center mt-4">
                				<div class="col-md-4 text-center">
                					<input class="btn btn-warning" type="submit" value="Guardar">
                				</div>
                			</div>
						</div>
					</div>
				</div>
                        @endforeach
                        </form>
			</div>
		</div>
	</div>
@endsection