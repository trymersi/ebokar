<style type="text/css">
	 @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
 th { 
    /* Behave  like a "row" */
  	border: none;
    position: relative;
    padding-left: 50%; 
    width:100%;
    text-align: center;
  }
 td { 
    /* Behave  like a "row" */
    border: none;
    position: relative;
    padding-left: 50%; 
    width:100%;
    text-align: center;
  }
  .btn
  {
  	margin-left:33%;
  }
</style>
<?php 
$peserta = count($jmlpes);
if($tawar == null){
$tawaran = "Belum Ada Tawaran";
  $hrg = "Belum Ada Tawaran";
}else
{
$tawaran = $tawar[0]->jml_tawar;
$hrg = number_format( $tawaran , 0, ',' , '.' );
};
?>
<span class='text-right' > <h4><span id='lelang'>Lelang Akan Berakhir Pada </span> <span class='text-danger' id='countdown'></span></h4></span>
<table class="table table-responsive">
<?php
foreach($datalelang as $dalel)
{
	$exp=$dalel->tgl_tutup;
	$idlelang=$dalel->id_lelang;
	echo"<tr>";
	echo"<th colspan='2' style='background-color:#d34615;color:#fff'>Informasi Lelang</th></tr>";
	echo "<tr><th width='20%'>Kode Lelang</th><td>".$dalel->id_lelang."</td></tr>";
	echo "<tr><th width='20%'>Judul Lelang</th><td>".$dalel->jdl_lelang."</td></tr>";
	echo "<tr><th width='20%'>Kode  Gapoktan</th><td>".$dalel->id_gapoktan."</td></tr>";
	echo "<tr><th width='20%'>Nama  Gapoktan</th><td>".$dalel->nm_gapoktan."</td></tr>";
	echo "<tr><th width='20%'>Kabupaten</th><td>".$dalel->kab_gapoktan."</td></tr>";
	echo "<tr><th width='20%'>Jumlah Bokar</th><td>".$dalel->jml_karet." KG</td></tr>";
	echo "<tr><th width='20%'>Mulai Lelang</th><td>".$dalel->tgl_buka."</td></tr>";
	echo "<tr><th width='20%'>Lelang Berakhir</th><td><span class='text-danger'>".$dalel->tgl_tutup."</span></td></tr>";
	echo "<tr><th width='20%'>Tawaran Tertinggi</th><td><span class='text-danger'>Rp. ".$hrg."</span></td></tr>";
	echo "<tr><th width='20%'>Jumlah Peserta</th><td>".$peserta."</td></tr>";

}
?>
</table>
<?php
if($pesertalist != NULL)
{
   echo "<hr><h3 class='text-center'>Data Peserta Yang Melakukan Penawaran</h3><hr>";
  ?>
    <table id="tablelistpeserta" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
            <tr>
                  <th>ID Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Jumlah Tawaran</th>
                  <th>Detail Peserta</th>
                  <th>Jadikan Pemenenang</th>
            </tr>
      </thead>
      <tbody>
      <?php
      foreach($pesertalist as $pelis)
      {
       
         echo "<tr>
              <td>".$pelis->id_peserta."</td>                                                      
              <td>".$pelis->nm_peserta."</td>
              <td>Rp. ".number_format($pelis->jml_tawar , 0, ',' , '.' )."</td>
              <td><a class='btn btn-sm btn-success' href='".site_url('lelang/detailpes/'.$pelis->id_peserta)."' title='Detail'><i class='glyphicon glyphicon-search'></i> Detail</a></td>
              <td><a class='btn btn-sm btn-warning' onclick='pilih_menang(".'"'.$pelis->id_peserta.'","'.$idlelang.'"'.")' title='Detail'><i class='glyphicon glyphicon-check'></i> Jadikan Pemenenang</a></td>
          ";
      }
     
      ?>
      </tbody>
      </table>
  <?php
}
else
{
  echo "<h3 class='text-center'>Belum Ada Yang Melakukan Penawaran</h3>";
}
?>
<script>
var end = new Date('<?php echo $exp; ?> 07:04 AM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';
            document.getElementById('lelang').innerHTML = 'Lelang Sudah Berakhir |';
            document.getElementById("penawaran").disabled = true;

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = days + ' Hari ';
        document.getElementById('countdown').innerHTML += hours + ' Jam ';
        document.getElementById('countdown').innerHTML += minutes + ' Menit ';
        document.getElementById('countdown').innerHTML += seconds + ' Detik ';
    }

    timer = setInterval(showRemaining, 1000);
</script>

<div class="modal fade" id="tawar" tabindex="-1" role="dialog" aria-labelledby="penawaran" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Masukan Penawaran</h4>
                  </div>
                  
                  <div class="modal-body form">
               	
                  <form id='form' >
                  <span class='text-danger'>Tawaran Tertinggi Saat Ini = Rp<?php echo $hrg;?></span>
                      <div class="input-group">

                      		 <input type='hidden' name='id' value="<?php echo $id; ?>">
                      		 <input type='hidden' name='idlelang' value="<?php echo $idlelang; ?>">
                      		 <input type='hidden' name ='min' id='min' value='<?php echo $tawaran; ?>'>
                      		 <input type='hidden' name='idpeserta' value="<?php echo $this->session->userdata('uid'); ?>">
                             <span class="input-group-addon">RP</span><input class="form-control" id='jml'  placeholder="Masukan Penawaran" maxlength="10"  name='jml' >
                            
							<p id="demo"></p>
                        </div>
                       
                              <small class='text-danger'>*Masukan Nominal Diatas Rp ------- (Penawaran Tertinggi)</small>
                   </div>
                  <div class="modal-footer"> 
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Masukan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                
            </div>
           
</div>
</div>
<script type="text/javascript">
	function save()
	{
     var a = document.getElementById("min").value;
     var b = document.getElementById("jml").value;
     bb = b.split('.').join('');
	$('#btnSave').text('Masukan...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 

    var url;
        url = "<?php echo site_url('listlelang/tawarlelang')?>";
    if( bb <= a)
    {
    	 alert('Tawaran Yang Dimasukan Harus Lebih Tinggi Dari Tawaran Tertinggi');
    	 $('#btnSave').text('Masukan'); //change button text
         $('#btnSave').attr('disabled',false); //set button enable 
    }
    else
    {
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
        	$('#modal_form').modal('hide');
			location.reload();
			$('#btnSave').text('Masukan'); //change button text
         	$('#btnSave').attr('disabled',false); //set button enable 
        },
          error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Gagal Memasukan Penawaran');
            $('#btnSave').text('Masukan'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
}
function pilih_menang(id, ids)
{
    if(confirm('Anda Yakin Akan Menjadikan Peserta Tersebut Pemenang'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('lelang/addpemenang')?>/"+id+"/"+ids,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                alert('Pemenang Berhasil Ditentukan');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal Menjadikan Pemenang');
            }
        });

    }
}
</script>