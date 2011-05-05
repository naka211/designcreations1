<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="col2_box">
<div class="col2_box_header"><span> </span><?php echo $this->escape($this->params->get('page_title')); ?> </div>
<div class="col2_box_content">
<?php echo $this->loadTemplate($this->type); ?>
</div>
<div class="col2_box_footer"></div>
</div>

