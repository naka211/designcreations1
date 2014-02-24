<?php
defined('_JEXEC') or die('Restricted access');
//print_r($package);exit();
?>
<script language="javascript">
	function submitLeveringForm(){
		if($('#order_name').val() == ''){
			alert('Angiv navnet');
			$('#order_name').focus();
			return false;
		}
		
		if($('#order_address').val() == ''){
			alert('Angiv adresse');
			$('#order_address').focus();
			return false;
		}
		
		if($('#order_zipcode').val() == ''){
			alert('Angiv postnummer');
			$('#order_zipcode').focus();
			return false;
		}
		
		if($('#order_phone').val() == ''){
			alert('Angiv telefon');
			$('#order_phone').focus();
			return false;
		}
		
		if($('#order_email').val() == ''){
			alert('Angiv e-mail');
			$('#order_email').focus();
			return false;
		}
		
		/*if( (!$('input[name=order_format_eps]').is(':checked')) && (!$('input[name=order_format_ai]').is(':checked')) && (!$('input[name=order_format_psd]').is(':checked')) && (!$('input[name=order_format_pdf]').is(':checked')) && (!$('input[name=order_format_tiff]').is(':checked')) && (!$('input[name=order_format_jpg]').is(':checked')) && (!$('input[name=order_format_png]').is(':checked')) && (!$('input[name=order_format_gif]').is(':checked')) ){
			alert('Vælg venligst levering format');
			return false;
		}
		
		if( (!$('input[name=order_via_host]').is(':checked')) && (!$('input[name=order_via_email]').is(':checked')) ){
			alert('Vælg venligst levering via');
			return false;
		}*/
		//alert('toi day');
		$('#leveringForm').submit();
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
            <li class="tab-item" id="basketTab"><a href="index.php?option=com_ecommerce&task=kurv"><span class="num">1</span><span class="step">Indkøbskurv</span></a></li>
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
                                <input type="text" class="text rounded" name="order_name" id="order_name" value="<? echo $order_name;?>" />
                                <label>*Adresse :</label>
                                <input type="text" class="text rounded" name="order_address" id="order_address" value="<? echo $order_address;?>" />
                                <label>*Postnr. : </label>
                                <input type="text" class="text rounded" name="order_zipcode" id="order_zipcode" value="<? echo $order_zipcode;?>" />
                                <label>By : </label>
                                <input type="text" class="text rounded" name="order_city" id="order_city" value="<? echo $order_city;?>" />
                                <!--<label>Land : </label>
                                <input  class="text rounded" name="order_country" value="Danmark" disabled="disabled" />-->
                                <label>*Telefon : </label>
                                <input type="text" class="text rounded" name="order_phone" id="order_phone" value="<? echo $order_phone;?>" />
                                <label>*Email : </label>
                                <input type="text" class="text rounded" name="order_email" id="order_email" value="<? echo $order_email;?>" />
                                <label class="w200">* <em>Obligatorisk felt.</em></label>
                            </p>
                        </div>
                        <div class="flr w310">
                            <h3>Fandre udbringningskravet :</h3>
                            <p>
                                <!--<label class="w100 h50">Levering format :</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_eps" id="order_format_eps" value=".eps" <?php if($order_format_eps) echo 'checked="checked"';?> />.eps</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_ai" id="order_format_ai" value=".ai" <?php if($order_format_ai) echo 'checked="checked"';?> />.ai</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_psd" id="order_format_psd" value=".psd" <?php if($order_format_psd) echo 'checked="checked"';?> />.psd</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_pdf" id="order_format_pdf" value=".pdf" <?php if($order_format_pdf) echo 'checked="checked"';?> />.pdf</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_tiff" id="order_format_tiff" value=".tiff" <?php if($order_format_tiff) echo 'checked="checked"';?> />.tiff</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_jpg" id="order_format_jpg" value=".jpg" <?php if($order_format_jpg) echo 'checked="checked"';?> />.jpg</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_png" id="order_format_png" value=".png" <?php if($order_format_png) echo 'checked="checked"';?> />.png</label>
                                <label class="w50"><input type="checkbox" class="check-box" name="order_format_gif" id="order_format_gif" value=".gif" <?php if($order_format_gif) echo 'checked="checked"';?> />.gif</label>
                                <label class="w100 h50">Levering via :</label>
                                <label class="w200"><input type="checkbox" class="check-box" name="order_via_host" id="order_via_host" value="Filoverførsel fra værten" <?php if($order_via_host) echo 'checked="checked"';?> />Filoverførsel fra værten</label>
                                <label class="w200"><input type="checkbox" class="check-box" name="order_via_email" id="order_via_email" value="Email (Attachment)" <?php if($order_via_email) echo 'checked="checked"';?> />Email (Attachment)</label>-->
                                <label class="w100 h50">Bemærkninger :</label>
                                <textarea class="rounded" rows="5" cols="10" name="order_comment"><? echo $order_comment;?></textarea>
                                <!--<label class="w210"><input type="checkbox" class="check-box" name="newsletter" />Tilmeld mig nyhedsbrev</label>-->
                            </p>
                        </div>
                        <div class="clr"></div>
                        </fieldset>
                        <input type="hidden" name="option" value="com_ecommerce" />
                    	<input type="hidden" name="task" value="levering" />
                        <input type="hidden" name="submit1" value="submit1" />
                    </form>
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="index.php?option=com_ecommerce&task=kurv">Tilbage</a>
                    <a class="next-btn flr" href="javascript:void(0);" onclick="submitLeveringForm()">Næste</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>
        
    </div>
    
</div>