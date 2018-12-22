<?php $this->load->view('back/meta') ?>
  <div class="wrapper">
    <?php $this->load->view('back/navbar') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><?php echo $title ?></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><?php echo $module ?></a></li>
					<li class="active"><?php echo $title ?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
						<div class="box box-primary">
              <div class="box-body">
								<?php echo validation_errors() ?>
								<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
								<?php echo form_open_multipart($action);?>
									<div class="form-group">
										<div class="form-line"><label>Judul Blog</label>
											<?php echo form_input($judul_blog, $blog->judul_blog);?>
										</div>
									</div>
									<div class="form-group">
										<div class="form-line"><label>Isi Blog</label>
											<?php echo form_textarea($isi_blog, $blog->isi_blog);?>
										</div>
									</div>
									<div class="form-group"><label>Gambar Sebelumnya</label><br>
										<img src="<?php echo base_url('assets/images/blog/'.$blog->foto.$blog->foto_type.'') ?>" width="200px"/>
									</div>
									<div class="form-group"><label>Gambar</label>
										<input type="file" class="form-control" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')"/>
										<br><p><b>Preview Gambar</b><br>
										<img id="preview" src="" alt="" width="350px"/>
									</div>
									<?php echo form_input($id_blog,$blog->id_blog);?>
									<button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
									<button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
								<?php echo form_close(); ?>
							</div>
						</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: "textarea",

    // ===========================================
    // INCLUDE THE PLUGIN
    // ===========================================

    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table contextmenu paste jbimages"
    ],

    // ===========================================
    // PUT PLUGIN'S BUTTON on the toolbar
    // ===========================================

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

    // ===========================================
    // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
    // ===========================================

    relative_urls: false,
    remove_script_host : false,
    convert_urls : true,

  });

  function tampilkanPreview(foto,idpreview)
  { //membuat objek gambar
    var gb = foto.files;
    //loop untuk merender gambar
    for (var i = 0; i < gb.length; i++)
    { //bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview=document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType))
      { //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element)
        {
          return function(e)
          {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      }
        else
        { //jika tipe data tidak sesuai
          alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
        }
    }
  }
  </script>
</body>
</html>
