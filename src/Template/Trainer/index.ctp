<section class="lt lth section white-bkg top_pdng">
  <div class="page-header down_mrgn">
    <h3 class="text-center t">Trainers List<br class="visible-xxs">
    </h3>
  </div>
  <div class="container">
    <div class="srch_option">
      <input type="text" name="search_name" placeholder="Search By Name" class="form-control">
     <button type="button" id="search-btn" style="position: absolute;width: auto;top: 4px;right: 69px;background: transparent;border: 0px;color: #aaa;font-size: 17px;"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <br>

    <div class="lt-items pic_grp">
      <div id="hp-profiles-row" class="no-row">
        <?php if(!empty($trainers)){ ?>
         <div class="row">
        <?php foreach($trainers as $trainer){ ?>
        <div class="col-sm-3 col-xs-12 col-xxs-6">
          <div class="lt-item">
            <div class="lt-item-image mask mask_30">
              <div class="lt-sq">
                <div class="img-outer">
                  <div class="img-inner">
                  <?php if($trainer['image'] != ''){ ?>
                  <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/users/<?php echo $trainer['image']; ?>"width="150" height="150" alt="Tom Smith PT profile image"/>
                    <?php }else{ ?>
                    <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/users/noimage.png"width="150" height="150" alt="Tom Smith PT profile image"/>
                    <?php } ?>
                    </div>
                </div>
              </div>
              <h4 class="lt-item-title"><?php echo $trainer['name']; ?></h4>
            </div>
            <ul class="list-with-sep">
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo $this->Html->link('View Trainer', ['controller' => 'trainer', 'action' => 'view', base64_encode('trainer'.$trainer['id'])]); ?></li>
              <li>
                <?php
                $trainer['avg_rating'] = floor($trainer['avg_rating']);
                for($j = 0; $j < $trainer['avg_rating']; $j++){ ?>
                <i class="fa fa-star" aria-hidden="true"></i>
                <?php }
                $unrated = 5-$trainer['avg_rating'];
                ?>
                <?php for($i=0; $i<$unrated; $i++){ ?>
                <i class="fa fa-star colr_str" aria-hidden="true"></i>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        </div>
        <div class="row">
        <div class="cntr_trner center">
          <ul class="pagination">
            <?php //echo $this->Paginator->numbers(); ?>
            <?php for($i = 1; $i <= $pages; $i++){ ?>
            <?php if($current_page == $i){  ?>
            <li class="active" data-page="<?php echo $i; ?>"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
            <?php }else{ ?>
            <li data-page="<?php echo $i; ?>"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
            <?php } ?>
            <?php } ?>
          </ul>
        </div>
        </div>
        <?php }else{ ?>
        
        No Trainers Found
        
        <?php } ?>
        
        
        
        
        
        
      </div>
    </div>
  </div>
</section>

<script>
$('.pagination li').on('click', function() {
	var url = '<?php echo $this->request->webroot; ?>trainer/<?php echo $url2; ?>';
	
	var page = $(this).attr('data-page');
	
	url += '&page='+page;
	
	location = url
	
});	

$('#search-btn').click(function(){
	var url = '<?php echo $this->request->webroot; ?>trainer/<?php echo $url; ?>';
	
	var search = $('input[name="search_name"]').val();
	
	url += '&search_name='+search;
	
	location = url;
	
});
</script>
