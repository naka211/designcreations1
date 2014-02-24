<?php // @version $Id: default.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
$cparams = JComponentHelper::getParams ('com_media');
?>
<script language="javascript">
	function submitForm(){
		isEmail=function(string) {
		if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
			return true;
		else return false;
    	};
		if(jQuery('#name').val() == '' || jQuery('#name').val() == 'Navn'){
			jAlert('Angiv dit navn');
			$('#name').focus();
			return false;
		}
		
		if(jQuery('#email').val() == '' || jQuery('#email').val() == 'Email'){
			jAlert('Indtast venligst din e-mail');
			$('#email').focus();
			return false;
		}
		
		if(!isEmail(jQuery('#email').val())){
			jAlert('Indtast venligst e-mail korrekt');
			$('#email').focus();
			return false;
		}
		
		if(jQuery('#text').val() == '' || jQuery('#text').val() == 'Din besked'){
			jAlert('Skal du indtaste din besked');
			$('#text').focus();
			return false;
		}
		
		$('#contactForm').submit();
	}
</script>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Kontakt os</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="dc-content contact">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <div class="dc-content-ctn">
                <div class="dc-banner">
                    <img src="templates/tpl_designcreations/img/dc_banner.jpg" alt="Designcreations - Hurtigt, Kreativ, Tillidsfuldt" />
                </div>
                <?php if($_GET['success'] == 1){?>
                <div class="content-inner">
                	Tak for din henvendelse. Vi vil kontakte dig hurtigst muligt.<br /><br />
                    Med venlig hilsen,<br />
                    <strong>Design Creations</strong><br /><br />
                    <a href="index.php"><img src="templates/tpl_designcreations/img/backhome.png" /></a>
                </div>
                <?php } else {?>
                <h1 class="main-title">Kontakt os</h1>
                <div class="content-inner">
                    <p>Du er altid velkommen til at kontakte os, hvis du ønsker mere information om vores virksomhed og produkter.</p>
                    <form id="contactForm" action="index.php" method="post" name="emailForm">
                        <fieldset class="fll">
                            <input class="text rounded w250" type="text" name="name" id="name" value="Navn" />
                            <input class="text rounded w250" type="text" name="phone" id="phone" value="Telefon" />
                            <input class="text rounded w250" type="text" name="email" id="email" value="Email" /> 
                        </fieldset>
                        <fieldset class="fll">
                            <textarea class="text rounded" rows="7" cols="15" name="text" id="text">Din besked</textarea>
                        </fieldset>
                        <fieldset class="clr">
                            <label>Jeg ønsker at vide mere om:</label>
                            <label><input class="check-box" type="checkbox" name="logo" value="Logo Design">Logo Design</label>
                            <label><input class="check-box" type="checkbox" name="visitkort" value="Visitkort Design">Visitkort Design</label>
                            <label><input class="check-box" type="checkbox" name="website" value="Website template">Website template</label>
                            <label><input class="check-box" type="checkbox" name="webshop" value="Webshop template">Webshop template</label>
                        </fieldset>
                        <div class="actions-ctn">
                           <!-- <a class="send-btn fll" href="">Send</a>
                            <a class="cancel-btn fll" href="">Nustil</a>-->
                            <button class="button validate send-btn fll" type="button" style="border:none; cursor:pointer;" onclick="submitForm();"><?php echo JText::_('Send'); ?></button>
                        	<button class="button validate cancel-btn fll" type="reset" style="border:none;cursor:pointer;"><?php echo JText::_('Nustil'); ?></button>
                        </div>
                        <input type="hidden" name="option" value="com_contact" />
                        <input type="hidden" name="view" value="contact" />
                        <input type="hidden" name="id" value="<?php echo (int)$this->contact->id; ?>" />
                        <input type="hidden" name="task" value="submit" />
                        <?php echo JHTML::_( 'form.token' ); ?>
                    </form>
                    <div class="contact-info rounded">
                        <h1><img src="templates/tpl_designcreations/img/3d_title.png" alt="Design Creations" /></h1>
                        <div class="contact-info-inner">
                            <span class="contact-img"><img src="templates/tpl_designcreations/img/contact.png" alt="Design creations contact" /></span>
                            <p class="contact-address">
                            	 <?php 
								 	$db = JFactory::getDBO();
									$query = "SELECT introtext FROM #__content WHERE id = 6 AND state = 1";
									$db->setQuery($query);
									echo $db->loadResult();
									?>
                               <!-- KONTORADRESSE:<br/>
                                Islevdalvej 148 <br/>
                                2610 Rødovre<br/>
                                <a href="mailto:info@designcreations.dk">info@3designs.dk</a>-->
                            </p>
                            <p class="contact-person">
                            	<?php 
									$query = "SELECT introtext FROM #__content WHERE id = 7 AND state = 1";
									$db->setQuery($query);
									echo $db->loadResult();
									?>
                                <!--<span class="blue"><strong>Kim Hau</strong></span><br/>Founder<br/>
                                <a href="mailto:kim@designcreations.dk">kim@3designs.dk </a><br/>
                                Tlf. 2772 5079 -->
                            </p>
                        </div>
                    </div>
                    
                </div>
                <?php }?>
            </div>
        </div>
        
    </div>
    <div class="content-box-decor box-decor-btm"><span></span></div>
</div>