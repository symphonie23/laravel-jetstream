<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Task Application</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
        <!-- CKEditor JS -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <!-- JavaScript DROPDOWN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVpHTFQG4g2Qs8Wg5qlWvksdQRVAVPpXtkJbIxJhrip" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- CKEditor CSS -->

        <!--??????????-->
        <title>{{ config('app.name', 'Laravel') }}</title>
            <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow:hidden;
        }

        .table{
            width: 100%;
        }

        .table_header{
            display:flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
            border-radius: 5px;
            background-color: rgb(240, 240, 240);
        }

        .table_header p{
            color : #000000;
        }

        button {
            outline: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .add_new{
            padding: 10px 20px;
            color: #FFFFFF;
            background-color: green;
        }

        input {
            padding: 10px 20px;
            margin: 0;
            outline: none;
            border: 1px solid lightgreen;
            border-radius: 6px;
            color: green;
        }

        ::placeholder{
            color:darkgreen;
        }

        .table_section{
            height: 460px;
            overflow: auto;
        }

        table{
            width: 100%;
            table-layout: fixed;
            min-width: 1000px;
            border-collapse: collapse;
        }

        thead, th{
            position: sticky;
            top: 0;
            background-color: #D2D8DB;
            color: black;
            font-size: 15px;
        }

        th,td{
            border-bottom: 1px solid #DDDDDD;
            padding:10px 20px;
            word-break: break-all;
        }

        tr:hover td{
                color: #2AAA8A;
                background-color: #F6F9FC;
        }

        ::-webkit-scrollbar{
            height: 5px;
            width: 5px;
        }

        ::-webkit-scrollbar-track{
            box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        ::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        .container1 {
        display: flex;
        justify-content: center;
        }

        .page_404{ padding:40px 0;  font-family: 'Arvo', serif;
        }

        .page_404  img{ width:100%;}
        .four_zero_four_bg{
        }

        .four_zero_four_bg h1{
        font-size:80px;
        }

        .four_zero_four_bg h3{
        font-size:80px;
        }

        .link_404{
        color: #fff!important;
        padding: 10px 20px;
        background: #39AC31;
        margin: 20px 0;
        display: inline-block;}
        .contant_box_404{ margin-top:-50px;}

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 6px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown:hover .dropdown-content {display: block;
        }

        /* Style the dropdown button */
        .dropdown .btn {
        border: none;
        }
        
        .search-container {
            align-items: center;
            margin-bottom: 0.5rem;
            width: 25%;
            border: 1px solid #ccc;
            margin-left: auto;
            justify-content: flex-end;
        }

        .search-container .input-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem;
        }

        .search-container .input-group input {
            flex: 1;
            border: none;
        }

        .search-container .input-group button {
            border: none;
            background: transparent;
        }
        </style>
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <!-- Scripts -->
            
            <script>
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')
            myModal.addEventListener('shown.bs.modal', () => {
                myInput.focus()
            })

            function showLoginError() {
                alert("You must log in to proceed");
                return false; // Prevent the link from being followed
            }

            </script>
    </head>
            <body class="font-sans antialiased">
                <x-banner />

                <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-menu')

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>

                @stack('modals')

                @livewireScripts
            </body>
</html>