<?php 
$template_dir = "templates/tpl_designcreations/";
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

        });
		function changeMoney(pprice,price){
			$('#pprice').html(pprice);
			$('#price').html(price);
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
                        <input type="text" class="text rounded w215" value="Navn på logo" name="logo_name" />
                        <input type="text" class="text rounded w215" value="Slogan" name="slogan" />
                        <select id="profession" class="rounded" name="profession">
                            <option selected="selected">Vælg din branche / erhverv</option>
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
                        <textarea class="text rounded w215" rows="7" cols="10" name="info">Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer.</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[0]->promotion_price;?>,- (Før kr <?php echo $product[0]->price;?>,-)</p>
                        <a class="add-cart-btn hidden_txt" href="indkoebskurv.html">Tilføj denne ordre til kurv</a>
                        <span class="eller hidden_txt">Eller</span>
                        <a class="buy-btn hidden_txt" href="indkoebskurv.html">Køb Nu !</a>
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
                            <option selected="selected">Vælg et kort format</option>
                            <option value='Vandret kort format (3,50" x 2,00")'>Vandret kort format (3,50" x 2,00")</option>
                            <option value='Lodret kort format (2,00" x 3,50")'>Lodret kort format (2,00" x 3,50")</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info">Front &amp; Bagsiden kortoplysninger(Giv os disse oplysninger, du ønsker at være på kort: Firmanavn, Slogan (hvis nogen), Fulde navn (Navn på kort), Stillingsbetegnelse, Firma Adresse, Privat Adresse, telefon, email, hjemmeside, profession...</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[1]->promotion_price;?>,- (Før kr <?php echo $product[1]->price;?>,-)</p>
                        <a class="add-cart-btn hidden_txt" href="indkoebskurv.html">Tilføj denne ordre til kurv</a>
                        <span class="eller hidden_txt">Eller</span>
                        <a class="buy-btn hidden_txt" href="indkoebskurv.html">Køb Nu !</a>
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
                            <option selected="selected">Vælg et produkt</option>
                            <option value="Letterhead">Letterhead</option>
                            <option value="Envelop">Envelop</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info">Giv os disse produkt oplysninger, ideer, krav...</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[2]->promotion_price;?>,- (Før kr <?php echo $product[2]->price;?>,-)</p>
                        <a class="add-cart-btn hidden_txt" href="indkoebskurv.html">Tilføj denne ordre til kurv</a>
                        <span class="eller hidden_txt">Eller</span>
                        <a class="buy-btn hidden_txt" href="indkoebskurv.html">Køb Nu !</a>
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
                            <option selected="selected">Vælg et produkt</option>
                            <option value="A4 Vandret Brochure (Ingen fold)">A4 Vandret Brochure (Ingen fold)</option>
                            <option value="A4 Vandret Brochure (Fold)">A4 Vandret Brochure (Fold)</option>
                            <option value="A4 Lodret Brochure">A4 Lodret Brochure</option>
                        </select>
                        <textarea class="text rounded w215" rows="7" cols="10" name="info">Giv os disse produkt oplysninger, ideer, krav...</textarea>
                        <p class="file-input clr">
                            <label>Vedhæfte dine krav i en fil :</label>
                            <input class="file rounded clr" type="file" value="" name="request_file" />
                            <em>(.doc, .ppt,.pdf, .dot - Max: 5MB)</em>
                        </p>
                        <p class="file-input clr">
                            <label>Vedhæft dit logo :</label>
                            <input class="file rounded clr" type="file" value="" name="logo_file" />
                            <em>(.pdf, .eps, .ai, .psd, .jpg, .svg - Max: 5MB)</em>
                        </p>
                        <p class="logo-link fll clr">Har ikke fået et logo endnu? <a href="">Bestil nu</a></p>
                        <p class="total-price fll clr">Total kr. <?php echo $product[3]->promotion_price;?>,- (Før kr <?php echo $product[3]->price;?>,-)</p>
                        <a class="add-cart-btn hidden_txt" href="indkoebskurv.html">Tilføj denne ordre til kurv</a>
                        <span class="eller hidden_txt">Eller</span>
                        <a class="buy-btn hidden_txt" href="indkoebskurv.html">Køb Nu !</a>
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
                <form id="packageSelectionForm" action="" method="post">
                    <fieldset>
                        <div class="field">
                        	<?php foreach($packages as $package){?>
                            <label>
                                <input class="radio-input" type="radio" name="package" value="<?php echo $package->id?>" onclick="changeMoney(<?php echo $package->promotion_price?>,<?php echo $package->price?>)" />
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
                        <a class="add-cart-btn hidden_txt" href="indkoebskurv.html">Tilføj denne ordre til kurv</a>
                        <span class="eller hidden_txt">Eller</span>
                        <a class="buy-btn hidden_txt" href="indkoebskurv.html">Køb Nu !</a>
                    </fieldset>
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