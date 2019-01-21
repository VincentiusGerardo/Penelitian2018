<div class="container">
    <div class="row">
        <h1 class="judulHalaman">Change Password</h1><br/>
        <form class="form-horizontal cold-lg-8" action="<?php echo base_url('Source/do/doChangePassword'); ?>" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-4">Old Password:</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="oldPass">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">New Password:</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="newPass">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Repeat Password:</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="repPass">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-5">
                    <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                    <input type="reset" name="btnReset" value="Cancel" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</div>
<!--swal-->
<script src="<?=base_url('js/sweetalert.min.js');?>"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('alert') != null){ ?>
    swal({
      //title: "Berhasil!",
      text: "<?php echo $this->session->flashdata('msg'); ?>",
      icon: "<?php echo $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
  <?php } ?>
</script>
