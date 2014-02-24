<?php
defined('_JEXEC') or die('Restricted access');
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Om os</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="dc-content">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <div class="dc-content-ctn">
                <div class="dc-banner">
                    <img src="templates/tpl_designcreations/img/dc_banner.jpg" alt="Designcreations - Hurtigt, Kreativ, Tillidsfuldt" />
                </div>
                <?php 
				$db = JFactory::getDBO();
				$query = "SELECT introtext FROM #__content WHERE id = 8 AND state = 1";
				$db->setQuery($query);
				echo $db->loadResult();
				?>
                
            </div>
        </div>
        <div class="contact-ctn">
            <a class="contact-btn" href="index.php?option=com_images&view=portefolje&Itemid=4&active=websitePortefolje">SE ALLE WEBSITE TEMPLATES</a>
        </div>
        
    </div>
    <div class="content-box-decor box-decor-btm"><span></span></div>
</div>