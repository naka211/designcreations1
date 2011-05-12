<script language="javascript">
	function nextStep(){
		
		if(!$('input[name=accept]').is(':checked')){
			alert('Tjek venligst bytteforholdet');
			return false;
		}
		
		location.href = 'index.php?option=com_ecommerce&task=levering';
	}
</script>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>indkøbsvogn</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="purchase-process">

    <div class="dc-tabs-content fll clr">
        <ul class="ui-tabs-nav">
            <li class="tab-item ui-tabs-selected" id="basketTab"><a href="#"><span class="num">1</span><span class="step">Indkøbskurv</span></a></li>
            <li class="tab-item" id="deliveryTab"><div class="dis-tab"><span class="num">2</span><span class="step">Levering</span></div></li>
            <li class="tab-item" id="confirmTab"><div class="dis-tab"><span class="num">3</span><span class="step">Bekræft og betal</span></div></li>
            <li class="tab-item" id="receiptTab"><div class="dis-tab"><span class="num">4</span><span class="step">Kvittering</span></div></li>
        </ul>
        
        <!-- logo Content -->
        <div id="shoppingCart" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <div class="content-inner">
            
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr class="first">
                                <th class="left">Design service/Pakke</th>
                                <th class="center">Stk. pris</th>
                                <th class="center">Antal</th>
                                <th class="center" colspan="2">Slet</th>
                                <th class="right">Pris i alt</th>
                            </tr>
                            <?php if($session->get('subtotal')>0){
								for ($i=1; $i<=$session->get('subtotal'); $i++) {?> 
                            <tr class="even">
                                <td width="200" class="left"><?php echo $session->get('name'.$i); ?></td>
                                <td width="130" class="center">DKK <?php echo $session->get('price'.$i); ?>,00</td>
                                <td width="50" class="center"><?php echo $session->get('quantity'.$i); ?></td>
                                <td width="50" class="actions center" colspan="2">
                                    <a class="button" href="index.php?option=com_ecommerce&task=delcart&i=<?php echo $i; ?>" title="Slet denne konto"><img src="templates/tpl_designcreations/img/delete_cart.png" alt="Slet Kurv" /></a>
                                </td>
                                <td class="right">DKK <?php echo $session->get('price'.$i) * $session->get('quantity'.$i); ?>,00</td>
                            </tr>
                            <?php 
								$sub += $session->get('price'.$i) * $session->get('quantity'.$i);
								}
								$tax = $sub * $ecom_config['tax']['value'];
							}
							?>
                            <tr class="bottom">
                                <td colspan="4">&nbsp;</td>
                                <td width="80" class="right"><strong>Subtotal :</strong></td>
                                <td class="right red">DKK <strong><?php echo number_format($sub,2,',','');?></strong></td>
                            </tr>
                            <tr class="bottom">
                                <td colspan="4">&nbsp;</td>
                                <td width="80" class="right">Heraf moms :</td>
                                <td class="right red">DKK <?php echo number_format($tax,2,',','');?></td>
                            </tr>
                            <tr class="bottom">
                                <td colspan="6" class="last">
                                    <label><input class="check-box" type="checkbox" name="accept" id="accept" />Jeg accepterer</label>
                                    <a href="index.php?option=com_ecommerce&view=betingelser&Itemid=1">handelsbetingelserne</a>
                                </td>
                            </tr>
                        </tbody>
                     </table>
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="javascript:void(0);" onclick="history.back();">Tilbage</a>
                    <a class="checkout-btn flr" href="javascript:void(0);" onclick="nextStep();">Næste</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>
        
    </div>
    
</div>