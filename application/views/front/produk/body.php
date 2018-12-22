<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="#">Produk</a></li>
					<li class="breadcrumb-item active"><?php echo $produk->judul_produk ?></li>
			  </ol>
			</nav>
    </div>
		<!-- Kolom kiri -->
		<div class="col-lg-9">
      <h1><?php echo $produk->judul_produk ?></h1><hr>
			<div class="row">
			  <div class="col-sm-5" align="center">
		    	<?php
		      if(empty($produk->foto)) {echo "<img class='img-thumbnail' src='".base_url()."assets/images/no_image_thumb.png' width='400' height='400'>";}
		      else
					{
						echo "
						<a href='".base_url()."assets/images/produk/".$produk->foto.$produk->foto_type."'>
						<img data-action='zoom' class='img-thumbnail' src='".base_url()."assets/images/produk/".$produk->foto.'_thumb'.$produk->foto_type."' title='$produk->judul_produk' alt='$produk->judul_produk' width='400' height='400'>
						</a>";}
		      ?>
					<br>
				</div>
				<div class="col-sm-7"><p><h4>Spesifikasi Produk</h4></p><hr>
					<p>Berat: <?php echo $produk->berat ?> kg</p>
					<p>Harga: Rp <strike><b>Rp <?php echo number_format($produk->harga_normal) ?></b></strike> | <b>Rp <?php echo number_format($produk->harga_diskon) ?></b> <font style="font-size:15px"><span class="badge badge-pill badge-primary"><?php echo $produk->diskon ?>% OFF</span></font></p>
          <p>Stok: <?php if($produk->stok > 0){echo "<font style='font-size:15px'><span class='badge badge-pill badge-success'>Tersedia</span></font>";}else{echo "<font style='font-size:15px'><span class='badge badge-pill badge-primary'>Kosong</span></font>";} ?></p>
					<p>Kategori:
						<a href="<?php echo base_url('kategori/read/').$produk->slug_kat ?>">
							<?php echo $produk->judul_kategori ?>
						</a> /
						<a href="<?php echo base_url('kategori/read/').$produk->slug_kat."/".$produk->slug_subkat ?>">
							<?php echo $produk->judul_subkategori ?>
						</a> /
						<a href="<?php echo base_url('kategori/read/').$produk->slug_kat."/".$produk->slug_subkat."/".$produk->slug_supersubkat ?>">
							<?php echo $produk->judul_supersubkategori ?>
						</a>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12"><hr><h4>Deskripsi Produk</h4><hr>
					<p><?php echo $produk->deskripsi ?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12"><hr><h4>PRODUK LAINNYA</h4><hr>
					<div class="row">
					  <?php foreach($produk_lainnya as $lainnya){ ?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-4 col-xs-12">
								<div class="card mb-4 box-shadow">
						      <a href="<?php echo base_url("produk/$lainnya->slug_produk ") ?>">
						        <?php
						        if(empty($lainnya->foto)) {echo "<img class='card-img-top' src='".base_url()."assets/images/no_image_thumb.png'>";}
						        else { echo " <img class='card-img-top' src='".base_url()."assets/images/produk/".$lainnya->foto.'_thumb'.$lainnya->foto_type."'> ";}
						        ?>
						      </a>
									<div class="card-body">
						        <a href="<?php echo base_url("produk/$lainnya->slug_produk ") ?>">
						          <p class="card-text"><b><?php echo character_limiter($lainnya->judul_produk,50) ?></b></p>
						        </a>
						        <br>
						        <p align="center">
						          <strike><b>Rp <?php echo number_format($lainnya->harga_normal) ?></b></strike><br>
						          <b>Rp <?php echo number_format($lainnya->harga_diskon) ?></b> <font style="font-size:15px"><span class="badge badge-pill badge-primary"><?php echo $lainnya->diskon ?>% OFF</span></font>
						        </p>
						        <p align="center">
						          <a href="<?php echo base_url('cart/buy/').$lainnya->id_produk ?>">
						            <button class="btn btn btn-info"><i class="fa fa-shopping-cart"></i> Beli</button>
						          </a>
						          <a href="<?php echo base_url('produk/').$lainnya->slug_produk ?>">
						            <button class="btn btn btn-danger"><i class="fa fa-eye"></i> Detail</button>
						          </a>
						        </p>
						      </div>
						    </div>
					    </div>
					  <?php } ?>
					</div>
				</div>
			</div>

		</div>

		<!-- Kolom kanan -->
		<?php $this->load->view('front/sidebar'); ?>

		<script src="<?php echo base_url('assets/plugins/zooming/build/zooming.min.js') ?>"></script>
		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a979c495d0b9500130f346b&product=sticky-share-buttons"></script>

<?php $this->load->view('front/footer'); ?>
