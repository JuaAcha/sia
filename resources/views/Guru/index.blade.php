@extends('layout.app')

@section('title')
guru
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">guru</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data guru</h3>
            <div class="card-tools">
                </button>
                <button type="button" onclick="addForm('{{route('guru.store')}}')" class="btn btn-tool">
                <div class="btn btn-sm btn-primary shadow-sm rounded-pill" style="width: 95px;">
                    <i class="fas fa-plus"></i>
                </div>
                </button>
            </div>
        </div>
        <div class="card-body">
               
        
            <table class="table table-hover text-nowrap" style="width: 100%">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>jenis_kelamin</th>
                    <th>mapel_id</th>
                    <th>Aksi</th>
                </thead>
                @foreach ($guru as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{ ! empty($item->mapel->nama) ?  $item->mapel->nama : '' }}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
                <tbody>

                </tbody>
            </table>   
        </div>
    </div>

</section>
@includeIf('guru.form')

@endsection

@push('script')
<script>
    let table;
    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autowidth: false,
            ajax: {
                url: '{{ route('guru.data') }}'
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'alamat'
                },
                {
                    data: 'jenis_kelamin'
                },
                {   
                    data: 'mapel_id'
                },
                {
                    data: 'aksi'
                }
                
            ]
        });
    });
    $('#modalForm').on('submit', function (e) {
        if (!e.preventDefault()) {
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                    table.ajax.reload();
                    iziToast.success({
                    title: 'Sukses',
                    message: 'Data Berhasil Disimpan',
                    position: 'topRight',
                    })
                })
                .fail((errors) => {
                    iziToast.error({
                    title: 'Gagal',
                    message: 'Data Gagal Disimpan',
                    position: 'topRight',
                    })
                    return;
                })
        }
    })
    function addForm(url) {
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data guru');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
    }
    function editData(url) {
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data guru');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');
        $.get(url)
            .done((response) => {
                $('#modalForm [name=nama]').val(response.nama);
            })
            .fail((errors) => {
                alert('Cant Show Data');
                return;
            })
    }
    function deleteData(url) {
        swal({
                title: "Yakin ingin menghapus Data ini",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkan file ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete'
                        })
                        .done((response) => {
                            swal({
                                title: "Sukses",
                                text: "Data Berhasil Dihapus",
                                icon: "success",
                            });
                            return;
                        })
                        .fail((errors) => { 
                            swal({
                                title: "Gagal",
                                text: "Data Gagal Dihapus",
                                icon: "error",
                            });
                            return;
                        })
                    table.ajax.reload();
                    }
            });
        }
</script>
@endpush