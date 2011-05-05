<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$template_dir = "templates/tpl_designcreations/";
$db = JFactory::getDBO();
$query = "SELECT id, price, promotion_price FROM #__pr_product WHERE category_id = 1";
$db->setQuery($query);
$price = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 1 ORDER BY ordering LIMIT 0,8";
$db->setQuery($query);
$logos = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 2 ORDER BY ordering LIMIT 0,3";
$db->setQuery($query);
$cards = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 3 ORDER BY ordering LIMIT 0,3";
$db->setQuery($query);
$letters = $db->loadObjectList();

$query = "SELECT * FROM #__images WHERE catid = 4 ORDER BY ordering LIMIT 0,3";
$db->setQuery($query);
$brochures = $db->loadObjectList();
?>

<!-- Begin mid-content  -->
    <div id="content-ctn" class="home">                
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
    </script>

    <div id="featured" >
        <ul class="ui-tabs-nav">
                <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment1"><span class="logo">Logo Design</span></a></li>
                <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment2"><span class="visitcard">Visitkort Design</span></a></li>
                <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment3"><span class="stationary">Brevpapir Design</span></a></li>
                <li class="ui-tabs-nav-item last" id="nav-fragment-4"><a href="#fragment4"><span class="brochure">Brochure Design</span></a></li>
        </ul>

        <!-- logo Content -->
        <div id="fragment1" class="ui-tabs-panel">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/logo_title.png" alt="Logo Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[0]->promotion_price;?></strong>,-</span>
                    <span class="old-price">Førpris kr. <?php echo $price[0]->price;?>,-</span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på logos</h2>
                <a class="more" href="portefolje.html#logoPortefolje">Se mere</a>
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
                <h2><img src="<?php echo $template_dir;?>img/platinum_pk_title.png" alt="Platinum Power Package" /><span>Hvad får du ?</span></h2>
                <ul>
                    <li><span>10 unikke logoforslag<em class="red"> de første 3 er klar i morgen*</em></span></li>
                    <li><span>Ubegraenset antal aendringer</span></li>
                    <li><span>Sammenlign med hvem som helst<em>laes vores hemmelighed</em></span><a class="more" onclick="MM_openBrWindow('<?php echo JURI::base();?>templates/tpl_designcreations/platinum.html', '' ,'scrollbars=yes,width=660,height=500')" href="javascript:;"><em>her</em></a></li>
                </ul>
                <a class="illus" href="produkter_pakke.html" title="Se hvad inde i pakken"><img src="<?php echo $template_dir;?>img/platinum_pk.png" alt="Platinum Power Package" /></a>
            </div>
            <!--/ End package-->
             
        </div>

        <!-- Visitcard Content -->
        <div id="fragment2" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/visitcard_title.png" alt="Visitkort Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[1]->promotion_price;?></strong>,-</span>
                    <span class="old-price">Førpris kr. <?php echo $price[1]->price;?>,-</span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på visitkort</h2>
                <a class="more" href="portefolje.html#visitkortPortefolje">Se mere</a>
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
                <h2><img src="<?php echo $template_dir;?>img/silver_pk_title.png" alt="Silver Package" /><span>Hvad får du ?</span></h2>
                <ul>
                    <li><span>3 skabeloner af visitkort i den næste dag for at gennemgå</span></li>
                    <li><span>Ubegraenset antal aendringer</span></li>
                    <li><span>Fuld understøttelse og design konsulent</span><a class="more" href="produkter_pakke.html"><em>Se hvad inde i pakken</em></a></li>
                </ul>
                <a class="illus" href="produkter_pakke.html" title="Se hvad inde i pakken"><img src="<?php echo $template_dir;?>img/silver_pk.png" alt="Silver Package" /></a>
            </div>
            <!--/ End package-->
        </div>

        <!-- Brevpapir Content -->
        <div id="fragment3" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/stationary_title.png" alt="Brevpapir Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[2]->promotion_price;?></strong>,-</span>
                    <span class="old-price">Førpris kr. <?php echo $price[2]->price;?>,-</span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på Brevpapir</h2>
                <a class="more" href="portefolje.html#brevpapirPortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="stationary-list">
                                	<?php foreach($letters as $letter){?>
                                    <li><img src="images/imgupload/<?php echo $letter->thumb;?>" alt="<?php echo $letter->name;?>" /></li>
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
                <h2><img src="<?php echo $template_dir;?>img/gold_pk_title.png" alt="Gold Package" /><span>Hvad får du ?</span></h2>
                <ul>
                    <li><span>2 skabeloner af brochurer i de næste 2 dage for at gennemgå</span></li>
                    <li><span>Ubegraenset antal aendringer</span></li>
                    <li><span>Fuld understøttelse og design konsulent</span><a class="more" href="produkter_pakke.html"><em>Se hvad inde i pakken</em></a></li>
                </ul>
                <a class="illus" href="produkter_pakke.html" title="Se hvad inde i pakken"><img src="<?php echo $template_dir;?>img/gold_pk.png" alt="Gold Package" /></a>
            </div>
            <!--/ End package-->
        </div>

        <!-- Brochure Content -->
        <div id="fragment4" class="ui-tabs-panel ui-tabs-hide">
            <div class="banner">
                <h1><img src="<?php echo $template_dir;?>img/brochure_title.png" alt="Brochure Design" /></h1>
                <div class="price">
                    <span class="recent-price">Pris kr. <strong><?php echo $price[3]->promotion_price;?></strong>,-</span>
                    <span class="old-price">Førpris kr. <?php echo $price[3]->price;?>,-</span>
                    <span class="ease-line"></span>
                </div>
                <a class="order-btn" href="">Bestil Nu !</a>
            </div>
            <div class="example clr">
                <h2>Eksempler på Brochure</h2>
                <a class="more" href="portefolje.html#brochurePortefolje">Se mere</a>
                <!-- Begin Logos example list-->
                <div class="box-decor-s1">
                    <div class="right-decor">
                        <div class="mid-decor">
                            <div class="example-list clr">
                                <ul class="brochure-list">
                                	<?php foreach($brochures as $brochure){?>
                                    <li><img src="images/imgupload/<?php echo $brochure->thumb;?>" alt="<?php echo $brochure->name;?>" /></li>
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
                <h2><img src="<?php echo $template_dir;?>img/diamond_pk_title.png" alt="Diamant Package" /><span>Hvad får du ?</span></h2>
                <ul>
                    <li><span>2 unikke brochureforslag</span><em class="red">de første er klar i morgen*</em></li>
                    <li><span>Ubegraenset antal aendringer</span></li>
                    <li><span>Fuld understøttelse og design konsulent</span><a class="more" href="produkter_pakke.html"><em>Se hvad inde i pakken</em></a></li>
                </ul>
                <a class="illus" href="produkter_pakke.html" title="Se hvad inde i pakken"><img src="<?php echo $template_dir;?>img/diamond_pk.png" alt="Diamond Package" /></a>
            </div>
            <!--/ End package-->
        </div>

    </div>
    
       
</div>
    <!-- /end mid-content  -->