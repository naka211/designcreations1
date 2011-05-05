<?php defined('_JEXEC') or die('Restricted access'); ?>
  <script language="javascript" type="text/javascript">
			window.addEvent('domready', function(){
			/* Tips 1 */
			var Tips1 = new Tips($$('.Tips2'));
			});
</script>

<div class="col2_box">
<div class="col2_box_header"><span> </span><?php echo $this->issearch ? JText::_('SEARCH_RESULTS'):JText::_('PRODUCTS');?> </div>
<div class="col2_box_content">

  <?php 

  if($this->issearch)
  {
	$meta_title=JText::_('SEARCH_PRODUCTS');
  ?>
  <!--div >Từ khóa: <?php echo $this->keyword;?> </div-->
  <div class="cb h_10"></div>
  <div ><?php echo JText::_('NUMBER_OF_SEARCH_PRODUCTS'). $this->totalresult;?> </div>
  <div class="cb h_15"></div>
  <?php
  }
  else 	$meta_title=$this->catinfo->name;
  if($meta_title=="") $meta_title =   JText::_('PRODUCTS');
  ?>
  <div >
    <?php
		if($this->catid > 0 ):
			$db = &JFactory::getDBO();

			if($this->catinfo->parent_id!=0):
				if( $this->catinfo->endnode==1 ){
					$query = "select id,parent_id, name from #__pr_category where id = ". $this->catinfo->parent_id . " LIMIT 1";
					$db->setQuery($query);
					$root_cat  = $db->loadObject(); 
					if($root_cat->parent_id==0) $parent_id = 0;
					else   $parent_id =  $root_cat->id;	
					 $meta_title .= " | ".$root_cat->name;		
				}
				else {
					 $parent_id =  $this->catinfo->id ;
				}	
				

				if($parent_id !=0):
					$query = "select * from #__pr_category where parent_id = ". $parent_id . " order by ordering";
					//print $query ;
					$db->setQuery($query);
					$rows = $db->loadObjectList();
					if(!empty($rows)){
						$n=0;
						?>
					<div class="tab_pro_bg">
					  <div class="w_tab_pro"></div>
					  <?php
						foreach ($rows as $r){
							$n++;
							$here = $this->catid ==$r->id?'-here':'';
							
						?>
					  <div class="tab_pro_out<?php echo $here;?>"><a  href="index.php?option=com_ecommerce&view=list&catid=<?php echo $r->id; ?>" > <?php echo $r->name; ?> </a> </div>
					  <?php
				 
						}
						?>
					  <div class="cb"></div>
					</div><div class="cb h_15"></div>
			<?php
					}
				endif;	
			endif;	
		endif;
	    $document = JFactory::getDocument();$document->setTitle($meta_title);
	?>
  </div>
  <?php 
$i = 1;
if (empty($this->list)) {
	echo "Hiện tại chưa có mặt hàng này";
}
else
{
	$session =& JFactory::getSession();
	$curLanguage = JFactory::getLanguage();
	$curency = $session->get("curency",($curLanguage->getTag()=="vi-VN" ? "VND":"USD"));
	if($curency=="USD"){ 
		$rate = $this->config["USD"]["value"]; $decimal = 2;
		
	}
	else { $rate = 1; $decimal = -3;}
	$order = array("\r\n","\n","\r");
	$replace = ' ';
		
	$menus = & JSite :: getMenu();
	$menu = $menus->getItems('link', 'index.php?option=com_ecommerce&view=list');
	foreach($this->list as $l){ 
		$link = JRoute::_("index.php?option=com_ecommerce&view=detail&id=$l->id:$l->alias&catid=$l->category_id:$l->cat_alias&Itemid=".$menu[0]->id);
		$dir = $l->id+999-(($l->id-1)%1000);
		if($l->image!=""){
			$image_thumb = $this->params->get('imgpath').$dir.'/'.$l->id.'/thumb_'.$l->image;
			$tip_info = '<div class="pro_title_tooltip"><strong>'.strip_tags($l->name).'</strong></div><img src="'.$image_thumb.'">';
		}
		else {
			$image_thumb = 'images/ecommerce/no-images.jpg';
			$tip_info = '<div class="pro_title_tooltip"><strong>'.strip_tags($l->name).'</strong></div>';
		}	

		$str_tip = str_replace($order,$replace, htmlspecialchars($tip_info));
		 
		if($curency=="USD" && $l->price>0){
			$l->price = $l->price/$rate ;
			$l->price = ( $l->price/(1-$this->config["percent_payment"]["value"]/100) )+ $this->config["transaction_fee"]["value"];
		}
	?>
    <div class="col2_products_wrap <?php if ($i%2 != 0) echo "line_dot_right";?>">
<div class="col2_products_image"><a href="<?php echo $link ;?>" ><span class="Tips2" title='<?php echo $str_tip ;?>'><img src="<?php echo $image_thumb; ?>" alt="<?php echo $l->name; ?>" /></span></a></div>
<div class="col2_product_info">
<div class="fix_height">
    <h4><a href="<?php echo $link ;?>"><?php echo $l->name." - ".$l->code; ?></a></h4>
    <div class="col2_product_info_intro">
    <?php echo $l->description; ?> 
    </div>
</div>
<div class="col2_product_info_gia"><span><?php echo JText::_('PRICE')?>:</span> <?php if($l->price>0){  echo number_format($l->price,$decimal,".",",")." ".$curency; } else echo  'Call';  ?></div>
<div class="button_1"><a href="<?php echo $link ;?>"><?php echo JText::_('READMORE')?></a></div>
<div class="button_1"><a href="<?php echo JRoute::_('index.php?option=com_ecommerce&task=addcart&prod_id='.$l->id); ?>"><?php echo JText::_('BOOKING')?></a></div>
</div>
</div>

  <?php 
		if ($i%2 == 0){	echo '<div class="cb line_dot"></div>';	}
		$i++;
	}
	if ($i%2 == 0){	echo '<div class="cb line_dot"></div>';	}
}
?>
<div class="cb h_10"></div>

<div style="text-align:center;">
<?php
	if($this->issearch){
		$giatu = JRequest::getVar('giatu', '');
		$giatu = "&giatu=".$giatu;
		$giaden = JRequest::getVar('giaden', '');
		$giaden = "&giaden=".$giaden;
		$link = "index.php?option=com_ecommerce&view=list&issearch=$this->issearch&keyword=$this->keyword$giatu$giaden&catid=$this->catid";
	}	
	else $link = "index.php?option=com_ecommerce&view=list&catid=$this->catid";
?>
<a href="<?php echo $link."&t=1";?>" > <img src="components/com_ecommerce/imgs/arrow-back.gif"> </a>
  <?php
	//bat dau danh so trang
	for ($i=1;$i<=$this->sotrang;$i++){
		//if($i>1) echo " | ";
		if($i==$this->tht) {
			echo $i."&nbsp";
		} 
		else { ?>
		  <span class="number"> <a href="<?php echo $link."&t=$i"; ?>" ><?php echo $i ?></a> </span>
  <?php
		}
	}
?>
  <a href="<?php echo $link."&t=$this->sotrang";?>" > <img src="components/com_ecommerce/imgs/arrow-forw.gif"> </a> 
  
  <div class="cb h_10"></div>
  </div>
</div>
<div class="col2_box_footer"></div>
</div>
