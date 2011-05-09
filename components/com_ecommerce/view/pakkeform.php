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
<!-- Begin breadcumbs navigation -->
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Bestil</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="purchase-process">
    <div class="content-box-decor box-decor-top"><span></span></div>
    <div class="box-decor-mid">
        <div class="h500">
            <h1 class="main-title">Bestil en design pakke</h1>
            <div class="content-inner">
                <p>Før fortsat bestille en pakke, du har valgt, skal du udfylde nedenstående formular med dine relevante oplysninger og krav, som vi hjælpe os præcis på dit produkt design, spare din tid og hurtigere leveringstid</p>
                <form id="packageInfoForm" class="pk-info-form" action="index.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-inner">
                            <label>Navn på logo :</label>
                            <input type="text" class="text rounded" name="logo_name" id="logo_name" value=""  />
                            <label>Slogan :</label>
                            <input type="text" class="text rounded" name="slogan" id="slogan" value="" />
                            <label>Din branche/ Erhverv :</label>
                            <select id="professionSelect" class="rounded" name="profession">
                                <option value="0" selected="selected">Vælg din branche/erhverv</option>
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
                            <?php if($package->id == 6 || $package->id == 7 || $package->id == 8){?>
                            <label>Vælg et visitkort format :</label>
                            <select id="cardTypeSelect" class="rounded" name="card">
                            	<option value="0">Vælg et format</option>
                                <option value='Vandret kort format (3,50" x 2,00"'>Vandret kort format (3,50" x 2,00")</option>
                                <option value='Lodret kort format (2,00" x 3,50")'>Lodret kort format (2,00" x 3,50")</option>
                            </select>
                            <?php }?>
                            <?php if($package->id == 7 || $package->id == 8){?>
                            <label>Vælg din brevpapir type :</label>
                            <select id="brevpapirTypeSelect" class="rounded" name="letter">
                                <option value="0" selected="selected">Vælg et produkt</option>
                                <option value="Letterhead">Letterhead</option>
                                <option value="Envelop">Envelop</option>
                            </select>
                            <?php }?>
                            <?php if($package->id == 8){?>
                            <label>Vælg din brochure type :</label>
                            <select id="brochureTypeSelect" class="rounded" name="brochure">
                                <option value="0" selected="selected">Vælg et produkt</option>
                                <option value="A4 Vandret Brochure (Ingen fold)">A4 Vandret Brochure (Ingen fold)</option>
                                <option value="A4 Vandret Brochure (Fold)">A4 Vandret Brochure (Fold)</option>
                                <option value="A4 Lodret Brochure">A4 Lodret Brochure</option>
                            </select>
                            <?php }?>
                            <label>Din besked/krav :</label>
                            <textarea class="text rounded" rows="9" cols="10" id="info" name="info">Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer og dine behov...</textarea>
                            <p class="file-input clr">
                                <label>Vedhæfte dine krav i en fil :</label>
                                <input class="file rounded clr" type="file" value="" name="request_file" id="request_file" />
                                <em>(.doc, .ppt,.pdf, .dot, .eps, .psd, .tiff, .ai, .svg, .jpg, .png, .gif - Max: 5MB)</em>
                            </p>
                            <!--<a class="more-file">Uploade flere filer</a>-->
                        </div>
                        <div class="actions-ctn">
                            <a class="back-btn" href="index.php">Tilbage til forside</a>
                            <a class="next-btn flr" href="javascript:void(0);" onclick="submitForm();">Næste</a>
                        </div>
                    </fieldset>
                    <input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="task" value="addcart" />
                    <input type="hidden" name="id" value="<?php echo $package->id;?>" />
                    <input type="hidden" name="name" value="<?php echo $package->name;?>" />
                    <input type="hidden" name="price" value="<?php if($package->promotion_price) echo $package->promotion_price; else echo $package->price;?>" />
                </form>
            </div>
        </div>
        
    </div>
    <div class="content-box-decor box-decor-btm"><span></span></div>
</div>