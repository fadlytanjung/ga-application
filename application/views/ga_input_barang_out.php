<a href="<?=base_url()?>dashboard/penempatan"><button type="button" class="btn btn-primary" 
             style="position:absolute;left:10px;top:10px;">
             Kembali
            </button></a>
            <h2 class='margin0 text-center'>Input Barang Keluar</h2>
            <div class="wrap-dashboard p-l-55 p-r-55 p-b-54 row p-t-20">
                <div class='col-md-3'></div>
                <div class='col-md-6'>
                <form id='idStok' method="POST">
                    <div class="form-row">                        
                        <label >Tanggal</label>
                            <div class='input-group' id='tanggal' data-target-input="nearest">
                                <input type="text" class="activeInputStok form-control datetimepicker-input no-bor" 
                                data-target="#tanggal" name='stok[tanggal_keluar]' placeholder="Tanggal" />
                                <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                                    <div class='input-group-addon'><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                                   
                    </div>
                    <div class="form-group">
                        <label >Rak</label>
                        <select class="activeInputStok form-control" name='stok[stok_rak_id]' >
                            <?php foreach($barang as $br){?>
                            <option value='<?=$br['stok_rak_id'];?>'>
                                <?=$br['id_rak'].' (Kode Barang : '.$br['id_barang'].' )';?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Jumlah</label>
                        <input type="number" name='stok[jumlah]' class="activeInputStok form-control no-bor" placeholder="Jumlah">
                    </div>
                    
                    <div class="float-right">                    
                        <a href="<?=base_url()?>dashboard" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>

            </div>