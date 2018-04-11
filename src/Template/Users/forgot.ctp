  <div class="page">
      <section id="content-full" class="col-940">
        <div class="page-header">
          <div class="container">
            <h1 class="page-title mb0 white">Forgot Password</h1>
          </div>
        </div>
      </section>
       <div class="container-fluid fpwd" style="margin-top: 3%;">
          <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
             	<?= $this->Flash->render() ?>
                <?= $this->Form->create('', ['type' => 'file']) ?>
                <div class="form-group">
                   <div class="input-group lock_position">
                           <i class="fa fa-envelope adjst_cntr" aria-hidden="true"></i>
                                <input type="text" class="form-control" id="loginuname" placeholder="Email">
                                
                            </div>
                </div>
           		<?= $this->Form->button(__('Submit'),['class'=>'btn btn-lg btn-info savefp for_save']); ?>
                <?= $this->Form->end() ?>
             </div>
          </div>
       </div>
    </div>
    <!-- default page template - end --> 
