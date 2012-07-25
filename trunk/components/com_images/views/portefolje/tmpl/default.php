<?php
defined('_JEXEC') or die('Restricted access');
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Portefølje</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn">
    <link rel="stylesheet" type="text/css" media="screen" href="templates/tpl_designcreations/css/fancybox.css" />
    <script type="text/javascript">
        $(function() {
            $("#portfolio").tabs({fx:{slide: "toggle"}}).tabs("rotate", 0, true).tabs('option','selected','<?php echo JRequest::getVar('active');?>');  
        });
    </script>
    
    <div id="portfolio" class="dc-tabs-content fll clr">
    
        <ul class="tabs-ctn">
            <li class="tab-item ui-tabs-selected" id="logoTab"><a href="#logoPortefolje"><span class="logo">Logo Design</span></a></li>
            <li class="tab-item" id="cardTab"><a href="#visitkortPortefolje"><span class="visitcard">Visitkort Design</span></a></li>
            <li class="tab-item" id="stationaryTab"><a href="#brevpapirPortefolje"><span class="stationary">Brevpapir Design</span></a></li>
            <li class="tab-item" id="brochureTab"><a href="#brochurePortefolje"><span class="brochure">Brochure Design</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="logoPortefolje" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <!-- logo portfolio-->
                <ul class="portfolio logo-list">
                	<?php foreach($this->logos as $logo){?>
                    <li><a rel="logo_group" href="images/imgupload/<?php echo $logo->full;?>" title="<?php echo $logo->name;?>"><img src="images/imgupload/<?php echo $logo->thumb;?>" alt="<?php echo $logo->name;?>" /></a></li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side 1</span>
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
                    <li><a rel="card_group" href="images/imgupload/<?php echo $card->full;?>" title="<?php echo $card->name;?>"><img src="images/imgupload/<?php echo $card->thumb;?>" alt="<?php echo $card->name;?>" /></a></li>
                    <?php }?>
                    
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side 1</span>
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
        <div id="brevpapirPortefolje" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brevpapir portfolio-->
                <ul class="portfolio stationary-list">
                	<?php foreach($this->letters as $letter){?>
                    <li><a rel="letter_group" href="images/imgupload/<?php echo $letter->full;?>" title="<?php echo $letter->name;?>"><img src="images/imgupload/<?php echo $letter->thumb;?>" alt="<?php echo $letter->name;?>" /></a></li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side 1</span>
                    <?php if($this->pagetotal['letter_page'] > 1) {
					if(!$_GET['page3'])$_GET['page3'] = 1; 	
					?>
                    <div class="pagination-nav">
                    	<?php if($_GET['page3'] == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $_GET['page3'] - 1;?>&active=brevpapirPortefolje">Previous</a>
                        <?php }?>
						<?php for($i=1; $i<=$this->pagetotal['letter_page']; $i++){?>
                            <?php     
                            if($i == $_GET['page3']){?>
                                <span class="current-page"><?php echo $i;?></span>
                            <?php } else {?>
                            <a href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $i;?>&active=brevpapirPortefolje"><?php echo $i;?></a>
                            <?php }?>
                    	<?php }?>
                         <?php if($_GET['page3'] == $this->pagetotal['letter_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $_GET['page3'] + 1;?>&active=brevpapirPortefolje">Next</a>
                        <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div> 
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>   
        </div>
        <!-- Brochure Content -->
        <div id="brochurePortefolje" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brochure portfolio-->
                <ul class="portfolio stationary-list">
                	<?php foreach($this->brochures as $brochure){?>
                    <li><a rel="brochure_group" href="images/imgupload/<?php echo $brochure->full;?>" title="<?php echo $brochure->name;?>"><img src="images/imgupload/<?php echo $brochure->thumb;?>" alt="<?php echo $brochure->name;?>" /></a></li>
                    <?php }?>
                </ul>
                <!-- Start pagination-->
                <div class="pagination">
                    <span class="page-num">Side 1</span>
                    <?php if($this->pagetotal['brochure_page'] > 1) {
					if(!$_GET['page4'])$_GET['page4'] = 1; 	
					?>
                    <div class="pagination-nav">
                    	<?php if($_GET['page4'] == 1){?>
                        	<span class="dis-pagination-prev">Previous</span>
                        <?php } else {?>
                        	<a class="pagination-prev" href="index.php?option=com_images&view=portefolje&Itemid=4&page4=<?php echo $_GET['page4'] - 1;?>&active=brochurePortefolje">Previous</a>
                        <?php }?>
						<?php for($i=1; $i<=$this->pagetotal['brochure_page']; $i++){?>
                            <?php     
                            if($i == $_GET['page4']){?>
                                <span class="current-page"><?php echo $i;?></span>
                            <?php } else {?>
                            <a href="index.php?option=com_images&view=portefolje&Itemid=4&page3=<?php echo $i;?>&active=brochurePortefolje"><?php echo $i;?></a>
                            <?php }?>
                    	<?php }?>
                         <?php if($_GET['page4'] == $this->pagetotal['brochure_page']){?>
                            <span class="dis-pagination-next">Next</span>
                        <?php } else {?>
                        	<a class="pagination-next" href="index.php?option=com_images&view=portefolje&Itemid=4&page4=<?php echo $_GET['page4'] + 1;?>&active=brochurePortefolje">Next</a>
                        <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>    
        </div>

    </div>
    <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.fancybox-1.3.4.pack.js"></script>
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
		
		$("a[rel=letter_group]").fancybox({
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
		
		$("a[rel=brochure_group]").fancybox({
            'titlePosition' 	: 'over',
            'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    </script>
    
</div>