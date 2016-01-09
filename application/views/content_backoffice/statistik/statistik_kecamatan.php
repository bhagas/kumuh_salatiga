<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> Kawasan</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data Kawasan</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-6">
                      <?php echo validation_errors(); ?>
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/kawasan/edit') ?>">
                        <input type="hidden" name="id" value="<?php echo $kawasan[0]['id'] ?>">
                     
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kawasan</label>
                              <input type="text" class="form-control" name="nama_kawasan" value="<?php echo $kawasan[0]['nama_kawasan'] ?>">
                            </div>
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>SK Penetapan</label>
                              <input type="text" class="form-control" name="sk_penetapan" value="<?php echo $kawasan[0]['sk_penetapan'] ?>">
                            </div>
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-square btn-primary"><i class="fa fa-plus"></i> Edit</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>Dinas </span>.
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->