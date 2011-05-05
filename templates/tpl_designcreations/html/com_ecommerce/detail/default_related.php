<link rel="stylesheet" href="plugins/content/extranews/css/dhtmltooltip.css" type="text/css" />
<script type="text/javascript" src="plugins/content/extranews/js/dhtmltooltip.js"></script>
<div class="tab_left_1"></div>
<div class="tab_bg_cennter">Sản phẩm có liên quan</div>
<div class="cb "></div>
<div class="box_bd_bg">
<div class="cb h_10"></div>

<?php	
    $com_params = &$mainframe->getParams('com_ecommerce');
	$order = array("\r\n","\n","\r");
	$replace = ' ';
	$menus = & JSite :: getMenu();
	$menu = $menus->getItems('link', 'index.php?option=com_ecommerce&view=list');
	$data = $this->detail->related;
	$i = 1;
	foreach($data as $l){
		$link = JRoute::_("index.php?option=com_ecommerce&view=detail&id=$l->id&catid=$l->category_id&Itemid=".$menu[0]->id);
		$dir = $l->id+999-(($l->id-1)%1000);
		$str_tip = str_replace($order,$replace, htmlspecialchars('<strong>'.strip_tags($l->name).'</strong><br/>'.$l->description));
		?>
  <div class="pro_box">
    <div class="pic_pro"><a href="<?php echo $link ;?>" onmouseover="showttip('<?php echo $str_tip;?>', <?php echo $com_params->get('widthtooltip');?>);" onmouseout="hidettip();"><img src="<?php if($l->image) echo $this->params->get('imgpath').$dir.'/'.$l->id.'/thumb_'.$l->image; else echo 'images/ecommerce/no-images.jpg'; ?>" width="100" height="80" alt="" /></a></div>
    <div class="pro_name"><a href="<?php echo $link ;?>"><?php echo $l->name; ?></span></a><br />
      <font class="pro_price"><?php if($l->price>0){  echo number_format($l->price,-3,",",".").' VNĐ'; } else echo  'Liên hệ';  ?></font></div>
    <div class="more"><a href="index.php?option=com_ecommerce&view=detail&catid=<?php echo $l->category_id; ?>&id=<?php echo $l->id; ?>">Xem&nbsp;chi&nbsp;tiết</a></div>
    <div class="cb"></div>
  </div>
  <?php 
	
		if ($i%4 == 0){
		echo '<div class="cb h_15"></div>';
		}
		$i++;	
	}
?>
</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>