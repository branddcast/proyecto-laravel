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
                		<div class="card-body">	
                			<div class="row justify-content-center mb-4">
                				<div class="col-md-3 text-center">
                					<img src="src/user.png" width="80%" style="border-radius: 360px; background: #0E0031FF">
                				</div>
                			</div>
                			<div class="row justify-content-center">
                                <div class="col-md-6">
                					@include('flash::message')
                				</div>
                			</div>
                			<div class="row justify-content-center">
                				<div class="col-md-4 text-right">
                					Nombre: 
                				</div>
                				<div class="col-md-4">
                					<span><b>{!! Auth::user()->nombre !!}</b></span>
                				</div>
                			</div>
                			<div class="row justify-content-center">
                				<div class="col-md-4 text-right">
                					Apellido(s):
                				</div>
                				<div class="col-md-4">
                					<span><b>{!! Auth::user()->ap_paterno !!} {!! Auth::user()->ap_materno !!}</b></span>
                				</div>
                			</div>
                			<div class="row justify-content-center">
                				<div class="col-md-4 text-right">
                					Correo Electrónico:
                				</div>
                				<div class="col-md-4">
                					<span><b>{!! Auth::user()->email !!}</b></span>
                				</div>
                			</div>
                			<div class="row justify-content-center mt-4">
                				<div class="col-md-4 text-center">
                					<a class="btn btn-info" href="{{ route('edit', Auth::user()->id) }}">Modificar</a>
                				</div>
                			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection