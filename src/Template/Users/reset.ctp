<div class="container">
	<div class="row">
    	<div class="col-md-6 col-md-offset-3">
        	<?= $this->Flash->render() ?>
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">Reset Password</div>
                    <div class="panel-body">
                    <?= $this->Form->create('', ['type' => 'file', 'class' => 'form-horizontal','id' => 'reset-form']) ?>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password"  name="password1" id="password1" >
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input type="password"  name="password">
                    </div>
                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-info']); ?>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
</div>
<script>
$().ready(function() {
	$("#reset-form").validate({
		rules: {
			password1: {
				required: true,
				minlength: 8
			},

			password: {
				equalTo: "#password1"
			}
		},
		messages: {
			password1: {
				required: "Please Enter New password",
				minlength: "Please enter atleast 8 characters"
			},

			password: {
				equalTo: "Passwords do not match"
			}		
		}
	});
});
</script>