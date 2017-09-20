
      <button class="btn btn-success" onclick="add_perusahaan()"><i class="glyphicon glyphicon-plus"></i>Tambah Perusahaan</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="tableperusahaan" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>ID Perusahaan</th>
                  <th>Nama Perusahaan</th>
                  <th>Kota</th>
                  <th>Provinsi</th>
                  <th>Tanggal Daftar</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
      </tbody>
      </table>

<div class="panel panel-success">
<h4 class='text-center'>Data Perusahaan Yang Belum Di Setujui</h4>
</div>      
  <table id="tableregperusahaan" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>No</th>
                  <th>Nama Perusahaan</th>
                  <th>Kota</th>
                  <th>Provinsi</th>
                  <th>Username</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
      </tbody>
      </table>
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type=
        "button"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Registrasi Peserta</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('regis/peserta'); ?>" class=
        "form-horizontal simple-validation" id="form" method="post" name=
        "frmExample" novalidate="">
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="name">Nama Perusahaan</label>
            <div class="col-sm-10">
         <input class="form-control " name='id' type="text" value='<?php echo $id; ?>'  placeholder="ID Peserta" readonly>
         </div>
         </div>
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
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                     </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
            </div>
          </div>
        </form>
      </div>
<script type="text/javascript">  
     
function setujui(id)
{
  if(confirm('Anda Yakin Akan Menyetujui ? '))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Perusahaan/setujui')?>/"+id,
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
                alert('Konfirmasi Gagal');
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
            url : "<?php echo site_url('Perusahaan/tolak')?>/"+id,
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

function add_perusahaan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Perusahaan'); // Set Title to Bootstrap modal title
}

function edit_peserta(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('peserta/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_peserta);
            $('[name="nama"]').val(data.nm_peserta);
            $('[name="tl"]').val(data.tmpt_lahir);
            $('[name="tgllhr"]').datepicker('update',data.tgl_lahir);
            $('[name="pekerjaan"]').val(data.pekerjaan);
            $('[name="status"]').val(data.status);
            $('[name="alamat"]').val(data.alamat);
            $('[name="rtrw"]').val(data.rtrw);
            $('[name="kelurahan"]').val(data.kelurahan);
            $('[name="kecamatan"]').val(data.kecamatan);
            $('[name="kabupaten"]').val(data.kabupaten);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="jk"]').val(data.jk);
            $('[name="agama"]').val(data.agama);
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
        url = "<?php echo site_url('perusahaan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('perusahaan/ajax_update')?>";
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

function delete_perusahaan(id)
{
    if(confirm('Anda Yakin Akan Menghapus'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('perusahaan/ajax_delete')?>/"+id,
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