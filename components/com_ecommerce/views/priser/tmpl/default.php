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
            <li class="tab-item" id="cardTab"><a href="#visitkortPriser"><span class="visitcard">Visitkort Design</span></a></li>
            <li class="tab-item" id="stationaryTab"><a href="#brevpapirPriser"><span class="stationary">Brevpapir Design</span></a></li>
            <li class="tab-item" id="brochureTab"><a href="#brochurePriser"><span class="brochure">Brochure Design</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="logoPriser" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <!-- logo price-->
                <div class="price-content">
                    <p>Den samlede pris for <strong style="color: #0093dd; font-size: 14px;">PLATINUM POWER PACKAGE</strong> 
                    er <strong style="color:#ed2322">KR 350,-</strong> (<span style="color:#ed2322">Førpris kr 995,-</span>).<br/>
                    Den ovennævnte pris (<strong style="color:#ed2322">KR 350,-</strong>) 
                    omfatter med andre ord hele processen - fra levering af alle forslag til implementering af ændringer i det 
                    endelige logokoncept, du vælger.
                    <br/>
                    <br/>
                    Det endelige logo, du vælger, bliver sendt pr. e-mail i følgende filformater:
                    </p>
                    <ul>
                        <li><strong style="color:#ed2322">JPG</strong>, <strong style="color:#ed2322">PNG</strong>, <strong style="color:#ed2322">GIF</strong> (til præsentationer/web/lignende anvendelsesområder)</li>
                        <li><strong style="color:#ed2322">EPS</strong>, <strong style="color:#ed2322">PSD</strong>, <strong style="color:#ed2322">TIFF</strong>, <strong style="color:#ed2322">PDF</strong> (til professionelt print)</li>
                        <li>Vi kan også sende i andre filformater, hvis du ønsker det</li>
                    </ul>
                    <p>Vi sender dig også Word brevskabeloner med dit logo implementeret :</p>
                    <ul>
                        <li>Word brev-dokument</li>
                        <li>Word faktura-dokument</li>
                        <li>Word fax-dokument</li>
                    </ul>
                    <p>Andre typer af logo design arbejde: <strong style="color:#ed2322">DKK 290,-</strong> pr. arbejdede.</p>
                    <?php if($this->list[0]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[0]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="contact-btn" href="kontact.html">Kontakt os for yderligere information</a>
                </div>
                
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Visitcard Content -->
        <div id="visitkortPriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- visitcard price-->
                <div class="price-content">
                    <p>Den samlede pris for <strong style="color: #0093dd; font-size: 14px;">PLATINUM POWER PACKAGE</strong> 
                    er <strong style="color:#ed2322">KR 300,-</strong> (<span style="color:#ed2322">Førpris kr 850,-</span>).<br/>
                    Den ovennævnte pris (<strong style="color:#ed2322">KR 300,-</strong>) 
                    omfatter med andre ord hele processen - fra levering af alle forslag til implementering af ændringer i det 
                    endelige visitkort skabelon, du vælger.
                    <br/>
                    <br/>
                    Du kan også vælge en <span style="color: #555; font-size: 14px;"><strong>SILVER</strong></span> pakke, der omfattede logo design og visitkort design, prisen for denne pakke er <strong style="color:#ed2322">KR 650,-</strong> (<span style="color:#ed2322">Førpris kr 1.845,-</span>).
                    <br/>
                    <br/>
                    Det endelige visitkort, du vælger, bliver sendt pr. e-mail i følgende filformater:
                    </p>
                    <ul>
                        <li><strong style="color:#ed2322">JPG</strong>, <strong style="color:#ed2322">PNG</strong> (til præsentationer/web/lignende anvendelsesområder)</li>
                        <li><strong style="color:#ed2322">EPS</strong>, <strong style="color:#ed2322">PSD</strong>, <strong style="color:#ed2322">TIFF</strong>, <strong style="color:#ed2322">PDF</strong> (til professionelt print)</li>
                        <li>Vi kan også sende i andre filformater, hvis du ønsker det</li>
                    </ul>
                    <p>Vi sender dig også Word brevskabeloner med dit logo implementeret :</p>
                    <ul>
                        <li>Word brev-dokument</li>
                        <li>Word faktura-dokument</li>
                        <li>Word fax-dokument</li>
                    </ul>
                    <p>Andre typer af visitkort design arbejde: <strong style="color:#ed2322">DKK 290,-</strong> pr. arbejdede.</p>
                    <?php if($this->list[1]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[1]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="contact-btn" href="kontakt.html">Kontakt os for yderligere information</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>

        <!-- Brevpapir Content -->
        <div id="brevpapirPriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brevpapir price-->
                <div class="price-content">
                    <p>Den samlede pris for <strong style="color: #0093dd; font-size: 14px;">PLATINUM POWER PACKAGE</strong> 
                    er <strong style="color:#ed2322">KR 300</strong>,- (<span style="color:#ed2322">Førpris kr 850,-</span>).<br/>
                    Den ovennævnte pris (<span style="color:#ed2322"><strong style="color:#ed2322">KR 300,-</strong></span>) 
                    omfatter med andre ord hele processen - fra levering af alle forslag til implementering af ændringer i det 
                    endelige brevpapir skabelon, du vælger.
                    <br/>
                    <br/>
                    Du kan også vælge en <span style="color: #ed8b00; font-size: 14px;"><strong>GOLD</strong></span> pakke, der omfattede logo design, visitkort design og brevpapir design prisen for denne pakke er <strong style="color:#ed2322">KR 950,-</strong> (<span style="color:#ed2322">Førpris kr 2.100,-</span>).
                    <br/>
                    <br/>
                    Det endelige brevpapir skabelon, du vælger, bliver sendt pr. e-mail i følgende filformater:
                    </p>
                    <ul>
                        <li><strong style="color:#ed2322">JPG</strong>, <strong style="color:#ed2322">PNG</strong> (til præsentationer/web/lignende anvendelsesområder)</li>
                        <li><strong style="color:#ed2322">EPS</strong>, <strong style="color:#ed2322">PSD</strong>, <strong style="color:#ed2322">TIFF</strong>, <strong style="color:#ed2322">PDF</strong> (til professionelt print)</li>
                        <li>Vi kan også sende i andre filformater, hvis du ønsker det</li>
                    </ul>
                    <p>Vi sender dig også Word brevskabeloner med dit logo implementeret :</p>
                    <ul>
                        <li>Word brev-dokument</li>
                        <li>Word faktura-dokument</li>
                        <li>Word fax-dokument</li>
                    </ul>
                    <p>Andre typer af brevpapir design arbejde: <strong style="color:#ed2322">DKK 290,-</strong> pr. arbejdede.</p>
                    <?php if($this->list[2]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[2]->pricelist;?>">Download prisliste (.pdf)</a>
                    <?php }?>
                </div>
                <!-- Contact button -->
                <div class="contact-ctn">
                    <span>Har du spørgsmål om andre produkter, pakker eller priser?</span>
                    <a class="contact-btn" href="kontact.html">Kontakt os for yderligere information</a>
                </div>
            </div> 
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>   
        </div>
        <!-- Brochure Content -->
        <div id="brochurePriser" class="ui-tabs-panel ui-tabs-hide">
            <div class="tab-content-ctn">
                <!-- Brochure portfolio-->
                <div class="price-content">
                    <p>Den samlede pris for <strong style="color: #0093dd; font-size: 14px;">PLATINUM POWER PACKAGE</strong> 
                    er <strong style="color:#ed2322">KR 350,-</strong> (<span style="color:#ed2322">Førpris kr 995,-</span>).<br/>
                    Den ovennævnte pris (<strong style="color:#ed2322">KR 350,-</strong>) 
                    omfatter med andre ord hele processen - fra levering af alle forslag til implementering af ændringer i det 
                    endelige brochure skabelon, du vælger.
                    <br/>
                    <br/>
                    Du kan også vælge en <span style="color: #3e3e3e; font-size: 14px;"><strong>DIAMANT</strong></span> pakke, der omfattede logo design, visitkort design, brevpapir design og brochure design  prisen for denne pakke er <strong style="color:#ed2322">KR 1.200,-</strong> (<span style="color:#ed2322">Førpris kr 2.400,-</span>).
                    <br/>
                    <br/>
                    Det endelige logo, du vælger, bliver sendt pr. e-mail i følgende filformater:
                    </p>
                    <ul>
                        <li><strong style="color:#ed2322">JPG</strong>, <strong style="color:#ed2322">PNG</strong> (til præsentationer/web/lignende anvendelsesområder)</li>
                        <li><strong style="color:#ed2322">EPS</strong>, <strong style="color:#ed2322">PSD</strong>, <strong style="color:#ed2322">TIFF</strong>, <strong style="color:#ed2322">PDF</strong> (til professionelt print)</li>
                        <li>Vi kan også sende i andre filformater, hvis du ønsker det</li>
                    </ul>
                    <p>Vi sender dig også Word brevskabeloner med dit logo implementeret :</p>
                    <ul>
                        <li>Word brev-dokument</li>
                        <li>Word faktura-dokument</li>
                        <li>Word fax-dokument</li>
                    </ul>
                    <p>Andre typer af brochure design arbejde: <strong style="color:#ed2322">DKK 290,-</strong> pr. arbejdede.</p>
                    <?php if($this->list[3]->pricelist){?>
                    <a class="download" href="components/com_ecommerce/pricelist/<?php echo $this->list[3]->pricelist;?>">Download prisliste (.pdf)</a>
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

    </div>

    
</div>