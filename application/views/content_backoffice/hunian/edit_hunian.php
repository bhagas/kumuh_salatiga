<!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Tambah <strong> penghuni</strong></h2>
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
                      <form class="wizard" role="form" role="form" method="post" action="<?php echo base_url('index.php/hunian/edit') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $hunian[0]['id'] ?>">
                               <fieldset>
                         <legend>1</legend>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama Kawasan</label>
                              <select name="id_kawasan" >
                              <option value="">Pilih kawasan</option>
                              <?php foreach ($kawasan as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kawasan']==$item['id']){echo "selected";} ?>><?php echo $item['nama_kawasan'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                    
                       
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama"  value="<?php echo $hunian[0]['nama'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Umur</label>
                              <input type="text" class="form-control" name="umur"  value="<?php echo $hunian[0]['umur'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat"  value="<?php echo $hunian[0]['alamat'] ?>">
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
                                <option value="<?php echo $item['id_kecamatan'] ?>" <?php if($hunian[0]['id_kec']==$item['id_kecamatan']){echo "selected";} ?>><?php echo $item['nama_kecamatan'] ?></option>
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
                                <option value="<?php echo $item['id_kelurahan'] ?>" <?php if($hunian[0]['id_kel']==$item['id_kelurahan']){echo "selected";} ?>><?php echo $item['nama_kelurahan'] ?></option>
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
                                 if($hunian[0]['rt']==$i) {echo "selected";};
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
                                if($hunian[0]['rw']==$i) {echo "selected";};
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
                              <label>Jumlah Jiwa</label>
                              <input type="text" class="form-control" name="jml_jiwa"  value="<?php echo $hunian[0]['jml_jiwa'] ?>">
                            </div>
                          </div>
                          </div>
                             </fieldset>
                          <fieldset>
        <legend>2</legend>
                           <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Hubungan KK</label>
                              <select name="id_hub_kk">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_hub_kk as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_hub_kk']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Bekerja</label>
                              <input type="text" class="form-control" name="jml_bekerja"  value="<?php echo $hunian[0]['jml_bekerja'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Jenis Pekerjaan</label>
                              <input type="text" class="form-control" name="jenis_pekerjaan"  value="<?php echo $hunian[0]['jenis_pekerjaan'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Pendapatan perkapita</label>
                              <select name="id_pendapatan_kapita">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_pendapatan_kapita as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_pendapatan_kapita']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 1</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk1"  value="<?php echo $hunian[0]['lama_tinggal_kk1'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 2</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk2"  value="<?php echo $hunian[0]['lama_tinggal_kk2'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                            <div class="col-md-12">
                              <label>Lama Tinggal KK 3</label>
                              <input type="text" class="form-control" name="lama_tinggal_kk3"  value="<?php echo $hunian[0]['lama_tinggal_kk3'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan S1</label>
                              <input type="text" class="form-control" name="pendidikan_s1"  value="<?php echo $hunian[0]['pendidikan_s1'] ?>">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan Diploma</label>
                              <input type="text" class="form-control" name="pendidikan_diploma"  value="<?php echo $hunian[0]['pendidikan_diploma'] ?>">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan SMA</label>
                              <input type="text" class="form-control" name="pendidikan_sma"  value="<?php echo $hunian[0]['pendidikan_sma'] ?>">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan SMP</label>
                              <input type="text" class="form-control" name="pendidikan_smp"  value="<?php echo $hunian[0]['pendidikan_smp'] ?>">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Pendidikan Sd</label>
                              <input type="text" class="form-control" name="pendidikan_sd"  value="<?php echo $hunian[0]['pendidikan_sd'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Tidak Sekolah</label>
                              <input type="text" class="form-control" name="pendidikan_tdk"  value="<?php echo $hunian[0]['pendidikan_tdk'] ?>">
                            </div>
                          </div>
                          </div>
                           </fieldset>
                          <fieldset>
        <legend>3</legend>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Pemilik Tanah</label>
                              <select name="id_milik_tanah">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_milik_tanah as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_milik_tanah']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Luas Tanah</label>
                              <input type="text" class="form-control" name="luas_tanah"  value="<?php echo $hunian[0]['luas_tanah'] ?>">
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Luas Bangunan</label>
                              <input type="text" class="form-control" name="luas_bgn"  value="<?php echo $hunian[0]['luas_bgn'] ?>">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah lantai</label>
                              <input type="text" class="form-control" name="jml_lantai"  value="<?php echo $hunian[0]['jml_lantai'] ?>">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Depan</label>
                              <input type="text" class="form-control" name="jarak_depan"  value="<?php echo $hunian[0]['jarak_depan'] ?>">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Samping</label>
                              <input type="text" class="form-control" name="jarak_samping"  value="<?php echo $hunian[0]['jarak_samping'] ?>">
                            </div>
                          </div>
                          </div>
                             <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jarak Belakang</label>
                              <input type="text" class="form-control" name="jarak_belakang"  value="<?php echo $hunian[0]['jarak_belakang'] ?>">
                            </div>
                          </div>
                          </div>
                             <div class="row">
                            <div class="col-md-12">
                              <label>Fungsi</label>
                              <select name="id_fungsi">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_fungsi as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_fungsi']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Fungsi</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_fungsi'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_r_tamu']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang Tamu</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_r_tamu'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_r_tamu']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang Tidur</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_r_tidur'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_dapur']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dapur</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_dapur'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_km_wc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto kamar mandi</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_km_wc'].'.JPG'?>" width="100px">
                            
                              <input type="file" class="form-control" name="foto_km_wc">
                            </div>
                          </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Ruangan Lain</label>
                              <input type="text" class="form-control" name="r_lain"  value="<?php echo $hunian[0]['r_lain'] ?>">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Ruang lain</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_r_lain'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_topografi']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Topografi</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_topografi'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_lantai']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Lantai</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_lantai'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_lantai']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_dinding']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dinding</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_dinding'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_dinding']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_atap']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Atap</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_atap'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_atap']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_plafond']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Plafond</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_plafond'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_plafond']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_pondasi']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pondasi</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_pondasi'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kolom']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Kolom</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_kolom'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kuda_kuda']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Kuda - Kuda</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_kuda_kuda'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_pintu']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pintu</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_pintu'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_jendela']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Jendela</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_jendela'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_roaster']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Roaster</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_roaster'].'.JPG'?>" width="100px">
                            
                              <input type="file" class="form-control" name="foto_roaster">
                            </div>
                          </div>
                          </div>
                           </fieldset>
                          <fieldset>
        <legend>4</legend>
                           <div class="row">
                            <div class="col-md-12">
                              <label>Persepsi Hunian</label>
                              <select name="id_persepsi_hunian">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_hunian']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_daya_listrik']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_listrik']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_sumber_air_bersih']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Air Bersih</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_air_bersih'].'.JPG'?>" width="100px">
                            
                              <input type="file" class="form-control" name="foto_air_bersih">
                            </div>
                          </div>
                          </div>
                         <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Jumlah Penggunaan Air Bersih</label>
                              <input type="text" class="form-control" name="jml_penggunaan_air_bersih"  value="<?php echo $hunian[0]['jml_penggunaan_air_bersih'] ?>">
                            </div>
                          </div>
                          </div>
                            <div class="row">
                            <div class="col-md-12">
                              <label>Kondisi Air Bersih</label>
                              <select name="id_kondisi_air_bersih">
                              <option value="">----- Pilih -----</option>
                              <?php foreach ($master_kondisi_air_bersih as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_air_bersih']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_air_bersih']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_pembuangan_sampah']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Pembuangan Sampah</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_pembuangan_sampah'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_pembuangan_sampah']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_jenis_saluran']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Saluran Pembuangan</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_saluran'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_jenis_saluran']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_lantai_kmwc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Lantai KM / WC</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_lantai_kmwc'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_lantai_kmwc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_dinding_kmwc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                            <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Dinding KM / WC</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_dinding_kmwc'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_kondisi_dinding_kmwc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_septitank']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_sal_kloset']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_air_bersih_kmwc']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_lokasi_sanitasi']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                           <div class="form-group">
                           <div class="row">
                            <div class="col-md-12">
                              <label>Foto Sanitasi</label>
                                <img src="<?php echo base_url() ?>upload/foto/<?php echo  $hunian[0]['foto_lokasi_sanitasi'].'.JPG'?>" width="100px">
                            
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
                                <option value="<?php echo $item['id'] ?>" <?php if($hunian[0]['id_persepsi_lokasi_sanitasi']==$item['id']){echo "selected";} ?>><?php echo $item['isi'] ?></option>
                              <?php endforeach?>
                              </select>
                            </div>
                          </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-square btn-primary"><i class="fa fa-plus"></i> Edit</button>
                            </div>
                          </div>
                        </div>
                           </fieldset>
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