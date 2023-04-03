
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
            
            {{-- <div class="col-md-5 text-left">
                <div class="form-group">
                    <img class="rounded" alt="200x200" id="fotoimage" width="100%" src="{{ asset('images/default-user.png') }}" data-holder-rendered="true">
                </div>
                <input type="hidden" name="resetfoto" id="valueresetfoto">
            </div>
            <div class="col-md-7 text-left">
                <div class="form-group">
                    <input type="file" class="form-control" name="foto" id="foto" accept=".jpg, .png, .jpeg" style="display:none">
                    <button id="uploadfoto" type="button" class="btn btn-sm btn-secondary btn-block" style="margin-bottom:10px">Ambil Foto</button>
                    <button id="resetfoto" type="button" class="btn btn-sm btn-danger btn-block" >Reset Image</button>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Nama :</label>
                    <input type="text" name="nama" id="product_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Jenis Kelamin :</label>
                    <select class="form-control" name="jenis_kelamin" id="categories_id" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Tujuan :</label>
                    <textarea type="text" name="tujuan_kunjungan" id="product_description" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama" class="control-label">Asal/Instansi :</label>
                    <input type="text" name="instansi" id="product_name" class="form-control" required>
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
                        <input class="form-control" data-toggle="flatpickr" id="filter_date" name="tanggal_kunjungan" value="{{ empty(Request::get('date')) ? date('Y-m-d',strtotime('now')) : Request::get('date')  }}">

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
                    <textarea type="text" name="catatan" id="product_description" class="form-control"></textarea>
                </div>
            </div>
        </div>

            <input type="hidden" id="method">
            <input type="hidden" id="id">
            <input type="hidden" id="isbid">

