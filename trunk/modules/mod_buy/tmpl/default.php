<?php 
$template_dir = "templates/tpl_designcreations/";
$session =& JFactory::getSession();
if(($_GET['task'] == 'bekraeft') || ($_GET['task'] == 'kvittering')){//die($_GET['task']);
?>
<div id="sidebar">
<h3><img src="templates/tpl_designcreations/img/bestil_status_title.png" alt="Bestil status" /></h3>
<div class="sidebar-content w226">
   
	<div id="orderStatus">
		<h4>Ordren betales af :</h4>
		<p>
			<dl>
				<dt>Navn :</dt>
				<dd><?php echo $session->get('order_name','');?></dd>
				<dt>Adresse :</dt>
				<dd><?php echo $session->get('order_address','');?></dd>
				<dt>Postnr. :</dt>
				<dd><?php echo $session->get('order_zipcode','');?></dd>
				<dt>Land :</dt>
				<dd>Danmark</dd>
				<dt>Tlf :</dt>
				<dd><?php echo $session->get('order_phone','');?></dd>
				<dt>Email :</dt>
				<dd><?php echo $session->get('order_email','');?></dd>
			</dl>
		</p>
		
		<!--<h4>Levering format :</h4>
		<p><?php echo $session->get('strFormat','');?></p>
		
		<h4>Ordren leveres af :</h4>
		<ul>
        	<?php if($session->get('order_via_host','')){?>
			<li>Filoverførsel fra værten (Du vil modtage linket via e-mail)</li>
            <?php }
			if($session->get('order_via_email','')){
			?>
			<li>Via e-mail (Attachment)</li>
            <?php }?>
		</ul>-->
		
		<h4>Bemærkninger :</h4>
		<p class="message"><?php echo $session->get('order_comment','');?></p>
	
		
	</div>
	
	<!--Link to payment process guide-->
	<ul class="links">
		<li><a href="index.php?option=com_ecommerce&view=betaling&Itemid=1">Lær mere om bestilling &amp; betaling proces</a></li>
		<li><a href="index.php?option=com_ecommerce&view=vilkar&Itemid=1">Vilkår og betingelser</a></li>
	</ul>

</div>
   
</div>
<?php if($_GET['task'] == 'kvittering'){
	$session->destroy();	
}?>
<?php } else {
	$db = JFactory::getDBO();
	$query = "SELECT name FROM #__images WHERE catid = 3 AND publish = 1 ORDER BY name";
	$db->setQuery($query);
	$websiteNames = $db->loadResultArray();
	
	$query = "SELECT name FROM #__images WHERE catid = 4 AND publish = 1 ORDER BY name";
	$db->setQuery($query);
	$webshopNames = $db->loadResultArray();
?>

<div id="sidebar">
	<script type="text/javascript">
        $(function(){
            $('#designChoices').customStyle();
            $("#designChoices").change(function(){
                $("#" + this.value).show().siblings().hide();
            });
			            
            $("#designChoices").change();
            $("input[type=file]").filestyle({ 
                 image: "<?php echo $template_dir;?>img/choose_file_btn.gif",
                 imageheight : 23,
                 imagewidth : 60,
                 width : 150
             });
			changeWebsite();
        });
		function changeMoney(pprice,price){
			$('#pprice').html(pprice);
			$('#price').html(price);
		}
		
		function submitLogoForm(){
			if(($('#logo_name').val() == 'Navn på logo') || ($('#logo_name').val() == '')){
				jAlert('Angiv logo navn');
				$('#logo_name').focus();
				return false;
			}
			
			if(($('#slogan').val() == 'Slogan') || ($('#slogan').val() == '')){
				jAlert('Angiv slogan');
				$('#slogan').focus();
				return false;
			}
			
			if($('#profession').val() == 0){
				jAlert('Vælg venligst erhverv');
				$('#profession').focus();
				return false;
			}
			
			if(($('#logo_info').val() == 'Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer.') && ($('#logo_request_file').val() == '') ){
				jAlert('Angiv anmodning');
				$('#logo_info').focus();
				return false;
			}
			
			$('#logoInfoForm').submit();
		}
		
		function submitCardForm(){
			if($('#cardType').val() == 0 ){
				jAlert('Vælg venligst en kort format');
				$('#cardType').focus();
				return false;
			}
			
			if(($('#card_info').val() == 'Front &amp; Bagsiden kortoplysninger(Giv os disse oplysninger, du ønsker at være på kort: Firmanavn, Slogan (hvis nogen), Fulde navn (Navn på kort), Stillingsbetegnelse, Firma Adresse, Privat Adresse, telefon, email, hjemmeside, profession...') && ($('#card_request_file').val() == '') ){
				jAlert('Angiv anmodning');
				$('#card_info').focus();
				return false;
			}
			
			if($('#card_logo_file').val() == ''){
				jAlert('Upload logo fil');
				$('#card_logo_file').focus();
				return false;
			}
			
			$('#cardInfoForm').submit();
		}
		
		function submitWebsiteForm(act){
			if($('#websiteServiceType').val() == 0 ){
				jAlert('Vælg et produkt');
				$('#websiteServiceType').focus();
				return false;
			}
			
			if((($('#websiteCMSType').val() == 0) && ($('#websiteServiceType').val() == 9)) ){
				jAlert('Vælg et CMS');
				$('#websiteCMSType').focus();
				return false;
			}
			if(act){
				$('#actionWebsite').val(1);
			} else {
				$('#actionWebsite').val(0);
			}
			$('#websiteInfoForm').submit();
		}
		
		function submitWebshopForm(act){
			if($('#webshopServiceType').val() == 0 ){
				jAlert('Vælg et produkt');
				$('#webshopServiceType').focus();
				return false;
			}
			
			if((($('#webshopCMSType').val() == 0) && ($('#webshopServiceType').val() == 12)) ){
				jAlert('Vælg et CMS');
				$('#webshopCMSType').focus();
				return false;
			}
			if(act){
				$('#actionWebshop').val(1);
			} else {
				$('#actionWebshop').val(0);
			}
			$('#webshopInfoForm').submit();
		}
		
		function submitPackageForm(){
			if(!$("input[name='package']:checked").val()){
				jAlert('Vælg venligst en pakke');
				return false;
			}
			
			location.href = "index.php?option=com_ecommerce&task=pakkeform&id="+$('[name=package]').fieldValue();
		}
		
		function setWebsite(id){
			$('#websiteID').val(id).attr('selected','selected');
			$('#imageWebsite').val(id);
			$("#designChoices").val( 'websiteForm' ).attr('selected','selected');
			$("#designChoices").change();
			if($('#websiteServiceType').val()){
				changeWebsite($('#websiteServiceType').val());
			}
			return false;
		}
		
		function setWebshop(id){
			$('#webshopID').val(id).attr('selected','selected');
			$('#imageWebshop').val(id);
			$("#designChoices").val( 'webshopForm' ).attr('selected','selected');
			$("#designChoices").change();
			if($('#webshopServiceType').val()){
				changeWebshop($('#webshopServiceType').val());
			}
			return false;
		}
		
		function changeWebsite(id){
			var priceArr = Array();
			var priceArrLabel = Array();
			var nameArr = Array();
			<?php foreach($websites as $website){?>
			priceArr[<?php echo $website->id;?>] = [<?php echo $website->price;?>,<?php echo $website->promotion_price;?>];
			priceArrLabel[<?php echo $website->id;?>] = ['<?php echo number_format($website->price,0,'','.');?>','<?php echo number_format($website->promotion_price,0,'','.');?>'];
			nameArr[<?php echo $website->id;?>] = '<?php echo $website->name;?>'; 
			<?php }?>
			if(priceArr[id][1] != '0'){
				$("#websitePriceLabel").html('Total kr. '+priceArrLabel[id][1]+' (Før kr. '+priceArrLabel[id][0]+')');
				$("#websitePrice").val(priceArr[id][1]);
			} else {
				$("#websitePriceLabel").html('Total kr. '+priceArrLabel[id][0]);
				$("#websitePrice").val(priceArr[id][0]);
			}
			if($('#websiteServiceType').val() == 9 ){
				$('#websiteCMSType').css('display','block');
				$("#websiteName").val(nameArr[id]+'('+$('#websiteCMSType').val()+')'+' af '+$('#websiteID').val()+' Website Template');
			} else {
				$('#websiteCMSType').css('display','none');
				$("#websiteName").val(nameArr[id]+' af '+$('#websiteID').val()+' Website Template');
			}
			$('#websitePID').val(id);
			
		}
		
		function changeWebshop(id){
			var priceArr1 = Array();
			var priceArrLabel1 = Array();
			var nameArr1 = Array();
			<?php foreach($webshops as $webshop){?>
			priceArr1[<?php echo $webshop->id;?>] = [<?php echo $webshop->price;?>,<?php echo $webshop->promotion_price;?>];
			priceArrLabel1[<?php echo $webshop->id;?>] = ['<?php echo number_format($webshop->price,0,'','.');?>','<?php echo number_format($webshop->promotion_price,0,'','.');?>'];
			nameArr1[<?php echo $webshop->id;?>] = '<?php echo $webshop->name;?>';
			<?php }?>
			if(priceArr1[id][1] != 0){
				$("#webshopPriceLabel").html('Total kr. '+priceArrLabel1[id][1]+',- (Før kr. '+priceArrLabel1[id][0]+',-)');
				$("#webshopPrice").val(priceArr1[id][1]);
			} else {
				$("#webshopPriceLabel").html('Total kr. '+priceArrLabel1[id][0]+',-');
				$("#webshopPrice").val(priceArr1[id][0]);
			}
			if($('#webshopServiceType').val() == 12 ){
				$('#webshopCMSType').css('display','block');
				$("#webshopName").val(nameArr1[id]+'('+$('#webshopCMSType').val()+')'+' af '+$('#webshopID').val()+' Webshop Template');
			} else {
				$('#webshopCMSType').css('display','none');
				$("#webshopName").val(nameArr1[id]+' af '+$('#webshopID').val()+' Webshop Template');
			}
			$('#webshopPID').val(id);
		}
		
		function forwardLogo(){
			$("#designChoices").val( 'logoForm' ).attr('selected','selected');
			$("#designChoices").change();
		}
    </script>
    <h3><img src="<?php echo $template_dir;?>img/bestil_nu_title.png" alt="Bestil Nu !" /></h3>
    <div class="sidebar-content w226">
        <!-- The select-->
        <select id="designChoices">
            <option value="logoForm">Logo design</option>
            <option value="cardForm">Visitkort & Brapapir design</option>
            <option value="websiteForm">Website templates</option>
            <option value="webshopForm">Webshop templates</option>
            <!--<option value="packageForm">Vælg et design pakke</option>-->
        </select>
        <!-- the forms -->
        <div id="formBoxes">
        
            <!--Logo form-->
            <div id="logoForm" class="order-form">
                <form id="logoInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <input type="text" class="text rounded w215" value="Navn på logo" name="logo_name"  id="logo_name"/>
                        <input type="text" class="text rounded w215" value="Slogan" name="slogan" id="slogan" />
                        <select id="profession" class="rounded" name="profession">
                            <option value="0" selected="selected">Vælg din branche / erhverv</option>
                            <option value="Builder/Tømrer">Builder/Tømrer</option>
                            <option value="Catering/Mad">Catering/Mad</option>
                            <option value="Renere">Renere</option>
                            <option value="Computer/IT-tjenester">Computer/IT-tjenester</option>
                            <option value="Kurerer/Taxier">Kurerer/Taxier</option>
                            <option value="Elektriker">Elektriker</option>
                            <option value="Mode/Design">Mode/Design</option>
                            <option value="Finans/Business">Finans/Business</option>
                            <option value="Fitness/Sports">Fitness/Sports</option>
                            <option value="Blomster/Blomsterbindere">Blomster/Blomsterbindere</option>
                            <option value="Gartner/Landscaper">Gartner/Landscaper</option>
                            <option value="Frisørvirksomhed/Kosmetolog">Frisørvirksomhed/Kosmetolog</option>
                            <option value="Sundhed/Medicin">Sundhed/Medicin</option>
                            <option value="Dyrepleje">Dyrepleje</option>
                            <option value="Juridiske">Juridiske</option>
                            <option value="Mekaniker/Svejser">Mekaniker/Svejser</option>
                            <option value="Auto Service">Auto Service</option>
                            <option value="Movers">Movers</option>
                            <option value="Musik/Musiker">Musik/Musiker</option>
                            <option value="Maler/Dekoratør">Maler/Dekoratør</option>
                            <option value="Blikkenslager/Gas">Blikkenslager/Gas</option>
                            <option value="Fast Ejendom/Ejendom">Fast Ejendom/Ejendom</option>
                            <option value="Shopping/Arrangementer">Shopping/Arrangementer</option>
                            <option value="Undervisning/Uddannelse">Undervisning/Uddannelse</option>
                            <option value="Rejser/Turisme">Rejser/Turisme</option>
                            <option value="Andre">Andre</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="logo_info">Evt. din besked/kommentar</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" id="logo_request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[0]->promotion_price;?> (Før kr <?php echo $product[0]->price;?>)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitLogoForm();" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitLogoForm();" />
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="id" value="<?php echo $product[0]->id;?>" />
                    <input type="hidden" name="name" value="<?php echo $product[0]->name;?>" />
                    <input type="hidden" name="price" value="<?php if($product[0]->promotion_price) echo $product[0]->promotion_price; else echo $product[0]->price;?>" />
                </form>
            
            </div>
            
            <!--Visitcard form-->
            <div id="cardForm" class="order-form">
                <form id="cardInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <select id="cardType" class="rounded" name="card">
                            <option value="0" selected="selected">Vælg et produkt</option>
                            <option value='Vandret kort format (3,50" x 2,00")'>Vandret kort format (3,50" x 2,00")</option>
                            <option value='Lodret kort format (2,00" x 3,50")'>Lodret kort format (2,00" x 3,50")</option>
                            <option value='Letterhead(A4)'>Letterhead(A4)</option>
                            <option value='Envelop'>Envelop</option>
                            <option value='Brochure (A4)'>Brochure (A4)</option>
                            <option value='Brochure (A5)'>Brochure (A5)</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="card_info">Evt. din besked/kommentar</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" id="card_request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" id="card_logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="javascript:void(0);" onclick="forwardLogo();">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[1]->promotion_price;?> (Før kr <?php echo $product[1]->price;?>)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitCardForm();" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitCardForm();" />
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="id" value="<?php echo $product[1]->id;?>" />
                    <input type="hidden" name="name" value="<?php echo $product[1]->name;?>" />
                    <input type="hidden" name="price" value="<?php if($product[1]->promotion_price) echo $product[1]->promotion_price; else echo $product[1]->price;?>" />
                </form>
            </div>
            
            <!--Website form-->
            <div id="websiteForm" class="order-form">
                <form id="websiteInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                    	<p>TEMPLATE ID: 
                        <select id="websiteID" class="rounded">
                        	<?php foreach($websiteNames as $websiteName){?>
                            <option value="<?php echo $websiteName;?>"><?php echo $websiteName;?></option>
							<?php }?>
                        </select>
                        </p>
                        <select id="websiteServiceType" class="rounded" name="websiteService" onchange="changeWebsite(this.value)">
                            <option selected="selected" value="0">Vælg et produkt</option>
                            <?php foreach($websites as $website){?>
                            <option value="<?php echo $website->id;?>">Leveret <?php echo $website->name;?> Kr. <?php echo number_format($website->promotion_price?$website->promotion_price:$website->price,0,'','.');?></option>
                            <?php }?>
                        </select>
                        <select id="websiteCMSType" class="rounded" name="CMS" onchange="changeWebsite($('#websiteServiceType').val())">
                            <option selected="selected" value="0">Vælg et CMS</option>
                            <option value="Joomla">Joomla</option>
                            <option value="Wordpress">Wordpress</option>
                            <option value="Drupal">Drupal</option>
                            <option value="Magento">Magento</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="website_info">Evt. din besked/kommentar</textarea>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="javascript:void(0);" onclick="forwardLogo();">Bestil nu</a></p>
                        <p class="total-price fll clr" id="websitePriceLabel">Total kr. <?php echo $product[2]->promotion_price;?> (Før kr <?php echo $product[2]->price;?>)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitWebsiteForm(1);" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitWebsiteForm(0);" />
                    </fieldset>
                    <input type="hidden" name="id" value="" id="websitePID" />
                    <input type="hidden" name="name" value="" id="websiteName" />
                    <input type="hidden" name="price" value="" id="websitePrice" />
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="imageName" id="imageWebsite" value="" />
                    <input type="hidden" name="action" id="actionWebsite" value="" />
                </form>
            </div>
            
            <!--Webshop form-->
            <div id="webshopForm" class="order-form">
                <form id="webshopInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <p>TEMPLATE ID: 
                        <select id="webshopID" class="rounded">
                        	<?php foreach($webshopNames as $webshopName){?>
                            <option value="<?php echo $webshopName;?>"><?php echo $webshopName;?></option>
							<?php }?>
                        </select>
                        </p>
                        <select id="webshopServiceType" class="rounded" name="webshopService" onchange="changeWebshop(this.value)">
                            <option selected="selected" value="0">Vælg et produkt</option>
                            <?php foreach($webshops as $webshop){?>
                            <option value="<?php echo $webshop->id;?>">Leveret <?php echo $webshop->name;?> Kr. <?php echo number_format($webshop->promotion_price?$webshop->promotion_price:$webshop->price,0,'','.');?></option>
                            <?php }?>
                        </select>
                        <select id="webshopCMSType" class="rounded" name="CMS" onchange="changeWebshop($('#webshopServiceType').val())">
                            <option selected="selected" value="0">Vælg et CMS</option>
                            <option value="Joomla">Joomla</option>
                            <option value="Wordpress">Wordpress</option>
                            <option value="Drupal">Drupal</option>
                            <option value="Magento">Magento</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="webshop_info">Evt. din besked/kommentar</textarea>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="javascript:void(0);" onclick="forwardLogo();">Bestil nu</a></p>
                        <p class="total-price fll clr" id="webshopPriceLabel">Total kr. <?php echo $product[3]->promotion_price;?>,- (Før kr <?php echo $product[3]->price;?>,-)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitWebshopForm(1);" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitWebshopForm(0);" />
                    </fieldset>
                    <input type="hidden" name="id" value="" id="webshopPID" />
                    <input type="hidden" name="name" value="" id="webshopName" />
                    <input type="hidden" name="price" value="" id="webshopPrice" />
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="imageName" id="imageWebshop" value="" />
                    <input type="hidden" name="action" id="actionWebshop" value="" />
                </form>
            </div>
            <!--package form-->
            <div id="packageForm" class="order-form">
                <form id="packageSelectionForm" action="index.php" method="post">
                    <fieldset>
                        <div class="field">
                        	<?php foreach($packages as $package){?>
                            <label>
                                <input class="radio-input" type="radio" name="package" id="package" value="<?php echo $package->id?>" onclick="changeMoney(<?php echo $package->promotion_price?>,<?php echo $package->price?>)" />
                                <span>
                                    <img src="components/com_ecommerce/imgupload/<?php echo $package->image;?>" alt="<?php echo $package->name;?>" />
                                    <strong class="blue" style="text-transform:uppercase;"><?php echo $package->name;?></strong>
                                    <br/>
                                    <?php echo $package->description;?>
                                    <br/>
                                    <strong class="red">KR <?php echo $package->promotion_price;?>,-</strong> (Før kr <?php echo $package->price;?>,-)
                                </span>
                            </label>
                            <?php }?>                            
                        </div>
                        <p class="total-price fll clr">Total kr. <span id="pprice">0</span>,- (Før kr <span id="price">0</span>,-)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitPackageForm();" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitPackageForm();" />
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="pakkeform" />
                </form>
            </div>
            <!--package form-->
            
        </div>
        
        <!--Link to payment process guide-->
        <ul class="links">
            <li><a href="index.php?option=com_ecommerce&view=betaling&Itemid=1">Lær mere om bestilling &amp; betaling proces</a></li>
            <li><a href="index.php?option=com_ecommerce&view=vilkar&Itemid=1">Vilkår og betingelser</a></li>
        </ul>
    </div>   
</div>
<?php }?>