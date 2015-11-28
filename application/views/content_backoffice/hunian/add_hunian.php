<!-- BEGIN PAGE CONTENT  -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> Penghuni</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data Penghuni</li>
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
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/hunian/submit') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                        
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kawasan</label>
                              <select name="id_kawasan" >
                              <option value="">----- Pilih ----- kawasan</option>
                              <?php foreach ($kawasan as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['nama_kawasan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Umur</label>
                              <input type="text" class="form-control" name="umur">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat">
                            </div>
                          </div>
                          </div>
                       <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kecamatan</label>
                              <select name="id_kec" id="kecamatan">
                              <option value="">----- Pilih ----- Kecamatan</option>
                              <?php foreach ($kecamatan as $item): ?>
                                <option value="<?php echo $item['id_kecamatan'] ?>"><?php echo $item['nama_kecamatan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kelurahan</label>
                              <select name="id_kel" id="desa">
                              <option value="">----- Pilih ----- Kelurahan</option>
                         
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>RT</label>
                              <select name="rt">
                              <option value="">----- Pilih ----- RT</option>
                              <?php 
                              for($i=1; $i<=30; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                              ?>
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>RW</label>
                              <select name="rw">
                              <option value="">----- Pilih ----- Rw</option>
                              <?php 
                              for($i=1; $i<=20; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                              }
                              ?>
                              </select>
                            </div>
                          </div>
                        </div>
                       
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Jiwa</label>
                              <input type="text" class="form-control" name="jml_jiwa">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Hubungan KK</label>
                              <select name="id_hub_kk">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_hub_kk as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Bekerja</label>
                              <input type="text" class="form-control" name="jml_bekerja">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jenis Pekerjaan</label>
                              <input type="text" class="form-control" name="jenis_pekerjaan">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Pendapatan perkapita</label>
                              <select name="id_pendapatan_kapita">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_pendapatan_kapita as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 1</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk1">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 2</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk2">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 3</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk3">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan S1</label>
                              <input type="text" class="form-control" name="pendidikan_s1">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan Diploma</label>
                              <input type="text" class="form-control" name="pendidikan_diploma">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan SMA</label>
                              <input type="text" class="form-control" name="pendidikan_sma">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan SMP</label>
                              <input type="text" class="form-control" name="pendidikan_smp">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan Sd</label>
                              <input type="text" class="form-control" name="pendidikan_sd">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Tidak Sekolah</label>
                              <input type="text" class="form-control" name="pendidikan_tdk">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Pemilik Tanah</label>
                              <select name="id_milik_tanah">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_milik_tanah as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Luas Tanah</label>
                              <input type="text" class="form-control" name="luas_tanah">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Luas Bangunan</label>
                              <input type="text" class="form-control" name="luas_bgn">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah lantai</label>
                              <input type="text" class="form-control" name="jml_lantai">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Depan</label>
                              <input type="text" class="form-control" name="jarak_depan">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Samping</label>
                              <input type="text" class="form-control" name="jarak_samping">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Belakang</label>
                              <input type="text" class="form-control" name="jarak_belakang">
                            </div>
                          </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Fungsi</label>
                              <select name="id_fungsi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_fungsi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Fungsi</label>
                              <input type="file" class="form-control" name="foto_fungsi">
                            </div>
                          </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Ruang Tamu</label>
                              <select name="id_r_tamu">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_ada_tidak as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang Tamu</label>
                              <input type="file" class="form-control" name="foto_r_tamu">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Ruang Tidur</label>
                              <select name="id_r_tamu">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_ada_tidak as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang Tidur</label>
                              <input type="file" class="form-control" name="foto_r_tidur">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Ruang Dapur</label>
                              <select name="id_dapur">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_ada_tidak as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dapur</label>
                              <input type="file" class="form-control" name="foto_dapur">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kamar Mandi</label>
                              <select name="id_km_wc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_ada_tidak as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto kamar mandi</label>
                              <input type="file" class="form-control" name="foto_km_wc">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Ruangan Lain</label>
                              <input type="text" class="form-control" name="r_lain">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang lain</label>
                              <input type="file" class="form-control" name="foto_r_lain">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Topografi</label>
                              <select name="id_topografi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_topografi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Topografi</label>
                              <input type="file" class="form-control" name="foto_topografi">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Lantai</label>
                              <select name="id_lantai">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_lantai as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Lantai</label>
                              <input type="file" class="form-control" name="foto_lantai">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi lantai</label>
                              <select name="id_kondisi_lantai">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Dinding</label>
                              <select name="id_dinding">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_dinding as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dinding</label>
                              <input type="file" class="form-control" name="foto_dinding">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Dinding</label>
                              <select name="id_kondisi_dinding">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Atap</label>
                              <select name="id_atap">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_atap as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Atap</label>
                              <input type="file" class="form-control" name="foto_atap">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Atap</label>
                              <select name="id_kondisi_atap">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Plafond</label>
                              <select name="id_plafond">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_plafond as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Plafond</label>
                              <input type="file" class="form-control" name="foto_plafond">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Plafond</label>
                              <select name="id_kondisi_plafond">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Pondasi</label>
                              <select name="id_pondasi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_pondasi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pondasi</label>
                              <input type="file" class="form-control" name="foto_pondasi">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kolom</label>
                              <select name="id_kolom">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kolom as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Kolom</label>
                              <input type="file" class="form-control" name="foto_kolom">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kuda - Kuda</label>
                              <select name="id_kuda_kuda">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kuda_kuda as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Kuda - Kuda</label>
                              <input type="file" class="form-control" name="foto_kuda_kuda">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Pintu</label>
                              <select name="id_kondisi_pintu">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pintu</label>
                              <input type="file" class="form-control" name="foto_pintu">
                            </div>
                          </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Jendela</label>
                              <select name="id_kondisi_jendela">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Jendela</label>
                              <input type="file" class="form-control" name="foto_jendela">
                            </div>
                          </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Roaster</label>
                              <select name="id_kondisi_roaster">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Roaster</label>
                              <input type="file" class="form-control" name="foto_roaster">
                            </div>
                          </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Hunian</label>
                              <select name="id_persepsi_hunian">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Listrik</label>
                              <select name="id_daya_listrik">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_listrik as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Listrik</label>
                              <select name="id_persepsi_listrik">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Sumber Air Bersih</label>
                              <select name="id_sumber_air_bersih">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_air_bersih as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Air Bersih</label>
                              <input type="file" class="form-control" name="foto_air_bersih">
                            </div>
                          </div>
                          </div>
                         <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Penggunaan Air Bersih</label>
                              <input type="text" class="form-control" name="jml_penggunaan_air_bersih">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Air Bersih</label>
                              <select name="id_kondisi_air_bersih">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi_air_bersih as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Air Bersih</label>
                              <select name="id_persepsi_air_bersih">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Pembuangan Sampah</label>
                              <select name="id_pembuangan_sampah">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_pembuangan_sampah as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pembuangan Sampah</label>
                              <input type="file" class="form-control" name="foto_pembuangan_sampah">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Pembuangan Sampah</label>
                              <select name="id_persepsi_pembuangan_sampah">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Saluran Pembuangan</label>
                              <select name="id_jenis_saluran">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_pembuangan_drainase as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Saluran Pembuangan</label>
                              <input type="file" class="form-control" name="foto_saluran">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Pembuangan Sampah</label>
                              <select name="id_persepsi_jenis_saluran">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Lantai KM / WC</label>
                              <select name="id_lantai_kmwc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_lantai as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Lantai KM / WC</label>
                              <input type="file" class="form-control" name="foto_lantai_kmwc">
                            </div>
                          </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Lantai KM / WC</label>
                              <select name="id_kondisi_lantai_kmwc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Dinding KM / WC</label>
                              <select name="id_dinding_kmwc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_dinding as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dinding KM / WC</label>
                              <input type="file" class="form-control" name="foto_dinding_kmwc">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Dinding KM / WC</label>
                              <select name="id_kondisi_dinding_kmwc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Septitank </label>
                              <select name="id_septitank">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_ada_tidak as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Saluran Kloset</label>
                              <select name="id_sal_kloset">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_lancar as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Air Bersih KM / WC</label>
                              <select name="id_air_bersih_kmwc">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_lancar as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Lokasi Sanitasi</label>
                              <select name="id_lokasi_sanitasi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_lokasi_sanitasi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Sanitasi</label>
                              <input type="file" class="form-control" name="foto_lokasi_sanitasi">
                            </div>
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Sanitasi</label>
                              <select name="id_persepsi_lokasi_sanitasi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
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
        <!-- END PAGE CONTENT