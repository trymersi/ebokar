
       <div class="panel panel-success">
<h4 class='text-center'>List Data Gapoktan</h4>
</div>      
      <button class="btn btn-success" onclick="add_gapoktan()"><i class="glyphicon glyphicon-plus"></i>Tambah Gapoktan</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
      <table id="tablegapoktan" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>ID Gapoktan</th>
                  <th>Nama Gapoktan</th>
                  <th>Kabupaten</th>
                  <th>Keterangan</th>
                  <th>Tanggal Daftar</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
      </tbody>
      </table>
      <div class="panel panel-success">
<h4 class='text-center'>Data Gapoktan Yang Belum Di Setujui</h4>
</div>      
  <table id="tablereggapoktan" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>No</th>
                  <th>Nama Gapoktan</th>
                  <th>Kabupaten</th>
                  <th>Keterangan</th>
                  <th>Username</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
      </tbody>
      </table>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
               <form class="form-horizontal simple-validation" id="form" novalidate>
                        <div class="form-group required">
                         <label for="name" class="col-sm-2 control-label">ID Gapoktan</label>
                  <div class="col-sm-10">
                              <input class="form-control " name='id' type="text" value='<?php echo $id; ?>'  placeholder="Id_gapoktan" readonly>
                        </div>
                        </div>
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
                  <label for="age" class="col-sm-2 control-label">Tahun Oprasi</label>
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
                        <input type="checkbox" name="checkme" id="terms" class="required" data-title="Untuk Mendaftar Anda Harus Menyetujuinya"><small class='text-muted'> Jika Anda Menyetujui Kebijakan Website Ini Tekan Ceklis</small>
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
                        <button type="submit" onclick="save()" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <button type="submit" class="btn btn-danger delete"  data-dismiss="modal"></i> Batal</button>
                     </div>
                  </div>
               </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
      
function setujui(id)
{
  if(confirm('Anda Yakin Akan Menyetujui ? '))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('gapoktan/setujui')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Confirmasi Gagal');
            }
        });

    }    
}
function tolak(id)
{
  if(confirm('Anda Yakin Akan Menolak ? '))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('gapoktan/tolak')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('error');
            }
        });

    }    
}

function add_gapoktan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Gapoktan'); // Set Title to Bootstrap modal title
}

function edit_gapoktan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('gapoktan/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_gapoktan);
            $('[name="nama"]').val(data.nm_gapoktan);
            $('[name="kab"]').val(data.kab_gapoktan);
            $('[name="ket"]').val(data.ket);
            $('[name="user"]').val(data.username);
            $('[name="pass"]').val(data.password);
            $('[name="password2"]').val(data.password);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Gapoktan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('gapoktan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('gapoktan/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
                location.reload();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_gapoktan(id)
{
    if(confirm('Anda Yakin Akan Menghapus'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('gapoktan/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal Menghapus Data');
            }
        });

    }
}
</script>