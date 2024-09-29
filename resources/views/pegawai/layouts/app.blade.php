<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Dashboard/img/SIDIKA.png') }}">
    
    {{-- Cdn Js --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Inknut+Antiqua:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    {{-- Public --}}
    <link rel="stylesheet" href="{{ asset('assets/Dashboard/css/style.css') }}">

</head>

<body>
    @include('pegawai.layouts.partials.navbar')
    @yield('content')
    @include('pegawai.layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/Dashboard/js/form-perjadin.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
        });

        $(function() {
            $("#provinsi").on("change", function() {
                let id_provinsi = $("#provinsi").val();

                console.log(id_provinsi);
                $.ajax({
                    type: "POST",
                    url: "{{ route('getkota') }}",
                    data: {
                        id_provinsi: id_provinsi,
                    },
                    cache: false,

                    success: function(msg) {
                        $("#kota").html(msg);
                    },
                    error: function(data) {
                        console.log("Error:", data);
                    },
                });
            });
        });
    </script>

</html>
