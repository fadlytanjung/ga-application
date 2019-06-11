<div class="form-row" style="margin-top:70px">
                    
                       
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