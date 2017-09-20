
      <button class="btn btn-success" onclick="add_peserta()"><i class="glyphicon glyphicon-plus"></i>Tambah Peserta</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="tablepeserta" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>ID Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Kabupaten</th>
                  <th>Provinsi</th>
                  <th>Tanggal Daftar</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
      </tbody>
      </table>

<div class="panel panel-success">
<h4 class='text-center'>Data Peserta Yang Belum Di Setujui</h4>
</div>      
  <table id="tableregpeserta" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>No</th>
                  <th>Nama Peserta</th>
                  <th>Pekerjaan</th>
                  <th>Kabupaten</th>
                  <th>Provinsi</th>
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
               <form id="form">
                        <div class="form-group">
                        
                              <input class="form-control " name='id' type="text" value='<?php echo $id; ?>'  placeholder="ID Peserta" readonly>
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Nama Peserta" maxlength="50"  name='nama' >
                        </div>
                        <div class="form-group">
                       
                              <input class="form-control " type="text" placeholder="Tempat Lahir" maxlength="50"  name='tl' >
                        </div>
                         <div class="form-group">
                            
                                <input name="tgllhr" placeholder="yyyy-mm-dd" class="form-control date" type="date">
                                
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Pekerjaan" maxlength="50"  name='pekerjaan' >
                        </div>
                        <div class="form-group">
                        <label>Status</label>
                        <br/>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Menikah">Menikah</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Lajang">Lajang</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Janda">Janda</label>
                                <label class="checkbox-inline"><input type="radio" name="status" value="Duda">Duda</label>
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Alamat" maxlength="50"  name='alamat' >
                        </div>
                        <div class="form-group">
                       
                              <input class="form-control " type="text" placeholder="RT / RW " maxlength="10"  name='rtrw' >
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Kelurahan" maxlength="50"  name='kelurahan' >
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Kecamatan" maxlength="50"  name='kecamatan' >
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Kabupaten" maxlength="50"  name='kabupaten' >
                        </div>
                        <div class="form-group">
                        
                              <input class="form-control " type="text" placeholder="Provinsi" maxlength="50"  name='provinsi' >
                        </div>
                       <div class="form-group">
                        <label>Jenis Kelamin</label>

                                <label class="checkbox-inline"><input type="radio" name="jk" value="Laki Laki">Laki Laki</label>
                                <label class="checkbox-inline"><input type="radio" name="jk" value="Perempuan">Perempuan</label>
                        </div>
                        <div class="form-group">
                        
                             <select placeholder="Kabupaten" class="form-control" name='agama' >
                             
                                    <option disabled selected>Pilih agama</option>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Budha'>Budha</option>
                              </select>
                        </div>
                        <div class="form-group">
                      
                              <textarea rows="2" name='ket' class="form-control" placeholder="Masukan Keterangan"></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                        <h4 class=" custom_align" id="Heading">Data Login</h4>
                        </div>
                        <div class="form-group">
                              <input class="form-control" name='user' type="text" placeholder="Username"  required>
                        </div>
                        <div class="form-group">
                              <input type="password" data-toggle="validator" data-minlength="6" name="pass" class="form-control" id="inputPassword" placeholder="Password" data-match-error="Password Minimal 6 Karakter" required>
                              
                        </div>
                        <div class="form-group">
                              <input type="password" class="form-control" name ="password2" id="inputPasswordConfirm"  data-match-error="Password Tidak Cocok" placeholder="Confirm" required>
                              <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
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
            url : "<?php echo site_url('peserta/setujui')?>/"+id,
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
            url : "<?php echo site_url('peserta/tolak')?>/"+id,
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


function add_peserta()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Peserta'); // Set Title to Bootstrap modal title
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
        url = "<?php echo site_url('peserta/ajax_add')?>";
    } else {
        url = "<?php echo site_url('peserta/ajax_update')?>";
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

function delete_peserta(id)
{
    if(confirm('Anda Yakin Akan Menghapus'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('peserta/ajax_delete')?>/"+id,
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