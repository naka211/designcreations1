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
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Portefølje</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn">
	
    <link rel="stylesheet" type="text/css" media="screen" href="templates/tpl_designcreations/css/fancybox.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="templates/tpl_designcreations/css/prettyPhoto.css" />
    <script type="text/javascript">
        $(function() {
            $("#portfolio").tabs({fx:{slide: "toggle"}}).tabs("rotate", 0, true).tabs('option','selected','<?php echo JRequest::getVar('active');?>');  
        });
    </script>
    <script type="text/javascript">
		$(function(){
			/*$("img[src*='_s.jpg']").thumbPopup({
			imgSmallFlag: "_s",
			imgLargeFlag: "_l"
			});*/
			$(".imgThumb").thumbPopup();
		});
	 </script>
    <div id="portfolio" class="dc-tabs-content fll clr">
    
        <ul class="tabs-ctn">
            <li class="tab-item ui-tabs-selected" id="logoTab"><a href="#logoPortefolje"><span class="logo">Logo Design</span></a></li>
            <li class="tab-item" id="cardTab"><a href="#visitkortPortefolje"><span class="visitcard">Visitkort & Brevpapir</span></a></li>
            <li class="tab-item" id="websiteTab"><a href="#websitePortefolje"><span class="website">Website Templates</span></a></li>
            <li class="tab-item" id="webshopTab"><a href="#webshopPortefolje"><span class="webshop">Webshop Templates</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="logoPortefolje" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <!-- logo portfolio-->
                <ul class="portfolio logo-list">
                	<?php foreach($this->logos as $logo){?>
                    <li><a rel="logo_group" href="images/imgupload/<?php echo $logo->full;?>" title="<?php echo $logo->name;?>"><img src="images/imgupload/<?php echo $logo->thumb;?>" alt="<?php echo $logo->name;?>" title="Tryk for at se i stort format!" /></a></li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side <?php echo $_GET['page1']?$_GET['page1']:1?></span>
                    <?php if($this->pagetotal['logo_page'] > 1) {
					if(!$_GET['page1'])$_GET['page1'] = 1;
					?>
                    <div class="pagination-nav">
                    	<?php if($_GET['page1'] == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page1=<?php echo $_GET['page1'] - 1;?>&active=logoPortefolje">Previous</a>
                        <?php }?>
						<?php for($i=1; $i<=$this->pagetotal['logo_page']; $i++){?>
                            <?php     
                            if($i == $_GET['page1']){?>
                                <span class="current-page"><?php echo $i;?></span>
                            <?php } else {?>
                            <a href="index.php?option=com_images&view=portefolje&Itemid=4&page1=<?php echo $i;?>&active=logoPortefolje"><?php echo $i;?></a>
                            <?php }?>
                    	<?php }?>
                         <?php if($_GET['page1'] == $this->pagetotal['logo_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page1=<?php echo $_GET['page1'] + 1;?>&active=logoPortefolje">Next</a>
                        <?php }?>
                        </div>
                    <?php }?>
                </div>
                
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Visitcard Content -->
        <div id="visitkortPortefolje" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Visitcard portfolio-->
                <ul class="portfolio card-list">
                	<?php foreach($this->cards as $card){?>
                    <li><a rel="card_group" href="images/imgupload/<?php echo $card->full;?>" title="<?php echo $card->name;?>"><img src="images/imgupload/<?php echo $card->thumb;?>" alt="<?php echo $card->name;?>" title="Tryk for at se i stort format!" /></a></li>
                    <?php }?>
                    
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side <?php echo $_GET['page2']?$_GET['page2']:1?></span>
                    <?php if($this->pagetotal['card_page'] > 1) {
					if(!$_GET['page2'])$_GET['page2'] = 1; 	
					?>
                    <div class="pagination-nav">
                    	<?php if($_GET['page2'] == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page2=<?php echo $_GET['page2'] - 1;?>&active=visitkortPortefolje">Previous</a>
                        <?php }?>
						<?php for($i=1; $i<=$this->pagetotal['card_page']; $i++){?>
                            <?php     
                            if($i == $_GET['page2']){?>
                                <span class="current-page"><?php echo $i;?></span>
                            <?php } else {?>
                            <a href="index.php?option=com_images&view=portefolje&Itemid=4&page2=<?php echo $i;?>&active=visitkortPortefolje"><?php echo $i;?></a>
                            <?php }?>
                    	<?php }?>
                         <?php if($_GET['page2'] == $this->pagetotal['card_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page2=<?php echo $_GET['page2'] + 1;?>&active=visitkortPortefolje">Next</a>
                        <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Brevpapir Content -->
        <div id="websitePortefolje" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brevpapir portfolio-->
                <ul class="portfolio website-list gallery">
                	<?php foreach($this->letters as $website){?>
                    <li>
                        <a class="site-thumb" href="<?php echo JURI::base();?>images/imgupload/<?php echo $website->full;?>" onclick="setWebsite('<?php echo $website->name;?>')" rel="prettyPhoto1[unusual]">
                            <img src="images/imgupload/<?php echo $website->thumb;?>" title="Tryk for at se i stort format!" />
                            <span class="template-id rounded"><?php echo $website->name;?></span>
                        </a>
                        <div class="info"><a class="min-buy-btn flr" href="javascript:void(0);" onclick="setWebsite('<?php echo $website->name;?>')">Køb Nu !</a>Fra Kr. <?php echo $websitePrice->promotion_price?$websitePrice->promotion_price:$websitePrice->price;?></div>
                    </li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side <?php echo JRequest::getVar('page3')?JRequest::getVar('page3'):1?></span>
                    <?php if($this->pagetotal['letter_page'] > 1) {
					if(!JRequest::getVar('page3'))$page3 = 1; else $page3 = JRequest::getVar('page3');
					?>
                    <div class="pagination-nav">
                    	<?php if($page3 == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $page3 - 1;?>&active=websitePortefolje">Previous</a>
                        <?php }?>
                        
                        <?php 
							$pagination = "";
							$adjacents = 2;
							$lastpage = $this->pagetotal['letter_page'];
							
							if (($page3 <= 4) && ($page3 >= $lastpage - 3))	//not enough pages to bother breaking it up
							{	
								for ($i = 1; $i <= $lastpage; $i++)
								{
									if ($i == $page3)
										$pagination .= '<span class="current-page">'.$i.'</span>';
									else
										$pagination .= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$i.'&active=websitePortefolje">'.$i.'</a>';					
								}
							}
							else	//enough pages to hide some
							{
								//close to beginning; only hide later pages
								if($page3 < 1 + ($adjacents * 2))		
								{
									for ($i = 1; $i <= $page3 + $adjacents; $i++)
									{
										if ($i == $page3)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$i.'&active=websitePortefolje">'.$i.'</a>';					
									}
									$pagination.= "<span>...</span>";
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$lastpage.'&active=websitePortefolje">'.$lastpage.'</a>';
								}
								//in middle; hide some front and some back
								else if($lastpage - (1 + $adjacents) > $page3 && $page3 > ($adjacents * 2))
								{
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3=1&active=websitePortefolje">1</a>';
									$pagination.= "<span>...</span>";
									for ($i = $page3 - $adjacents; $i <= $page3 + $adjacents; $i++)
									{
										if ($i == $page3)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$i.'&active=websitePortefolje">'.$i.'</a>';
									}
									$pagination.= "<span>...</span>";
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$lastpage.'&active=websitePortefolje">'.$lastpage.'</a>';
								}
								//close to end; only hide early pages
								else
								{
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3=1&active=websitePortefolje">1</a>';
									$pagination.= "<span>...</span>";
									for ($i = $page3 - $adjacents; $i <= $lastpage; $i++)
									{
										if ($i == $page3)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page3='.$i.'&active=websitePortefolje">'.$i.'</a>';
									}
								}
							}
							echo $pagination;
						?>
                         <?php if($page3 == $this->pagetotal['letter_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $page3 + 1;?>&active=websitePortefolje">Next</a>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
            </div> 
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>   
        </div>
        <!-- Brochure Content -->
        <div id="webshopPortefolje" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brochure portfolio-->
                <ul class="portfolio website-list gallery">
                	<?php foreach($this->brochures as $webshop){?>
                    <li>
                        <a class="site-thumb" href="<?php echo JURI::base();?>images/imgupload/<?php echo $webshop->full;?>" onclick="setWebshop('<?php echo $webshop->name;?>')" rel="prettyPhoto[unusual]">
                            <img src="images/imgupload/<?php echo $webshop->thumb;?>" title="Tryk for at se i stort format!" />
                            <span class="template-id rounded"><?php echo $webshop->name;?></span>
                        </a>
                        <div class="info"><a class="min-buy-btn flr" href="javascript:void(0);" onclick="setWebshop('<?php echo $webshop->name;?>')">Køb Nu !</a>Fra Kr. <?php echo $webshopPrice->promotion_price?$webshopPrice->promotion_price:$webshopPrice->price;?></div>
                    </li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side <?php echo $_GET['page4']?$_GET['page4']:1?></span>
                    <?php if($this->pagetotal['brochure_page'] > 1) {
					if(!JRequest::getVar('page4'))$page4 = 1; else $page4 = JRequest::getVar('page4');
					?>
                    <div class="pagination-nav">
                    	<?php if($page4 == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page4=<?php echo $page4 - 1;?>&active=webshopPortefolje">Previous</a>
                        <?php }?>
                       
                        <?php 
							$pagination = "";
							$adjacents = 2;
							$lastpage = $this->pagetotal['brochure_page'];
							
							if (($page4 <= 4) && ($page4 >= $lastpage - 3))	//not enough pages to bother breaking it up
							{	
								for ($i = 1; $i <= $lastpage; $i++)
								{
									if ($i == $page4)
										$pagination .= '<span class="current-page">'.$i.'</span>';
									else
										$pagination .= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$i.'&active=webshopPortefolje">'.$i.'</a>';					
								}
							}
							else	//enough pages to hide some
							{
								//close to beginning; only hide later pages
								if($page4 < 1 + ($adjacents * 2))		
								{
									for ($i = 1; $i <= $page4 + $adjacents; $i++)
									{
										if ($i == $page4)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$i.'&active=webshopPortefolje">'.$i.'</a>';					
									}
									$pagination.= "<span>...</span>";
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$lastpage.'&active=webshopPortefolje">'.$lastpage.'</a>';
								}
								//in middle; hide some front and some back
								else if($lastpage - (1 + $adjacents) > $page4 && $page4 > ($adjacents * 2))
								{
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4=1&active=webshopPortefolje">1</a>';
									$pagination.= "<span>...</span>";
									for ($i = $page4 - $adjacents; $i <= $page4 + $adjacents; $i++)
									{
										if ($i == $page4)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$i.'&active=webshopPortefolje">'.$i.'</a>';
									}
									$pagination.= "<span>...</span>";
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$lastpage.'&active=webshopPortefolje">'.$lastpage.'</a>';
								}
								//close to end; only hide early pages
								else
								{
									$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4=1&active=webshopPortefolje">1</a>';
									$pagination.= "<span>...</span>";
									for ($i = $page4 - $adjacents; $i <= $lastpage; $i++)
									{
										if ($i == $page4)
											$pagination.= '<span class="current-page">'.$i.'</span>';
										else
											$pagination.= '<a href="index.php?option=com_images&view=portefolje&Itemid=4&page4='.$i.'&active=webshopPortefolje">'.$i.'</a>';
									}
								}
							}
							echo $pagination;
						?>
                        
                        
                         <?php if($_GET['page4'] == $this->pagetotal['brochure_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page4=<?php echo $page4 + 1;?>&active=webshopPortefolje">Next</a>
                        <?php }?>
                      </div>
                    <?php }?>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>    
        </div>

    </div>
    <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
        $("a[rel=logo_group]").fancybox({
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
		
		$("a[rel=card_group]").fancybox({
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });

		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_rounded',social_tools:'',overlay_gallery:false});
			$("a[rel^='prettyPhoto1']").prettyPhoto({animation_speed:'normal',theme:'light_rounded',social_tools:'',overlay_gallery:false});
		});
    </script>
    
</div>