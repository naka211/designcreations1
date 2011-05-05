<?php // @version $Id: blog.php 10381 2008-06-01 03:35:53Z pasamio $
defined('_JEXEC') or die('Restricted access');
$cparams = JComponentHelper::getParams ('com_media');
?>
<?php // @version $Id: default.php 10498 2008-07-04 00:05:36Z ian $
defined('_JEXEC') or die('Restricted access');
$cparams = JComponentHelper::getParams ('com_media');
?>
<div class="col2_box">
<div class="col2_box_header"><span> </span>  <?php echo $this->escape($this->params->get('page_title')); ?> </div>
<div class="col2_box_content">

  <?php $i = $this->pagination->limitstart;
	$rowcount = $this->params->def('num_leading_articles', 1);
	for ($y = 0; $y < $rowcount && $i < $this->total; $y++, $i++) : ?>
  <?php $this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
			echo '<div class="cb"></div>
							  <div class="line_dotted"></div>
							 <div class="cb h_10"></div>';
			
			 ?>
  <?php endfor; ?>
  <?php $introcount = $this->params->def('num_intro_articles', 4);
	if ($introcount) :
		$colcount = $this->params->def('num_columns', 2);
		if ($colcount == 0) :
			$colcount = 1;
		endif;
		$rowcount = (int) $introcount / $colcount;
		$ii = 0;
		for ($y = 0; $y < $rowcount && $i < $this->total; $y++) : ?>
  <?php for ($z = 0; $z < $colcount && $ii < $introcount && $i < $this->total; $z++, $i++, $ii++) : ?>
  <?php $this->item =& $this->getItem($i, $this->params);
						echo $this->loadTemplate('item');
						echo '<div class="cb"></div>
							  <div class="line_dotted"></div>
							 <div class="cb h_10"></div>';
						
						 ?>
						
  <?php endfor; ?>
  <?php endfor;
	endif; ?>
  <?php $numlinks = $this->params->def('num_links', 4);
	if ($numlinks && $i < $this->total) : ?>
  <?php $this->links = array_slice($this->items, $i - $this->pagination->limitstart, $i - $this->pagination->limitstart + $numlinks);
		echo $this->loadTemplate('links'); ?>
  <?php endif; ?>
  <div class="cb h_15"></div>
  <div  style="text-align:center; ">
  <?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
  <?php if( $this->pagination->get('pages.total') > 1 ) : ?>
  <?php echo $this->pagination->getPagesCounter(); ?>
  <?php endif; ?>
  <?php if ($this->params->def('show_pagination_results', 1)) : ?>
  <?php echo $this->pagination->getPagesLinks(); ?>
  <?php endif; ?>
  <?php endif; ?>
  </div>
</div>
<div class="col2_box_footer"></div>
</div>
