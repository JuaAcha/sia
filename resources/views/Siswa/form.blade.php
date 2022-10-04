<div class="modal fade" id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <!--Add Nama-->
                    <div class="form-group">
                        <label class="mb-2" for="nama">Nama Siswa</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama')}}"
                            class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!--Add Jenis Kelamin-->
                    <div class="form-group">
                        <label for="nama">Jenis Kelamin</label>
                        <br>
                        <select name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin')}}"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            <option value="Laki-laki"> Laki-Laki</option>
                            <option value="Perempuan"> Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <!--Add Alamat-->
                    <div class="form-group">
                        <label for="floatingTextarea">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="floatingTextarea"
                            name="alamat" placeholder="Alamat"></textarea>
                        @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!--Add Kelas ID-->
                    <div class="form-group">
                        <label for="nama">Kelas</label>
                        <select name="kelas_id" id="kelas_id" value="{{ old('kelas_id')}}"
                            class="form-control @error('kelas_id') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($kelas_id as $kid)
                            <option value="{{$kid->id}}">{{$kid->nama}}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!--Add Mapel ID-->
                    <div class="form-group">
                        <label for="nama">Mapel</label>
                        <select name="mapel_id" id="mapel_id" value="{{ old('mapel_id')}}"
                            class="form-control @error('mapel_id') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($mapel_id as $mid)
                            <option value="{{$mid->id}}">{{$mid->nama}}</option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success btn-flat btn-sm">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    
</div>