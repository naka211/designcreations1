<?php
defined('_JEXEC') or die('Restricted access');
?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
	<?php
	$query = "select * from #__pr_category where parent_id = ". $this->catid . " order by ordering";
	$db = &JFactory::getDBO();
	$db->setQuery($query);
	$rows = $db->loadObjectList();
	if(!empty($rows)){
		foreach ($rows as $r){
			?>
			<a href="index.php?option=com_ecommerce&view=list&t=1&sessid=<?php echo $this->sessid; ?>&catid=<?php echo $this->catid; ?>&childid=<?php echo $r->id; ?>" > <?php echo $r->name; ?> </a>
			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<?php
		}
	}
	?>
<table class="showimg" cellpadding="0" cellspace="0" width="100%">
<tr>

<?php 
$i = 0;
if (empty($this->list)) {
	echo "Hiện tại chưa có mặt hàng này";
}
else
{

	foreach($this->list as $l){ ?>
		<td width="25%" align="left">
		<div style="text-align:left">
			<div style="text-align:left">
				<a href="components/com_ecommerce/prsupload/<?php echo $l->image; ?>" rel="lightbox">
				<img style="border:1px solid #dfdfdf" src="components/com_ecommerce/prsupload/<?php if($l->image){ echo $l->image;} else {echo 'no-images.jpg';} ?>" width="110px" height="90px" />
				</a>
			</div>	
			<div style="text-align:left">
			<a href="index.php?option=com_ecommerce&view=detail&id=<?php echo $l->id; ?>">
			<span class="tensp"><?php echo $l->name; ?></span></a><br />
			<span class="tensp">Giá: </span>
			<span style="font-weight:bold; color: #a20000">$ <?php echo number_format($l->price,-3,",","."); ?></span><br />
			<img src="components/com_ecommerce/imgs/w_icon.gif">
			<span class="tensp">
			<a href="index.php?option=com_ecommerce&view=detail&id=<?php echo $l->id; ?>">
				Xem chi tiết
			</a>
			</span>
			</div>
		</div>
		</td>
	<?php 
		$i++;
		if ($i%3 == 0){
		echo '</tr>';
		}
	}
	if ($i%3 != 0){
		echo '</tr>';
		}
}
?>
</table>
<table width="100%" border="0" >
<tr><td align="center" style="padding-top:5px">
<a href="index.php?option=com_ecommerce&view=list&t=1&sessid=<?php echo $this->sessid; ?>&catid=<?php echo $this->catid; ?>&childid=<?php echo $this->childid; ?>" > 
<img src="components/com_ecommerce/imgs/arrow-back.gif">
</a>
<?php
	//bat dau danh so trang
	for ($i=1;$i<=$this->sotrang;$i++){
		if($i==$this->tht) {
			echo $i."&nbsp";
		} else { ?>
			<span class="number">
			<a href="index.php?option=com_ecommerce&view=list&t=<?php echo $i; ?>&sessid=<?php echo $this->sessid; ?>&catid=<?php echo $this->catid; ?>&childid=<?php echo $this->childid; ?>" ><?php echo $i ?></a>
			</span>
		<?php
		}
	}
?>
<a href="index.php?option=com_ecommerce&view=list&t=<?php echo $this->sotrang ?>&sessid=<?php echo $this->sessid; ?>&catid=<?php echo $this->catid; ?>&childid=<?php echo $this->childid; ?>" > 
<img src="components/com_ecommerce/imgs/arrow-forw.gif">
 </a>
</td></tr>
</table>

<style>
.detaillink a, .detaillink a:visited{
	font-weight: bold;
	color: #FEA800;
}
.detaillink a:hover{
	font-weight: bold;
	color: #FE0000;
}
</style>