
      <button class="btn btn-success" onclick="add_lelang()"><i class="glyphicon glyphicon-plus"></i>Tambah Lelang</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="tableaddlelang" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>ID Lelang</th>
                  <th>Judul Lelang</th>
                  <th>Jumlah Karet</th>
                  <th>Tanggal mulai</th>
                  <th>Tanggal Tutup</th>
                  <th>Jumlah Peserta</th>
                  <th>Detail</th>
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
                              <input class="form-control " name='id' type="text" value='<?php echo $id; ?>'  placeholder="Id_lelang" readonly>
                        </div>
                        <div class="form-group">
                              <input class="form-control " name='jdl' type="text"  placeholder="Masukan Judul Lelang" required="">
                        </div>
                        <div class="form-group">
                              <input class="form-control currency"  type="number" placeholder="Jumlah Karet /kg" maxlength="5"  name='jml' >
                              <small class="text-muted">Masukan Jumlah Karet Tanpa Satuan Berat *Hanya Angka</small>
                        </div>
                         <div class="form-group">
                            
                                <input name="tglttp" placeholder="Masukan Tanggal Tutup Lelang" class="form-control date" type="date">
                                <small class="text-muted">Masukan Tanggal Tutup Lelang</small>
                        </div>
                        <div class="form-group">
                              <textarea rows="2" name='ket' class="form-control" placeholder="Masukan Keterangan"></textarea>
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
      


function add_lelang()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah lelang'); // Set Title to Bootstrap modal title
}

function edit_lelang(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('lelang/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_lelang);
            $('[name="jdl"]').val(data.jdl_lelang);
            $('[name="jml"]').val(data.jml_karet);
            $('[name="tglttp"]').val(data.tgl_tutup);
            $('[name="ket"]').val(data.ket);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit lelang'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('lelang/ajax_add')?>";
    } else {
        url = "<?php echo site_url('lelang/ajax_update')?>";
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

function delete_lelang(id)
{
    if(confirm('Anda Yakin Akan Menghapus'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('lelang/ajax_delete')?>/"+id,
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