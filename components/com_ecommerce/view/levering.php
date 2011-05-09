<?php
defined('_JEXEC') or die('Restricted access');
//print_r($package);exit();
?>
<script language="javascript">
	function submitForm(){
		if($('#logo_name').val() == ''){
			alert('Angiv logo navn');
			$('#logo_name').focus();
			return false;
		}
		
		if($('#slogan').val() == ''){
			alert('Angiv slogan');
			$('#slogan').focus();
			return false;
		}
		
		if($('#professionSelect').val() == 0){
			alert('Vælg venligst erhverv');
			$('#profession').focus();
			return false;
		}
		
		<?php if($package->id == 6 || $package->id == 7 || $package->id == 8){?>
		if($('#cardTypeSelect').val() == 0){
			alert('Vælg venligst en kort format');
			$('#cardTypeSelect').focus();
			return false;
		}
		<?php }?>
		
		<?php if($package->id == 7 || $package->id == 8){?>
		if($('#brevpapirTypeSelect').val() == 0){
			alert('Vælg et brevpapir produkt');
			$('#brevpapirTypeSelect').focus();
			return false;
		}
		<?php }?>
		
		<?php if($package->id == 8){?>
		if($('#brochureTypeSelect').val() == 0){
			alert('Vælg et brochure produkt');
			$('#brochureTypeSelect').focus();
			return false;
		}
		<?php }?>
		
		if(($('#info').val() == 'Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer og dine behov...') && ($('#request_file').val() == '') ){
			alert('Angiv anmodning');
			$('#info').focus();
			return false;
		}
		
		$('#packageInfoForm').submit();
	}
</script>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Levering</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="purchase-process">

    <div class="dc-tabs-content fll clr">
        <ul class="ui-tabs-nav">
            <li class="tab-item" id="basketTab"><a href="index.php?option=com_ecommerce&task=basket"><span class="num">1</span><span class="step">Indkøbskurv</span></a></li>
            <li class="tab-item ui-tabs-selected" id="deliveryTab"><a href="#"><span class="num">2</span><span class="step">Levering</span></a></li>
            <li class="tab-item" id="confirmTab"><div class="dis-tab"><span class="num">3</span><span class="step">Bekræft og betal</span></div></li>
            <li class="tab-item" id="receiptTab"><div class="dis-tab"><span class="num">4</span><span class="step">Kvittering</span></div></li>
        </ul>
        
        <!-- logo Content -->
        <div id="levering" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <div class="content-inner">
                    <form id="leveringForm" method="post" action="index.php">
                        <fieldset>
                        <div class="fll w310">
                            <h3>Faktureringsadresse :</h3>
                            <p>
                                <label>*Navn :</label>
                                <input type="text" class="text rounded" name="Navn" value="" />
                                <label>*Adresse :</label>
                                <input type="text" class="text rounded" name="Adresse" value="" />
                                <label>*Postnr. : </label>
                                <input type="text" class="text rounded" name="Postnr." value="" />
                                <label>By : </label>
                                <input type="text" class="text rounded" name="By" value="" />
                                <label>Land: </label>
                                <input  class="text rounded" name="Land" value="Danmark" disabled="disabled" />
                                <label>*Telefon : </label>
                                <input type="text" class="text rounded" name="Telefon" value="" />
                                <label>*Email : </label>
                                <input type="text" class="text rounded" name="Email" value="" />
                                <label class="w200">* <em>Obligatorisk felt.</em></label>
                            </p>
                        </div>
                        <div class="flr w310">
                            <h3>Fandre udbringningskravet :</h3>
                            <p>
                                <label class="w100 h50">Levering format :</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="eps" checked="checked" />.eps</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="ai" checked="checked" />.ai</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="psd" checked="checked" />.psd</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="pdf" checked="checked" />.pdf</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="tiff" />.tiff</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="jpg" />.jpg</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="png" />.png</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="gif" />.gif</label>
                                <label class="w100 h50">Levering via :</label>
                                <label class="w200"><input type="checkbox" class="check-box" name="upload file" checked="checked" />Filoverførsel fra værten</label>
                                <label class="w200"><input type="checkbox" class="check-box" name="email" checked="checked" />Email (Attachment)</label>
                                <label class="w100 h50">Bemærkninger :</label>
                                <textarea class="rounded" rows="5" cols="10"></textarea>
                                <label class="w210"><input type="checkbox" class="check-box" name="newsletter" />Tilmeld mig 
nyhedsbrev</label>
                            </p>
                        </div>
                        <div class="clr"></div>
                        </fieldset>
                        <input type="hidden" name="option" value="com_ecommerce" />
                    	<input type="hidden" name="task" value="delivery" />
                    </form>
            
                  
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="index.php?option=com_ecommerce&task=basket">Tilbage</a>
                    <a class="next-btn flr" href="bekraeft_betal.html">Næste</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>
        
    </div>
    
</div>