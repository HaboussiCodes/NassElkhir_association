<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        label{
            display: flex;
        }
    
        .card-header,.forum {
            display: flex;
        }
        input[type=checkbox]{
          
    margin-left: 7px;
}

</style>
    @livewireStyles
    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js'
    ])
    @stack('inline-scripts')
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="d-flex flex-column vh-100">
    @include('layouts/nav')

    <div class="container flex-grow-1">
       
        
    @if (session('message'))
    <div class="text-center alert alert-success">
        {{ session('message') }}
    </div>
@endif
     
          @yield('content')
          @yield('form')
          @yield('edit')
           
            
          
        
        
    </>
    
       
    @livewireScripts
</body>
</html>