<section class="content-header">
    <h1>
    Social Links
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Social Link</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Social Link <strong>(ID: <?php echo $link->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($link, ['id' => 'link-form']) ?>
              <div class="box-body">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <?php echo $this->Form->control('link', ['class' => 'form-control', 'label' => false, 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Icon (Font Awesome)</label>
                  <?php echo $this->Form->control('icon', ['class' => 'form-control', 'label' => false, 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Background Color</label>
                  <?php echo $this->Form->control('background', ['class' => 'form-control', 'label' => false, 'required' => 'required']); ?>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 

<script>
$().ready(function() {
	$("#link-form").validate();
});
</script>      