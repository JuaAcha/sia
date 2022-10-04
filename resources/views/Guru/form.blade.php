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
                    <div class="form-group">
                        
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>

                    <div class="my-1">
                        <label class="mb-2" for="floatingTextarea">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror"  id="floatingTextarea" name="alamat" placeholder="Alamat"></textarea>
                        @error('alamat')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis-kelamin">Jenis_kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control">
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-Laki</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mapel">mapel</label>
                        <select name="mapel_id" id="mapel_id" class="form-control">
                            @foreach($mapel as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select></div>

                    <button type="submit" class="btn btn-success btn-flat btn-sm">Save</button>
                </form>

            </div>

        </div>

    </div>

</div>