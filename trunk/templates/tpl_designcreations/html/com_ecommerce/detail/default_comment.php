<div class="tab_left_1"></div>
<div class="tab_bg_cennter">Nhận xét sản phẩm " <?php echo $this->detail->name; ?> "</div>
<div class="cb "></div>

<!--************************************************-->

<div class="box_bd_bg">
				<div class="cb h_10"></div>
				<div class="margin_news">
				 <?php 
					$i = 0;
					if(empty($this->topics)){
						echo "Không có bình luận nào";
					} else {
					 $n =  count($this->topics);
					 for($i=$n-1;$i>=0;$i--){
					 	$topic = $this->topics[$i]; ?>
							 <div class="pro_comment"><font class="pro_name_more"><?php echo $topic->username; ?></font><font class="date_comment"></font><br /><?php echo $topic->content ?> 
							   </div>
						 	  <div class="cb h_10"></div>
							<div class="line_comment"></div>
					 	 <?php 
				 		}
					}

					$user = & JFactory::getUser();
					$type = (!$user->get('guest')) ? 'logged' : 'guest';
					if($type=='logged')
					{	$dis=""; $mess="";}
					else
					{
						$dis= "disabled=\"disabled\"";
						$mess="* Vui lòng đăng nhập để viết bài ...";
					}
?>
					<div class="cb h_10"></div>
					<form action="index.php" method="post" onsubmit="check()">
					<input type="hidden" name="option" value="com_ecommerce" />
                    <input type="hidden" name="view" value="detail" />
                    <div style=" color:#0066FF; font-style:italic; "><?php echo $mess;?> </div>
					<div class="cb h_10"></div>
					<div class="nd_comment"><textarea <?php echo $dis; ?> name="nd_comment"  onfocus="if(this.value == 'Nội dung bình luận ...') this.value='';" onblur="if(this.value == '') this.value='Nội dung bình luận ...';" style="width:400px; border:1px solid #b3b3b3;" rows="4" cols="1">Nội dung bình luận ...</textarea></div>
					<div class="cb h_10"></div>
					<div><input <?php echo $dis; ?> type="image" src="images/butt_comment.jpg" width="95" height="24" alt="" /></div>
                     <input type="hidden" name="id" value="<?php echo $this->detail->id;?>">
                      <input type="hidden" name="catid" value="<?php echo $this->detail->category_id;?>">
                    </form>
					<div class="cb"></div>
				</div>
			</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>