	
<style>
.star-reviw .fa.checked{color:#ffd203;}
.fa.fa-star {font-size: 25px;}

.mdl-rev .fa-star{color:#999999;}
</style>    
	<?php //echo "<pre>"; print_r($allreviews); echo "</pre>"; ?>
	<script>
        jQuery('body').addClass('signup2 newsignup');
    </script>
    <div id="profile" class="trainer_profile">
      <section id="profile-top">
        <div class="profile-cover-front">
          <div class="slideshow_gallery_edit" style="background-image: url(../../images/trainer.jpg);"></div>
        </div>
        <div class="profile-top-info section">
          <div class="container profile-container">
            <div class="row">
              <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-10 col-xs-push-1 col-xxs-12 col-xxs-push-0">
                <input id="bitly" type="hidden" value="http://bit.ly/2u1yY3e">
                <input id="account-id" type="hidden" value="57875">
                <div class="profile-info-front">
                  <div class="profile-img-front-container">
                    <div class="profile-img-table">
                      <div class="profile-img-td"> <img class="profile-img-front img-responsive" src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($trainer['image'] != '') ? $trainer['image'] : 'noimage.png' ?>" alt="Profile image" width="150" height="150"> </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h1 class="profile-name h4 white mb0"><?php echo ucwords($trainer['first_name'].' '.$trainer['last_name']); ?></h1>
                    <div>
                    <?php
                    $trainer['avg_rating'] = floor($trainer['avg_rating']);
                    for($j = 0; $j < $trainer['avg_rating']; $j++){ ?>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <?php }
                    $unrated = 5-$trainer['avg_rating'];
                    ?>
                    <?php for($i=0; $i<$unrated; $i++){ ?>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
      <!-- profile cover info - end -->
      <section class="profile-body">
        <div class="container">
        	<div class="row">
    	<?= $this->Flash->render() ?>
	</div>
        
          <div class="row">
          
          	
            <div class="col-md-8">
            
            	<?php if(!empty($trainer['galleries'])){ ?>
                <div id="gallery" class="box">
                <h6 class="box-head"><span class="fa fa-camera"></span>GALLERY</h6>
                    <div class="box-body">
                        <div class="gallery-container">
                            <div class="ngg-galleryoverview ngg-ajax-pagination-none" id="ngg-gallery-4cd07425586f7693e58c6f0eca215e35-1">
                            <!-- Thumbnails -->
                            
                            <?php foreach($trainer['galleries'] as $gallery){ ?>
                                <div id="ngg-image-0" class="ngg-gallery-thumbnail-box">
                                <div class="ngg-gallery-thumbnail"> <a href="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" title="">
                                <?php if($gallery['type'] == 'image'){ ?>
                                <img title="pres up" alt="pres up" src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" width="120" height="90" style="max-width:100%;">
                                <?php }elseif($gallery['type'] == 'video'){ ?>
                                <video style="width:100%;" >
                                <source src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" type="<?php echo $gallery['format']; ?>">
                                </video>
                                <?php } ?>
                                </a>
                                </div>
                                </div>
                            <?php } ?>
                            <!-- Pagination -->
                            <div class="ngg-clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
              	
                <?php $speciality = json_decode($trainer['specialities']); ?>
                
                <?php if(isset($speciality->data)){ ?>
                <div id="specialties" class="box">
                    
                    <h6 class="box-head"><span class="fa fa-star"></span>Specializations</h6>
                    <div class="box-body">
                        <div class="specialties-list">
                        <?php if(isset($speciality->data)){ ?>
                        <ul class="list-square _2col">
                        <?php foreach($speciality->data as $spec){
                        if($spec != ''){
                        ?>
                        <li>
                        <h4 class="p mb0"><?php echo $spec; ?></h4>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
              
              
              	<?php $skills = json_decode($trainer['skills']); ?>
                <?php if(isset($skills->data)){ ?>
                <div id="skills" class="box">
                
                	<h6 class="box-head"><span class="fa fa-pencil"></span>Skills and qualification</h6>
                    <div class="box-body">
                        <div class="skills-list">
                        <?php if(isset($skills->data)){ ?>
                        <ul class="list-square _2col">
                        <?php foreach($skills->data as $skill){
                        if($skill != ''){
                        ?>
                        <li>
                        <h4 class="p mb0"><?php echo $skill; ?></h4>
                        </li>
                        <?php } } ?>
                        </ul>
                        <?php } ?>
                        </div>
                    <!--<div class="profile-diploma-company">
                    <p>Qualified with: </p>
                    <img src="https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/diploma-company-logos/hfe.png" srcset="https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/diploma-company-logos/hfe.png 1x, https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/diploma-company-logos/hfe@2x.png 2x, https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/diploma-company-logos/hfe@3x.png 3x" class="img-responsive company-logo-diploma-image"> </div>
                    </div>-->
                    </div>
                </div>
                <?php } ?>
                
                
                <div id="skills" class="box">
                	<h6 class="box-head"><span class="fa fa-pencil"></span>Gym Info</h6>
                    <div class="box-body">
                        <div class="skills-list">
                        <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                        	<?php if($trainer['gym_name'] != ''){ ?>
                            <tr><th style="width: 37%;">Gym name</th><td><?php echo $trainer['gym_name']; ?></td></tr>
                            <?php } ?>
                            
                            <?php if($trainer['website'] != ''){ ?>
                            <tr><th style="width: 37%;">Website</th><td><?php echo $trainer['website']; ?></td></tr>
                            <?php } ?>
                            
                            <?php if($trainer['training_types'] != ''){ ?>
                            <tr><th style="width: 37%;">Types of Training</th><td><?php echo $trainer['training_types']; ?></td></tr>
                            <?php } ?>
                            
                            <?php if($trainer['experience'] != ''){ ?>
                            <tr><th style="width: 37%;">Experience</th><td><?php echo $trainer['experience']; ?></td></tr>
                            <?php } ?>
                            
                            <?php
                            if($trainer['licenses'] != ''){
                            $licenses = explode(', ', $trainer['licenses']); ?>
                            <tr>
                            <th style="width: 37%;">Licenses</th>
                            <td>
                            <ul>
                            <?php
                            foreach($licenses as $license){
                            ?>
                            <li><?php echo $license; ?></li>
                            <?php
                            }
                            ?>
                            </ul>
                            </td>
                            </tr>
                            <?php 
                            }
                            ?>
                            <?php if($trainer['gym_type'] != ''){ ?>
                            <tr><th style="width: 37%;">Gym Type</th><td><?php echo ucwords($trainer['gym_type']); ?></td></tr>
                            <?php } ?>
                            
                            <?php if($trainer['go_home'] != ''){ ?>
                            <tr><th style="width: 37%;">Willing to go to clients home to conduct service?</th><td><?php echo ucwords($trainer['go_home']); ?></td></tr>
                            <?php } ?>

                            <tr><th style="width: 37%;">State</th><td><?php echo ucwords($trainer['state']); ?></td></tr>

                            <tr><th style="width: 37%;">Zip</th><td><?php echo ucwords($trainer['zip']); ?></td></tr>
                            
                            <?php /*if($trainer['supplement'] != ''){ ?>
                            <tr><th style="width: 37%;">Interested in making extra money with supplements?</th><td><?php echo ucwords($trainer['supplement']); ?></td></tr>
                            <?php }*/ ?>
                        </table>
                        </div>
                    </div>
                </div>
                
        		
                <?php if($loggeduser){ ?>
                <?php if(empty($reviews)){ ?>
              	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#reviewModal">Write a review</button>
              	<?php } ?>
                <?php } ?>
                
          </div>
          	
          <div class="col-md-4">
          
          	<!--<div id="share" class="box">
                <h6 class="box-head"><span class="fa fa-share"></span>SHARE</h6>
                <div class="box-body">
                  <div id="social-sharing-btn">
                    <div class="fb-share-btn">
                      <fb:share-button href="http://bit.ly/2u1yY3e" text="asdasd" type="button_count" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=280516708817362&amp;container_width=0&amp;href=http%3A%2F%2Fbit.ly%2F2u1yY3e&amp;locale=en_US&amp;sdk=joey&amp;type=button_count"><span style="vertical-align: bottom; width: 69px; height: 20px;">
                        <iframe name="f34c93082f76458" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.0/plugins/share_button.php?app_id=280516708817362&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FXBwzv5Yrm_1.js%3Fversion%3D42%23cb%3Df1b8dd5506c5444%26domain%3Dwww.toplocaltrainer.co.uk%26origin%3Dhttps%253A%252F%252Fwww.toplocaltrainer.co.uk%252Ff35819d68aaf36c%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fbit.ly%2F2u1yY3e&amp;locale=en_US&amp;sdk=joey&amp;type=button_count" style="border: none; visibility: visible; width: 69px; height: 20px;" class=""></iframe>
                        </span></fb:share-button>
                    </div>
                    <div class="tw-share-btn">
                      <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.85cf65311617c356fe9237c3e6c10afb.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=https%3A%2F%2Fwww.toplocaltrainer.co.uk%2Fprofile%2Fdave-richardson%2F&amp;size=m&amp;text=Check%20out%20my%20profile%20on%20Top%20Local%20Trainer&amp;time=1501757999224&amp;type=share&amp;url=http%3A%2F%2Fbit.ly%2F2u1yY3e" style="position: static; visibility: visible; width: 60px; height: 20px;" data-url="http://bit.ly/2u1yY3e"></iframe>
                    </div>
                  </div>
                </div>
              </div>-->
              
              <div id="contact" class="box">
                <div class="box-body"> <a href="mailto:<?php echo $trainer['email']; ?>" class="profile-form-f-button send-email-popup btn btn-orange btn-orange-solid">
                  <h4 class="mb0"><?php echo $trainer['first_name'].' '.$trainer['last_name']; ?></h4>
                  </a>
                  <div class="emailaddress"> <i class="fa fa-phone"> </i> <span> Call: <?php echo $trainer['phone']; ?> </span> </div>
                </div>
              </div>
              
              
              	<?php $offers = json_decode($trainer['offers']); ?>
                <?php if(isset($offers->data)){ ?>
                <div id="cost" class="box">
                	<h6 class="box-head green-bkg white"><span class="fa fa-usd" style="color:#fff;"></span>COST / SPECIAL OFFERS </h6>
                    <div class="box-body">
                        <div class="cost_special_offers">
                        <?php if(isset($offers->data)){ ?>
                        <ul class="list-square">
                        <?php foreach($offers->data as $offer){  ?>
                        <li class="cost"><?php echo $offer; ?></li>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
              
                <?php $locations = json_decode($trainer['locations']); ?>
                <?php if(isset($locations->data)){ ?>
                <div id="locations" class="box">
                
                	<h6 class="box-head"><span class="fa fa-location-arrow"></span>Locations </h6>
                    <div class="box-body">
                    <?php if(isset($locations->data)){ ?>
                    <div class="aside-locations">
                    <?php $all_loc = implode(', ', $locations->data); ?>
                    <h4 class="p mb0"><?php echo $all_loc; ?></h4>
                    </div>
                    <?php } ?>
                    </div>
                </div>
          		<?php } ?>
                
          </div>
          
          
            
            <div id="reviewModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                
                	<!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Write a review</h4>
                        </div>
                        <div class="modal-body">
                        	<div class="alert alert-success" style="display:none;">
                            	<strong>Review has been submitted successfully !!</strong>
                            </div>
                        	<div class="review_sec">
                                <div class="star-reviw mdl-rev" style="width: auto; float: none; margin: 0 auto; display: table;">
                                    <div class="stars rating" id="rating" style="padding:4px 0;"> 
                                        <span class="fa fa-star"></span> 
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <input type="hidden" name="rating" id="ratings1">  
                                    </div>   
                                </div>  
                                
                                <textarea name="review" id="rtreview" class="form-control"></textarea>
                                                              
                            </div>
                        </div>
                        <div class="modal-footer">
                        	<button type="button" id="sbt-rev" class="btn btn-default fltr_colr">Submit</button>
                        </div>
                    </div>
                
                </div>
            </div>
            
        </div>
        
        <div class="row">
        	<div class="col-md-8">
            	<div id="skills" class="box">
					<h6 class="box-head"><span class="fa fa-pencil"></span>Reviews</h6>
					<div class="box-body">
                        <div class="skills-list">
							<?php if(!empty($allreviews)){ ?>
							<?php foreach($allreviews as $review){ ?>
							
								<div class="panel panel-default">
									<div class="panel-heading">
									<?php echo ucwords($review['user']['name']); ?>
									
									<div class="pull-right">
									<?php for($j = 0; $j < $review['rating']; $j++){ ?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php }
									$unrated = 5-$review['rating'];
									?>
									<?php for($i=0; $i<$unrated; $i++){ ?>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<?php } ?>
									</div>
									
									</div>
									<div class="panel-body"><?php echo $review['review']; ?></div>
								</div>
							<?php } ?>
							<ul class="pagination">
							<?php echo $this->Paginator->numbers(); ?>
							</ul>
							<?php }else{ ?>
							No Review Found
							<?php } ?>
						</div>
					</div>
				</div>
                
                
            </div>
        </div>
        
      </section>
      <!-- profile body - end -->
    </div>
    
<script>
$('.rating span').each(function(){
	$(this).click(function(){
		if(!$(this).hasClass('checked')){
			$(this).addClass('checked');
			$(this).prevAll().addClass('checked');
			var rate = $('#rating .checked').length;
		}else{
			$(this).nextAll().removeClass('checked');
			var rate = $('#rating .checked').length;
		}

		$('#ratings1').val(rate);
	   
	});
});

$(document).delegate('#sbt-rev', 'click', function(){
	var rating = $("#ratings1").val();
	var review = $("#rtreview").val();
	var trainer_id = '<?php echo $trainer["id"] ?>';	
	
	if(rating == 0){
		alert("Please give star rating");
	}else if(review == ''){
		alert("Please fill the review field");
	}else{
		$.ajax({
			url: '<?php echo $this->request->webroot ?>reviews/addreview',
			data: {rating: rating, review: review, trainer_id: trainer_id},
			method: 'post',
			dataType: 'html',
			success: function(response){
				if(response == 'success'){
					$('#reviewModal .alert').css('display', 'block');
					$('#reviewModal .review_sec').css('display', 'none');
					$('.modal-footer').hide();
					
					$(document).click(function(){
						location.reload();
					});
				}
			}
		});
	}
});

</script>    