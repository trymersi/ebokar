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
foreach($gapoktan as $dalel)
{
	echo"<tr>";
	echo "<tr><th width='30%'>ID Gapoktan</th><td>".$dalel->id_gapoktan."</td></tr>";
	echo "<tr><th width='30%'>Nama Gapoktan</th><td>".$dalel->nm_gapoktan."</td></tr>";
	echo "<tr><th width='30%'>Legal Aspek</th><td>".$dalel->legal_aspek."</td></tr>";
	echo "<tr><th width='30%'>Tahun Berdiri </th><td>".$dalel->thn_berdiri."</td></tr>";
	echo "<tr><th width='30%'>Tahun Mulai Beroperasi</th><td>".$dalel->thn_operasi."</td></tr>";
	echo "<tr><th width='30%'>Desa Gapoktan</th><td>".$dalel->desa_gapoktan."</td></tr>";
	echo "<tr><th width='30%'>Kecamatan Gapoktan</th><td>".$dalel->kec_gapoktan."</td></tr>";
	echo "<tr><th width='30%'>Kabupaten Gapoktan</th><td>".$dalel->kab_gapoktan."</span></td></tr>";
	echo "<tr><th width='30%'>Ketua Gapoktan</th><td>".$dalel->ketua_gapoktan."</span></td></tr>";
	echo "<tr><th width='30%'>Nomor Hp</th><td>".$dalel->no_hp."</td></tr>";
	echo "<tr><th width='30%'>Keterangan Gapoktan</th><td>".$dalel->ket."</td></tr>";
	echo "<tr><th width='30%'>Tanggal Daftar Website E-Bokar</th><td>".$dalel->tgl."</td></tr>";
}
?>
</table>