<div class="breadcrumb-news">    
<marquee>Selamat Datang Di Website E-Bokar, Selamat Melakukan Penawaran Semoga Sukses</marquee>         
</div>
       <div class="row">
        <div class="col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php
                if(!empty($title))
                {
                echo $title;
                }
                else
                {
                  echo "Selamat Datang Di Website LE-Bokar";
                }

               ?>
              </h3>
            </div>
            <div class="panel-body">
            <?php
            if(!empty($main_view))
            {
              $this->load->view($main_view);
            }
            else
            {
              echo"-";
            }
            ?>
            </div>
            
          </div>
        </div>
</div>
<!--modal sukses login-->
<div class="modal fade" id="loginsuccess" tabindex="-1" role="dialog" aria-labelledby="loginsuccess" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">INFORMASI</h4>
         </div>
         <div class="modal-body">
            <h4>LOGIN SUKSES</h4>
         </div>
      </div>
   </div>
</div>

<!--Form Registrasi Gapoktan Dan Poktan-->
<div class="modal fade" id="regisgapoktan" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title">Registrasi Gapoktan / Poktan</h5>
         </div>
         <div class="modal-body">
            <form class="form-horizontal simple-validation" method="post" action="<?php echo site_url('regis/gapoktan'); ?>" id="frmExample" novalidate>
               <div class="form-group required">
                  <label for="name" class="col-sm-2 control-label">Nama Gapoktan</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="name" name='nama' placeholder="Masukan Nama Gapoktan" data-title="Tolong Masukan Nama Gapoktan / Poktan">
                  </div>
               </div>
                <div class="form-group required">
                  <label for="age" class="col-sm-2 control-label">Legal Aspek</label>
                  <div class="col-sm-10">
                     <textarea rows="2" name='la' class="form-control" data-title="Legal Aspek Harus Diisi" placeholder="No, Tgl, Bln, Thn &amp; Instansi Yang Mengeluarkan"></textarea>
                  </div>
               </div>
                <div class="form-group required">
                  <label for="age" class="col-sm-2 control-label">Tahun Berdiri</label>
                  <div class="col-sm-10">
                    <input name="tb" placeholder="yyyy" class="form-control date" data-title="Tolong Masukan Tahun Berdiri" type="date">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="age" class="col-sm-2 control-label">Tahun Operasi</label>
                  <div class="col-sm-10">
                    <input name="to" placeholder="yyyy" class="form-control date" data-title="Tolong Masukan Tahun Operasi" type="date">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="name" class="col-sm-2 control-label">Nama Desa</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name='nd' placeholder="Masukan Nama Desa" data-title="Harap Masukan Nama Desa">
                  </div>
               </div>
                <div class="form-group required">
                  <label for="name" class="col-sm-2 control-label">Nama Kecamatan</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name='nk' placeholder="Masukan Nama Kecamatan" data-title="Harap Masukan Nama Kecamatan">
                  </div>
               </div>
               <div class="form-group required">
                  <label  class="col-sm-2 control-label">Kabupaten</label>
                  <div class="col-sm-10">
                     <select placeholder="Kabupaten" class="form-control" name='kab' >
                        <option disabled selected>Pilih Kabupaten</option>
                        <option value='Indragiri Hulu'>Indragiri Hulu</option>
                        <option value='Kampar'>Kampar</option>
                        <option value='Kuansing'>Kuansing</option>
                        <option value='Rokan Hulu'>Rokan Hulu</option>
                     </select>
                  </div>
               </div>
               <div class="form-group required">
                  <label for="name" class="col-sm-2 control-label">Nama Ketua</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name='nk' placeholder="Masukan Nama Ketua" data-title="Harap Masukan Nama Ketua">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="name" class="col-sm-2 control-label">Nomor Hp</label>
                  <div class="col-sm-10">
                     <input type="number"  class="form-control" name='nh' placeholder="Masukan Nomor Hp" data-title="Harap Masukan Nomor Hp" max="12">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="age" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                     <textarea rows="2" name='ket' class="form-control" data-title="Keterangan Harus Diisi" placeholder="MMasukan Sertifikat atau Penghargaan yang Pernah Diterima"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-10">
                     <hr>
                     <h4 class="modal-title custom_align" id="Heading">Data Login</h4>
                  </div>
               </div>
               <div class="form-group required">
                  <label for="income" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control regex" id="username" placeholder="Masukan Username" name='username' data-title="Username Harus Di isi"  data-regex="^[^\s]{6,20}$" data-regex-title="Username Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control regex" id="password" name='password' placeholder="Enter password" data-title="Password required" data-regex="^[^\s]{6,20}$" data-regex-title="Password Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="passwordConfirm" class="col-sm-2 control-label">Ulangi Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control match" id="passwordConfirm" placeholder="Ulangi Password" data-title="Confirmation password required" data-match="password" data-match-title="Password Yang Anda Masukan Tidak cocok">
                  </div>
               </div>
               <div class="form-group">
                  <label for="terms" class="col-sm-2 control-label required">Terms</label>
                  <div class="col-sm-10">
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="checkme" id="terms" class="required" data-title="Untuk Mendaftar Anda Harus Menyetujuinya"><small class='text-muted'>Centang Untuk Menyetujui <a href="<?php echo site_url('pageindex/tos');?>">Sarat dan Ketentuan</a>Website</small>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <div class="frmPrc hide">
                        <button type="button" class="btn btn-primary" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                     </div>
                     <div class="frmBtn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <button type="submit" class="btn btn-danger delete"  data-dismiss="modal"></i> Batal</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div aria-hidden="true" aria-labelledby="Login" class="modal fade" id=
