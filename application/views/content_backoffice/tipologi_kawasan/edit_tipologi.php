<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> tipologi</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data tipologi</li>
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
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/tipologi_kawasan/edit') ?>">
                        <input type="hidden" name="id" value="<?php echo $tipologi[0]['id'] ?>">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kawasan</label>
                              <select name="id_kawasan" >
                              <option value="">Pilih kawasan</option>
                              <?php foreach ($kawasan as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($tipologi[0]['id_kawasan']==$item['id']){echo "selected";} ?>><?php echo $item['nama_kawasan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                       <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>tipologi</label>
                              <select name="tipologi" >
                              <option value="">Pilih tipologi</option>
                              <?php foreach ($isi_tipologi as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($tipologi[0]['tipologi']==$item['id']){echo "selected";} ?>><?php echo $item['jenis'] ?></option>
                              <?php endforeach?>
                              </select>
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