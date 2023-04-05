<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="{{ asset('css/bootstrap-datepicker.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
    <title>BukaLapo</title>
</head>
<body>
    @include('template.navbar')
    <section id="isi">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')

                    <script type="text/javascript">
                    $('.date').datepicker({
                        format: 'yyyy/mm/dd',
                        autoclose: 'true'
                    });
                    </script>
                </div>
            </div>
        </div>
    </section>
    @include('template.footer')
