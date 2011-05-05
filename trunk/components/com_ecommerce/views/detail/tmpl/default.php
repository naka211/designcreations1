<?php
defined('_JEXEC') or die('Restricted access');
?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
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
<div style="line-height:15px">
<table width="100%" cellpadding="2" cellspacing="2" style="margin:0 0 10px 0">
<tr>
	<td valign="top">
		<img style="border:1px solid #dfdfdf" src="components/com_ecommerce/prsupload/<?php echo $this->detail->image; ?>" width="300px" height="230px" />
	</td>
	<td width="100%" valign="top">
		<span class="pr_name"><?php echo $this->detail->name; ?></span><br/><br/>
		
		<span class="title">Mô tả:</span><br/>
		<div class="content"><?php echo $this->detail->description; ?></div><br/>
		
		<span class="title">Hãng sản xuất:</span> <?php echo $this->detail->company; ?><br />
		
		<span class="title" style="margin:2px 0">Giá:</span> <span class="number" style="margin:2px 0"><?php echo number_format($this->detail->price, -3, ",","."); ?></span> VNĐ<br />
		
		<p>
		<div class="buy">
		<a href="index.php?option=com_ecommerce&task=addcart&id=<?php echo $this->detail->id ?>">
		Mua
		</a>
		</div>
		</p>
	</td>
</tr>
<tr><td  colspan="2">
<span class="title">Thông tin chi tiết:</span><br/>
<div class="content cover"><?php echo $this->detail->description_en; ?></div>
</td></tr>
</table>

<div class="tab_left_1"></div>
<div class="tab_bg_cennter">Bình luận sản phẩm</div>
<div class="cb"></div>

<table width="100%" id="bltable">
	<?php 
	$i = 0;
	if(empty($this->topics)){
		echo "Không có bình luận nào";
	} else {
		foreach($this->topics as $topic){ ?>
			<tr><td class="<?php if($i%2==0) echo "mucchan"; else echo "mucle"; ?>">
				<?php echo "<span class='number'>".$topic->name."</span>" ?><br />
				<?php echo $topic->content ?>
			</td></tr>
		<?php 
			$i++;
		}
	}	?>
</table>
<form action="index.php?option=com_ecommerce&view=detail&id=<?php echo $this->detail->id ?>" method="post" onsubmit="check()">
	<input type="text" value="Tên của bạn" id="name" name="name" width="300px" onclick="this.value=''" /><br/>
	<textarea id="content" name="content" cols="50" rows="10" onclick="this.value=''">Nội dung...</textarea><br />
	<input type="hidden" name="id" value="<?php echo $this->detail->id;?>">
	<input type="submit" value="Gửi">
</form>
</div>
</div>
