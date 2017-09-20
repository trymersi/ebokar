<?php
if($this->session->userdata('level')=="admin")
{
	$halaman = "Admin";
}
elseif($this->session->userdata('level')=="gapoktan")
{
	$halaman = "Gapoktan";
}
else
{
	$halaman = "Member";
}
?>

<h5>Haii selamat datang dihalaman <b>Member</b>, anda login sebagai <?php echo $username; ?></h5>

