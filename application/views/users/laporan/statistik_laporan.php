<div class="panel panel-inverse">
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		</div>
		<h4 class="panel-title">Statistik Laporan</h4>
	</div>
	<div class="panel-body panel-stat-lap">
			<div class="row">
				<div class="col-md-3">
					<div class="widget widget-stats bg-grey text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Litigasi</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_kategori_lap'=>4))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Litigasi</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-blue text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Non Litigasi</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_kategori_lap'=>2))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Non Litigasi</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-orange text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Penyuluhan Hukum</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>18))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Penyuluhan Hukum</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-green text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Konsultasi Hukum</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>19))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Konsultasi Hukum</div> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="widget widget-stats bg-grey text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Investigasi Kasus</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>20))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Investigasi Kasus</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-blue text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Penelitian Hukum</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>21))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Penelitian Hukum</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-orange text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Mediasi</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>22))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Mediasi</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-green text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Negosiasi</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>23))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Negosiasi</div> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="widget widget-stats bg-grey text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Pemberdayaan</br>Masyarakat</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>24))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Pemberdayaan Masyarakat</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-blue text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Pendampingan di Luar</br>Pengadilan</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>25))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Pendampingan di Luar Pengadilan</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget widget-stats bg-orange text-inverse">
						<div class="stats-icon stats-icon-lg stats-icon-square bg-gradient-yellow">
						<i class="fa fa-file-text"></i>
						</div>
						<div class="stats-desc">Drafting Dokumen</br>Hukum</div>
						<div class="stats-number">
						<?php echo number_format($this->db->get_where('tbl_laporan', array('id_sub_kategori_lap'=>26))->num_rows(),0,",","."); ?>
						</div>
						<div class="stats-progress progress">
							<div class="progress-bar" style="width: 70.1%;"></div>
						</div>
						<div class="stats-desc">Total Laporan Drafting Dokumen Hukum</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>

	
	</div>
</div>

				
                