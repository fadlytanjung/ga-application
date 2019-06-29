<div class="limiter">
		<div class="container-login100" >
        <a href="<?=base_url()?>dashboard"><button type="button" class="btn btn-primary" 
             style="position:absolute;left:10px;top:10px;">
             Kembali
            </button></a>
        <div class='col-md-8'>
            <h3 class='text-center p-b-20'>Barang Belum Ditempatkan</h3>
            <a href="<?=base_url('dashboard/input_barang_create')?>" class="btn btn-primary">Input Stok</a>
            <!-- <a href="<?=base_url()?>dashboard/input_barang_out" class="btn btn-success" >Input Barang Keluar</a> -->
            <?php if($stok_barang){ ?>
                <a href="<?=base_url('dashboard/generate_lokasi_penyimpanan')?>" class="btn btn-warning">Generate Lokasi Penyimpanan</a>
            <?php } ?>
            <br><br>
            <table id="stokbarang" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Barang</th>
                        <th scope="col" >Id Rak</th>
                        <th scope="col" >Tanggal Masuk</th>
                        <th scope="col" >Jam</th>
                        <th scope="col" >Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;foreach($stok_barang as $row){?>
                        <tr>
                            <td><?=$no+=1;?></td>
                            <td><?=$row['id_barang'];?></td>
                            <td ><?php if($row['id_rak']==""){echo"Not Set";}?></td>
                            <td ><?=$row['tanggal_masuk'];?></td>
                            <td ><?=$row['jam'];?></td>
                            <td ><?=$row['total'];?> dus</td>
                            <td >
                                <!-- <button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#edit-data-stok" 
                                    data-id_stok="<?=$row['id_stok'];?>"
                                    data-id_barang="<?=$row['id_barang'];?>"
                                    data-tanggal_masuk="<?=$row['tanggal_masuk'];?>"
                                    data-jam="<?=$row['jam'];?>"
                                    data-jumlah="<?=$row['jumlah'];?>"
                                ><i class="fa fa-edit"></i></button> -->
                                <button type="button" 
                                    class="btn btn-danger"
                                    onclick="delete_data('<?=$row['id_stok'];?>','stok')"
                                    >
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
            
            
            <div class='col-md-8'>
            <h3 class='text-center p-b-20'>Penempatan Barang </h3>
           
            <table id="stokbarang" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Barang</th>
                        <th scope="col" >Id Rak</th>
                        <th scope="col" >Tanggal Masuk</th>
                        <th scope="col" >Jam</th>
                        <th scope="col" >Jumlah</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;foreach($penempatan as $row){?>
                        <tr>
                            <td><?=$no+=1;?></td>
                            <td><?=$row['id_barang'];?></td>
                            <td ><?php if($row['id_rak']==""){
                                echo"Not Set";
                                }else{
                                    echo $row['id_rak'];
                                }?></td>
                            <td ><?=$row['tanggal_masuk'];?></td>
                            <td ><?=$row['jam'];?></td>
                            <td ><?=$row['total'];?> dus</td>
                           
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>

            </div>
		</div>
	</div>