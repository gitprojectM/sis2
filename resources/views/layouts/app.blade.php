<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 20%;
    height:300px;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 80%;
    border-left: none;
    height: 300px;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GNHSsis') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href=" {{ asset('../vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('../vendor/metisMenu/metisMenu.min.css ') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=" {{ asset('../dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css {{ asset('../vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" {{ asset('../vendor/font-awesome/css/font-awesome.min.csscss/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              
                <div>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;     <img height="60" width="60" src="/img/LOGO2.jpg" alt=""></div><h2>Online Student Information System of Gosi National High School</h2>&nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;           
            </div>

        </nav>

                    

        <main class=" container-fluid row">
                     <div class="col-2"   >
                     <ul class="nav navbar-nav ">
                         @auth
                            <li > <a class="nav-link" href="/home/">dashbord</a></li>
                            <li > <a class="nav-link" href="/students/">Student</a></li>
                            <li > <a class="nav-link" href="/teachers/">Teacher</a></li>
                            <li > <a class="nav-link" href="">Grades</a></li>
                            <li > <a class="nav-link" href="">Attendance</a></li>
                            <li > <a class="nav-link" href="">Teacher</a></li>
                            <li > <a class="nav-link" href="/schoolyears/">School Year</a></li>
                         
 
                         @endauth
                       </ul>
                    </div>
            @yield('content')
           
        </main>
    </div>
   
    
</body>
</html>
