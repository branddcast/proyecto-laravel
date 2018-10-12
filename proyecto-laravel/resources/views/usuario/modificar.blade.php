@extends('layouts.app')

@section('content')
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
                        <form method="post" action="{!! route('usuario.update') !!}">
                        @foreach( $usuario as $usuario)
                		<div class="card-body">	
                			<div class="row justify-content-center mb-4">
                				<div class="col-md-3 text-center">
                					<img src="../src/user.png" width="80%" style="border-radius: 360px; background: #0E0031FF">
                				</div>
                			</div>
                			<div class="row justify-content-center align-items-center">
                				<div class="col-md-4 text-right ">
                					<span>Nombre: </span>
                				</div>
                				<div class="col-md-4">
                					<input class="form-control" type="text" name="nombre" value="{!! $usuario->nombre !!}" >
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
                					<input class="form-control" type="text" name="email" value="{!! $usuario->email !!}">
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
			</div>
		</div>
	</div>
@endsection