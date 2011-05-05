<?php defined('_JEXEC') or die('Restricted access');

?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/components/com_ecommerce/styles.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/components/com_ecommerce/css/milkbox/milkbox.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/components/com_ecommerce/css/smoothbox.css" type="text/css" />
<script language="javascript" src="<?php echo $this->baseurl;?>/components/com_ecommerce/js/smoothbox.js" type="text/javascript"></script>
<!--******** ITI Solution 29/9 *********-->
	
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/components/com_ecommerce/js/milkbox.js"></script>
	<!--
		Compressed version:
		<script type="text/javascript" src="js/milkbox-yc.js"></script> 
	-->
	<script language="javascript">
		window.addEvent('domready', function(){
			$('pic_zoom_box').addEvent('click', function(e){
				e.preventDefault();
				milkbox.showGallery({ gallery:'gall1'});
			});
			
			$('image_product').addEvent('click', function(e){
				e.preventDefault();
				milkbox.showGallery({ gallery:'gall1'});
			});
			
		});
	</script>
<!--*******************************************************************-->
<script language="javascript">
function check(){
	if($('name').value==''){
		alert('Vui lòng nhập tên');
		return false;
	}
	if($('content').value==''){
		alert('Vui lòng nhập nội dung');
		return false;
	}
	return true;
}
</script>

<div class="col2_box">
<div class="col2_box_header"><span> </span>Chi tiết sản phẩm </div>
<div class="col2_box_content">

				<div class="cb h_15"></div>
				<div class="margin_news">
					<div class="fl" style="width:350px">
						<?php $dir = $this->detail->id+999-(($this->detail->id-1)%1000);?>
						<div class="pro_pic_more"><a href=""><img src="<?php if($this->detail->image)echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/thumb_'.$this->detail->image;else echo 'images/ecommerce/no-images.jpg'; ?>" id="image_product" width="344"  alt="" /></a></div>
						
						<div class="cb h_5"></div>
						<div style=" text-align:center">
						<? if($this->detail->image){ ?>
						<a href="<?php echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/'.$this->detail->image; ?>" rel="milkbox[gall1]" title="<?php echo $this->detail->name; ?>"/>
						<? } if($this->detail->image1){ ?>
						<a href="<?php echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/'.$this->detail->image1; ?>" rel="milkbox[gall1]" title="<?php echo $this->detail->name; ?>"/>
						<? } if($this->detail->image2){ ?>
						<a href="<?php echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/'.$this->detail->image2; ?>" rel="milkbox[gall1]" title="<?php echo $this->detail->name; ?>"/>
						<? } if($this->detail->image3){ ?>
						<a href="<?php echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/'.$this->detail->image3; ?>" rel="milkbox[gall1]" title="<?php echo $this->detail->name; ?>"/>
						<? } if($this->detail->image4){ ?>
						<a href="<?php echo $this->params->get('imgpath').$dir.'/'.$this->detail->id.'/'.$this->detail->image4; ?>" rel="milkbox[gall1]" title="<?php echo $this->detail->name; ?>"/>
						<? } ?>
						<a href="#" id="pic_zoom_box">
						<img src="<?php echo $this->baseurl ?>/images/zoom.jpg" width="20" height="19" alt="Phóng to hình" align="absmiddle" />&nbsp;Phóng to hình</a>
						
						</div>
					</div>
					
					<div style="float:left; margin-left:15px; width:270px;">
						<div class="pro_name_more"><?php echo $this->detail->name; ?></div>
                        <div class="line_dotted"></div>
                        <div class="pro_nd_more"><strong>Mã sản phẩm:</strong> <strong class="pro_name_more"><?php echo $this->detail->code; ?></strong></div>
                        <div class="pro_nd_more"><strong>Thông tin sản phẩm:</strong></div>
                        <div class="pro_nd_more"><?php echo $this->detail->description_en; ?></div>
						
						<div class="cb h_10"></div>
						<div class="pro_nd_more"><strong>Giá: </strong><font class="pro_name_more"><?php if($this->detail->price>0){  echo number_format($this->detail->price,-3,",",".").' VNĐ'; } else echo  'Liên hệ';  ?></font></div>
						<div class="t_r">
                        	<div class="button_1"><a href="<?php echo JRoute::_('index.php?option=com_ecommerce&task=addcart&prod_id='.$this->detail->id); ?>">Đặt hoa</a></div>
                         </div>
					</div>
				</div>
			
				<div class="cb  h_10"></div>
</div>
<div class="col2_box_footer"></div>
</div>

<div class="cb h_10"></div>
<!--**********************-->
 <?php 
 	if($this->detail->related) echo $this->loadTemplate('related');
	//echo $this->loadTemplate('comment');
 ?> 
  
  
  <!--************************************************-->
