<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> RT</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Tambah Data RT</li>
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
                      <form role="form" role="form" method="post" action="<?php echo base_url('index.php/rt/edit') ?>">
                        <input type="hidden" name="id" value="<?php echo $rt[0]['id'] ?>">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kawasan</label>
                              <select name="id_kawasan" >
                              <option value="">Pilih kawasan</option>
                              <?php foreach ($kawasan as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($rt[0]['id_kawasan']==$item['id']){echo "selected";} ?>><?php echo $item['nama_kawasan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                       <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kecamatan</label>
                              <select name="id_kec" id="kecamatan">
                              <option value="">Pilih Kecamatan</option>
                              <?php foreach ($kecamatan as $item): ?>
                                <option value="<?php echo $item['id_kecamatan'] ?>" <?php if($rt[0]['id_kec']==$item['id_kecamatan']){echo "selected";} ?>><?php echo $item['nama_kecamatan'] ?></option>
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
                              <option value="">Pilih Kelurahan</option>
                                <?php foreach ($kelurahan as $item): ?>
                                <option value="<?php echo $item['id_kelurahan'] ?>" <?php if($rt[0]['id_kel']==$item['id_kelurahan']){echo "selected";} ?>><?php echo $item['nama_kecamatan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>RT</label>
                              <select name="rt">
                              <option value="">Pilih RT</option>
                              <?php 
                              for($i=1; $i<=30; $i++){
                                echo '<option value="'.$i.'"';
                                 if($rt[0]['rt']==$i) {echo "selected";};
                                 echo '>'.$i.'</option>';
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
                              <option value="">Pilih Rw</option>
                              <?php 
                              for($i=1; $i<=20; $i++){
                                echo '<option value="'.$i.'"'; 
                                if($rt[0]['rw']==$i) {echo "selected";};
                                echo'>'.$i.'</option>';
                              }
                              ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Luas Kawasan</label>
                              <input type="text" class="form-control" name="luas_kawasan" value="<?php echo $rt[0]['luas_kawasan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Penduduk</label>
                              <input type="text" class="form-control" name="jml_penduduk" value="<?php echo $rt[0]['jml_penduduk'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah KK</label>
                              <input type="text" class="form-control" name="jml_kk" value="<?php echo $rt[0]['jml_kk'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Bangunan</label>
                              <input type="text" class="form-control" name="jml_bgn" value="<?php echo $rt[0]['jml_bgn'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Keteraturan Bangunan</label>
                              <input type="text" class="form-control" name="keteraturan_bangunan" value="<?php echo $rt[0]['keteraturan_bangunan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Ketentuan Kepadatan</label>
                              <input type="text" class="form-control" name="ketentuan_kepadatan" value="<?php echo $rt[0]['ketentuan_kepadatan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Syarat Teknis Bangunan</label>
                              <input type="text" class="form-control" name="syarat_teknis_bangunan" value="<?php echo $rt[0]['syarat_teknis_bangunan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Bangunan</label>
                              <img src="<?php echo base_url() ?>upload/foto/<?php echo  $rt[0]['foto_bangunan'].'.JPG'?>" width="100px">
                              <input type="file" class="form-control" name="foto_bangunan" >
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Area Tidak Terlayani Jalan</label>
                              <input type="text" class="form-control" name="area_tidak_terlayani_jalan" value="<?php echo $rt[0]['area_tidak_terlayani_jalan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jalan Buruk</label>
                              <input type="text" class="form-control" name="jalan_buruk" value="<?php echo $rt[0]['jalan_buruk'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Foto Jalan</label>
                              <img src="<?php echo base_url() ?>upload/foto/<?php echo  $rt[0]['foto_jalan'].'.JPG'?>" width="100px">
                              <input type="file" class="form-control" name="foto_jalan">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Akses Air Minum</label>
                              <input type="text" class="form-control" name="akses_air_minum" value="<?php echo $rt[0]['akses_air_minum'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Tidak Terpenuhi Air Minum</label>
                              <input type="text" class="form-control" name="tidak_terpenuhi_air_minum" value="<?php echo $rt[0]['tidak_terpenuhi_air_minum'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Foto Air Minum</label>
                              <img src="<?php echo base_url() ?>upload/foto/<?php echo  $rt[0]['foto_air_minum'].'.JPG'?>" width="100px">
                              <input type="file" class="form-control" name="foto_air_minum" >
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Area Genangan</label>
                              <input type="text" class="form-control" name="area_genangan" value="<?php echo $rt[0]['area_genangan'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Tidak ada Drainasse</label>
                              <input type="text" class="form-control" name="tidak_ada_drainase" value="<?php echo $rt[0]['tidak_ada_drainase'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Drainasse tidak Terhubung</label>
                              <input type="text" class="form-control" name="drainase_tidak_terhubung" value="<?php echo $rt[0]['drainase_tidak_terhubung'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Drainase Kotor</label>
                              <input type="text" class="form-control" name="drainase_kotor" value="<?php echo $rt[0]['drainase_kotor'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Konstruksi Drainase Buruk</label>
                              <input type="text" class="form-control" name="konstruksi_drainase_buruk" value="<?php echo $rt[0]['konstruksi_drainase_buruk'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Drainase</label>
                              <img src="<?php echo base_url() ?>upload/foto/<?php echo  $rt[0]['foto_drainase'].'.JPG'?>" width="100px">
                              <input type="file" class="form-control" name="foto_drainase" >
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Sistem Air Limbah</label>
                              <input type="text" class="form-control" name="sistem_air_limbah" value="<?php echo $rt[0]['sistem_air_limbah'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Sarpras Air Limbah</label>
                              <input type="text" class="form-control" name="sarpras_air_limbah" value="<?php echo $rt[0]['sarpras_air_limbah'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Sarpras Sampah</label>
                              <input type="text" class="form-control" name="sarpras_sampah" value="<?php echo $rt[0]['sarpras_sampah'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Sistem Sampah</label>
                              <input type="text" class="form-control" name="sistem_sampah" value="<?php echo $rt[0]['sistem_sampah'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Sarpras Sampah perlihara</label>
                              <input type="text" class="form-control" name="sarpras_sampah_pelihara" value="<?php echo $rt[0]['sarpras_sampah_pelihara'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Foto Sampah</label>
                              <img src="<?php echo base_url() ?>upload/foto/<?php echo  $rt[0]['foto_sampah'].'.JPG'?>" width="100px">
                              <input type="file" class="form-control" name="foto_sampah">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Prasarana Bakar</label>
                              <input type="text" class="form-control" name="prasarana_bakar" value="<?php echo $rt[0]['prasarana_bakar'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Sarana Bakar</label>
                              <input type="text" class="form-control" name="sarana_bakar" value="<?php echo $rt[0]['sarana_bakar'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kawasan Strategis</label>
                              <select name="kawasan_strategis">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['kawasan_strategis']=="1"){echo "selected";} ?>>Lokasi terletak pada fungsi strategis kawasan/kota</option>
                              <option value="2" <?php if($rt[0]['kawasan_strategis']=="2"){echo "selected";} ?>>Lokasi tidak terletak pada fungsi strategis kawasan/kota</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kepadatan Penduduk</label>
                              <input type="text" class="form-control" name="kepadatan_penduduk" value="<?php echo $rt[0]['kepadatan_penduduk'] ?>">
                            </div>
                          </div>
                           <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Potensi Sosial</label>
                              <select name="potensi_sosek">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['potensi_sosek']=="1"){echo "selected";} ?>>Lokasi memiliki potensi sosial</option>
                              <option value="2" <?php if($rt[0]['potensi_sosek']=="2"){echo "selected";} ?>>Lokasi tidak memiliki potensi sosial</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Dukungan Masyarakat</label>
                              <select name="dukungan_masyarakat">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['dukungan_masyarakat']=="1"){echo "selected";} ?>>Dukungan masyarakat tinggi</option>
                              <option value="2" <?php if($rt[0]['dukungan_masyarakat']=="2"){echo "selected";} ?>>Dukungan masyarakat rendah</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Komitmen Pemda</label>
                              <select name="komitmen_pemda">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['komitmen_pemda']=="1"){echo "selected";} ?>>Komitmen Penanganan Oleh Pemda Tinggi</option>
                              <option value="2" <?php if($rt[0]['komitmen_pemda']=="2"){echo "selected";} ?>>Komitmen Penanganan Oleh Pemda Rendah</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Status Tanah</label>
                              <select name="status_tanah">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['status_tanah']=="1"){echo "selected";} ?>>Keseluruhan lokasi memiliki kejelasan status penguasaan lahan</option>
                              <option value="2" <?php if($rt[0]['status_tanah']=="2"){echo "selected";} ?>>Sebagian lokasi memiliki kejelasan status penguasaan lahan</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Kesesuaian RTRW</label>
                              <select name="sesuai_rtrw">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['sesuai_rtrw']=="1"){echo "selected";} ?>>Keseluruhan lokasi berada pada zona peruntukan perumahan/ permukiman sesuai RTRW</option>
                              <option value="2" <?php if($rt[0]['sesuai_rtrw']=="2"){echo "selected";} ?>>Sebagian lokasi berada pada zona peruntukan perumahan/ permukiman sesuai RTRW</option>
                             
                              </select>
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>IMB</label>
                              <select name="imb">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($rt[0]['imb']=="1"){echo "selected";} ?>>Keseluruhan bangunan pada lokasi telah memiliki IMB</option>
                              <option value="2" <?php if($rt[0]['imb']=="2"){echo "selected";} ?>>Sebagian bangunan pada lokasi telah memiliki IMB</option>
                             
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