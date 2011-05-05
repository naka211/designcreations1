<?php // @version $Id: default.php 10498 2008-07-04 00:05:36Z ian $
defined('_JEXEC') or die('Restricted access');
$cparams = JComponentHelper::getParams ('com_media');
?>

<div class="tab_left_1"></div>
<div class="tab_bg_cennter"> <?php echo $this->escape($this->params->get('page_title')); ?> </div>
<div class="cb"></div>
<div class="box_bd_bg">
  <?php $this->items =& $this->getItems();
echo $this->loadTemplate('items'); ?>
</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>
