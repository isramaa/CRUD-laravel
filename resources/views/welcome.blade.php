{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - TecnoFuture y Libelu_mx</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.bg-gray {
            background-color: #070C06;
            color: white; /* Cambia el color del texto para mayor legibilidad */
        }

        .navbar {
            background-color: #070C06;
        }

        .navbar-brand img {
            border-radius: 50%;
        }

        .navbar-nav {
            margin: auto;
        }

        .container {
            background-color: #070C06; 
        }

        .footer {
            background-color: #070C06;
            color: #070C06; 
        }


        .footer .text-uppercase {
            color: #070C06; 
        }
    </style>
</head>
<body class="bg-gray">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/libelu_mx.jpg') }}" width="70" height="70" class="d-inline-block align-top" alt="Libelu_mx Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home" style="color: #ceceb2;">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #ceceb2;">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/productos" style="color: #ceceb2;">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clientes" style="color: #ceceb2;">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pedidos" style="color: #ceceb2;">Pedidos</a>
                </li>
            </ul>
            @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                {{--     <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: #ceceb2;"
                                        >
                                        Dashboard
                                    </a> --}}
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        style="color: #ceceb2;"
                                        >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            style="color: #ceceb2;"
                                            >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif


        </div>
    </nav>

    <!-- Banner / Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/libelu1.jpeg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenidos a TecnoFuture</h5>
                    <p>Desarrollamos el futuro de la tecnología.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/libelu2.jpeg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nuestros Servicios</h5>
                    <p>Soluciones innovadoras para tu empresa.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/libelu3.jpeg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Libelu_mx</h5>
                    <p>Transformando ideas en realidades.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Content Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Sobre TecnoFuture</h2>
                <p>TecnoFuture es una empresa líder en desarrollo tecnológico, dedicada a proporcionar soluciones innovadoras y personalizadas a nuestros clientes.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <h3>Nuestros Valores</h3>
                <p>Innovación, compromiso y excelencia son los pilares fundamentales que guían nuestras acciones y decisiones.</p>
            </div>
            <div class="col-md-4">
                <h3>Nuestro Equipo</h3>
                <p>Contamos con un equipo de profesionales altamente calificados y apasionados por la tecnología.</p>
            </div>
            <div class="col-md-4">
                <h3>Nuestros Clientes</h3>
                <p>Nos enorgullece colaborar con empresas como Libelu_mx, transformando sus ideas en realidades tangibles.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-#070C06 text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">TecnoFuture</h5>
                    <p>Desarrollando el futuro de la tecnología hoy.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contacto</h5>
                    <p>Correo: info@tecnofuture.com</p>
                    <p>Teléfono: +123 456 7890</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-#070C06">
            © 2024 TecnoFuture
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>