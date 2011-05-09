<?php
defined('_JEXEC') or die('Restricted access');
?>
<!-- Begin breadcumbs navigation -->
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="img/arrow_s1.png" alt="" /></span>
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
                <form id="packageInfoForm" class="pk-info-form" action="" method="">
                    <fieldset>
                        <div class="form-inner">
                            <label>Navn på logo :</label>
                            <input type="text" class="text rounded" name="logo navn" value="" />
                            <label>Slogan :</label>
                            <input type="text" class="text rounded" name="slogan" value="" />
                            <label>Din branche/ Erhverv :</label>
                            <select id="professionSelect" class="rounded">
                                <option selected="selected">Vælg din branche/erhverv</option>
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
                            <label>Vælg et visitkort format :</label>
                            <select id="cardTypeSelect" class="rounded">
                                <option value="horizontal">Vandret kort format (3,50" x 2,00")</option>
                                <option value="vertical">Lodret kort format (2,00" x 3,50")</option>
                            </select>
                            <label>Vælg din brevpapir type :</label>
                            <select id="brevpapirTypeSelect" class="rounded">
                                <option selected="selected">Vælg et produkt</option>
                                <option value="Letterhead">Letterhead</option>
                                <option value="Envelop">Envelop</option>
                            </select>
                            <label>Vælg din brochure type :</label>
                            <select id="brochureTypeSelect" class="rounded">
                                <option selected="selected">Vælg et produkt</option>
                                <option value="Vandret Brochure">A4 Vandret Brochure (Ingen fold)</option>
                                <option value="Vandret Brochure Fold">A4 Vandret Brochure (Fold)</option>
                                <option value="Lodret Brochure">A4 Lodret Brochure</option>
                            </select>
                            <label>Din besked/krav :</label>
                            <textarea class="text rounded" rows="9" cols="10">Giv en kort beskrivelse af din virksomhed/organisation, hvad du tilbyder. Du kan ogsa angive andre ideer og dine behov...</textarea>
                            <p class="file-input clr">
                                <label>Vedhæfte dine krav i en fil :</label>
                                <input class="file rounded clr" type="file" value="" />
                                <em>(.doc, .ppt,.pdf, .dot, .eps, .psd, .tiff, .ai, .svg, .jpg, .png, .gif - Max: 5MB)</em>
                            </p>
                            <a class="more-file">Uploade flere filer</a>
                        </div>
                        <div class="actions-ctn">
                            <a class="back-btn" href="index.html">Tilbage til forside</a>
                            <a class="next-btn flr" href="indkoebskurv.html">Næste</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </div>
    <div class="content-box-decor box-decor-btm"><span></span></div>
</div>