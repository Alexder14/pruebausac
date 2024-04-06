{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Banco de Guatemala') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Saludar al usuario por su nombre --}}
                    @auth
                        <h4>{{ __('Bienvenido, :name', ['name' => Auth::user()->name]) }}</h4>
                    @endauth

                    {{-- Resto del contenido de tu página --}}
                    <p>Acciones disponibles:</p>
                    <ul>
                        <li>Creación de cuentas de ahorros</li>
                        <li>Transacciones (Retiros o Depósitos)</li>
                        <li>Consulta de saldo de cuenta</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection