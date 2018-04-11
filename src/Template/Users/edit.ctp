<style>
.profile-img-front-container{
    width: 255px !important;
    height: 255px !important;
    overflow: hidden;
}

</style>


<div id="profile" class="trainer_profile_edit">
    <section id="profile-top">
        <div class="profile-cover-front">
        <?php if($user['role'] == 'client'){ ?>
        <div class="slideshow_gallery_edit" style="background-image: url(../../images/client.jpg);">
        <?php } ?>
        
        <?php if($user['role'] == 'trainer'){ ?>
        <div class="slideshow_gallery_edit" style="background-image: url(../../images/trainer.jpg);">
        <?php } ?>
        </div>
        </div>
        <div class="profile-top-info section">
        <div class="container profile-container">
        <div class="row">
        <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-10 col-xs-push-1 col-xxs-12 col-xxs-push-0">
        <input id="bitly" type="hidden" value="http://bit.ly/2u1yY3e">
        <input id="account-id" type="hidden" value="57875">
        <div class="profile-info-front">
        <div class="profile-img-front-container"> <img class="profile-img-front img-responsive" src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user['image'] != '') ? $user['image'] : 'noimage.png' ?>" alt="Profile image" width="150" height="150" style="width:100%; height:100%;"> </div>
        <div class="profile-info">
        <h1 class="profile-name h4 white mb0"><?php echo ucwords($user['first_name'].' '.$user['last_name']); ?></h1>
        <div class="date-banner"> Joined <?php echo date('M d, Y', strtotime($user['created'])); ?>
        <div> </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
<!-- profile cover info - end -->

<section class="profile-edit1">
	
    <div class="row">
    	<?= $this->Flash->render() ?>
	</div>
    
    <?php if($loggeduser['role'] == 'trainer'){ ?>
	<div class="row">
    	<div class="col-md-12">
        	<a href="<?php echo $this->request->webroot; ?>users/trainer" class="btn btn-info pull-right">Edit Trainer Info</a>
        </div>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="form-group col-xs-12 col-md-6">
        <label class="control-label"> CHANGE E-MAIL</label>
        </div>
        <div class="form-group col-xs-12 col-md-6">
        <label class="control-label">CHANGE PASSWORD </label>
        </div>
    </div>
    
    <div class="row">
    	 <form action="" method="post" class="form-horizontal" id="email-form"> 
            <div class="col-xs-12 col-md-6"> 
            <div class="form-group">
            <label class="control-label"> Email</label>
            <div class="inner-addon left-addon">
            <input type="email" name="email" id="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" class="form-control" placeholder="Email" />
            </div>
            </div> <!--form-group -->
            <input type="hidden" name="form_type" value="email" />
            <div class="form-group">
            <input type="submit" value="Save" />
            <input type="reset" value="Clear" />
            </div><!--form-group -->
        	</div> <!--col-xs-6-->
        </form>
        
        <form action="<?php echo $this->request->webroot; ?>users/changepassword?route=edit" method="post" class="form-horizontal" id="password-form">
            <div class="col-xs-12 col-md-6"> 
            <div class="form-group">
            <label class="control-label">Current Password  </label>
            <div class="inner-addon right-addon">
            <input type="password" name="opassword" id="opassword" class="form-control" placeholder="Current Password" />
            </div>
            </div>
            <div class="form-group ">
            <label class="control-label">New Password (min. 8 characters)  </label>
            <div class="inner-addon right-addon">
            <input type="password" name="password" class="form-control"  placeholder="New Password" />
            </div>
            </div>
            <div class="form-group">
            <input type="submit" value="Save" />
            <input type="reset" value="Clear" />
            </div>
            </div><!--col-xs-6-->
        </form>
    </div>
<!--row -->

<hr />

    <div class="row">
    <div class="form-group col-xs-12 col-md-6">
    <label class="control-label"> PROFILE INFORMATION</label>
    </div>
    </div>
	<!--row -->

    	<form action="" method="post" class="form-horizontal" id="basic-form" enctype="multipart/form-data">
        	<div class="row">
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label"> First name</label>
                <div class="inner-addon left-addon">
                <input type="text" name="first_name" placeholder="First Name" id="first_name" value="<?php echo isset($user['first_name']) ? $user['first_name'] : ''; ?>" class="form-control" placeholder="First Name" />
                </div>
                </div>
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label">Last Name </label>
                <div class="inner-addon right-addon">
                <input type="text" name="last_name" placeholder="Last Name" value="<?php echo isset($user['last_name']) ? $user['last_name'] : ''; ?>" class="form-control" placeholder="Username" />
                </div>
                </div>
                <div class="form-group col-xs-12 col-md-6" style="height: 60px !important;">
                    <label class="control-label">Locality </label>
                    <div class="inner-addon left-addon">
                		<input type="text" id="txtPlaces" name="address" value="<?php echo $user['address']; ?>" placeholder="Enter a location" class="form-control" />
                        <input type="hidden" id="latitude" name="latitude" value="<?php echo $user['latitude']; ?>" class="form-control" />
                        <input type="hidden" id="longitude" name="longitude" value="<?php echo $user['longitude']; ?>" class="form-control" />
                    </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label">Country </label>
                <div class="inner-addon right-addon">
                <select class="form-control form-select ajax-processed sel-country" id="edit-node-type" name="country" readonly="readonly">
                <option value="-1" selected="selected">Select Country</option>
                <?php if(!empty($countries)){ ?>
                <?php foreach($countries as $country){ ?>
                <?php if($user['country'] == $country['name']){ ?>
                <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                <?php }else{ ?>
                <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                </select>
                </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6" style="height: 60px !important;">
                    <label class="control-label">State </label>
                    <div class="inner-addon left-addon">
                		<input type="text" id="state" name="state" value="<?php echo $user['state']; ?>" placeholder="Enter state" class="form-control" />
                    </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6" style="height: 60px !important;">
                    <label class="control-label">Zip Code </label>
                    <div class="inner-addon left-addon">
                		<input type="text" id="zip" name="zip" value="<?php echo $user['zip']; ?>" placeholder="Enter zipcode" class="form-control" />
                    </div>
                </div>
                
                
                <div class="form-group col-xs-12 col-md-6 radiomain" >
                <label class="control-label">Gender </label>
                <div class="inner-addon right-addon">
                <div class="radiobtn">
                <?php if($user['gender'] == 'male'){ ?>
                <input type="radio" id="f-option" value="male" name="gender" checked="checked">
                <?php }else{ ?>
                <input type="radio" id="f-option" value="male" name="gender">
                <?php } ?>
                <label for="f-option">Male</label>
                </div>
                <div class="radiobtn">
                <?php if($user['gender'] == 'female'){ ?>
                <input type="radio" id="s-option" value="female" name="gender" checked="checked">
                <?php }else{ ?>
                <input type="radio" id="s-option" value="female" name="gender">
                <?php } ?>
                <label for="s-option">Female</label>
                </div>
                </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6">
                	<div class="col-xs-4">
                    <label class="control-label"> </label>
                	<div class="inner-addon left-addon">
                    <img src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user['image'] != '') ? $user['image'] : 'noimage.png' ?>" class="previewHolder" style="width: 100%;"/>
                    </div>
                    </div>
                    <div class="col-xs-8">
                    <label class="control-label"> </label>
                	<div class="inner-addon left-addon">
                    <input type="file" name="image" id="profilePic"/>
                    </div>
                    </div>
                <div class="clearfix"></div>
                </div>
                
                
                <div class="form-group col-xs-12">
                <div class="row">
                <div class="col-sm-6">
                <label class="control-label"> Year of birth</label>
                <div class="inner-addon left-addon">
                <input type="text" name="dob" id="dob" class="form-control" value="<?php echo isset($user['dob']) ? $user['dob'] : ''; ?>" placeholder="" />
                </div>
                </div>
                </div>
			</div>                
            </div>
            
            <?php if($user['role'] == 'trainer'){ ?>
            <hr />
            <div class="row">
            <div class="form-group col-xs-12 col-md-6">
            <label class="control-label"> GYM INFORMATION</label>
            </div>
            </div>
            
            <div class="row">
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label"> Gym name</label>
                <div class="inner-addon left-addon">
                <input type="text" name="gym_name" id="first_name" value="<?php echo $user['gym_name']; ?>" class="form-control" placeholder="Enter Gym Name" />
                </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label"> Website</label>
                <div class="inner-addon right-addon">
                <input type="text" name="website" id="website" value="<?php echo $user['website']; ?>" class="form-control" placeholder="Enter Website" />
                </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label"> Type of training</label>
                <div class="inner-addon left-addon">
                <textarea name="training_types" id="training_types" class="form-control" placeholder="Enter Type Of Training" /><?php echo $user['training_types']; ?></textarea>
                </div>
                </div>
                
                <div class="form-group col-xs-12 col-md-6">
                <label class="control-label"> Experience of years</label>
                <div class="inner-addon right-addon">
                <textarea name="experience" id="experience" class="form-control" placeholder="Enter Experience of years" /><?php echo $user['experience']; ?></textarea>
                </div>
                </div>
                
                <div class="form-group col-xs-12">
                <label class="control-label"> Licence's (separate with comma ) Left blank will be registered as none</label>
                <div class="inner-addon right-addon">
                <textarea name="licenses" id="licenses" class="form-control" placeholder="Enter Licence's (separate with comma ) Left blank will be registered as none" /><?php echo $user['licenses']; ?></textarea>
                </div>
                </div>
                
                <div class="form-group col-xs-12">
                <label class="control-label"> Gym Type:</label>
                <div class="inner-addon left-addon">
                <?php
                $options = ['public' => 'Public Gym', 'private' => 'Private Gym', 'home' => 'Home Gym'];
                echo $this->Form->input('gym_type', [
                    'templates' => [
                        'radioWrapper' => '<div class="inner-addon left-addon">{{label}}</div>'
                    ],
                    'type' => 'radio',
                    'options' => $options,
                    'required' => 'required',
                    'label' => false,
                    'default' => $user['gym_type']
                ]);
                ?>
                </div>
                </div>
                                
                <div class="form-group col-xs-12">
                <label class="control-label"> Willing to go to clients home to conduct service?</label>
                <div class="inner-addon left-addon">
                <?php
                $options = ['yes' => 'Yes', 'no' => 'No'];
                echo $this->Form->input('go_home', [
                    'templates' => [
                        'radioWrapper' => '<div class="inner-addon left-addon">{{label}}</div>'
                    ],
                    'type' => 'radio',
                    'options' => $options,
                    'required' => 'required',
                    'label' => false,
                    'default' => $user['go_home']
                ]);
                ?>
                </div>
                </div>
                
                <div class="form-group col-xs-12">
                <label class="control-label"> Interested in making extra money with supplements?</label>
                <div class="inner-addon left-addon">
                <?php
                $options = ['yes' => 'Yes', 'no' => 'No', 'Contact me with more info' => 'Contact me with more info'];
                echo $this->Form->input('supplement', [
                    'templates' => [
                        'radioWrapper' => '<div class="inner-addon left-addon">{{label}}</div>'
                    ],
                    'type' => 'radio',
                    'options' => $options,
                    'required' => 'required',
                    'label' => false,
                    'default' => $user['supplement']
                ]);
                ?>
                </div>
                </div>
                
                
                
         	</div>
            <?php } ?>
            
           <input type="hidden" name="form_type" value="basic" />
               <div class="form-group col-xs-12">
               <div class="col-sm-6 col-sm-offset-6">
                <div class="form-group">
                <input type="submit" value="Save" />
                <input type="reset" value="Clear" />
                </div>
                </div>
                
            </div>
           </div>
            
        </form>
   
<!--row -->
</section>
<!-- profile body - end -->
</div>

<script>
$().ready(function() {
	$("#email-form").validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			email: "Please enter a valid email address",
		}
	});
	
	$("#password-form").validate({
		rules: {
			opassword: "required",

			password: {
				required: true,
				minlength: 8
			}
		},
		messages: {
			password: {
				required: "Please Enter New password",
				minlength: "Please enter atleast 8 characters"
			},

			opassword: "Old Password is required",	
		}
	});
	
	$("#basic-form").validate({
		ignore: "",
		rules: {
			
			first_name: "required",
			last_name: "required",
			dob: "required",
			country: {
				required: true
			},
			gender: "required",
			image: {
				extension: "jpg|jpeg|png"
			},
			latitude: {
				required: true
			},
			state: "required",
			zip: "required",
			training_types: "required",
			experience: "required"/*,
			address: "required"*/
		},
		messages: {
			first_name: "Please enter your first name",
			last_name: "Please enter your last name",
			dob: "Please select date of Birth",
			country: "Please select country",
			gender: "Please select gender",
			image: {
				extension: "Only jpg, jpeg and png formats are accepted"
			},
			latitude: "Please enter Valid Address",
			state: "Please enter state",
			zip: "Please enter zipcode",
			training_types: "Please enter training types",
			experience: "Please enter your experiences"
		}
	});
});

$('#dob').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});

$("input[name='address']").keyup(function(){

	var value = $(this).val();

	if(value.length == '0'){
		$("input[name='latitude']").val('');
	}
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#profilePic").change(function() {
  readURL(this);
});


google.maps.event.addDomListener(window, 'load', function () {
	var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
	google.maps.event.addListener(places, 'place_changed', function () {
		var place = places.getPlace();
		var address = place.formatted_address;
		var latitude = place.geometry.location.lat();
		var longitude = place.geometry.location.lng();
		$("#latitude").val(latitude);
		$("#longitude").val(longitude);
		
		
		console.log(place.address_components);
		
		for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
                var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
            }
        }
		
	});
});


$(".sel-country").change(function(){
	$('input[name="address"]').val('');
	$('input[name="latitude"]').val('');
	$('input[name="longitude"]').val('');
});
</script>