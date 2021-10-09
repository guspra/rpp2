<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

  <div class="c-content-box c-bg-grey-1">
		<div class="container">
      <br>
      <h1 align="center"><b>PERATURAN TERKAIT</b></h1>
      <hr>

		<style>
                      #bg-white{color:#fff;}
                    </style>

                    <div class="table-responsive table-home">
                      <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                          <tr style="background:gray;">
                            <th id="bg-white" width="2%">N0.</th>
                            <th id="bg-white" width="78%">PERATURAN</th>
                            <th id="bg-white" width="20%" class="text-center">DETAIL</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=1;
                            foreach ($query->result() as $value):
                          ?>
                            <tr>
                              <td><b><?php echo $no++; ?>.</b></td>
                              <td><?php echo $value->name_file; ?></td>
                              <td class="text-center"><a href="<?php echo $value->dir_file; ?>" class="btn btn-primary btn-sm" target="_blank" >Lihat</a></td>
                              
                              
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
    <br>
  </div>

</div>
<!-- END: PAGE CONTAINER -->
