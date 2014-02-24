<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$template_dir = "templates/tpl_designcreations/";
$db = JFactory::getDBO();
$query = "SELECT id, price, promotion_price FROM #__pr_product WHERE category_id = 1";
$db->setQuery($query);
$price = $db->loadObjectList();

$query = "SELECT price, promotion_price FROM #__pr_product WHERE id = 3";
$db->setQuery($query);
$websitePrice = $db->loadObject();

$query = "SELECT price, promotion_price FROM #__pr_product WHERE id = 10";
$db->setQuery($query);
$webshopPrice = $db->loadObject();

$query = "SELECT * FROM #__images WHERE catid = 1 AND publish = 1 ORDER BY RAND() LIMIT 0,8";
$db->setQuery($query);
$logos = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 2 AND publish = 1 ORDER BY RAND() LIMIT 0,3";
$db->setQuery($query);
$cards = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 3 AND publish = 1 ORDER BY RAND() LIMIT 0,3";
$db->setQuery($query);
$websites = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 4 AND publish = 1 ORDER BY RAND() LIMIT 0,3";
$db->setQuery($query);
$webshops = $db->loadObjectList();

$query = "SELECT introtext, title FROM #__content WHERE state = 1 AND catid = 5 ORDER BY id";
$db->setQuery($query);
$items = $db->loadObjectList();
?>

