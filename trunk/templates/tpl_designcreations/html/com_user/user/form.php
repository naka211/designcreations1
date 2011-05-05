<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<script type="text/javascript">
<!--
	//window.onDomReady(function(){
		//document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	//});
// -->
</script>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" name="userform" autocomplete="off" class="form-validate">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<div class="tab_left_1"></div>
	<div class="tab_bg_cennter">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php endif; ?>
<div class="cb"></div>
<div class="box_bd_bg">
<div class="cb h_10"></div>
<table cellpadding="5" cellspacing="2" border="0" width="100%">
<tr class="tab_left_ececec">
	<td width="30%" align="right">
		<label for="username">
			<?php echo JText::_( 'User Name' ); ?>:
		</label>
	</td>
	<td width="70%">
		<span><?php echo $this->user->get('username');?></span>
	</td>
</tr>
<tr>
	<td align="right">
		<label for="name">
			<?php echo JText::_( 'Your Name' ); ?>:
		</label>
	</td>
	<td>
		<input class="inputbox required" type="text" id="name" name="name" value="<?php echo $this->escape($this->user->get('name'));?>" size="40" />
	</td>
</tr>
<tr class="tab_left_ececec">
	<td align="right">
		<label for="email">
			<?php echo JText::_( 'email' ); ?>
		</label>
	</td>
	<td>
		<input class="inputbox required validate-email" type="text" id="email" name="email" value="<?php echo $this->escape($this->user->get('email'));?>" size="40" />
	</td>
</tr>
<?php if($this->user->get('password')) : ?>
<tr>
	<td align="right">
		<label for="password">
			<?php echo JText::_( 'Password' ); ?>:
		</label>
	</td>
	<td>
		<input class="inputbox validate-password" type="password" id="password" name="password" value="" size="40" />
	</td>
</tr>
<tr class="tab_left_ececec">
	<td align="right">
		<label for="password2">
			<?php echo JText::_( 'Verify Password' ); ?>:
		</label>
	</td>
	<td>
		<input class="inputbox validate-passverify" type="password" id="password2" name="password2" size="40" />
	</td>
</tr>
<?php endif; ?>
<tr>
	<td colspan="2" align="center">
		<button class="button validate" type="submit" onclick="submitbutton( this.form );return false;"><?php echo JText::_('Save'); ?></button>
	</td>
</tr>
</table>

<?php //if(isset($this->params)) :  echo $this->params->render( 'params' ); endif; ?>
	
	<input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
	<input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
	<input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="save" />
	<?php echo JHTML::_( 'form.token' ); ?>
</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>
</form>