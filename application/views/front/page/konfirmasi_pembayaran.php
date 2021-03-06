<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<div class="row">
    <div class="col-sm-12 col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
      	  <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
      	  <li class="active">Konfirmasi Pembayaran</li>
      	</ol>
      </nav>
    </div>
		<div class="col-sm-12 col-lg-9"><h1>Konfirmasi Pembayaran</h1><hr>
			<div class="row">
        <div class="col-lg-12">
          <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          <?php echo form_open('konfirmasi_kirim') ?>
            <div class="form-group has-feedback"><label>No. Invoice</label>
              <input type="text" name="invoice" class="form-control">
            </div>
            <div class="form-group has-feedback"><label>Nama Pengirim</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group has-feedback"><label>Jumlah</label>
              <input type="text" name="jumlah" class="form-control">
            </div>
            <div class="form-group has-feedback"><label>Bank Asal</label>
              <input type="text" name="bank_asal" class="form-control">
            </div>
            <div class="form-group has-feedback"><label>Bank Tujuan</label>
              <input type="text" name="bank_tujuan" class="form-control">
            </div>
            <button type="submit" name="button" class="btn btn-primary">Kirim</button>
          <?php echo form_close() ?>
        </div>
      </div>
		</div>

		<?php $this->load->view('front/sidebar'); ?>
	</div>

  <?php $this->load->view('front/footer'); ?>
