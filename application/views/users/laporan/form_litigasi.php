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
<div class="form-group">
  <label class="col-lg-12">Jenis Perkara<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <input type="text" name="jenis_perkara" class="form-control" value="" placeholder="Jenis Perkara.." required>
  </div>
</div>
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
<div class="form-group">
  <label class="col-lg-12">Hari, Tanggal Pelaksanaan<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <div class="input-group">
      <input type="date" name="tgl_kegiatan" class="form-control daterange-single" value="" maxlength="10" required>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-12">Uraian Laporan<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <textarea name="isi_laporan" class="form-control" rows="4" cols="80" placeholder="Uraian laporan..." required></textarea>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-12">Lampiran Dokumen pendukung<b id='wajib_isi'>*</b></label>
  <div class="col-lg-12">
    <input type="file" name="lampiran" class="form-control" required>
  </div>
</div>
  