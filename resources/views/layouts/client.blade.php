<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tứ Diệp Thảo website</title>
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">

    @yield('css')

</head>

<body>
    @include('clients.blocks.header')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <aside>
                        @section('sidebar')

                        @endsection
                        @include('clients.blocks.sidebar');
                    </aside>
                </div>
                <div class="col-8">

                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>


        </div>
    </main>
    @include('clients.blocks.footer');
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>

    @yield('js')

    @stack('scripts');

</body>

</html>