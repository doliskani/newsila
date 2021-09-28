<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="application-name" content="" />
    <link rel="icon" href="/img/logo.png">

    <!-- Site Name -->
    {!! SEO::generate(true) !!}

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="/css/app.css?v=4" />
    <link rel="stylesheet" href="/css/home.css?v=4" />
    <link rel="stylesheet" href="/css/input-transition.css?v=4" />
    <link rel="stylesheet" href="/css/new.css?v=4" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap" rel="stylesheet">


    <!--[if lt IE 10]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexibility/2.0.1/flexibility.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div  id="app">



         @include('Home.shares.header')

        <main>
            @yield('content')
        </main>

</div>



@include('Home.shares.scripts')

@yield('script')

</body>

</html>