<!-- Begin mid-content  -->
    <div id="content-ctn" class="home">
    <link rel="stylesheet" type="text/css" media="screen" href="templates/tpl_designcreations/css/prettyPhoto.css" />
    <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.prettyPhoto.js"></script>     
	<script type="text/javascript">
        $(function() {
            $("#featured").tabs({fx:{slide: "toggle"}}).tabs("rotate", 8000, true);  
            $("#featured").hover(  
            function() {  
            $("#featured").tabs("rotate",0,true);  
            },  
            function() {  
            $("#featured").tabs("rotate",8000,true);  
            }  
            );  
        });
		$(function(){
			/*$("img[src*='_s.jpg']").thumbPopup({
			imgSmallFlag: "_s",
			imgLargeFlag: "_l"
			});*/
			$(".imgThumb").thumbPopup();
		});
    </script>

    <div id="featured" >
        <ul class="ui-tabs-nav">
                <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment1"><span class="logo">Logo Design</span></a></li>
                <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment2"><span class="visitcard">Visitkort<br>& Brevpapir </span></a></li>
                <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment3"><span class="website">Website<br>Templates</span></a></li>
                <li class="ui-tabs-nav-item last" id="nav-fragment-4"><a href="#fragment4"><span class="webshop">Webshop<br>Templates</span></a></li>
        </ul>

        <!-- logo Content -->
        <div id="fragment1" class="ui-tabs-panel">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/logo_title.png" alt="Logo Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[0]->promotion_price;?></strong></span>
                    <span class="old-price">Førpris kr. <?php echo $price[0]->price;?></span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="javascript:void(0);">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på logos</h2>
                <a class="more" href="index.php?option=com_images&view=portefolje&Itemid=4&active=logoPortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="logo-list">
                                	<?php foreach($logos as $logo){?>
                                    <li><img src="images/imgupload/<?php echo $logo->thumb;?>" alt="<?php echo $logo->name;?>" /></li>
                                   	<?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End  Logos example list-->
            </div>
            <!-- Begin package-->
            <div class="package fll clr">
               	<?php echo $items[0]->introtext;?>
                <!--<a class="illus" href="index.php?option=com_ecommerce&view=produkpakke&Itemid=2" title="Se hvad inde i pakken">--><img src="<?php echo $template_dir;?>img/logo.png" alt="Logo" class="illus" /><!--</a>-->
            </div>
            <!--/ End package-->
             
        </div>

        <!-- Visitcard Content -->
        <div id="fragment2" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/visitcard_title.png" alt="Visitkort Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[1]->promotion_price;?></strong></span>
                    <span class="old-price">Førpris kr. <?php echo $price[1]->price;?></span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="javascript:void(0);">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på visitkort & brevpapir</h2>
                <a class="more" href="index.php?option=com_images&view=portefolje&Itemid=4&active=visitkortPortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="card-list">
                                	<?php foreach($cards as $card){?>
                                    <li><img src="images/imgupload/<?php echo $card->thumb;?>" alt="<?php echo $card->name;?>" /></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End  Logos example list-->
            </div>
            <!-- Begin package-->
            <div class="package fll clr">
               	<?php echo $items[1]->introtext;?>
                <!--<a class="illus" href="index.php?option=com_ecommerce&view=produkpakke&Itemid=2" title="Se hvad inde i pakken">--><img src="<?php echo $template_dir;?>img/visitcard.png" alt="Visitkort & Brevpapir " class="illus" /><!--</a>-->
            </div>
            <!--/ End package-->
        </div>

        <!-- Brevpapir Content -->
        <div id="fragment3" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/website_title.png" alt="Website templates" /></h1>
                <div class="price">
                	<?php if($websitePrice->promotion_price){?>
                    <span class="recent-price">Pris kr. <strong><?php echo $websitePrice->promotion_price;?></strong></span>
                    <span class="old-price">Førpris kr. <?php echo $websitePrice->price;?></span>
                    <span class="ease-line"></span>
                    <?php } else {?>
                    <span class="recent-price">Pris kr. <strong><?php echo $websitePrice->price;?></strong></span>
                    <?php }?>
                    
                </div>
                <a class="order-btn" href="javascript:void(0);">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på Websites</h2>
                <a class="more" href="index.php?option=com_images&view=portefolje&Itemid=4&active=websitePortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="website-list gallery">
                                	<?php foreach($websites as $website){?>
                                    <li>
                                        <a class="site-thumb" href="<?php echo JURI::base();?>images/imgupload/<?php echo $website->full;?>" onclick="setWebsite('<?php echo $website->name;?>');" rel="prettyPhoto1[unusual]">
                                            <img src="images/imgupload/<?php echo $website->thumb;?>" title="Tryk for at se i stort format!"/>
                                            <span class="template-id rounded"><?php echo $website->name;?></span>
                                        </a>
                                        <div class="info"><a class="min-buy-btn flr" href="javascript:void(0);" onclick="setWebsite('<?php echo $website->name;?>');">Køb Nu !</a>Fra Kr. <?php echo $websitePrice->promotion_price?$websitePrice->promotion_price:$websitePrice->price;?></div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End  Logos example list-->
            </div>
            <!-- Begin package-->
            <div class="package fll clr">
               	<?php echo $items[2]->introtext;?>
                <!--<a class="illus" href="index.php?option=com_ecommerce&view=produkpakke&Itemid=2" title="Se hvad inde i pakken">--><img src="<?php echo $template_dir;?>img/website.png" alt="Website" class="illus" /><!--</a>-->
            </div>
            <!--/ End package-->
        </div>

        <!-- Brochure Content -->
        <div id="fragment4" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/webshop_title.png" alt="Webshop templates" /></h1>
                <div class="price">
                	<?php if($webshopPrice->promotion_price){?>
                    <span class="recent-price">Pris kr. <strong><?php echo $webshopPrice->promotion_price;?></strong></span>
                    <span class="old-price">Førpris kr. <?php echo $webshopPrice->price;?></span>
                    <span class="ease-line"></span>
                    <?php } else {?>
                    <span class="recent-price">Pris kr. <strong><?php echo $webshopPrice->price;?></strong></span>
                    <?php }?>
                    
                </div>
                <a class="order-btn" href="javascript:void(0);">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på Webshop</h2>
                <a class="more" href="index.php?option=com_images&view=portefolje&Itemid=4&active=webshopPortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="website-list gallery">
                                	<?php foreach($webshops as $webshop){?>
                                    <li>
                                        <a class="site-thumb" href="<?php echo JURI::base();?>images/imgupload/<?php echo $webshop->full;?>" onclick="setWebshop('<?php echo $webshop->name;?>');" rel="prettyPhoto[unusual]">
                                            <img src="images/imgupload/<?php echo $webshop->thumb;?>" title="Tryk for at se i stort format!"/>
                                            <span class="template-id rounded"><?php echo $webshop->name;?></span>
                                        </a>
                                        <div class="info"><a class="min-buy-btn flr" href="javascript:void(0);" onclick="setWebshop('<?php echo $webshop->name;?>');" >Køb Nu !</a>Fra Kr. <?php echo $webshopPrice->promotion_price?$webshopPrice->promotion_price:$webshopPrice->price;?></div>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End  Logos example list-->
            </div>
            <!-- Begin package-->
            <div class="package fll clr">
                <?php echo $items[3]->introtext;?>
                <!--<a class="illus" href="index.php?option=com_ecommerce&view=produkpakke&Itemid=2" title="Se hvad inde i pakken">--><img src="<?php echo $template_dir;?>img/webshop.png" alt="Webshop" class="illus" /><!--</a>-->
            </div>
            <!--/ End package-->
        </div>

    </div>
    
       
</div>
    <!-- /end mid-content  -->
    <script language="javascript">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_rounded',social_tools:'',overlay_gallery:false});
			$("a[rel^='prettyPhoto1']").prettyPhoto({animation_speed:'normal',theme:'light_rounded',social_tools:'',overlay_gallery:false});
		});
	</script>