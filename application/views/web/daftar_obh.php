<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
?>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

  <div class="c-content-box c-bg-grey-1">
		<div class="container">
      <br>
      <h1 align="center"><b>DAFTAR OBH</b></h1>
      <hr>

      <br>

      <div class="c-content-accordion-1 c-theme">
			<div class="panel-group" id="accordion" role="tablist">
         	<?php
					$isFirst = true;
					foreach ($kota->result() as $baris): ?>
						<div class="panel">
							<div class="panel-heading" role="tab" id="heading<?php echo $baris->id_kota; ?>">
								<h4 class="panel-title">
									<a class="c-font-bold c-font-19" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $baris->id_kota; ?>" aria-expanded="true" aria-controls="collapse<?php echo $baris->id_kota; ?>"><?php echo $baris->nama_kota; ?></a>
								</h4>
							</div>
							<div id="collapse<?php echo $baris->id_kota; ?>" class="panel-collapse collapse <?php if ($isFirst) {
								echo "in";
							} ?>" role="tabpanel" aria-labelledby="heading<?php echo $baris->id_kota; ?>">
								<div class="panel-body c-font-18">
									<?php if(isset($baris->obh)): ?>
										<style>
                      #bg-white{color:#fff;}
                    </style>
                    <div class="table-responsive table-home">
                      
                      <table id="" class="table table-bordered table-striped display">
                        <thead>
                          <tr style="background:gray;">
                            <th id="bg-white" width="2%">N0.</th>
                            <th id="bg-white" width="25%">NAMA</th>
                            <th id="bg-white" width="14%">NAMA SINGKAT</th>
                            <th id="bg-white" width="25%">ALAMAT</th>
                            <th id="bg-white" width="14%">NO. TELP</th>
                            <th id="bg-white" width="15%">EMAIL</th>
                            <th id="bg-white" width="5%">DETAIL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=1;
                            foreach ($baris->obh as $value):
                          ?>
                            <tr>
                              <td><b><?php echo $no++; ?>.</b></td>
                              <td><?php echo $value->nama; ?></td>
                              <td><?php echo $value->nama_singkat; ?></td>
                              <td><?php echo $value->alamat_notaris; ?></td>
                              <td><?php echo $value->telpon; ?></td>
                              <td><?php echo $value->email_notaris; ?></td>
                              <td align="center">
                                <a href="<?php echo $link1; ?>/d/<?php echo hashids_encrypt($value->id_user); ?>" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-search"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
									<?php else: ?>
									  <div class="text-center"><p>-- Belum terdapat OBH --</p></div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php 
						$isFirst = false;
						endforeach; ?>
			</div>
		</div>
		</div>
      <br>
  </div>

</div>
<!-- END: PAGE CONTAINER -->


