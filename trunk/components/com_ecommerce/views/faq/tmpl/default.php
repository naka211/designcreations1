<?php
defined('_JEXEC') or die('Restricted access');
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>FAQ</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn">

    <div id="faq" class="dc-tabs-content fll clr">
        <script type="text/javascript" src="templates/tpl_designcreations/js/jquery.tinyscrollbar.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#faq").tabs({fx:{slide: "toggle"}}).tabs("rotate", 0, true);
                $('.scroll-content').tinyscrollbar();
            });
        </script>
    
        <ul class="tabs-ctn">
            <li class="tab-item ui-tabs-selected" id="logoTab"><a href="#logoFaq"><span class="logo">Logo Design</span></a></li>
            <li class="tab-item" id="cardTab"><a href="#visitkortFaq"><span class="visitcard">Visitkort & Brevpapir</span></a></li>
            <li class="tab-item" id="websiteTab"><a href="#websiteFaq"><span class="website">Website Templates</span></a></li>
            <li class="tab-item" id="webshopTab"><a href="#webshopFaq"><span class="webshop">Webshop Templates</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="logoFaq" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="scroll-content">
                    <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                    <div class="bottom-mask"></div>
                    <div class="viewport">
                        <div class="viewport-inner">
                        <?php echo $this->contents[0]->introtext;?>
                        </div>

                    </div>
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
        <div id="visitkortFaq" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="scroll-content">
                    <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                    <div class="bottom-mask"></div>
                    <div class="viewport">
                        <div class="viewport-inner">
                        <?php echo $this->contents[1]->introtext;?>
                        </div>

                    </div>
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
        <div id="websiteFaq" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="scroll-content">
                    <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                    <div class="bottom-mask"></div>
                    <div class="viewport">
                        <div class="viewport-inner">
                        <?php echo $this->contents[2]->introtext;?>
                        </div>

                    </div>
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
        <div id="webshopFaq" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="scroll-content">
                    <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                    <div class="bottom-mask"></div>
                    <div class="viewport">
                        <div class="viewport-inner">
                        <?php echo $this->contents[2]->introtext;?>
                        </div>

                    </div>
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