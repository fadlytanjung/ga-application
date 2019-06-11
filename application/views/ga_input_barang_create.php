<h2 class='margin0'>Input Barang Stok</h2>
            <div class="wrap-dashboard p-l-55 p-r-55 p-b-54 row p-t-20">
                <div class='col-md-3'></div>
                <div class='col-md-6'>
                <form id='idStok' method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label >Tanggal</label>
                            <div class='input-group' id='tanggal' data-target-input="nearest">
                                <input type="text" class="activeInputStok form-control datetimepicker-input no-bor" 
                                data-target="#tanggal" name='stok[tanggal_masuk]' placeholder="Tanggal" />
                                <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                                    <div class='input-group-addon'><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Waktu</label>
                            <div class='input-group date' id='waktu' data-target-input="nearest">
                                <input type="text" class="activeInputStok form-control datetimepicker-input no-bor" 
                                data-target="#waktu" name='stok[jam]' placeholder="Waktu" />
                                <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                                    <div class='input-group-addon'><i class="fa fa-clock-o"></i></div>
                                    <style>
                                        .input-group-addon{
                                            padding:0.65rem 0.75rem !important;
                                            border-right: 1px solid rgba(0, 0, 0, 0.15) !important;
                                            border-left: none rgba(0, 0, 0, 0.15) !important;
                                            border-top-right-radius: 0.25rem !important;
                                            border-bottom-right-radius: 0.25rem !important;
                                            border-top-left-radius: 0rem !important;
                                            border-bottom-left-radius: 0rem !important;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Barang</label>
                        <select class="activeInputStok form-control" name='stok[id_barang][]' >
                            <?php foreach($barang as $br){?>
                            <option value='<?=$br['id_barang'];?>'>
                                <?=$br['nama_barang'];?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Stok</label>
                        <input type="number" name='stok[jumlah][]' class="activeInputStok form-control no-bor" placeholder="Jumlah Stok">
                    </div>
                    
                    <div id="ajax-form"></div>

                    <div class="float-right">
                        <a href="#" id="new-form" class="btn btn-info">+</a>
                        <a href="<?=base_url()?>dashboard" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                </div>

            </div>