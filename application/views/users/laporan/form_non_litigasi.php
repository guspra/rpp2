<?php
  $link5 = strtolower($this->uri->segment(5));
?>
  

<hr>
<style>
  #wajib_isi{color:red;}
</style>
<div class="alert alert-success">
  <strong><i>Catatan :</i></strong> Pastikan Laporan Telah Anda Periksa & Telah Lengkap.!
</div>
<br>
<div class="form-group">
  <label class="col-lg-12">Nomor Permohonan<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <input type="text" name="no_permohonan" class="form-control" value="" placeholder="Nomor Permohonan.." required>
  </div>
</div>
<?php if ($link5==26): ?>
  <div class="form-group">
    <label class="col-lg-12">Bentuk Dokumen<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="bentuk_dokumen" class="form-control" value="" placeholder="Bentuk Dokumen.." required>
    </div>
  </div>
<?php endif; ?>
<?php if ($link5==19 || $link5==20 || $link5==22 || $link5==23 || $link5==25): ?>
  <div class="form-group">
    <label class="col-lg-12">Jenis Kasus<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="jenis_perkara" class="form-control" value="" placeholder="Jenis Perkara.." required>
    </div>
  </div>
<?php endif; ?>
<?php if ($link5==19 || $link5==20 || $link5==22 || $link5==23 || $link5==25 || $link5==26): ?>
  <div class="form-group">
    <label class="col-lg-12">Nama Penerima Bantuan Hukum<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="nama_client" class="form-control" value="" placeholder="Nama Penerima Bantuan Hukum..." required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-12">Nomor Induk Kependudukan<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" maxlength="16" name="nik_client" class="form-control" value="" placeholder="NIK Client..." onkeypress="return hanyaAngka(event)" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-12">Alamat Penerima Bantuan Hukum<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="alamat_client" class="form-control" value="" placeholder="Alamat Penerima Bantuan Hukum..." required>
    </div>
  </div>
<?php endif; ?>
<?php if ($link5==18 || $link5==21 || $link5==24): ?>
  <div class="form-group">
    <label class="col-lg-12">Tema 
      <?php if($link5==18) { echo "Penyuluhan Hukum"; }
        elseif($link5==21) { echo "Penelitian Hukum"; }
        elseif($link5==24) { echo "Pemberdayaan Masyarakat"; } ?>  
      <b id='wajib_isi'>*</b>
    </label>
    <div class="col-lg-12">
      <input type="text" name="tema_kegiatan" class="form-control" value="" placeholder="Tema <?php 
        if($link5==18) { echo "Penyuluhan Hukum"; } 
        elseif($link5==21) { echo "Penelitian Hukum"; }
        elseif($link5==24) { echo "Pemberdayaan Masyarakat"; } ?>..." required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-12">Judul Kegiatan<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="judul_kegiatan" class="form-control" value="" placeholder="Judul Kegiatan..." required>
    </div>
  </div>
<?php endif; ?>
<?php if ($link5==18): ?>
  <div class="form-group">
    <label class="col-lg-12">Tipe Kegiatan<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="tipe_kegiatan" class="form-control" value="" placeholder="Tipe Kegiatan..." required>
    </div>
  </div>
<?php endif; ?>
<div class="form-group">
  <label class="col-lg-12">Hari, Tanggal Pelaksanaan<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <div class="input-group">
      <input type="date" name="tgl_kegiatan" class="form-control daterange-single" value="" maxlength="10" required>
    </div>
  </div>
</div>
<?php if ($link5==18 || $link5==21 || $link5==24): ?>
  <div class="form-group">
    <label class="col-lg-12">Lokasi Kegiatan<b id='wajib_isi'>*</b></label>
    <div class="col-lg-12">
      <input type="text" name="lokasi_kegiatan" class="form-control" value="" placeholder="Lokasi Kegiatan..." required>
    </div>
  </div>
<?php endif; ?>
<div class="form-group">
  <label class="col-lg-12">Uraian Singkat Kegiatan<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <textarea name="isi_laporan" class="form-control" rows="4" cols="80" placeholder="Uraian singkat kegiatan..." required></textarea>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-12">Lampiran Dokumen pendukung<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <input type="file" name="lampiran" class="form-control" required>
  </div>
</div>
  