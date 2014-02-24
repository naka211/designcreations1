<?php
defined('_JEXEC') or die('Restricted access');
$db = JFactory::getDBO();
$query = "SELECT introtext, title FROM #__content WHERE id = 19 AND state = 1";
$db->setQuery($query);
$item = $db->loadObject();
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span><?php echo $item->title;?></span>
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
                    });
                </script>
                <h1 class="main-title"><?php echo $item->title;?></h1>
                <div class="content-inner">
                    <div class="scroll-content">
                        <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                        <div class="viewport">
                            <div class="viewport-inner">
                        		<?php echo $item->introtext;?>
                                
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