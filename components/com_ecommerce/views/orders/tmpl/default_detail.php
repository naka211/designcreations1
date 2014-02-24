<?php defined('_JEXEC') or die('Restricted access'); 
$db = JFactory::getDBO();
$query = "SELECT * FROM #__pr_cart WHERE id = ".JRequest::getVar('id');
$db->setQuery($query);
$item = $db->loadObject();
?>
<style>
.pro_name_more {
    color: #B60800;
    font-size: 12px;
    font-weight: bold;
	padding: 5px 0 5px 5px;
}
.tbHistory td{
	border:solid #999 1px;
	border-bottom:none;
	border-left:none;
}

.tbHead td{
	background-color:#CCC;
	font-weight:bold;
}
</style>
<div class="pro_name_more"><strong>Detail information</strong>:</div>
<table width="550" align="center" class="tbHistory" style="border-bottom:solid #999 1px;">
	<tr>
    	<td align="center">
        	<?php if($item->logo_name){?>
          <strong>Logo name:</strong> <?php echo $item->logo_name;?><br />
            <?php }?>
            <?php if($item->slogan){?>
          <strong>Slogan:</strong> <?php echo $item->slogan;?><br />
            <?php }?>
            <?php if($item->profession){?>
          <strong>Profession:</strong> <?php echo $item->profession;?><br />
            <?php }?>
            <?php if($item->card){?>
          <strong>Card:</strong> <?php echo $item->card;?><br />
            <?php }?>
            <?php if($item->CMS){?>
          <strong>CMS:</strong> <?php echo $item->CMS;?><br />
            <?php }?>
            <?php if($item->info){?>
          <strong>Information:</strong> <?php echo $item->info;?><br />
            <?php }?>
            <?php if($item->logo_file){?>
            <strong>Logo file:</strong> <a href="<?php echo JURI::base();?>images/fileupload/<?php echo $item->info;?>">Download</a><br />
            <?php }?>
            <?php if($item->request_file){?>
          <strong>Request file:</strong> <a href="<?php echo JURI::base();?>/images/fileupload/<?php echo $item->request_file;?>">Download</a><br />
            <?php }?>
        </td>
    </tr>
</table>