<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- datatable -->
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('fonts/linearicons/style.css') }}">

    {{-- TinyMCE Textarea --}}
    <script src="https://cdn.tiny.cloud/1/5loyy67bxuvii8e1tuaml2l2p054mvbwptkjnw8hfjtm51wl/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- DATE-PICKER -->
    {{-- <link rel="stylesheet" href="{{ asset('vendor/date-picker/css/datepicker.min.css') }}"> --}}

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('highchartjs')
</head>

<body class="body">
    <div class="container pt-2">

        {{ $slot }}
        
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

    <script>
        tinymce.init({
            selector: '#textarea',
            plugins: 'advlist autolink lists link preview anchor',
            toolbar_mode: 'floating',
        });
    </script>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    @yield('highchartscript')

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>