     
<?php echo form_open("auth/cek_login"); ?>
<div  id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title custom_align" id="Heading">Login User</h4>
                  </div>
                  <?php if($this->session->flashdata('message')){?> <div class="alert alert-danger">  <?php echo $this->session->flashdata('message')?> </div> <?php } ?>
                  <div class="modal-body">
                        <div class="form-group">
                              <input class="form-control " type="text" value='<?php if(!empty($username)){echo "$username";}else{echo '';}?>' name='username' placeholder="USERNAME" >
                        </div>
                        <div class="form-group">
                              <input class="form-control " type="password" value='<?php if(!empty($password)){echo "$password";}else{echo '';}?>' name='password' placeholder="PASSWORD" >
                        </div>
                  <div class="modal-footer ">
                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Login</button>
                  </div>
                 <?php echo form_close(); ?>
           </div>
   </div>
</div>
</div>