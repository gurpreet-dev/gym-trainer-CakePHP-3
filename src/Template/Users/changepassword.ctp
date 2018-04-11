
    <div class="page">
      <section id="content-full" class="col-940">
        <div class="page-header">
          <div class="container">
            <h1 class="page-title mb0 white">Change Password</h1>
          </div>
        </div>
      </section>
     
	
    
        
           
       <div class="container-fluid fpwd" style="margin-top: 3%;">
          <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
             <?= $this->Flash->render() ?>
             <?= $this->Form->create('', ['type' => 'file', 'id' => 'change-from']) ?>
                <div class="form-group">
                   <div class="input-group">
                      <div class="input-group-addon iga2">
                         <span class="glyphicon glyphicon-lock"></span>
                      </div>
                      <input type="password" class="form-control" placeholder="Enter Your Old Password" name="opassword">
                   </div>
                </div>
           
            <div class="form-group">
                   <div class="input-group">
                      <div class="input-group-addon iga2">
                         <span class="glyphicon glyphicon-lock"></span>
                      </div>
                      <input type="password" class="form-control" placeholder="Enter Your New Password" name="password1" id="password1">
                   </div>
                </div>
         
                <div class="form-group">
                   <div class="input-group">
                      <div class="input-group-addon iga2">
                         <span class="glyphicon glyphicon-lock"></span>
                      </div>
                      <input type="password" class="form-control" placeholder="Confirm Password" name="password">
                   </div>
                </div>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-lg btn-info savefp']); ?>
               	<?= $this->Form->end() ?>
             </div>
          </div>
       </div>
    </div>
    <!-- default page template - end --> 
    
    <script>
	$().ready(function() {
		$("#change-from").validate({
			rules: {
				opassword: "required",
				password1: "required",
				password: {
					equalTo: "#password1"
				}
			},
			messages: {
				opassword: "Please enter your old password",
				password1: "Password is required",
				password: {
					equalTo: "Password and confirm password should be same"
				}		
			}
		});
	});
	</script>