
        <div class="row">
            <div class="col-md-12">
                <label for="fotoimage" class="control-label">Foto :</label>
                <div id="my_camera"></div>
            </div>
            

            <br>
            <div class="col-md-7 text-left">
{{-- <input type="button" value="Capture" onclick="take_snapshot()"> --}}
            <input type="button" value="Capture" onclick="take_snapshot()" class="btn btn-sm btn-secondary btn-block" style="margin-bottom:4px">
            <input type="button" value="Reset" onclick="reset_camera()" class="btn btn-sm btn-danger btn-block" style="margin-bottom:10px">
            <input type="hidden" name="foto_tamu" class="image-tag">
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Nama :</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Jenis Kelamin :</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Tujuan :</label>
                    <textarea type="text" name="tujuan_kunjungan" id="tujuan_kunjungan" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Asal/Instansi :</label>
                    <input type="text" name="instansi" id="instansi" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="category" class="control-label">Kategori :</label>
                    <select class="form-control" name="category_id" id="categories_id" required>
                        @foreach ($categories as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="base" class="control-label">Tanggal Kunjungan :</label>
                        <input class="form-control" data-toggle="flatpickr" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ empty(Request::get('date')) ? date('Y-m-d',strtotime('now')) : Request::get('date')  }}">

                    </div>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    <label for="final" class="control-label">Final Price :</label>
                    <input type="text" name="final_price" id="final_price" class="form-control rupiah" required>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Catatan :</label>
                    <textarea type="text" name="catatan" id="catatan" class="form-control"></textarea>
                </div>
            </div>
        </div>

            <input type="hidden" id="method">
            <input type="hidden" id="id">
            <input type="hidden" id="isbid">

