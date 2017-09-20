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
<table class="table table-responsive">
<?php
foreach($peserta as $dalel)
{
	echo"<tr>";
	echo "<tr><th width='30%'>ID Perusahaan</th><td>".$dalel->id_perusahaan."</td></tr>";
	echo "<tr><th width='30%'>Nama Perusahaan</th><td>".$dalel->nm_perusahaan."</td></tr>";
	echo "<tr><th width='30%'>Alamat Kantor</th><td>".$dalel->alamat_kantor."</td></tr>";
	echo "<tr><th width='30%'>Kota Kantor</th><td>".$dalel->kota_kantor."</td></tr>";
	echo "<tr><th width='30%'>Provinsi Kantor</th><td>".$dalel->prov_kantor."</td></tr>";
	echo "<tr><th width='30%'>Telpon Kantor</th><td>".$dalel->tel_kantor." KG</td></tr>";
	echo "<tr><th width='30%'>Email Kantor</th><td>".$dalel->email_kantor."</td></tr>";
	echo "<tr><th width='30%'>Alamat Pabrik</th><td>".$dalel->alamat_pabrik."</span></td></tr>";
	echo "<tr><th width='30%'>Kota Pabrik</th><td>".$dalel->kota_pabrik."</span></td></tr>";
	echo "<tr><th width='30%'>Provinsi Pabrik</th><td>".$dalel->prov_pabrik."</td></tr>";
	echo "<tr><th width='30%'>Keterangan</th><td>".$dalel->keterangan."</td></tr>";
	echo "<tr><th width='30%'>Tanggal Daftar Website E-Bokar</th><td>".$dalel->tgl."</td></tr>";
}
?>
</table>