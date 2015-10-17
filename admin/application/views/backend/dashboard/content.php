<div class="row-fluid">
        <div class="span12">
                  <?php if($this->session->flashdata('error') != FALSE){?>
                    <div class="alert alert-error">
                      <button class="close" data-dismiss="alert"></button>
                      <span><?php echo $this->session->flashdata('error');?></span>
                    </div>
                    <?php }?>
                    <?php if($this->session->flashdata('warning') != FALSE){?>
                    <div class="alert">
                      <button class="close" data-dismiss="alert"></button>
                      <span><?php echo $this->session->flashdata('warning');?></span>
                    </div>
                    <?php }?>
                    <?php if($this->session->flashdata('success') != FALSE){?>
                    <div class="alert alert-success">
                      <button class="close" data-dismiss="alert"></button>
                      <span><?php echo $this->session->flashdata('success');?></span>
                    </div>
                    <?php }?>
                    <?php if($this->session->flashdata('info') != FALSE){?>
                    <div class="alert alert-info">
                      <button class="close" data-dismiss="alert"></button>
                      <span><?php echo $this->session->flashdata('info');?></span>
                    </div>
                    <?php }?>
        </div>
</div>