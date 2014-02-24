<?php
defined('_JEXEC') or die('Restricted access');
$db = JFactory::getDBO();
$query = "SELECT introtext, title FROM #__content WHERE state = 1 AND catid = 3 ORDER BY id";
$db->setQuery($query);
$items = $db->loadObjectList();
$i = 1;
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>bestilling &amp; betaling proces</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="dc-content">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <div class="dc-content-ctn">
                <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.tinyscrollbar.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        $('.scroll-content').tinyscrollbar();
                        $("#accordion").accordion({ clearStyle: true });
                    });
                </script>
                <h1 class="main-title">Bestilling &amp; betaling proces</h1>
                <div class="content-inner">
                    <div class="scroll-content">
                        <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                        <div class="bottom-mask"></div>
                        <div class="viewport">
                            <div class="viewport-inner">
                                <div id="accordion">
                                	<?php foreach($items as $item){?>
                                    <h4><span class="step"><img src="templates/tpl_designcreations/img/num<?php echo $i;?>.png" alt="<?php echo $i;?>" /></span><a href="#"><?php echo $item->title;?></a></h4>
                                    <div>
                                        <?php echo $item->introtext;?>
                                    </div>
                                    <?php $i++;}?>
                                </div>
                            </div>
                        </div>
                    </div>
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