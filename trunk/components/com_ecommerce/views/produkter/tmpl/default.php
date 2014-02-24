<?php
defined('_JEXEC') or die('Restricted access');
$db = JFactory::getDBO();
$query = "SELECT price, promotion_price FROM #__pr_product WHERE id = 3";
$db->setQuery($query);
$websitePrice = $db->loadObject();

$query = "SELECT price, promotion_price FROM #__pr_product WHERE id = 10";
$db->setQuery($query);
$webshopPrice = $db->loadObject();
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Produkter</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="dc-products">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <h1 class="main-title">OM VORES PRODUKTER</h1>
            <div class="content-inner">
                <div class="product-desc">
                    <p>Vores produkt er ikke blot et kunstværk, det er din virksomheds identitet og et værdifuldt immaterielt aktiv. Tilstedeværelsen af ​​et professionelt design på logo, visitkort, brevpapir og brochure, øger kendskabsgrad, forbedrer kundernes tillid og fremmer en professionel corporate image. </p>
                </div>
                <ul class="product-list">
                    <li>
                        <span class="illus logo"><?php echo $this->list[0]->name;?></span>
                        <h2 class="red">Logo design</h2>
                        <?php if($this->list[0]->promotion_price){?>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[0]->promotion_price;?></strong></span>
                        <span class="old-price">(Førpris kr <?php echo $this->list[0]->price;?>)</span>
                        <?php } else {?>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[0]->price;?></strong></span>
                        <?php }?>
                    </li>
                    <li>
                        <span class="illus card"><?php echo $this->list[1]->name;?></span>
                        <h2 class="blue">Visitkort & Brevpapir<br>design</h2>
                        <?php if($this->list[1]->promotion_price){?>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[1]->promotion_price;?></strong></span>
                        <span class="old-price">(Førpris kr <?php echo $this->list[1]->price;?>)</span>
                         <?php } else {?>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[1]->price;?></strong></span>
                        <?php }?>
                    </li>
                    <a href="index.php?option=com_images&view=portefolje&Itemid=4&active=websitePortefolje">
                    <li>
                        <span class="illus stationary"><?php echo $this->list[2]->name;?></span>
                        <h2 class="orange">Website<br>Templates</h2>
                        <?php if($websitePrice->promotion_price){?>
                        <span class="current-price">Pris kr <strong><?php echo $websitePrice->promotion_price;?></strong></span>
                        <span class="old-price" style="color:#323232;">(Førpris kr <?php echo $websitePrice->price;?>)</span>
                        <?php } else {?>
                        <span class="current-price">Pris kr <strong><?php echo $websitePrice->price;?></strong></span>
                        <?php }?>
                    </li>
                    </a>
                    <a href="index.php?option=com_images&view=portefolje&Itemid=4&active=webshopPortefolje">
                    <li>
                        <span class="illus brochure"><?php echo $this->list[3]->name;?></span>
                        <h2>Webshop<br>Templates</h2>
                        <?php if($webshopPrice->promotion_price){?>
                        <span class="current-price">Pris kr <strong><?php echo $webshopPrice->promotion_price;?></strong></span>
                        <span class="old-price" style="color:#323232;">(Førpris kr <?php echo $webshopPrice->price;?>)</span>
                        <?php } else {?>
                        <span class="current-price">Pris kr <strong><?php echo $webshopPrice->price;?></strong></span>
                        <?php }?>
                    </li>
                    </a>
                </ul>
                <div class="prd-package-custom">
                    <!--<p>Du kan selv vælge de produkter, der skal udgøre dit sæt, eller endnu hurtigere - starte med et af vores sæt. 
                    Vi lader dig vælge!</p>
                    <a class="begin-btn" href="index.php?option=com_ecommerce&view=produkpakke&Itemid=2">Begynd</a>
                    <div class="clr"></div>-->
                    <div class="process-link"><a class="more" href="index.php?option=com_ecommerce&view=designproces&Itemid=1">Find ud af, hvordan vores design processen fungerer</a></div>
                </div>
            </div>
        </div>
        <div class="contact-ctn">
            <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
            <a class="contact-btn" href="index.php?option=com_contact&view=contact&id=1&Itemid=7">Kontakt os for yderligere information</a>
        </div>
        
    </div>
    <div class="content-box-decor box-decor-btm"><span></span></div>
</div>