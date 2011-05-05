<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<div class="cb h_5"></div>
<div > <strong><?php echo JText::_( 'More Articles...' ); ?></strong> </div>
<div class="margin_news">
  <?php foreach ($this->links as $link) : //echo $this->item->created;exit();?>
  <div class="more_news"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>"><?php echo $this->escape($link->title); ?></a><font class="date"> (<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC4')); ?>)</font></div>
  <?php endforeach; ?>
  <div class="cb"></div>
</div>
