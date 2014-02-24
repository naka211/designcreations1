<?php
defined('_JEXEC') or die('Restricted access');
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Priser</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn">
    <script type="text/javascript">
        $(function() {
            $("#price").tabs({fx:{slide: "toggle"}}).tabs("rotate", 0, true);  
        });
    </script>
    
    <div id="price" class="dc-tabs-content fll clr">
    
        <ul class="tabs-ctn">
            <li class="tab-item ui-tabs-selected" id="logoTab"><a href="#logoPriser"><span class="logo">Logo Design</span></a></li>
            <li class="tab-item" id="cardTab"><a href="#visitkortPriser"><span class="visitcard">Visitkort & Brevpapir</span></a></li>
            <li class="tab-item" id="websiteTab"><a href="#websitePriser"><span class="website">Website Templates</span></a></li>
            <li class="tab-item" id="webshopTab"><a href="#webshopPriser"><span class="webshop">Webshop Templates</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="logoPriser" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="price-content">
                    <?php 
					$db = JFactory::getDBO();
					$query = "SELECT introtext FROM #__content WHERE id = 9 AND state = 1";
					$db->setQuery($query);
					echo $db->loadResult();
					?>
                    <?php if($this->list[0]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[0]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="contact-btn" href="index.php?option=com_contact&view=contact&id=1&Itemid=7">Kontakt os for yderligere information</a>
                </div>
                
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Visitcard Content -->
        <div id="visitkortPriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- visitcard price-->
                <div class="price-content">
                    <?php 
					$query = "SELECT introtext FROM #__content WHERE id = 10 AND state = 1";
					$db->setQuery($query);
					echo $db->loadResult();
					?>
                    <?php if($this->list[1]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[1]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="contact-btn" href="index.php?option=com_contact&view=contact&id=1&Itemid=7">Kontakt os for yderligere information</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Brevpapir Content -->
        <div id="websitePriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brevpapir price-->
                <div class="price-content">
                    <?php 
					$query = "SELECT introtext FROM #__content WHERE id = 11 AND state = 1";
					$db->setQuery($query);
					echo $db->loadResult();
					?>
                    <?php if($this->list[2]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[2]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="website-btn" href="index.php?option=com_images&view=portefolje&Itemid=4&active=websitePortefolje"></a>
                </div>
            </div> 
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>   
        </div>
        <!-- Brochure Content -->
        <div id="webshopPriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brochure portfolio-->
                <div class="price-content">
                     <?php 
					$query = "SELECT introtext FROM #__content WHERE id = 12 AND state = 1";
					$db->setQuery($query);
					echo $db->loadResult();
					?>
                    <?php if($this->list[3]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[3]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="webshop-btn" href="index.php?option=com_images&view=portefolje&Itemid=4&active=webshopPortefolje"></a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>    
        </div>

    </div>

    
</div>