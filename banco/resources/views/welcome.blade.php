<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Banco de Guatemala</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background-color: #fff;
                color: #000;
                line-height: 1.5;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .flex {
                display: flex;
            }

            .items-center {
                align-items: center;
            }

            .justify-center {
                justify-content: center;
            }

            .rounded-md {
                border-radius: 0.375rem;
            }

            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .text-xl {
                font-size: 1.25rem; /* Original size */
            }

            .text-2xl { /* New class for larger text */
                font-size: 2rem; /* Larger size */
            }

            .font-semibold {
                font-weight: 600;
            }

            .h-12 {
                height: 3rem;
            }

            .w-auto {
                width: auto;
            }

            .min-h-screen {
                min-height: 100vh;
            }

            .header-container {
                width: 100%;
                padding: 1rem 0;
                border-bottom: 1px solid #eaeaea;
            }

            .nav-links {
                display: flex;
                gap: 1rem;
            }

            .centered-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: calc(100vh - 62px); /* Adjust height to exclude header */
            }

            .logo-title {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="bg-white text-black">
            <div class="header-container">
                <div class="flex justify-center items-center max-w-4xl mx-auto px-6">
                    <nav class="nav-links">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2">Inicio de Sesión</a>
                           
                        @endauth
                    </nav>
                </div>
            </div>
            <div class="centered-container">
                <div class="logo-title">
                    <img src="{{ asset('images/logoBanco.jpg') }}" alt="Logo del Banco de Guatemala" class="logo">

                    <h1 class="text-2xl font-semibold">Banco de Guatemala</h1>
                </div>
            </div>
        </div>
    </body>
</html>
