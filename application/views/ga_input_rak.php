<div class="limiter">
		<div class="container-login100">
            <h1 class='margin0'>Masukkan Detail Rak</h1>
            <div class="wrap-dashboard p-l-55 p-r-55 p-b-54 row">
                <div class='col-md-3'></div>
                <div class='col-md-6'>
                    <form id='idRak'>
                        <div class="form-group">
                            <label >Id Rak</label>
                            <input type="text" class="activeInputRak form-control no-bor" name='id_rak' placeholder="Id Rak" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label >Panjang (cm)</label>
                                <input type="number" class="activeInputRak form-control no-bor" name='panjang' placeholder="Panjang" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label >Lebar (cm)</label>
                                <input type="number" class="activeInputRak form-control no-bor" name='lebar' placeholder="Lebar" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label >Tinggi (cm)</label>
                                <input type="number" class="activeInputRak form-control no-bor" name='tinggi' placeholder="Tinggi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Zona</label>
                            <select class="activeInputRak form-control"  name='zona' required>
                                <option value='FM' >FM (Fast Moving)</option>
                                <option value='SM'>SM (Slow Moving)</option>
                            </select>
                        </div>
                        <div class="float-right">
                            <a href="<?=base_url()?>dashboard" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>

			</div>
            <div class='col-md-8'>
            <h3 class='text-center p-b-20'>Data Rak</h3>
            <table id="rak" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Rak</th>
                        <th scope="col" >Panjang</th>
                        <th scope="col" >Lebar</th>
                        <th scope="col" >Tinggi</th>
                        <th scope="col" >Zona</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;foreach($rak as $row){?>
                        <tr>
                            <td><?=$no+=1;?></td>
                            <td><?=$row['id_rak'];?></td>
                            <td ><?=$row['panjang'];?> cm</td>
                            <td ><?=$row['lebar'];?> cm</td>
                            <td ><?=$row['tinggi'];?> cm</td>
                            <td ><?=$row['zona'];?></td>
                            <td >
                                <button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#edit-data-rak" 
                                    data-id_rak="<?=$row['id_rak'];?>"
                                    data-panjang="<?=$row['panjang'];?>"
                                    data-lebar="<?=$row['lebar'];?>"
                                    data-tinggi="<?=$row['tinggi'];?>"
                                    data-zona="<?=$row['zona'];?>"
                                ><i class="fa fa-edit"></i></button>
                                <button type="button" 
                                    class="btn btn-danger"
                                    onclick="delete_data('<?=$row['id_rak'];?>')"
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


<!-- Modal Update-->
<div class="modal fade" id="edit-data-rak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Rak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id='idFormUpdateRak'>
      <div class="modal-body">
        <div class="form-group">
            <label >Id Rak</label>
            <input type="text" id='id_rak' class="activeUpdateRak form-control no-bor" readonly name='id_rak' placeholder="Id Rak" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label >Panjang (cm)</label>
                <input type="number" id='panjang' class="activeUpdateRak form-control no-bor" name='panjang' placeholder="Panjang" required>
            </div>
            <div class="form-group col-md-4">
                <label >Lebar (cm)</label>
                <input type="number" id='lebar' class="activeUpdateRak form-control no-bor" name='lebar' placeholder="Lebar" required>
            </div>
            <div class="form-group col-md-4">
                <label >Tinggi (cm)</label>
                <input type="number" id='tinggi' class="activeUpdateRak form-control no-bor" name='tinggi' placeholder="Tinggi" required>
            </div>
        </div>
        <div class="form-group">
            <label >Zona</label>
            <select class="activeUpdateRak form-control" id='zona' name='zona' required>
                <option value='FM' >FM (Fast Moving)</option>
                <option value='SM'>SM (Slow Moving)</option>
            </select>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Update Rak</button>
      </div>
      </form>
    </div>
  </div>
</div>