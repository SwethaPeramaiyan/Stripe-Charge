<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .btn-primary {
                background-color: #5d3496fa;
                border-color: #5d3496fa
            }
            .btn-primary:hover {
                color: #5d3496fa;
                background-color: #fff;
                border-color: #5d3496fa
            }
            .text-primary {
                color: #5d3496fa !important;            
            }
            .btn-outline-primary {
                background-color: #5d3496fa;
                color: #fff;
                border-color: #fff
            }
            .btn-outline-primary:hover {
                color: #5d3496fa;
                background-color: #fff;
                border-color: #5d3496fa;
            }
            .bg-primary {
                background-color: #5d3496fa!important;
            }
        </style>
    </head>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">                
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    </UL>
                @else 
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('products') }}">Products</a>
                        </li>                    
                    </ul>   
                    <form class="d-flex" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">   
                        @csrf             
                        <a class="navbar-brand text-white" href="#">{{ Auth::user()->name }}</a>
                        <a class="btn btn-outline-primary" type="submit" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="-1" aria-disabled="true">Logout</a>
                    </form>
                @endguest             
            </div>            
        </div>
    </nav>

