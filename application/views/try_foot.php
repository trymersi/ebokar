
   	<div id="footer">
  		<center>
    		<p><img src="<?php echo base_url('asset/img/minilogo.png');?>"</p>
    		<br>
    		Copyright&copy; Dinas Perkebunan Provinsi Riau - E-Bokar Versi 1.0 <br>
    		Alamat : Jl. Cut Nyak Dien No.6 Pekanbaru, Telp/Fax. 0761-47153 Email: e-bokar.disbun@riau.go.id
  		</center>

         <div class="row">
         
        <div class="col-lg-12">
        <div class='kaki'>
            <ul class="nav nav-pills nav-justified">
                <li><a href="/">© 2016 Dinas Perkebunan Prov Riau.</a></li>
                <li><a href="<?php echo site_url('pageindex/tos');?>">Sarat Dan Ketentuan</a></li>
                <li><a href="#">Panduan Aplikasi</a></li>
            </ul>
        </div>
        </div>
    </div>
	</div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker-mobile.js')?>"></script>
<script src="<?php echo base_url('asset/js/jquery.maskMoney.min.js')?>"></script>
<script src="<?php echo base_url('asset/js/validation.js')?>"></script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#partisipasi').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('partisipasi/partisipasi')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

});
</script>    
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tablereggapoktan').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('gapoktan/regis')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tableregpeserta').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('peserta/regis')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tableregperusahaan').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('perusahaan/regis')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tablegapoktan').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('gapoktan/ajax_list')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tablepeserta').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('peserta/ajax_list')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],



    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tableperusahaan').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('perusahaan/ajax_list')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],



    });

});
</script>
<script type="text/javascript">
var save_method; 
var table;
$(document).ready(function() {

    //datatables
    table = $('#tableaddlelang').DataTable({ 
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        
        "ajax": {
            "url": "<?php echo site_url('lelang/ajax_list')?>",
            "type": "POST"
        },

       
        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],



    });

});
</script>
<script type="text/javascript">

<?php
if(empty($mod)){
 ?>
$('#login').modal('fade');
<?php
}else
{
  ?>
$('<?php echo $mods; ?>').modal('show');
<?php
}
?>

</script>
</body>
