<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if($type == 'logout') : ?>

<form action="index.php" method="post" name="form-login" id="form-login"  >
  <?php if ($params->get('greeting')) : ?>
  <div>
    <?php if ($params->get('name')) : {
		echo JText::sprintf( 'HINAME', $user->get('name') );
	} else : {
		echo JText::sprintf( 'HINAME', $user->get('username') );
	} endif; ?>
  </div>
  <?php endif; ?>
     <div class="cb h_5"></div>
  <div class="line_dotted_100"></div>

  <table class="table_menu" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
    <td>
    <img class="menu_image" border="0" alt="Thông tin tài khoản" src="images/stories/user.png"/>
    <div class="menu_pages_left">
    <a class="mainlevel_left" href="index.php?option=com_user&view=user&layout=form">Cập nhật thông tin</a>
    </div>
    </td>
    </tr>
    <tr>
    <td>
    <img class="menu_image" border="0" alt="Danh sách các đơn hàng" src="images/stories/orders.png"/>
    <div class="menu_pages_left">
    <a class="mainlevel_left" href="index.php?option=com_ecommerce&view=orders">Danh sách các đơn hàng</a>
    </div>
    </td>
    </tr>
    </tbody>
    </table>
    <div class="cb h_5"></div>
  <div align="center" style="text-align:right">
    <input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'BUTTON_LOGOUT'); ?>" />
  </div>
  <input type="hidden" name="option" value="com_user" />
  <input type="hidden" name="task" value="logout" />
  <input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else : ?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
<?php JHTML::_('script', 'openid'); ?>
<?php endif; ?>
<script language="javascript">
function checklogin(){
	if($('username').value==''){
		alert('Vui lòng nhập tên đăng nhập');
		return false;
	}
	if($('passwd').value==''){
		alert('Vui lòng nhập mật khẩu');
		return false;
	}
	return true;
}
</script>
<form action="index.php" method="post" name="form-login" id="form-login"  onsubmit="checklogin()" style="margin:0; padding:0;">
  <span class="label"><?php echo JText::_('Username') ?></span>
  <input type="text" name="username" id="username" class="sign_in_box" >
    <span class="label"><?php echo JText::_('Password') ?></span>
<input type="password" name="passwd" id="passwd" class="sign_in_box" />


  <div class="t_r">
  <input type="submit" value="" id="dang_nhap" class="sign_in_button" name="dang_nhap">
   
  </div>

 

  <input type="hidden" name="option" value="com_user" />
  <input type="hidden" name="task" value="login" />
  <input type="hidden" name="return" value="<?php echo $return; ?>" />
  <?php echo JHTML::_( 'form.token' ); ?>
</form>
 <p class="sign_in_other">»&nbsp;<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=register' ); ?>"><?php echo JText::_('REGISTER'); ?> </a></p>
  <p class="sign_in_other">»&nbsp;<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>"><?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a></p>
<?php endif; ?>