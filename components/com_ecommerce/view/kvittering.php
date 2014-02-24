<?php
defined('_JEXEC') or die('Restricted access');
//print_r($session);exit();
?>
<div id="breadcumbs" class="w700 fll clr">
    <a class="home-link" href="index.html" title="Forside">&nbsp;</a>
    <span><img src="templates/tpl_designcreations/img/arrow_s1.png" alt="" /></span>
    <span>Kvittering</span>
</div>

<!-- Begin mid-content  -->
<div id="content-ctn" class="purchase-process">

    <div class="dc-tabs-content fll clr">
        <ul class="ui-tabs-nav">
            <li class="tab-item" id="basketTab"><a href="index.php?option=com_ecommerce&task=kurv"><span class="num">1</span><span class="step">Indkøbskurv</span></a></li>
            <li class="tab-item" id="deliveryTab"><a href="index.php?option=com_ecommerce&task=levering"><span class="num">2</span><span class="step">Levering</span></a></li>
            <li class="tab-item" id="confirmTab"><a href="index.php?option=com_ecommerce&task=bekraeft"><span class="num">3</span><span class="step">Bekræft og betal</span></a></li>
            <li class="tab-item ui-tabs-selected" id="receiptTab"><a href="#"><span class="num">4</span><span class="step">Kvittering</span></a></li>
        </ul>
        
        <!-- logo Content -->
        <div id="shoppingCart" class="ui-tabs-panel">
            <div class="tab-content-ctn">
                <div class="content-inner">
                    <p>Tak for din ordre, som nu er under behandling. En e-mail med dine ordre detaljer vil blive sendt til dig indenfor kort tid. Du vil modtage en separat e-mail med track & trace informationer når din ordre er afsendt til dig.</p>
                    <h2>Levering Oplysninger</h2>
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr class="first">
                                <th class="left">Design service/Pakke </th>
                                
                                <th width="128" class="right">Stk. pris</th>
                                <th width="113">Antal</th>
                                <th width="117" class="right">Pris i alt</th>
                            </tr>
                            <?php if($session->get('subtotal')>0){
								for ($i=1; $i<=$session->get('subtotal'); $i++) {?>
                            <tr class="<?php if($i%2) echo "even"; else echo "odd";?>">
                                <td width="156" class="left"><?php echo $session->get('name'.$i); ?></td>
                                
                                <td class="right">DKK <?php echo $session->get('price'.$i); ?>,00</td>
                                <td><?php echo $session->get('quantity'.$i); ?></td>
                                <td class="right">DKK <?php echo $session->get('price'.$i) * $session->get('quantity'.$i); ?>,00</td>
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
                                <td class="right"><span class="right red">DKK <strong><?php echo number_format($sub,2,',','.');?></strong></span></td>
                            </tr>
                            <tr class="bottom">
                                <td colspan="2">&nbsp;</td>
                                <td class="right">Heraf moms :</td>
                                <td class="right"><span class="right red">DKK <?php echo number_format($tax,2,',','.');?></span></span></td>
                            </tr>
                        </tbody>
                     </table>
                     <div class="payment_total rounded">
                        <div class="total-inner rounded">
                            <dl class="total-list">
                                <dt>Subtotal :</dt>
                                <dd>DKK <strong><?php echo number_format($sub,2,',','.');?></strong></dd>
                                <dt>Heraf moms :</dt>
                                <dd>DKK <strong><?php echo number_format($tax,2,',','.');?></strong></dd>
                            </dl>
                            <dl class="total">
                                <dt>At betale :</dt>
                                <dd>DKK <strong><?php echo number_format($sub+$tax,2,',','.');?></strong></dd>
                            </dl>
                        </div>
                     </div>
                </div>
                <div class="actions-ctn">
                    <a class="back-btn" href="index.php">Tilbage til forside</a>
                    <a class="print-btn flr" href="#" title="Trykke til udskriv eller trykke på Ctrl + P (Windows) eller Command + P (Mac)" onClick="window.print()">Næste</a>
                </div>
            </div>
            <div class="content-box-decor box-decor-btm w700 fll clr"><span></span></div>
        </div>
        
    </div>
    
</div>