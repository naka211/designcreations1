<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<?php
	if(isset($this->message)){
		$this->display('message');
	}
?>
<div class="col2_box">
<div class="col2_box_header"><span> </span>Đăng ký thành viên </div>
<div class="col2_box_content">
<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">

<?php //if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
<!-- <div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo "Hồ sơ cá nhân";//$this->escape($this->params->get('page_title')); ?></div> -->

<?php //endif; ?>

<table cellpadding="5" cellspacing="2" border="0" width="100%">
<tr class="tab_left_ececec">
	<td width="30%" height="40" align="right">
		<label id="namemsg" for="name">
			<?php echo JText::_( 'Họ và tên' ); ?> : 
		</label>
	</td>
  	<td>
  		<input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' ));?>" class="inputbox required" maxlength="50" /> (*)
  	</td>
</tr>
<tr>
	<td height="40"  align="right">
		<label id="usernamemsg" for="username">
			<?php echo JText::_( 'Tên đăng nhập' ); ?> : 
		</label>
	</td>
	<td>
		<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' ));?>" class="inputbox required validate-username" maxlength="25" /> (*)
	</td>
</tr>
<tr class="tab_left_ececec">
	<td height="40" align="right">
		<label id="emailmsg" for="email">
			<?php echo JText::_( 'Email' ); ?> : 
		</label>
	</td>
	<td>
		<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' ));?>" class="inputbox required validate-email" maxlength="100" /> (*)
	</td>
</tr>
<tr>
	<td height="40" align="right">
		<label id="phonesmg" for="phonesmg">
			<?php echo JText::_( 'Điện thọai' ); ?> : 
		</label>
	</td>
	<td>
		<input type="text" id="phone" name="phone" size="40" value="" class="inputbox required validate-username" maxlength="100" /> 
	</td>
</tr>
<tr class="tab_left_ececec">
	<td height="40" align="right">
		<label id="phonesmg" for="phonesmg">
			<?php echo JText::_( 'Địa chỉ' ); ?> : 
		</label>
	</td>
	<td>
		<input type="text" id="address" name="address" size="40" value="" class="inputbox required" maxlength="100" /> 
	</td>
</tr>
<tr>
	<td height="40" align="right">
		<label id="pwmsg" for="password">
			<?php echo JText::_( 'Password' ); ?> : 
		</label>
	</td>
  	<td>
  		<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /> (*)
  	</td>
</tr>
<tr class="tab_left_ececec">
	<td height="40" align="right">
		<label id="pw2msg" for="password2">
			<?php echo JText::_( 'Verify Password' ); ?> : 
		</label>
	</td>
	<td >
		<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /> (*)
	</td>
</tr>
<?php // Captcha Extention patch rev. 4.5.0 Stable
$dispatcher = &JDispatcher::getInstance();
$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.register' ) );
if ($results[0])
	$dispatcher->trigger( 'onCaptchaView', array( 'user.register', 0, '<tr><td colspan="2" >', '</td></tr>' ) ); ?>
<tr>
	<td colspan="2" height="40" align="center">
		<?php echo JText::_( 'REGISTER_REQUIRED' ); ?>
	</td>
</tr>
</table>
	<div style="text-align:center">
		<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
	</div>
	<input type="hidden" name="task" value="register_save" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>

</form>
</div>
<div class="col2_box_footer"></div>
</div>
