<!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2>Manajemen <strong>RT</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Manajemen RT</li>
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
                      <a href="<?php echo base_url('index.php/rt/add')?>" class="btn btn-sm btn-info btn-square"><i class="fa fa-plus"></i> Tambah RT</a>
                    </div>
                  </div>
                  <table class="table table-hover table-dynamic" id="">
                    <thead>
                      <tr>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>RT</th>
                        <th>RW</th>
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
                        <?php $i=0; foreach ($rt as $item): ?>
                          <tr>
                            <td><?php echo $item['kecamatan'] ?></td>
                            <td><?php echo $item['kelurahan'][0]['nama_kelurahan'] ?></td>
                            <td><?php echo $item['rt'] ?></td>
                            <td><?php echo $item['rw'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['nama_kawasan'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['sk_penetapan'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['nilai'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['tingkat'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['pertimbangan'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['prioritas'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['legal'] ?></td>
                            <td><?php echo $item['nilai_rt']['data'][0]['penanganan'] ?></td>
                            <td>
                              <div class="row">
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('index.php/rt/index/'.$item['id']) ?>" class="btn btn-sm btn-square btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                </div>
                                <div class="col-md-6">
                                  <a href="<?php echo base_url('index.php/rt/delete/'.$item['id']) ?>" class="btn btn-square btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini?')"><i class="fa fa-ban"></i></a>
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