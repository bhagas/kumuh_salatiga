<!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2>Manajemen <strong><?php echo $nama_tabel[0]['isi']; ?></strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Manajemen <?php echo $nama_tabel[0]['isi']; ?></li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel">
                <div class="panel-header">
                  
                </div>
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-5">
                      <a href="<?php echo base_url('index.php/master/add/'.$nama_tabel[0]['isi'])?>" class="btn btn-sm btn-info btn-square"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                  </div>
                  <table class="table table-hover table-dynamic" id="">
                    <thead>
                      <tr>
                        <th>keterangan</th>
                     
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($master as $item): ?>
                          <tr>
                            <td><?php echo $item['isi']; ?></td>
                        
                            <td>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('index.php/master/index/'.$nama_tabel[0]['isi'].'/'.$item['id']) ?>" class="btn btn-sm btn-square btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('index.php/master/delete/'.$nama_tabel[0]['isi'].'/'.$item['id']) ?>" class="btn btn-square btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')"><i class="fa fa-ban"></i></a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php  endforeach ?>
                    </tbody>
                  </table>
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