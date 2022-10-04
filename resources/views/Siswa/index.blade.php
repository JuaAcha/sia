@extends('layout.app')

@section('title')
Siswa
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Siswa</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
            <div class="card-tools">
                </button>
                <button type="button" onclick="addForm('{{route('siswa.store')}}')" class="btn btn-tool">
                <div class="btn btn-sm btn-primary shadow-sm rounded-pill" style="width: 95px;">
                    <i class="fas fa-plus"></i>
                </div>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </thead>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{ ! empty($item->mapel->nama) ?  $item->mapel->nama : '' }}</td>
                    <td>{{ ! empty($item->kelas->nama) ?  $item->kelas->nama : '' }}</td>
                    <td>
                        <!-- <button onclick="editData()" class="btn btn-flat btn-xs btn-warning"><i
                                class="fa fa-edit"></i></button>
                        <a href="#" class="btn btn-flat btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                    </td>
                </tr>
                @endforeach
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</section>
@includeIf('siswa.form')

@endsection

@push('script')
<script>
        // Data Tables
        let table;
        $(function() {
            table = $('.table').DataTable({
                proccesing: true,
                autowidth: false,
                ajax: {
                    url: '{{ route('siswa.data') }}'
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'nama'},
                    {data: 'jenis_kelamin'},
                    {data: 'alamat'},
                    {data: 'kelas_id'},
                    {data: 'mapel_id'},
                    {data: 'action'}
                ]
            });
        })
        $('#modalForm').on('submit', function(e){
            if(! e.preventDefault()){
                $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                    table.ajax.reload();
                    iziToast.success({
                        title: 'Sukses',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    })
                })
                .fail((errors) => {
                    iziToast.error({
                        title: 'Gagal',
                        message: 'Data gagal disimpan',
                        position: 'topRight'
                    })
                    return;
                })
            }
        })
        function addForm(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data Siswa');

            // $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }
        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data Siswa');

            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');
            
            $.get (url)
                .done((response) => {
                    $('#modalForm [name=nama]').val(response.nama);
                    $('#modalForm [name=alamat]').val(response.alamat);
                    $('#modalForm [name=jenis_kelamin]').val(response.jenis_kelamin);
                    $('#modalForm [name=kelas_id]').val(response.kelas_id);
                    $('#modalForm [name=mapel_id]').val(response.mapel_id);
                    // console.log(response.nama);
                })
                .fail((errors) => {
                    alert('Tidak Dapat Menampilkan Data');
                    return;
                })
        }
        function deleteData(url){
            swal({
                title: "Apa anda yakin menghapus data ini?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan file ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.post(url, {
                    '_token' : $('[name=csrf-token]').attr('content'),
                    '_method' : 'delete'
                })
                .done((response) => {
                    swal({
                    title: "Sukses",
                    text: "Data berhasil dihapus!",
                    icon: "success",
                    });
                })
                .fail((errors) => {
                    swal({
                    title: "Gagal",
                    text: "Data gagal dihapus!",
                    icon: "error",
                    });
                })
                table.ajax.reload();
                }
            });
        }
    </script>
@endpush