"regpeserta" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type=
        "button"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Registrasi Peserta</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('regis/perusahaan'); ?>" class=
        "form-horizontal simple-validation" id="frmExample" method="post" name=
        "frmExample" novalidate="">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Nama Perusahaan</label>
            <div class="col-sm-10">
              <input class="form-control" maxlength="50" data-title="Nama Perusahaan Harus Diisi" name='nama' placeholder=
              "Nama Perusahaan" type="text">
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Alamat Kantor</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Alamat Kantor Tidak Boleh Kosong " placeholder="Alamat" maxlength="50"  name='alamat' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Kota Kantor</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Kota Kantor Tidak Boleh Kosong " placeholder="Kota Kantor" maxlength="50"  name='kotakantor' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Provinsi Kantor</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Provinsi Kantor Tidak Boleh Kosong " placeholder="Provinsi Kantor" maxlength="50"  name='provkantor' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Telpon Kantor</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="number" data-title="Telpon Kantor Tidak Boleh Kosong " placeholder="Nomor Telepon Kantor" maxlength="50"  name='telkantor' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Email Kantor</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="email" data-title="Email Kantor Tidak Boleh Kosong " placeholder="Provinsi Kantor" maxlength="50"  name='emailkantor' >
                        </div>
                        </div>
                          <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Alamat Pabrik</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Alamat Pabrik Tidak Boleh Kosong " placeholder="Alamat Pabrik" maxlength="50"  name='alamatpabrik' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Kota Pabrik</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Kota Pabrik Tidak Boleh Kosong " placeholder="Kota pabrik" maxlength="50"  name='kotapabrik' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Provinsi Pabrik</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Provinsi pabrik Tidak Boleh Kosong " placeholder="Provinsi Pabrik" maxlength="50"  name='provpabrik' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Keterangan</label>
            <div class="col-sm-10">
                      
                              <textarea rows="2" name='ket' data-title=" " class="form-control" placeholder="Masukan Keterangan"></textarea>
                        </div>
                        </div>
                        <hr>
                        <div class="form-group">
                  <div class="col-sm-10">
                     <h4 class="modal-title custom_align" id="Heading">Data Login</h4>
                  </div>
               </div>
               <div class="form-group required">
                  <label for="income" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control regex" id="username" placeholder="Masukan Username" name='username' data-title="Username Harus Di isi"  data-regex="^[^\s]{6,20}$" data-regex-title="Username Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control regex" id="password" name='password' placeholder="Enter password" data-title="Password required" data-regex="^[^\s]{6,20}$" data-regex-title="Password Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group">
                  <label for="passwordConfirm" class="col-sm-2 control-label">Ulangi Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control match" id="passwordConfirm" placeholder="Ulangi Password" data-title="Confirmation password required" data-match="password" data-match-title="Password Yang Anda Masukan Tidak cocok">
                  </div>
               </div>
               <div class="form-group">
                  <label for="terms" class="col-sm-2 control-label required">Terms</label>
                  <div class="col-sm-10">
                     <div class="checkbox">
                        <label>
                       <input type="checkbox" name="checkme" id="terms" class="required" data-title="Untuk Mendaftar Anda Harus Menyetujuinya"><small class='text-muted'>Centang Untuk Menyetujui<a href="<?php echo site_url('pageindex/tos');?>">Sarat dan Ketentuan</a> Website</small>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <div class="frmPrc hide">
                        <button type="button" class="btn btn-primary" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                     </div>
                     <div class="frmBtn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <button type="submit" class="btn btn-danger delete"  data-dismiss="modal"></i> Batal</button>
                     </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
            </div>
          </div>
        </form>
      </div><!-- /.modal-content -->


