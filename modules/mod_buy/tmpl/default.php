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
		
		<h4>Levering format :</h4>
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
		</ul>
		
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
<?php } else {?>

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

        });
		function changeMoney(pprice,price){
			$('#pprice').html(pprice);
			$('#price').html(price);
		}
		
		function submitLogoForm(){
			if(($('#logo_name').val() == 'Navn på logo') || ($('#logo_name').val() == '')){
				alert('Angiv logo navn');
				$('#logo_name').focus();
				return false;
			}
			
			if(($('#slogan').val() == 'Slogan') || ($('#slogan').val() == '')){
				alert('Angiv slogan');
				$('#slogan').focus();
				return false;
			}
			
			if($('#profession').val() == 0){
				alert('Vælg venligst erhverv');
				$('#profession').focus();
				return false;
			}
			
			if(($('#logo_info').val() == 'Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer.') && ($('#logo_request_file').val() == '') ){
				alert('Angiv anmodning');
				$('#logo_info').focus();
				return false;
			}
			
			$('#logoInfoForm').submit();
		}
		
		function submitCardForm(){
			if($('#cardType').val() == 0 ){
				alert('Vælg venligst en kort format');
				$('#cardType').focus();
				return false;
			}
			
			if(($('#card_info').val() == 'Front &amp; Bagsiden kortoplysninger(Giv os disse oplysninger, du ønsker at være på kort: Firmanavn, Slogan (hvis nogen), Fulde navn (Navn på kort), Stillingsbetegnelse, Firma Adresse, Privat Adresse, telefon, email, hjemmeside, profession...') && ($('#card_request_file').val() == '') ){
				alert('Angiv anmodning');
				$('#card_info').focus();
				return false;
			}
			
			if($('#card_logo_file').val() == ''){
				alert('Upload logo fil');
				$('#card_logo_file').focus();
				return false;
			}
			
			$('#cardInfoForm').submit();
		}
		
		function submitLetterForm(){
			if($('#brevpapirType').val() == 0 ){
				alert('Vælg et produkt');
				$('#brevpapirType').focus();
				return false;
			}
			
			if(($('#letter_info').val() == 'Giv os disse produkt oplysninger, ideer, krav...') && ($('#letter_request_file').val() == '') ){
				alert('Angiv anmodning');
				$('#letter_info').focus();
				return false;
			}
			
			if($('#letter_logo_file').val() == ''){
				alert('Upload logo fil');
				$('#letter_logo_file').focus();
				return false;
			}
			
			$('#brevpapirInfoForm').submit();
		}
		
		function submitBrochureForm(){
			if($('#brochureType').val() == 0 ){
				alert('Vælg et produkt');
				$('#brochureType').focus();
				return false;
			}
			
			if(($('#brochure_info').val() == 'Giv os disse produkt oplysninger, ideer, krav...') && ($('#brochure_request_file').val() == '') ){
				alert('Angiv anmodning');
				$('#brochure_info').focus();
				return false;
			}
			
			if($('#brochure_logo_file').val() == ''){
				alert('Upload logo fil');
				$('#brochure_logo_file').focus();
				return false;
			}
			
			$('#brochureInfoForm').submit();
		}
		
		function submitPackageForm(){
			if(!$("input[name='package']:checked").val()){
				alert('Vælg venligst en pakke');
				return false;
			}
			
			location.href = "index.php?option=com_ecommerce&task=pakkeform&id="+$('[name=package]').fieldValue();
		}
    </script>
    <h3><img src="<?php echo $template_dir;?>img/bestil_nu_title.png" alt="Bestil Nu !" /></h3>
    <div class="sidebar-content w226">
        <!-- The select-->
        <select id="designChoices">
            <option value="logoForm">Logo design</option>
            <option value="cardForm">Visitkort design</option>
            <option value="brevpapirForm">Brapapir design</option>
            <option value="brochureForm">A4 Brochure design</option>
            <option value="packageForm">Vælg et design pakke</option>
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
                            <option value="Builder/Carpenter">Builder/Carpenter</option>
                            <option value="Catering/Food">Catering/Food </option>
                            <option value="Cleaner">Cleaner </option>
                            <option value="Computing/IT Services">Computing/IT Services  </option>
                            <option value="Couriers/Taxis">Couriers/Taxis</option>
                            <option value="Electrician">Electrician</option>
                            <option value="Fashion/Design">Fashion/Design</option>
                            <option value="Finance/Business">Finance/Business</option>
                            <option value="Fitness/Sports">Fitness/Sports</option>
                            <option value="Flowers/Florists">Flowers/Florists</option>
                            <option value="Gardener/Landscaper">Gardener/Landscaper</option>
                            <option value="Hairdressing/Beautician">Hairdressing/Beautician</option>
                            <option value="Health/Medicine">Health/Medicine</option>
                            <option value="Animal Care">Animal Care</option>
                            <option value="Legal">Legal </option>
                            <option value="Mechanic/Welder">Mechanic/Welder</option>
                            <option value="Auto Service">Auto Service</option>
                            <option value="Movers">Movers</option>
                            <option value="Music/Musician">Music/Musician</option>
                            <option value="Painter/Decorator">Painter/Decorator</option>
                            <option value="Plumber/Gas">Plumber/Gas</option>
                            <option value="Real Estate/Property">Real Estate/Property</option>
                            <option value="Shopping/Events">Shopping/Events</option>
                            <option value="Teaching/Training">Teaching/Training</option>
                            <option value="Travel &amp; Tourism">Travel &amp; Tourism</option>
                            <option value="Other">Other</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="logo_info">Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer.</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" id="logo_request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[0]->promotion_price;?>,- (Før kr <?php echo $product[0]->price;?>,-)</p>
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
                            <option value="0" selected="selected">Vælg et kort format</option>
                            <option value='Vandret kort format (3,50" x 2,00")'>Vandret kort format (3,50" x 2,00")</option>
                            <option value='Lodret kort format (2,00" x 3,50")'>Lodret kort format (2,00" x 3,50")</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="card_info">Front &amp; Bagsiden kortoplysninger(Giv os disse oplysninger, du ønsker at være på kort: Firmanavn, Slogan (hvis nogen), Fulde navn (Navn på kort), Stillingsbetegnelse, Firma Adresse, Privat Adresse, telefon, email, hjemmeside, profession...</textarea>
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
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="index.php">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[1]->promotion_price;?>,- (Før kr <?php echo $product[1]->price;?>,-)</p>
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
            
            <!--Stationary form-->
            <div id="brevpapirForm" class="order-form">
                <form id="brevpapirInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <select id="brevpapirType" class="rounded" name="letter">
                            <option value="0" selected="selected">Vælg et produkt</option>
                            <option value="Letterhead">Letterhead</option>
                            <option value="Envelop">Envelop</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="letter_info">Giv os disse produkt oplysninger, ideer, krav...</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" id="letter_request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" id="letter_logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="index.php">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[2]->promotion_price;?>,- (Før kr <?php echo $product[2]->price;?>,-)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitLetterForm();" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitLetterForm();" />
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="id" value="<?php echo $product[2]->id;?>" />
                    <input type="hidden" name="name" value="<?php echo $product[2]->name;?>" />
                    <input type="hidden" name="price" value="<?php if($product[2]->promotion_price) echo $product[2]->promotion_price; else echo $product[2]->price;?>" />
                </form>
            </div>
            
            <!--Brochure form-->
            <div id="brochureForm" class="order-form">
                <form id="brochureInfoForm" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <select id="brochureType" class="rounded" name="brochure">
                            <option value="0" selected="selected">Vælg et produkt</option>
                            <option value="A4 Vandret Brochure (Ingen fold)">A4 Vandret Brochure (Ingen fold)</option>
                            <option value="A4 Vandret Brochure (Fold)">A4 Vandret Brochure (Fold)</option>
                            <option value="A4 Lodret Brochure">A4 Lodret Brochure</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info" id="brochure_info">Giv os disse produkt oplysninger, ideer, krav...</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" id="brochure_request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" id="brochure_logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="index.php">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[3]->promotion_price;?>,- (Før kr <?php echo $product[3]->price;?>,-)</p>
                        <input type="button" class="add-cart-btn hidden_txt" style="border:none;cursor:pointer; margin:0;" onclick="submitBrochureForm();" />
                        <span class="eller hidden_txt">Eller</span>
                        <input type="button" class="buy-btn hidden_txt" style="border:none;cursor:pointer;margin:0;" onclick="submitBrochureForm();" />
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="id" value="<?php echo $product[3]->id;?>" />
                    <input type="hidden" name="name" value="<?php echo $product[3]->name;?>" />
                    <input type="hidden" name="price" value="<?php if($product[3]->promotion_price) echo $product[3]->promotion_price; else echo $product[3]->price;?>" />
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