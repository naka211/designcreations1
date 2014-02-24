<?php
defined('_JEXEC') or die('Restricted access');
//print_r($session);exit();
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.php" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Bekræft og betal</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="purchase-process">

    <div class="dc-tabs-content fll clr">
        <ul class="ui-tabs-nav">
            <li class="tab-item" id="basketTab"><a href="index.php?option=com_ecommerce&task=kurv"><span class="num">1</span><span class="step">Indkøbskurv</span></a></li>
            <li class="tab-item" id="deliveryTab"><a href="index.php?option=com_ecommerce&task=levering"><span class="num">2</span><span class="step">Levering</span></a></li>
            <li class="tab-item ui-tabs-selected" id="confirmTab"><a href="#"><span class="num">3</span><span class="step">Bekræft og betal</span></a></li>
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
                                
                                <th width="128" class="right">Stk. pris</th>
                                <th width="113">Antal</th>
                                <th width="117" class="right">Pris i alt</th>
                            </tr>
                            <?php if($session->get('subtotal')>0){
								for ($i=1; $i<=$session->get('subtotal'); $i++) {?> 
                            <tr class="<?php if($i%2) echo "even"; else echo "odd";?>">
                                <td width="156" class="left"><?php echo $session->get('name'.$i); ?></td>
                                
                                <td class="right">DKK <?php echo number_format($session->get('price'.$i),0,'','.'); ?></td>
                                <td><?php echo $session->get('quantity'.$i); ?></td>
                                <td class="right">DKK <?php echo number_format($session->get('price'.$i) * $session->get('quantity'.$i),0,'','.'); ?></td>
                            </tr>
                           	<?php 
								$sub += $session->get('price'.$i) * $session->get('quantity'.$i);
								}
								$tax = $sub * $ecom_config['tax']['value'];
							}
							?>
                            <tr class="bottom">
                                <td colspan="2">&nbsp;</td>
                                <td class="right"><strong>Subtotal :</strong></td>
                                <td class="right"><span class="right red">DKK <strong><?php echo number_format($sub,0,',','.');?></strong></span></td>
                            </tr>
                            <tr class="bottom">
                                <td colspan="2">&nbsp;</td>
                                <td class="right">Heraf moms :</td>
                                <td class="right"><span class="right red">DKK <?php echo number_format($tax,0,',','.');?></span></td>
                            </tr>
                        </tbody>
                     </table>
                     <div class="payment_total rounded">
                        <div class="total-inner rounded">
                            <dl class="total-list">
                                <dt>Subtotal :</dt>
                                <dd>DKK <strong><?php echo number_format($sub,0,',','.');?></strong></dd>
                                <dt>Heraf moms :</dt>
                                <dd>DKK <strong><?php echo number_format($tax,0,',','.');?></strong></dd>
                            </dl>
                            <dl class="total">
                                <dt>At betale :</dt>
                                <dd>DKK <strong><?php echo number_format($sub+$tax,0,',','.');?></strong></dd>
                            </dl>
                        </div>
                     </div>
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="index.php?option=com_ecommerce&task=levering">Tilbage</a>
                    <a class="confirm-btn flr" href="javascript:void(0);" onclick="$('#leasingForm').submit();">Næste</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>
        
    </div>
    
</div>
<?php
$protocol = '6';
$msgtype = 'authorize';
$merchant = '33448007';
$language = 'da';
$ordernumber = sprintf('%05d',$order_id);
$amount = $subpay*100;

$currency = 'DKK';
$continueurl = JURI::base().'index.php?option=com_ecommerce&task=kvittering';
$cancelurl = JURI::base().'index.php?option=com_ecommerce&task=bekraeft';
$callbackurl = '';
                
$autocapture = '0';
$cardtypelock = 'creditcard';
$description = 'description';
$testmode = 0;
$splitpayment = 0;
$md5word = '5R2uh9M634523H9qPV8S8bZzm34d72yc1vgKDX9i7Ap1a9TUk8I6L86xl2YE5e45';
$md5check = md5($protocol . $msgtype . $merchant . $language . $ordernumber . $amount . $currency . $continueurl . $cancelurl . $callbackurl . $autocapture . $cardtypelock . $description . $testmode. $splitpayment . $md5word);
?>

<form id="leasingForm" action="https://secure.quickpay.dk/form/" method="post">
    <input type="hidden" name="protocol" value="<?php echo $protocol ?>" />
    <input type="hidden" name="msgtype" value="<?php echo $msgtype ?>" />
    <input type="hidden" name="merchant" value="<?php echo $merchant ?>" />
    <input type="hidden" name="language" value="<?php echo $language ?>" />
    <input type="hidden" name="ordernumber" value="<?php echo $ordernumber ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount ?>" />
    <input type="hidden" name="currency" value="<?php echo $currency ?>" />
    <input type="hidden" name="continueurl" value="<?php echo $continueurl ?>" />
    <input type="hidden" name="cancelurl" value="<?php echo $cancelurl ?>" />
    <input type="hidden" name="callbackurl" value="<?php echo $callbackurl ?>" />
    <input type="hidden" name="autocapture" value="<?php echo $autocapture ?>" />
    <input type="hidden" name="cardtypelock" value="<?php echo $cardtypelock ?>" />
    <input type="hidden" name="md5check" value="<?php echo $md5check ?>" />
	<input type="hidden" name="description" value="<?php echo $description ?>" />
	<input type="hidden" name="testmode" value="<?php echo $testmode ?>" />
	<input type="hidden" name="splitpayment" value="<?php echo $splitpayment ?>" />
    <!--<input type="submit" value="Open Quickpay payment window" />-->
</form>