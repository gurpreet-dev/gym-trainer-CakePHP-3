<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
        Patrainer
    </title>
    <link rel="icon" type="image/x-icon" href="<?php echo $this->request->webroot."images/website/logo-fav.png";?>" />

    <?= $this->Html->css( array('custom/bootstrap.css','custom/tlt.css', 'custom/styles.css', 'custom/shortcodes.css', 'custom/jquery-ui.min.css', 'custom/custom.css') ) ?>
    
   
        
        
    <?= $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery-ui.min.js')) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic,600italic,600"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&sensor=false&libraries=places"></script>
    <style>
	.message.success{
		background: #00b33c;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
	.message.error{
		background: #cc0000;
		padding: 20px;
		color: #fff;
		font-size: 15px;
		margin: 40px 0px;
	}
	</style>
    
</head>
<body class="home blog">

	<div id="wrap">

    	<!-- Header -->
        <div id="menu-bar" class="menu-bar-class">
        	<div class="container">
        		<div class="overlay-bkg-step-1"></div>
                <div id="logo"><a href="<?php echo $this->request->webroot; ?>"><img src="<?php echo $this->request->webroot; ?>images/website/patrainer.jpg"></a></div><!-- header logo - end -->
    
                <nav id="nav">
        			<a href="javascript:void(0)" id="nav-mobile-btn" class="visible-xs"></a>
        			<div id="nav-dd" class="login_submit_header_outer clearfix">
        				
                        <?php if(!empty($firstpage)){ ?>
                        <div class="login_submit_header">
                        <a href="<?php echo $this->request->webroot; ?>page/<?php echo $firstpage['slug']; ?>"><?php echo $firstpage['title']; ?></a>
                        </div>
                        <?php } ?>
        
                        <div class="login_submit_header">
                        <a href="<?php echo $this->request->webroot ?>">Find My Trainer</a>
                        </div>
        
        				<div class="dropdown login_submit_header signup-button">
        					<div class="btn dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $this->request->webroot; ?>images/website/profile_icn.png">
        					<span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu list_design">
                            <?php if(!$loggeduser){ ?>
                            <li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-user-plus')).'Register', array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li>
                            <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in" aria-hidden="true"></i>login</a></li>   
                            <?php }else{ ?>                            
                            <li><a href="<?php echo $this->request->webroot; ?>users/edit/<?php echo $loggeduser['id']; ?>" ><i class="fa fa-pencil" aria-hidden="true"></i>Edit Profile</a></li>
                            <!--<li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-lock')).'Change Password', array('controller' => 'users', 'action' => 'changepassword'), array('escape' => false)); ?></li>-->
                            <li><?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-sign-out')).'Logout', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
                            <?php } ?>
                            </ul>
        				</div> 
        			</div>
        		</nav><!-- nav - end -->
        	</div>
        </div>
        <!-- Header (END) -->
        
        <!-- Body -->
        <div id="inner">  
            
            <?= $this->fetch('content') ?>
        </div>   
        <!-- Body (END) --> 
        
        <!-- Footer -->
        <footer id="footer" class="footer_v1_v2_v3">
            <div class="wrapper-full">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-xs-12 text-center-sm text-center-xs">
                            <div class="footer-copyright">
                                <div class="pin"></div>
                                <div class="tlt">Patrainer</div>
                                <div class="copy">&copy; Copyright 2017</div>
                            </div>
                        </div>
        
                        <div class="col-lg-2 col-md-3 col-xs-12 text-center-sm text-center-xs">
                            <div class="footer-socials">
                            	<?php if(!empty($links)){ ?>
                                <?php foreach($links as $link){ ?>
                                <a href="<?php echo $link['link'] ?>" class="ico-fb tdn" target="_blank" style="width: 32px; height: 32px; border: 1px solid <?php echo $link['background'] ?>; border-radius: 50px;background-color: <?php echo $link['background'] ?>; color: #fff; font-size: 20px; padding-top: 5px;"><i class="fa <?php echo $link['icon'] ?>" aria-hidden="true"></i>
        </a>	
        						<?php } ?>
                                <?php } ?>
                            </div>
                        </div>
        
                        <div class="col-md-5 col-xs-12 text-right text-center-sm text-center-xs">
                            <ul class="footer-nav clearfix">
                            	<li><a href="<?php echo $this->request->webroot; ?>users/contact">Contact Us</a></li>
                            	<?php if(!empty($allpages)){ ?>
                                <?php foreach($allpages as $page){ ?>
                                <li><a href="<?php echo $this->request->webroot; ?>page/<?php echo $page['slug'] ?>"><?php echo $page['title'] ?></a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer (END) -->
        
    </div>
    <!-- #wrap - end -->
    
    
    <div class="tlt-pp" data-pp_scope="video-1">
        <div class="tlt-pp-box-wrap">
            <div class="tlt-pp-box-inner">
                <div class="tlt-pp-content">
                    <div class="video-wrap">
                        <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/ZP2Z9glvglo?rel=0&amp;showinfo=0"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="tlt-pp-close tlt-pp-x"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content log_cntnt">
    
                <div class="modal-header">
                    <button type="button" class="close color_ful" data-dismiss="modal" aria-hidden="true">&#215;</button>
                    <h4 class="modal-title" id="myModalLabel">Login Form</h4>
                </div> <!-- /.modal-header -->
    
                <div class="modal-body">
                	<div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="alert alert-info" style="display:none">Authenticating...</div>
                    <form role="form">
                        <div class="form-group">
                            <div class="input-group lock_position">
                           <i class="fa fa-envelope adjst_cntr" aria-hidden="true"></i>
                                <input type="text" class="form-control" id="loginuname" placeholder="Email">
                                
                            </div>
                        </div> <!-- /.form-group -->
    
                        <div class="form-group">
                            <div class="input-group lock_position">
                            <i class="fa fa-lock adjst_cntr1" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="loginpass" placeholder="Password">
                                
                            </div> <!-- /.input-group -->
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                        <button type="button" class="form-control btn btn-primary" id="userlogin">Login</button>
                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-caret-right blue_colr')).'Forgot your Password?', array('controller' => 'users', 'action' => 'forgot'), array('class' => 'anchorbtn', 'escape' => false)); ?>
                            <br>
                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-caret-right blue_colr')).'Create an account', array('controller' => 'users', 'action' => 'add'), array('class' => 'anchorbtn', 'escape' => false)); ?>
                        </div>
                    </form>
    
                </div> <!-- /.modal-body -->
    
    
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Login Modal (END) -->
    
    <script>
	$('#userlogin').on("click", function () {
        var uname = $('#loginuname').val();
        var pass = $('#loginpass').val();
		
		var data = {
			username: uname,
			password: pass
		}
		
		$.ajax({
			url: '<?php echo $this->request->webroot; ?>users/login',
			data: data,
			method: 'post',
			dataType: 'json',
			beforeSend: function(){
				$('.alert-danger').hide();
				$('.alert-success').hide();
				$('.alert-info').show();
			},
			success: function(d){
				if (d.response.isSucess == 'false') {
					$('.alert-info').hide();
					$('.alert-danger').html(d.response.msg);
					$('.alert-danger').show();
					
				} else {
					$('.alert-danger').hide();
					$('.alert-info').hide();
					$('.alert-success').html(d.response.msg);
					$('.alert-success').show();
					
					console.log(d.response.data);
					if(d.response.data.latitude == '' && d.response.data.role == 'trainer'){
						window.location.href = "<?php echo $this->request->webroot ?>users/edit/"+d.response.data.id;
					}else{
						location.reload();
					}
				}
			}
		});
    });
	</script>

</body>
</html>
