<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
	<div class="limiter">
		
		<div class="container-login100">
			<a href="<?=base_url()?>">
				<button class="btn btn-danger" style='position:absolute;right:10px;top:10px;'>
					Logout
				</button>
			</a>
            <h1>Pilih menu</h1>
            <div class="wrap-dashboard p-l-55 p-r-55 p-b-54 row">
                
				<div class="col text-center">
					<a href="<?=base_url()?>dashboard/input_barang">
                    <button class="btn dark-color btn-rounded">
                        <img src="<?=base_url()?>assets/images/icons/002-order.png" width="60%" /><br>
                        <span>Input Produk</span>
					</button>
					</a>
                </div>
                <div class="col text-center">
					<a href="<?=base_url()?>dashboard/input_rak">
                    <button class="btn medium-color btn-rounded">
                        <img src="<?=base_url()?>assets/images/icons/003-stock.png" width="60%" /><br> 
						Input Zona Rak</button>
					</a>
                </div>
                <div class="col text-center">
                        <a href="<?=base_url()?>dashboard/penempatan">
							<button class="btn heavy-color btn-rounded">
                                <img src="<?=base_url()?>assets/images/icons/001-forklift.png" width="60%" /><br> 
							Lihat Penempatan <br>Barang</button>
						</a>
                    </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>