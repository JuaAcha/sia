<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- DataTable -->
        <link rel="stylesheet" href="{{asset('asset/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/datatable/buttons.bootstrap4.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- IziToast -->
        <link rel="stylesheet" href="{{asset('asset/iziToast/iziToast.min.css')}}">

    <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('layout.navbar')


        @include('layout.sidebar')

        <div class="content-wrapper">

            @yield('content')

            <!-- <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Blank Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        Start creating your amazing application!
                    </div>

                    <div class="card-footer">
                        Footer
                    </div>

                </div>

            </section> -->

        </div>

        @include('layout.footer')

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="{{asset('asset/js/jquery.min.js')}}"></script>

    <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('asset/js/adminlte.min.js')}}"></script>

    <!-- DataTable -->
    <script src="{{asset('/asset/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/asset/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/asset/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/asset/datatable/responsive.bootstrap4.min.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Izi Toast -->
    <script src="{{asset('/asset/iziToast/iziToast.min.js')}}"></script>


    @stack('script')

</body>

</html>
