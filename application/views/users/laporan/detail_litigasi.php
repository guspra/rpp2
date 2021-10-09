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
      <tr>
        <th valign="top">Nomor Permohonan</th>
        <th valign="top">:</th>
        <td><?php echo $query->no_permohonan; ?></td>
      </tr>
      <tr>
        <th valign="top">Jenis Perkara</th>
        <th valign="top">:</th>
        <td><?php echo $query->jenis_perkara; ?></td>
      </tr>
      <tr>
        <th valign="top">Hari / Tggl Kegiatan</th>
        <th valign="top">:</th>
        <td><?php echo $query->tgl_kegiatan; ?></td>
      </tr>
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
    

