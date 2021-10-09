<?php
$level 	= $this->session->userdata('level');
$link3  = strtolower($this->uri->segment(3));
?>
<?php if ($level=='obh'): ?>
<script type="text/javascript">
	function modal_show(id)
	{
		$('#id_permohonan').val(id);
		
			tampilkan_data(id);
		
		$('#modal-konfirm').modal('show');
	}


	function tampilkan_data(id){
		$('[name="pesan_petugas"]').val('');
		$('[name="status"]').val('');
		pesan   = $('.pesan_ajax');
		f_ajax1 = $('#f_ajax1'); f_ajax2 = $('#f_ajax2'); f_ajax3 = $('#f_ajax3');
			$.ajax({
			 type: "POST",
			 data: "id="+id+"&btnkirim=kirim",
			 url: "permohonan_bankum/ajax",
			 cache: false,
			 dataType: "JSON",
			 beforeSend:function()
			 {
				 f_ajax1.hide(); f_ajax2.hide(); f_ajax3.hide();
				 pesan.html('Menampilkan. . .');
			 },
			 success: function(data){
				 f_ajax1.show(); f_ajax2.show(); f_ajax3.show();
				 pesan.html('');
				 $('[name="pesan_petugas"]').val(data.pesan_petugas);
				 $('[name="status"]').val(data.status);
				 $('[name="status"]').trigger('change');
			 },
			 error: function (jqXHR, textStatus, errorThrown)
			 {
				 f_ajax1.hide(); f_ajax2.hide(); f_ajax3.hide();
				 pesan.html('Ada kesalahan saat mengambil data, Silahkan <b style="color:red;cursor:pointer" onclick="window.location.reload()">REFRESH</b> halaman!');
			 }
			});
		return false;
		}

</script>

		<div class="modal" id="modal-konfirm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">
							<?php echo "Update Data Permohonan Bantuan Hukum"; ?>
						</h4>
					</div>
					<form class="form-horizontal" action="" data-parsley-validate="true" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" name="id_permohonan" id="id_permohonan" value="">
						
							<div class="pesan_ajax"></div>
							<div class="form-group" id="f_ajax1">
								<label class="col-lg-4">CATATAN</label>
								<div class="col-lg-8">
									<textarea name="pesan_petugas" class="form-control" placeholder="Pesan" rows="4" cols="80" required></textarea>
								</div>
							</div>
							<div class="form-group" id="f_ajax2">
								<div class="col-md-4"><b>STATUS PERMOHONAN</b></div>
								<div class="col-md-8">
									<select class="form-control default-select2" name="status" required style="width:100%">
										<option value="">- Semua -</option>
										<option value="proses">Belum Terkonfirmasi</option>
										<option value="selesai">Selesai</option>
									</select>
								</div>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
						<button type="submit" name="btnkirim" id="f_ajax3" class="btn btn-primary"><i class="fa fa-send"></i> <?php echo "Simpan";?></button>
					</div>
					</form>
				</div>
			</div>
		</div>
<?php endif; ?>
