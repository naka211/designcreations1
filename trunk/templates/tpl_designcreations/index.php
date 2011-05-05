<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$template_dir = $this->baseurl.'/templates/'.$this->template.'/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<?php
	unset($this->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_dir;?>css/reset.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo $template_dir;?>css/print.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_dir;?>css/typography.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $template_dir;?>css/styles.css" />
<script src="<?php echo $template_dir;?>js/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="<?php echo $template_dir;?>js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo $template_dir;?>js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo $template_dir;?>js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php echo $template_dir;?>js/menu.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $template_dir;?>js/jquery-ui-1.8.11.custom.min.js" ></script>
<script src="<?php echo $template_dir;?>js/dc.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $("#mainMenu").lavaLamp({
            fx: "backout", 
            speed: 700,
            click: function(event, menuItem) {
                return true;
            }
        });
        
    });
</script>
</head>
<body>
	<!--[if gt IE 7]><div class="ie ie8"><![endif]-->
        <!--[if IE 7]><div class="ie ie7"><![endif]-->
        <!--[if IE 6]><div class="ie ie6"><![endif]-->
        <!--[if lt IE 6]><div class="ie ie5"><![endif]-->
        <!--[if !IE]>--><div class="ie0"><!--<![endif]-->
		<script type="text/javascript" src="<?php echo $template_dir;?>js/get_nav.js"></script>
            <!-- page content -->
            <div class="wrapper">
                <div id="page">
                    <!-- header -->
                    <div id="header">
                        <a class="logo fll" href="index.html" title="Design Creations - Levering Bedste Kvalitet Design"><img src="<?php echo $template_dir;?>img/dc_logo.png" alt="Design Creations - Levering Bedste Kvalitet Design" /></a>
                        
                        <div class="mid-header fll">
                            <div class="slogan"><img src="<?php echo $template_dir;?>img/slogan.png" alt="Levering Bedste Kvalitet Design" /></div>
                        
                            <!-- Main menu -->
                            <div id="menu">   
                                <?php if ($this->countModules('menu')) { ?>
                                <jdoc:include type="modules" name="menu" />
                                <?php } ?>
                            </div>
                            <!-- /End Main menu -->
                        </div>
                        
                        <!-- Shopping cart-->
                        <div id="cart" class="flr">
                            <a class="shopping-cart" href="indkobskurv.html">
                                <span class="link">Indkøbskurven</span>
                                <span class="cart-info">Du har: 2 &nbsp;|&nbsp; Total: DKK&nbsp; 650,- </span>
                            </a>
                        </div>
                        <!--/ End shopping cart-->
                        
                    </div>
                    <!-- / end header -->
    
                    <!-- Begin main content -->
                    <div id="main">
                    
                        <!-- Begin mid-content  -->
                        <jdoc:include type="component" />
                        <!-- /end mid-content  -->
                        
                        <!-- Begin right sidebar -->
                       	<?php if ($this->countModules('right')) { ?>
                        <jdoc:include type="modules" name="right" />
                        <?php } ?>
                        <!-- /end right sidebar -->
                        
                        <!--Live chat-->
                        <?php 
						function getSkypeStatus($username) {
							/*
							returns:
							0 - unknown
							1 - offline
							2 - online
							3 - away
							4 - not available
							5 - do not disturb
							6 - invisible
							7 - skype me
							*/
							$remote_status = fopen ('http://mystatus.skype.com/'.$username.'.num', 'r');
							if (!$remote_status) {
								return '0';
								exit;
							}
							while (!feof ($remote_status)) {
								$value = fgets ($remote_status, 1024);
								return trim($value);
							}
							fclose($remote_status);
						}
						
						function getSkypeStatusIcon($username) {
							$status = getSkypeStatus($username);
							// change the path of the icons folder to match your site
							echo '<a href="callto:'.$username.'" class="live-chat"><img src="templates/tpl_designcreations/img/'.$status.'.png" alt="call '.$username.'" /></a>';
						}
						//getSkypeStatusIcon('webfreelancere.com');
						?>
                        
                        <!--/ End Live chat-->
                        
                    </div>
                    <!-- / end main content -->
                    
                    <!-- Begin footer navigation -->
                    <div id="footerNav">
                        <div class="footer-ctn">
                            <!--Footer Support info-->
                            <div class="left-footer fll">
                                <div class="support-info fll">
                                    <h3><img src="<?php echo $template_dir;?>img/support.png" alt="Gratis support" /></h3>
                                    <p>
                                        Du er altid velkommen til at kontakte vores kundeservice, 
                                        som vil gøre alt for at hjælpe dig. Send en mail til 
                                        <a href="mailto:support@designcreations.dk">support@designcreations.dk</a>
                                    </p>
                                </div>
                                <div class="support-num fll">
                                    <p><strong>Eller ring på:</strong></p>
                                    <p class="num"><img src="<?php echo $template_dir;?>img/phone_num.png" alt="2772 5079" /></p>
                                    <p>Mandag - Fredag: 08:00 - 16:00</p>
                                </div>
                            </div>
                            <!-- / end footer support info -->
                            
                            <!--Footer Social/Contact info-->
                            <div class="right-footer w260 flr">
                                <div class="social fll pb5">
                                    <a class="icon" href="" title="Følg os på Facebook"><img src="<?php echo $template_dir;?>img/fb_icon.png" alt="Facebook" /></a>
                                    <a class="icon" href="" title="Følg os på Youtube"><img src="<?php echo $template_dir;?>img/yt_icon.png" alt="Youtube" /></a>
                                    <a class="icon" href="" title="Følg os på Twitter"><img src="<?php echo $template_dir;?>img/tw_icon.png" alt="Twitter" /></a>
                                    <a class="icon" href="" title="Tilmeld Nyhedsbrev"><img src="<?php echo $template_dir;?>img/newsletter_icon.png" alt="Tilmeld Nyhedsbrev" /></a>
                                </div>
                                <div class="contact-info fll clr">
                                    <p>
                                        KONTORADRESSE:<br/>
                                        Islevdalvej 148  - 2610 Rødovre<br/>
                                        <a href="mailto:info@designcreations.dk">info@designcreations.dk</a>
                                    </p>
                                </div>
                            </div>
                            <!-- / end footer Social/Contact info-->
                            
                        </div>
                    </div>
                    
                    
                    <!-- / end footer navigation -->
                    
                    <!-- Begin footer -->
                    <div id="footer">
                        <p class="copyright fll">Copyright © 2011 <a href="http://www.designcreations.dk">Designcreations.dk</a>. All rights reserved.</p>
                        <p class="info flr w240">Designed by <a href="http://www.mywebcreations.dk">mywebcreations.dk</a></p>
                    </div>
                    <!-- / end footer -->
                    
                </div>
            </div>
            <!--/ page content -->
    	</div> 
</body>
</html>