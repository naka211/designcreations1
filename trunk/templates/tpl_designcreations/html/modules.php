<?php
/**
 * @version		$Id: modules.php 10381 2008-06-01 03:35:53Z pasamio $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a slider
 */

function modChrome_left($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) { ?>
    
    	<div class="col1_box">
        <?php if ($module->showtitle != 0) : ?>
        <div class="col1_box_header"><span></span><?php echo $module->title; ?></div>
        <?php endif;?>
        <div class="col1_box_content">
        	 <?php echo $module->content; ?>
        </div>
        
        <div class="col1_box_footer"><span></span></div>
        
        </div>
  <?php }
}




function modChrome_midle($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) { ?>
		
        <div class="col2_box">
            <div class="col2_box_bordertop"></div>
            <?php if ($module->showtitle != 0) : ?>
            <div><span></span><?php echo $module->title; ?></div>
            <?php endif;?>
            <div class="col2_box_content">
            	 <?php echo $module->content; ?>
            </div>
            <div class="col2_box_footer"></div>
         </div>
         <div class="cb h_15"></div>
<?php }
}

function modChrome_midle2($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) { ?>
		
        <div class="col2_box">
                <div class="col2_box_header"><span></span><?php if ($module->showtitle != 0) echo $module->title; ?></div>
                <div class="col2_box_content">
               	 <?php echo $module->content; ?>
                </div>
                <div class="col2_box_footer"></div>
         </div>
        
    
<?php }
}


function modChrome_right($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) { ?>
<?php if ($module->showtitle != 0) : ?>
<div class="tab_left_2<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>"></div>
<div class="tab_right_bg<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>">
  <?php if ($module->showtitle) echo $module->title; ?>
</div>
<div class="cb"></div>
<?php endif;?>
<div class="tab_left_ececec<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>">
  <div class="cb h_15<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>"></div>
  <?php echo $module->content; ?>
  <div class="cb h_5<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>"></div>
</div>
<div class="tab_right_bottom<?php $sfx=$params->get('moduleclass_sfx'); if ($sfx) echo "-".$sfx; ?>"></div>
<div class="cb h_10"></div>
<?php }
}
?>
