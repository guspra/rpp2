<?php $sub = $query->id_sub_kategori_lap; ?>

<div class="table-responsive">
  <table class="table table-bordered table-striped" width="100%">
    <tbody>
      <tr>
        <th valign="top" width="160">Nama OBH</th>
        <th valign="top" width="1">:</th>
        <td><?php echo $this->Mcrud->d_notaris($query->notaris,'nama_pelapor_notaris'); ?></td>
      </tr>
      <tr>
        <th valign="top">Kategori Laporan</th>
        <th valign="top">:</th>
        <td><b><?php echo $this->Mcrud->d_notaris($query->id_kategori_lap,'kategori_lap'); ?></b></td>
      </tr>
      <tr>
        <th valign="top">Sub Kategori Laporan</th>
        <th valign="top">:</th>
        <td><b><?php echo $this->Mcrud->d_notaris($query->id_sub_kategori_lap,'sub_kategori_lap'); ?></b></td>
      </tr>
      <?php if ($sub==19 || $sub==20 || $sub==22 || $sub==23 || $sub==25 || $sub==26): ?>
        <tr>
          <th valign="top">Nama Penerima Bantuan Hukum</th>
          <th valign="top">:</th>
          <td><?php echo $query->nama_client; ?></td>
        </tr>
        <tr>
          <th valign="top">Nomor Induk Kependudukan</th>
          <th valign="top">:</th>
          <td><?php echo $query->nik_client; ?></td>
        </tr>
        <tr>
          <th valign="top">Alamat Penerima Bantuan Hukum</th>
          <th valign="top">:</th>
          <td><?php echo $query->alamat_client; ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($sub==19 || $sub==20 || $sub==22 || $sub==23 || $sub==25): ?>
        <tr>
          <th valign="top">Jenis Kasus</th>
          <th valign="top">:</th>
          <td><?php echo $query->jenis_perkara; ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($sub==26): ?>
        <tr>
          <th valign="top">Bentuk Dokumen</th>
          <th valign="top">:</th>
          <td><?php echo $query->bentuk_dokumen; ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($sub==18 || $sub==21 || $sub==24): ?>
        <tr>
          <th valign="top">Tema <?php if($sub==18) { echo "Penyuluhan Hukum"; }
            elseif($sub==21) { echo "Penelitian Hukum"; }
            elseif($sub==24) { echo "Pemberdayaan Masyarakat"; } ?></th>
          <th valign="top">:</th>
          <td><?php echo $query->tema_kegiatan; ?></td>
        </tr>
        <tr>
          <th valign="top">Judul Kegiatan</th>
          <th valign="top">:</th>
          <td><?php echo $query->judul_kegiatan; ?></td>
        </tr>
      <?php endif; ?>
      <?php if ($sub==18): ?>
        <tr>
          <th valign="top">Tipe Kegiatan</th>
          <th valign="top">:</th>
          <td><?php echo $query->tipe_kegiatan; ?></td>
        </tr>
      <?php endif; ?>
      <tr>
        <th valign="top">Hari / Tgl Kegiatan</th>
        <th valign="top">:</th>
        <td><?php echo $query->tgl_kegiatan; ?></td>
      </tr>
      <?php if ($sub==18 || $sub==21 || $sub==24): ?>
        <tr>
          <th valign="top">Lokasi Kegiatan</th>
          <th valign="top">:</th>
          <td><?php echo $query->lokasi_kegiatan; ?></td>
        </tr>
      <?php endif; ?>
      <tr>
        <th valign="top">Uraian Kegiatan</th>
        <th valign="top">:</th>
        <td><?php echo $query->isi_laporan; ?></td>
      </tr>
      <tr>
        <th valign="top">Lamp. Laporan</th>
        <th valign="top">:</th>
        <td>
          <a href="<?php echo $query->lampiran; ?>" target="_blank"><?php echo $query->lampiran; ?></a>
        </td>
      </tr>
      <tr>
        <th valign="top">Tanggal Pelaporan</th>
        <th valign="top">:</th>
        <td><?php echo $this->Mcrud->tgl_id(date('d-m-Y H:i:s', strtotime($query->tgl_laporan)),'full'); ?></td>
      </tr>
      <tr>
        <th valign="top">STATUS</th>
        <th valign="top">:</th>
        <td><?php echo $this->Mcrud->cek_status_laporan($query->status); ?></td>
      </tr>
      <tr>
        <th valign="top">Catatan Administrator</th>
        <th valign="top">:</th>
        <td><?php echo $query->pesan_petugas; ?></td>
      </tr>
      <tr>
        <th valign="top">Lampiran Administrator</th>
        <th valign="top">:</th>
        <td>
          <a href="<?php echo $query->file_petugas; ?>" target="_blank"><?php echo $query->file_petugas; ?></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
  
