@extends('layout.app')

@section('title')
Dashboard
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row callout callout-info">
            <h1>Dashboard</h1>
        </div>
    </div>
</section>

<section class="content">
    @if(auth()->user()->role == 'admin')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-user-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Guru</span>
                    <span class="info-box-number">
                        {{ $guru }}
                    </span>
                </div>

            </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-chalkboard"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Kelas</span>
                    <span class="info-box-number">
                        {{ $kelas }}
                    </span>
                </div>

            </div>

        </div>


        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fas fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Mapel</span>
                    <span class="info-box-number">
                        {{ $mapel }}
                    </span>
                </div>

            </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fas fa-user-graduate"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Data Siswa</span>
                    <span class="info-box-number">
                        {{ $siswa }}
                    </span>
                </div>

            </div>

        </div>

    </div>
    @endif

    @if(auth()->user()->role == 'siswa')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-primary">
                    {{ !empty(auth()->user()->name) ? (auth()->user()->name) : '' }}
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($find_siswa as $item)
                        <tr>
                            <td>{{$item->mapel->nama}}</td>
                            <td>{{$item->kelas->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection