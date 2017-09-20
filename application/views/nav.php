<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">E-Karet</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('index.php/admin/try_admin');?>">Dashboard</a></li>
        <li><a href="#">Link</a></li>

        <?php if($this->session->userdata('level') == "admin"){?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tambah Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('index.php/gapoktan');?>">Gapoktan</a></li>
            <li><a href="<?php echo base_url('index.php/peserta');?>">Peserta</a></li>
          </ul>
        </li>
        <?php
          }
        ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(empty($this->session->userdata('username'))){
        ?>
        <li><a href="<?php echo site_url('auth'); ?>" >LOGIN</a></li>
        <?php
      }else{
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
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