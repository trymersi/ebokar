<style type="text/css">
 td{
 	height:50px;
 }
</style>
<table class="table table-condensed">
	<thead>
		<tr>
			<th width="3%">No</th>
			<th>Nama Lelang</th>
			<th>Nama Gapoktan</th>
			<th class="center">Kabupaten</th>
			<th class="center">Jumlah</th>
			<th class="center">Akhir Pendaftaran</th>
		</tr>
	</thead>
<tbody>     
<?php
$no=1;
foreach($listlelang as $list)
		{
		echo '<tr>';
		echo '<td>'.$no.'</td>';
		echo '<td><a href="listlelang/lihatlelang/'.$list->id_lelang.'">'.$list->jdl_lelang.'</a></td>';
		echo '<td>'.$list->nm_gapoktan.'</td>';
		echo '<td>'.$list->kab_gapoktan.'</td>';
		echo '<td>'.$list->jml_karet.' KG</td>';
		echo '<td>'.$list->tgl_tutup.'</td>';
		echo '</tr>';
  		$no++;
		}
?>
</tbody>
</table>