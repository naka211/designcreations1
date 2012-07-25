<?php
defined('_JEXEC') or die('Restricted access');
?>
<!-- Begin breadcumbs navigation -->
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <a href="index.php?option=com_ecommerce&view=produkter&Itemid=2">Produkter</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Produkt pakke</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="dc-products">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <h1 class="main-title">Start med en pakke</h1>
            <div class="content-inner">
                <div class="product-desc">
                    
                    <p>Vi leverer flere særlige pakker med vores bedste pristilbud :</p>
                </div>
                <ul class="product-list package-list">
                    <li>
                        <span class="illus platinum"><?php echo $this->list[0]->name;?> Pakke</span>
                        <span class="prd-in-pk">Logo design</span>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[0]->promotion_price;?></strong>,-</span>
                        <span class="old-price">(Førpris kr <?php echo number_format($this->list[0]->price,0,',','.');?>,-)</span>
                        <a class="buy-btn" href="index.php?option=com_ecommerce&task=pakkeform&id=<?php echo $this->list[0]->id;?>">Køb Nu</a>
                    </li>
                    <li>
                        <span class="illus silver"><?php echo $this->list[1]->name;?> Pakke</span>
                        <span class="prd-in-pk">Logo design,<br/>Visitkort design</span>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[1]->promotion_price;?></strong>,-</span>
                        <span class="old-price">(Førpris kr <?php echo number_format($this->list[1]->price,0,',','.');?>,-)</span>
                        <a class="buy-btn" href="index.php?option=com_ecommerce&task=pakkeform&id=<?php echo $this->list[1]->id;?>">Køb Nu</a>
                    </li>
                    <li>
                        <span class="illus gold"><?php echo $this->list[2]->name;?> Pakke</span>
                        <span class="prd-in-pk">Logo design,<br/>Visitkort design,<br/>Brevpapir design</span>
                        <span class="current-price">Pris kr <strong><?php echo $this->list[2]->promotion_price;?></strong>,-</span>
                        <span class="old-price">(Førpris kr <?php echo number_format($this->list[2]->price,0,',','.');?>,-)</span>
                        <a class="buy-btn" href="index.php?option=com_ecommerce&task=pakkeform&id=<?php echo $this->list[2]->id;?>">Køb Nu</a>
                    </li>
                    <li>
                        <span class="illus diamond"><?php echo $this->list[3]->name;?> Pakke</span>
                        <span class="prd-in-pk">Logo design,<br/>Visitkort design,<br/>Brevpapir design,<br/>Brochure design</span>
                        <span class="current-price">Pris kr <strong><?php echo number_format($this->list[3]->promotion_price,0,',','.');?></strong>,-</span>
                        <span class="old-price">(Førpris kr <?php echo number_format($this->list[3]->price,0,',','.');?>,-)</span>
                        <a class="buy-btn" href="index.php?option=com_ecommerce&task=pakkeform&id=<?php echo $this->list[3]->id;?>">Køb Nu</a>
                    </li>
                </ul>
                <div class="product-desc">
                    <p>* Prisen ovenfor er ikke inkluderet skat. <a class="learn-more" href="index.php?option=com_ecommerce&view=priser&Itemid=3">Lær mere om vores produkt pris</a> <img src="templates/tpl_designcreations/img/arrow_s2.png" alt="" />
                    <br/>
                    <br/>
                    <strong>100% tilfredshedsgaranti</strong> - hvis vi ikke færdiggøre vores designs, indtil du er helt tilfreds. En hurtig og pålidelig service, der giver første udkast til gennemsyn i 3 dage og endelig produktdesign afsluttet i 6 til 8 arbejdsdage (Afhænger den pakke, du vælger). <a class="learn-more" href="index.php?option=com_ecommerce&view=funktioner&Itemid=2">Se mere om vores produkt service funktioner</a> <img src="templates/tpl_designcreations/img/arrow_s2.png" alt="" /></p>
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="index.php?option=com_ecommerce&view=produkter&Itemid=2">Tilbage</a>
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
<!-- /end mid-content  -->