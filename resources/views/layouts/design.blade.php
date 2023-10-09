<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	@stack('js')
</head>
<body>
    <!-- As a link -->
   @include('layouts.header')
   <div style="margin:30px"></div>
    <div class="container">
        <!-- iklan 1 -->
        <div>
            <img align="center" alt="I'm an image" border="0" class="center" src="https://s0.2mdn.net/simgad/4185297073760667077" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%;  display: block;" title="I'm an image" >
        </div>
        <!-- end iklan 1 -->
        {{-- <div >
            <img align="center" alt="I'm an image" border="0" class="center fixedwidth" src="https://drive.google.com/uc?export=view&id=1ur2TmerErAUhbWqBUfB1qoCBbnbKIcFQ" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%;  display: block;" title="I'm an image" width="352">
        </div> --}}
        <div class="row">
            <div class="col-sm-12" style="">
                {{-- <img align="center" alt="I'm an image" border="0" class="center fixedwidth" src="https://drive.google.com/uc?export=view&id=1ur2TmerErAUhbWqBUfB1qoCBbnbKIcFQ" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%;  display: block;" title="I'm an image" width="352"> --}}
                {{-- carousel --}}
                @yield('jumbotron')
                {{-- size picture 1.440x700px --}}
                
                {{-- //carousel --}}
            </div>
        </div>
        @yield('middlebar')
        <!-- iklan 2 -->
       @yield('iklan2')
        <!-- end iklan 2 -->
        <!-- content -->
        @yield('content')
        @yield('mbuh')
        <!-- end content -->
    </div>
    <footer class="bg-light bs-docs-section" style="padding: 20px;">
        <div class="container" align="center">
            <h3>Promo SMG Production</h3>
            <h6>Jl. Siliwangi No.23</h6>
            <p>Telp: 089678971119</p>
        </div>
    </footer>
    @stack('posting')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>