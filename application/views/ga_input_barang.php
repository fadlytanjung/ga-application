<div class="limiter">
		<div class="container-login100">
            

       
            <div class='col-md-8 p-t-50'>
            <h3 class='text-center p-b-20'>Data Barang</h3>
            <div class='float-left'>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" 
                        data-toggle="modal" data-target="#exampleModal">
                        Master Barang
                        </button>
                    </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" class='text-right'>Panjang</th>
                        <th scope="col" class='text-right'>Lebar</th>
                        <th scope="col" class='text-right'>Tinggi</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($barang as $row){?>
                        <tr>
                            <td><?=$row['id_barang'];?></td>
                            <td><?=$row['nama_barang'];?></td>
                            <td class='text-right'><?=$row['panjang'];?> cm</td>
                            <td class='text-right'><?=$row['lebar'];?> cm</td>
                            <td class='text-right'><?=$row['tinggi'];?> cm</td>
                            <td class='text-right'><?=$row['type'];?></td>
                            <td class='text-right'>
                                <button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#edit-data" 
                                    data-id="<?=$row['id_barang'];?>"
                                    data-nama="<?=$row['nama_barang'];?>"
                                    data-panjang="<?=$row['panjang'];?>"
                                    data-lebar="<?=$row['lebar'];?>"
                                    data-tinggi="<?=$row['tinggi'];?>"
                                    data-type="<?=$row['type'];?>"
                                ><i class="fa fa-edit"></i></button>
                                <button type="button" 
                                    class="btn btn-danger"
                                    onclick="delete_data('<?=$row['id_barang'];?>','barang')"
                                    >
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
		</div>
	</div>	

<!-- Modal Insert-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Master Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='idForm'>
      <div class="modal-body">
       
            <div class="form-group">
                <label >Id Barang</label>
                <input type="text" class="activeInput form-control no-bor" name='id_barang' placeholder="Id Barang" required>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="activeInput form-control no-bor" name='nama_barang' placeholder="Nama Barang" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label >Panjang (cm)</label>
                    <input type="number" class="activeInput form-control no-bor" name='panjang' placeholder="Panjang" required>
                </div>
                <div class="form-group col-md-4">
                    <label >Lebar (cm)</label>
                    <input type="number" class="activeInput form-control no-bor" name='lebar' placeholder="Lebar" required>
                </div>
                <div class="form-group col-md-4">
                    <label >Tinggi (cm)</label>
                    <input type="number" class="activeInput form-control no-bor" name='tinggi' placeholder="Tinggi" required>
                </div>
            </div>
            <div class="form-group">
                <label >Jenis</label>
                <select class="activeInput form-control"  name='type' required>
                    <option value='FM' >FM (Fast Moving)</option>
                    <option value='SM'>SM (Slow Moving)</option>
                </select>
            </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Barang</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update Stok-->
<div class="modal fade" id="edit-data-stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Stok Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='idFormUpdateStok'>
      <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label >Tanggal</label>
                <div class='input-group' id='tanggal_update' data-target-input="nearest">
                    <input type="text" id='id_stok' name='id_stok' class="activeUpdateStok form-control no-bor" 
                    hidden/>
                    <input type="text" class="activeUpdateStok form-control datetimepicker-input no-bor" 
                    id='tanggal_masuk' 
                    data-target="#tanggal_update" name='tanggal_masuk'
                    placeholder="Tanggal" />

                    <div class="input-group-append" data-target="#tanggal_update" data-toggle="datetimepicker">
                        <div class='input-group-addon'><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
            <label>Waktu</label>
                <div class='input-group date' id='waktu_update' data-target-input="nearest">
                    <input type="text" class="activeUpdateStok form-control datetimepicker-input no-bor" 
                    data-target="#waktu_update" name='jam' 
                    id="jam" 
                    placeholder="Waktu" />
                    <div class="input-group-append" data-target="#waktu_update" data-toggle="datetimepicker">
                        <div class='input-group-addon'><i class="fa fa-clock-o"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label >Barang</label>
            <select class="activeUpdateStok form-control" 
                id="id_barang" 
                name='id_barang' >
                <?php foreach($barang as $br){?>
                <option value='<?=$br['id_barang'];?>'>
                    <?=$br['nama_barang'];?>
                </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label >Stok</label>
            <input type="number" 
            id="jumlah" 
            name='jumlah' class="activeUpdateStok form-control no-bor" placeholder="Jumlah Stok">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Update Stok</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Master Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='idFormUpdate'>
      <div class="modal-body">
       
            <div class="form-group">
                <label >Id Barang</label>
                <input type="text" readonly class="activeUpdate form-control no-bor" id="id_barang" name='id_barang' placeholder="Id Barang" required>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="activeUpdate form-control no-bor" id="nama_barang" name='nama_barang' placeholder="Nama Barang" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label >Panjang (cm)</label>
                    <input type="text" class="activeUpdate form-control no-bor" id="panjang" name='panjang' placeholder="Panjang" required>
                </div>
                <div class="form-group col-md-4">
                    <label >Lebar (cm)</label>
                    <input type="text" class="activeUpdate form-control no-bor" id="lebar" name='lebar' placeholder="Lebar" required>
                </div>
                <div class="form-group col-md-4">
                    <label >Tinggi (cm)</label>
                    <input type="text" class="activeUpdate form-control no-bor" id="tinggi" name='tinggi' placeholder="Tinggi" required>
                </div>
            </div>
            <div class="form-group">
                <label >Jenis</label>
                <select class="activeUpdate form-control"  id="type" name='type' required>
                    <option value='FM' >FM (Fast Moving)</option>
                    <option value='SM'>SM (Slow Moving)</option>
                </select>
            </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Update Barang</button>
      </div>
      </form>
    </div>
  </div>
</div>
