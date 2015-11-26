<!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2>Manajemen <strong>Kawasan</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Manajemen Kawasan</li>
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
                      <a href="<?php echo base_url('index.php/kawasan/add')?>" class="btn btn-sm btn-info btn-square"><i class="fa fa-plus"></i> Tambah Kawasan</a>
                    </div>
                  </div>
                  <table class="table table-hover" id="table">
                    <thead>
                
                      <tr>
                        <th>Nama Kawasan</th>
                        <th>SK Penetapan</th>
                        <th>Nilai</th>
                        <th>Tingkat Kekumuhan</th>
                        <th>Pertimbangan</th>
                        <th>Prioritas</th>
                        <th>Legalitas</th>
                        <th>Penanganan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0; foreach ($kawasan as $item): ?>
                        <tr>
                          <td><?php echo $item['nama_kawasan'] ?></td>
                          <td><?php echo $item['sk_penetapan'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['nilai_total'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['tingkat'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['pertimbangan'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['prioritas'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['legal'] ?></td>
                          <td><?php echo $item['nilai_kawasan']['penanganan'] ?></td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <a href="<?php echo base_url('index.php/kawasan/index/'.$item['id']) ?>" class="btn btn-sm btn-square btn-success"><i class="fa fa-pencil-square-o"></i></a>
                              </div>
                              <div class="col-md-6">
                                <a href="<?php echo base_url('index.php/kawasan/delete/'.$item['id']) ?>" class="btn btn-square btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')"><i class="fa fa-ban"></i></a>
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