<div aria-hidden="true" aria-labelledby="Login" class="modal fade" id=
"regpesertaorg" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type=
        "button"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Registrasi Peserta</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('regis/peserta'); ?>" class=
        "form-horizontal simple-validation" id="frmExample" method="post" name=
        "frmExample" novalidate="">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Nama Peserta</label>
            <div class="col-sm-10">
              <input class="form-control" maxlength="50" data-title="Nama Peserta Harus Diisi" name='nama' placeholder=
              "Nama Peserta" type="text">
            </div>
          </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Tempat Lahir</label>
            <div class="col-sm-10">
                              <input class="form-control " type="text" data-title="Harap Masukan Tempat Lahir " placeholder="Tempat Lahir" maxlength="50"  name='tl' >
                        </div>
                        </div>
                         <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Tanggal Lahir</label>
            <div class="col-sm-10">
                            
                                <input name="tgllhr" placeholder="yyyy-mm-dd" data-title="Masukan Tanggal Lahir" class="form-control date" type="date">
                                
                        </div>
                        </div>
                      <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Pekerjaan / Perusahaan</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Pekerjaan / Nama Perusahaan Tidak Boleh Kosong" placeholder="Pekerjaan" maxlength="50"  name='pekerjaan' >
                        </div>

                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Status</label>
            <div class="col-sm-10">
                                <label class="checkbox-inline"><input type="radio" name="status" value="Menikah">Menikah</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Lajang">Lajang</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Janda">Janda</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Duda">Duda</label>
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Alamat</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Alamat Tidak Boleh Kosong " placeholder="Alamat" maxlength="50"  name='alamat' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">RT/WW</label>
            <div class="col-sm-10">
                              <input class="form-control " type="text" data-title="Masukan RT dan RW " placeholder="RT / RW " maxlength="10"  name='rtrw' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Kelurahan</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Data Kelurahan Tidak Boleh Kosong " placeholder="Kelurahan" maxlength="50"  name='kelurahan' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Kecamatan</label>
            <div class="col-sm-10">
                              <input class="form-control " type="text" data-title="Data Kecamatan Tidak Boleh Kosong " placeholder="Kecamatan" maxlength="50"  name='kecamatan' >
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Kabupaten</label>
            <div class="col-sm-10">
                              <input class="form-control " type="text" data-title="Data Kabupaten Tidak Boleh Kosong " placeholder="Kabupaten" maxlength="50"  name='kabupaten' >
                        </div></div>
                       <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Provinsi</label>
            <div class="col-sm-10">
                        
                              <input class="form-control " type="text" data-title="Data Provinsi Tidak Boleh Kosong " placeholder="Provinsi" maxlength="50"  name='provinsi' >
                        </div>
                        </div>
                       <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Jenis Kelamin</label>
            <div class="col-sm-10">
                                <label class="checkbox-inline"><input type="radio" name="jk" value="Laki Laki">Laki Laki</label>
                                <label class="checkbox-inline"><input type="radio" name="jk" value="Perempuan">Perempuan</label>
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Agama</label>
            <div class="col-sm-10">
                             <select placeholder="Kabupaten" data-title="Agama Harus Dipilih " class="form-control" name='agama' >
                             
                                    <option disabled selected>Pilih agama</option>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Budha'>Budha</option>
                              </select>
                        </div>
                        </div>
                        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Keterangan</label>
            <div class="col-sm-10">
                      
                              <textarea rows="2" name='ket' data-title=" " class="form-control" placeholder="Masukan Keterangan"></textarea>
                        </div>
                        </div>
                        <hr>
                        <div class="form-group">
                  <div class="col-sm-10">
                     <h4 class="modal-title custom_align" id="Heading">Data Login</h4>
                  </div>
               </div>
               <div class="form-group required">
                  <label for="income" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control regex" id="username" placeholder="Masukan Username" name='username' data-title="Username Harus Di isi"  data-regex="^[^\s]{6,20}$" data-regex-title="Username Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group required">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control regex" id="password" name='password' placeholder="Enter password" data-title="Password required" data-regex="^[^\s]{6,20}$" data-regex-title="Password Minimal 6 - 20 Karakter">
                  </div>
               </div>
               <div class="form-group">
                  <label for="passwordConfirm" class="col-sm-2 control-label">Ulangi Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control match" id="passwordConfirm" placeholder="Ulangi Password" data-title="Confirmation password required" data-match="password" data-match-title="Password Yang Anda Masukan Tidak cocok">
                  </div>
               </div>
               <div class="form-group">
                  <label for="terms" class="col-sm-2 control-label required">Terms</label>
                  <div class="col-sm-10">
                     <div class="checkbox">
                        <label>
                       <input type="checkbox" name="checkme" id="terms" class="required" data-title="Untuk Mendaftar Anda Harus Menyetujuinya"><small class='text-muted'>Centang Untuk Menyetujui <a href="<?php echo site_url('pageindex/tos');?>">Sarat dan Ketentuan</a> Website</small>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <div class="frmPrc hide">
                        <button type="button" class="btn btn-primary" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                     </div>
                     <div class="frmBtn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <button type="submit" class="btn btn-danger delete"  data-dismiss="modal"></i> Batal</button>
                     </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
            </div>
          </div>
        </form>
      </div><!-- /.modal-content -->