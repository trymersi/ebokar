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
	echo "<tr><th width='30%'>ID Peserta</th><td>".$dalel->id_peserta."</td></tr>";
	echo "<tr><th width='30%'>Nama Peserta</th><td>".$dalel->nm_peserta."</td></tr>";
	echo "<tr><th width='30%'>Tempat Lahir</th><td>".$dalel->tmpt_lahir."</td></tr>";
	echo "<tr><th width='30%'>Tanggal Lahir</th><td>".$dalel->tgl_lahir."</td></tr>";
	echo "<tr><th width='30%'>Pekerjaan</th><td>".$dalel->pekerjaan."</td></tr>";
	echo "<tr><th width='30%'>Status</th><td>".$dalel->status."</td></tr>";
	echo "<tr><th width='30%'>Alamat</th><td>".$dalel->alamat."</td></tr>";
	echo "<tr><th width='30%'>RT/RW</th><td>".$dalel->rtrw."</span></td></tr>";
	echo "<tr><th width='30%'>Kelurahan</th><td>".$dalel->kelurahan."</span></td></tr>";
	echo "<tr><th width='30%'>Kecamatan</th><td>".$dalel->kecamatan."</td></tr>";
	echo "<tr><th width='30%'>Kabupaten</th><td>".$dalel->kabupaten."</td></tr>";
  echo "<tr><th width='30%'>Provinsi</th><td>".$dalel->provinsi."</td></tr>";
  echo "<tr><th width='30%'>Jenis Kelamin</th><td>".$dalel->jk."</td></tr>";
  echo "<tr><th width='30%'>Agama</th><td>".$dalel->agama."</td></tr>";
  echo "<tr><th width='30%'>Keterangan</th><td>".$dalel->ket."</td></tr>";
	echo "<tr><th width='30%'>Tanggal Daftar Website E-Bokar</th><td>".$dalel->tgl."</td></tr>";
}
?>
</table>