<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

  <div class="c-content-box c-bg-grey-1">
		<div class="container">
      <br>
      <h1 align="center"><b>PERMOHONAN BANTUAN HUKUM</b></h1>
      <hr>

		<?php
			if (empty($this->session->flashdata('msg'))) {
      ?>

      <hr>
	<div class="alert alert-warning alert-with-btn">
				Belum mengetahui Organisasi Bantuan Hukum di NTB? Silakan kunjungi halaman Daftar OBH!</br>
				<a href="daftarobh" class="btn btn-banner btn-alert">Daftar OBH</a>
			</div>
			

      <form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
        <div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Nama Penerima Bantuan Hukum</label>
				 	<div class="col-md-6">
				 		<input type="text" name="nama_client" class="form-control  c-square c-theme" id="inputEmail3" placeholder="Nama">
				 	</div>
				</div>
        <div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Nomor Identitas</label>
				 	<div class="col-md-6">
				 		<input type="text" maxlength="16" name="nik_client" class="form-control  c-square c-theme" id="inputEmail3" placeholder="Nomor Identitas" onkeypress="return hanyaAngka(event)" required>
						<i style="color: red; font-size: 13px;">*Masukkan hanya angka.</i>
				 	</div>
				</div>
        <div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Kontak yang Dapat Dihubungi <b id='wajib_isi'>*</b></label>
				 	<div class="col-md-6">
				 		<input type="text" name="kontak_client" class="form-control  c-square c-theme" id="inputEmail3" placeholder="Nomor Telepon" onkeypress="return hanyaAngka(event)" required>
						<i style="color: red; font-size: 13px;">*Masukkan hanya angka.</i>
				 	</div>
				</div>
        <div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Alamat</label>
				 	<div class="col-md-6">
				 		<input type="text" name="alamat_client" class="form-control  c-square c-theme" id="inputEmail3" placeholder="Alamat">
				 	</div>
				</div>
				<div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Organisasi Bantuan Hukum</label>
				 	<div class="col-md-6">
				 		<select class="form-control default-select2" name="notaris" required>
                        <option value="">- Pilih -</option>
                        <?php
                        $this->db->order_by('nama','ASC');
                        $v_obh = $this->db->get('tbl_data_obh');
                        foreach ($v_obh->result() as $key => $value): ?>
                          <option value="<?php echo $value->id_user; ?>"><?php echo ucwords($value->nama); ?></option>
                        <?php
                        endforeach; ?>
                      </select>
				 	</div>
				</div>
        <div class="form-group">
				 	<label for="inputEmail3" class="col-md-4 control-label">Uraian Singkat Bantuan yang Dibutuhkan <b id='wajib_isi'>*</b></label>
				 	<div class="col-md-6">
            <textarea name="isi_laporan" class="form-control  c-square c-theme" rows="3" placeholder="Jabarkan dengan jelas.." required></textarea>
				 	</div>
				</div>
        <div class="form-group">
					<label for="exampleInputFile" class="col-md-4 control-label">Lampirkan Data Pendukung <b id='wajib_isi'>*</b></label>
					<div class="col-md-6">
						<input type="file" name="bukti" id="exampleInputFile" class="c-font-14" required>
					</div>
				</div>
              			
				<div class="form-group c-margin-t-20">
				  <div class="col-sm-offset-4 col-md-8">
					  <button type="submit" name="btnsimpan" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Submit</button> 
				 	</div>
				</div>
			</form>
			<?php 
				} else {
					echo $this->session->flashdata('msg');
			?>
			<div>
				<p>Terima kasih atas permohonan Anda, Form Permohonan Bantuan Hukum telah berhasil di input!</p>
				<p>Permohonan Anda sedang dalam proses</p>
			</div>
			<div class="text-center">“Kami PASTI Memberikan Layanan Terbaik”</div>

			<?php } ?>

    </div>
    <br>
  </div>

</div>
<!-- END: PAGE CONTAINER -->
