	<script>
        jQuery('body').addClass('signup2 newsignup');
    </script>
    <div id="profile" class="trainer_profile">
      <section id="profile-top">
        <div class="profile-cover-front">
          <div class="slideshow_gallery_edit"style="background-image: url(../images/trainer.jpg);"></div>
        </div>
        <div class="profile-top-info section">
          <div class="container profile-container">
            <div class="row">
              <div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-10 col-xs-push-1 col-xxs-12 col-xxs-push-0">
                <input id="bitly" type="hidden" value="http://bit.ly/2u1yY3e">
                <input id="account-id" type="hidden" value="57875">
                <div class="profile-info-front">
                  <div class="profile-img-front-container">
                    <div class="profile-img-table round_cover">
                      <div class="profile-img-td" style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; position: relative;
"> <img class="profile-img-front round_pic img-responsive" src="<?php echo $this->request->webroot; ?>images/users/<?php echo ($user['image'] != '') ? $user['image'] : 'noimage.png' ?>" alt="Profile image" width="150" height="150" style="width:100%; height:100%;"> </div>
                    </div>
                  </div>
                  <div class="profile-info">
                    <h1 class="profile-name h4 white mb0"><?php echo ucwords($user['first_name'].' '.$user['last_name']); ?></h1>
                    <a href="<?php echo $this->request->webroot; ?>users/edit/<?php echo $user['id']; ?>"> Edit </a>
                    <div> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star-o"> </i> </div>
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
          	<div id="gallery" class="box">
                <h6 class="box-head"><span class="fa fa-camera"></span>GALLERY <a href="<?php echo $this->request->webroot; ?>users/traineredit?view=upload" class="edit"> Edit </a> </h6>
                <div class="box-body">
                  <div class="gallery-container">
                    <div class="ngg-galleryoverview ngg-ajax-pagination-none" id="ngg-gallery-4cd07425586f7693e58c6f0eca215e35-1">
                      <!-- Thumbnails -->
                      
                      <?php if(!empty($galleries)){ ?>
                		<?php foreach($galleries as $gallery){ ?>
                      <div id="ngg-image-0" class="ngg-gallery-thumbnail-box">
                        <div class="ngg-gallery-thumbnail">
                         <a class="pic_cover" href="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" title="">
                        <?php if($gallery['type'] == 'image'){ ?>
                        <img class="inner_pic" title="pres up" alt="pres up" src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" width="120" height="90" style="max-width:100%;">
                         <?php }elseif($gallery['type'] == 'video'){ ?>
                         <video style="height:100px;" >
                        <source src="<?php echo $this->request->webroot; ?>images/gallery/<?php echo $gallery['file']; ?>" type="<?php echo $gallery['format']; ?>">
                        </video>
                         <?php } ?>
                        </a>
                        </div>
                      </div>
                       <?php } ?>
                		<?php } ?>
                      <!-- Pagination -->
                      <div class="ngg-clear"></div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="specialties" class="box">
			  <?php
                $speciality = json_decode($user['specialities']); ?>
                <h6 class="box-head"><span class="fa fa-star"></span>SPECIALISATIONS<a href="<?php echo $this->request->webroot; ?>users/traineredit?view=specialities" class="edit"> Edit </a></h6>
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
              
              <div id="skills" class="box">
               <?php
                $skills = json_decode($user['skills']); ?>
                <h6 class="box-head"><span class="fa fa-pencil"></span>Skills and qualification <a href="<?php echo $this->request->webroot; ?>users/traineredit?view=skills" class="edit"> Edit </a></h6>
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
              
          </div>
          	
          <div class="col-md-4">
          
          	<!--<div id="share" class="box">
                <h6 class="box-head"><span class="fa fa-share"></span>SHARE </h6>
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
                <div class="box-body"> <a href="mailto:<?php echo $user['email']; ?>" class="profile-form-f-button send-email-popup btn btn-orange btn-orange-solid" title="Send Mail">
                  <h4 class="mb0"><?php echo $user['first_name'].' '.$user['last_name']; ?></h4>
                  </a>
                  <div class="emailaddress"> <i class="fa fa-phone"> </i> <span> Call: <?php echo $user['phone']; ?> </span> </div>
                </div>
              </div>
              
              <div id="cost" class="box">
			  <?php $offers = json_decode($user['offers']); ?>
                <h6 class="box-head green-bkg white"><span class="fa fa-usd" style="color:#fff;"></span>COST / SPECIAL OFFERS <a href="<?php echo $this->request->webroot; ?>users/traineredit?view=offers" class="edit" style="color:#fff;"> Edit </a></h6>
                <div class="box-body">
                  <div class="cost_special_offers">
                  <?php if(isset($offers->data)){ ?>
                    <ul class="list-square set_squre">
                      <?php foreach($offers->data as $offer){  ?>
                      <li class="cost"><?php echo $offer; ?></li>
                      <?php } ?>
                    </ul>
                    <?php } ?>
                  </div>
                </div>
              </div>
              
              <div id="locations" class="box">
			  <?php
            $locations = json_decode($user['locations']); ?>
                <h6 class="box-head"><span class="fa fa-location-arrow"></span>Locations <a href="<?php echo $this->request->webroot; ?>users/traineredit?view=locations" class="edit"> Edit </a></h6>
                <div class="box-body">
                <?php if(isset($locations->data)){ ?>
                  <div class="aside-locations">
                  <?php $all_loc = implode(', ', $locations->data); ?>
                    <h4 class="p mb0"><?php echo $all_loc; ?></h4>
                  </div>
                <?php } ?>
                </div>
              </div>
          
          </div>
          
          
            
            
        </div>
      </section>
      <!-- profile body - end -->
    </div>