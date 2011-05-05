<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="col2_box">
<div class="col2_box_header"><span> </span> <?php if ($this->params->get('show_title')) : ?>
  <?php echo $this->escape($this->article->title); ?>
  <?php endif; ?></div>
<div class="col2_box_content">
  <?php if ((!empty ($this->article->modified) && $this->params->get('show_modify_date')) || ($this->params->get('show_author') && ($this->article->author != "")) || ($this->params->get('show_create_date'))) : ?>
  <div>
    <?php if (!empty ($this->article->modified) && $this->params->get('show_modify_date')) : ?>
    <span class="date"> <?php echo JText::_('Last Updated').' ('.JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2')).')'; ?> </span>
    <?php endif; ?>
    <?php if ($this->params->get('show_create_date')) : ?>
    <span class="date"> <?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')); ?> </span>
    <?php endif; ?>
    <?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
    <span class="date">
    <?php JText::printf('Written by', ($this->article->created_by_alias ? $this->article->created_by_alias : $this->article->author)); ?>
    </span>
    <?php endif; ?>
  </div>
  <?php endif; ?>
    <div class="box-text-more">
 	 <?php echo $this->article->text; ?> 
  	</div>
</div>
<div class="col2_box_footer"></div>
</div>
