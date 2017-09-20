<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Bokar Dinas Perkebunan Prov Riau</title>
    <link href="<?php echo base_url('asset/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/responsive.dataTables.css')?>" rel="stylesheet">
    <style>
    .kaki{
      background-color: #222222;
      color:#fff;
      padding:5px;
    }
    .kaki a:link{
      color:#fff;
    }
     .kaki a:visited{
      color:#fff;
    }
      .kaki a:hover{
      color:#000;
    }
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
    .container
    {
      background-color: #fff;
      margin-top:20px;
      box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
      padding-top: 20px;
      margin-bottom: 25px;
    }
    .modal-header
    {
      background-color: #1995dc;
      color:#fff;
    }
    .modal-title
    {
      color:#fffd;
    }
    .list-group
    {
      background-color: #fff;
    }
    .divider-vertical {
    height: 100%;
    margin: 0 9px;
    border-right: 1px solid #CDCDCD;
    border-left: 1px solid #f2f2f2;
  }
    .tod 
    {
     color : #CDCDCD;
     margin-right: 10px;
     margin-left: 10px;
    }
}

::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #F5F5F5;
}

::-webkit-scrollbar
{
  width: 3px;
  background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
  background-color:green; 

}


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
    border-right: none;
    position: relative;
    width:85%;

    text-align: left;
  }
 td { 
    /* Behave  like a "row" */
    border: none;
    position: relative;
    padding-left: 50%; 
    width:94.5%;
    text-align: center;
  }
.dataTable > thead > tr > th[class*="sort"]:after{
    content: "" !important;
    display: none;
}
.checkbox-inline{
  margin-left:  -15px;
  margin-right:  -15px;
}
.dataTables_length{
  margin-left: -50%;
}
.dataTables_filter{
  margin-left: -28%;
}
.divider-vertical {
  display: none;
}
.text-muted{
  display: block;
}
    </style>

</head>
  <body>

  <div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8 container">
     <img src="<?php echo base_url('asset/images/head.jpg')?>" width='100%' height='100%' style="margin:-20px 0px 10px 0px">
<?php
if($this->session->userdata('level')=='admin')
{
  ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E-Bokar</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo site_url('listlelang'); ?>">Lihat Lelang</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tambah Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('gapoktan');?>">Gapoktan</a></li>
            <li><a href="<?php echo site_url('peserta');?>">Perorangan</a></li>
            <li><a href="<?php echo site_url('Perusahaan');?>">Perusahaan</a></li>
          </ul>
        </li>
        <li><a href="<?php echo site_url('forum'); ?>">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(empty($this->session->userdata('username'))){
        ?>
        <li><a href="<?php echo site_url('auth'); ?>" >LOGIN</a></li>
        <?php
      }else{
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('index.php/admin/try_admin');?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('admin/try_admin/logout'); ?>">LOGOUT</a></li>
          </ul>
        </li>
        
        <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>
  <?php
}else if($this->session->userdata('level')=='gapoktan')
{
  ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E-Bokar</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo site_url('listlelang'); ?>">Lihat Lelang</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lelang<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('lelang/addlelang');?>">Buat Lelang</a></li>
          </ul>
        </li>
        <li><a href="<?php echo site_url('forum'); ?>">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(empty($this->session->userdata('username'))){
        ?>
        <li><a href="<?php echo site_url('auth'); ?>" >LOGIN</a></li>
        <?php
      }else{
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('index.php/admin/try_admin');?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('admin/try_admin/logout'); ?>">LOGOUT</a></li>
          </ul>
        </li>
        
        <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>
  <?php
}else if($this->session->userdata('level')=='peserta')
{
  ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E-Bokar</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo site_url('listlelang'); ?>">Lihat Lelang</a></li>
        <li><a href="<?php echo site_url('Partisipasi'); ?>">Partisipasi</a></li>
        <li><a href="<?php echo site_url('forum'); ?>">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(empty($this->session->userdata('username'))){
        ?>
        <li><a href="<?php echo site_url('auth'); ?>" >LOGIN</a></li>
        <?php
      }else{
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('index.php/admin/try_admin');?>">Dashboard</a></li>
            <li><a href="<?php echo site_url('admin/try_admin/logout'); ?>">LOGOUT</a></li>
          </ul>
        </li>
        
        <?php
      }
      ?>
      </ul>
    </div>
  </div>
</nav>
  <?php
}
else
{
  ?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E-Bokar</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo site_url('listlelang'); ?>">Lihat Lelang</a></li>
        <li><a href="<?php echo site_url('forum'); ?>">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('auth'); ?>" ><span class="glyphicon glyphicon-user"></span> LOGIN</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" data-toggle="modal" data-target="#regisgapoktan">Gapoktan</a></li>
          <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Peserta</a>
                            <ul class="dropdown-menu">
                               <li><a href="#" data-toggle="modal" data-target="#regpeserta">Perusahaan</a></li>
                               <li><a href="#" data-toggle="modal" data-target="#regpesertaorg">Perorangan</a></li>
                                
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
  <?php
}
 ?>
