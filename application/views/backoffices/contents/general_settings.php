<div class="page-header">
	<h2>General Setting</h2>
</div>
<?php echo $message ;?>
<div class="general-setting">
<form method="post" action="">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#general">General</a></li>
		<li><a data-toggle="tab" href="#page">Page</a></li>
		<li><a data-toggle="tab" href="#sosmed">Social Media</a></li>
		<li><a data-toggle="tab" href="#widget">Widgets</a></li>
		<li><a data-toggle="tab" href="#button">Button</a></li>
		<li><button type="submit" name="submit" value="submit" class="btn btn-primary">Save Settings</button></li>
	</ul>
	<div class="tab-content">
		<div id="general" class="tab-pane fade in active">
			<div class="form-horisontal tab-general">				
				<div class="form-group">
					<label>Phone</label>
					<input type="text" value="<?php echo ($phone !='')? $phone : '' ;?>" name="phone" placeholder="Enter Phone" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" value="<?php echo ($email !='')? $email : '' ;?>" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<label>Google Play</label>
					<input type="text" value="<?php echo ($link_gplay !='')? $link_gplay : '' ;?>" name="link_gplay" placeholder="Enter Google Play" class="form-control">	
				</div>
				<div class="form-group">
					<label>App Store</label>
					<input type="text" value="<?php echo ($link_appsstore !='')? $link_appsstore : '' ;?>" name="link_appsstore" placeholder="Enter App Store" class="form-control">	
				</div>			
			</div>
		</div>
		<div id="page" class="tab-pane fade">
			<div class="page-setting">
			<h3>Page Settings</h3>
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#homepage">Home</a></li>
					<li><a data-toggle="tab" href="#about">About</a></li>
					<li><a data-toggle="tab" href="#bussines">Bussiness</a></li>
					<li><a data-toggle="tab" href="#contest">Contest</a></li>
					<!-- <li><a data-toggle="tab" href="#generate-password">Generate Password</a></li> -->
					<!-- <li><a data-toggle="tab" href="#lost-password">Lost Password</a></li> -->
					<li><a data-toggle="tab" href="#investment-program-01">Investment Program 01</a></li>
					<li><a data-toggle="tab" href="#investment-program-02">Investment Program 02</a></li>
					<li><a data-toggle="tab" href="#partnership">Partnership</a></li>
					<li><a data-toggle="tab" href="#trading-demo-account">Demo Account</a></li>
					<li><a data-toggle="tab" href="#trading-real-account">Real Account</a></li>
					<li><a data-toggle="tab" href="#trading-platforms">Trading Platforms</a></li>
					<!-- <li><a data-toggle="tab" href="#default">Default Page</a></li> -->
				</ul>
				<div class="tab-content">
					<div id="homepage" class="tab-pane fade in active">
						<h3>Homepage</h3>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>Parallax Body Home Page</label>
								<?php
									if ($parallax_body_homepage != null){
										$hidden  = 'hidden';
										$avatar  = myAvatar($parallax_body_homepage, 'parallax_body_homepage', 'large');
									}else{
										$hidden = '';
										$avatar = '';
									}
								?>
								<div class="wcifx-upload dropzone dz-clickable <?php echo $hidden ;?>" data-name="parallax_body_homepage" data-url="web-content/upload" is-large="1">
								</div>
								<?php echo $avatar ;?>
							</div>
							<div class="form-group">
								<label>Content Homepage</label>
								<select name="homepage_content" class="form-control">
								<?php						
									foreach ($listPage as $val) {
										$slctd = ($homepage_content == $val->post_id)? 'selected' : '';
										echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
									}
								?>						
								</select>
							</div>
							<div class="form-group">
								<label>Link Copy Trade</label>
								<select name="link_copy_trade" class="form-control">
								<?php						
									foreach ($listPage as $val) {
										$slctd = ($link_copy_trade == $val->post_id)? 'selected' : '';
										echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
									}
								?>
								</select>								
							</div>
							<div class="form-group">
								<label>Link Investment</label>
								<select name="link_investment" class="form-control">
								<?php						
									foreach ($listPage as $val) {
										$slctd = ($link_investment == $val->post_id)? 'selected' : '';
										echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
									}
								?>
								</select>								
							</div>
							<div class="form-group">
								<label>Link Contest</label>
								<select name="link_contest" class="form-control">
								<?php						
									foreach ($listPage as $val) {
										$slctd = ($link_contest == $val->post_id)? 'selected' : '';
										echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
									}
								?>
								</select>
							</div>
							<div class="form-group">
								<label>Link About WCIFX</label>
								<select name="link_about" class="form-control">
								<?php						
									foreach ($listPage as $val) {
										$slctd = ($link_about == $val->post_id)? 'selected' : '';
										echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
									}
								?>
								</select>
							</div>
						</div>
					</div>
					<div id="about" class="tab-pane fade">
						<h3>About</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>More About Description</label><br>
								<?php
								wcifxInput('editor', 'more_about', ($more_about !='')? $more_about : '',['class' => 'form-control']);
								?>
							</div>
						</div>
					</div>
					<div id="bussines" class="tab-pane fade">
						<h3>Bussines Page</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<h4>Participants of the Forex Market</h4>
							<div class="form-group">
								<label>Title</label>
								<?php
								wcifxInput('text', 'title_participants_forex', ($title_participants_forex !='')? $title_participants_forex : '', ['class' => 'form-control']);
								?>

								<label>Participants</label>
								<?php
								wcifxInput('textarea', 'participants_forex', ($participants_forex !='')? $participants_forex : '', ['class' => 'form-control']);
								?>
							</div>

							<h4>How do transactions on the forex take place ?</h4>
							<div class="form-group">
								<label>Title</label>
								<?php
								wcifxInput('text', 'title_how_do_transactions', ($title_how_do_transactions !='')? $title_how_do_transactions : '', ['class' => 'form-control']);
								?>

								<label>How do ?</label>
								<?php
								wcifxInput('textarea', 'how_do_transactions', ($how_do_transactions !='')? $how_do_transactions : '', ['class' => 'form-control']);
								?>
							</div>
						</div>
					</div>
					<div id="contest" class="tab-pane fade">
						<h3>Tab Contest Page</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>Parallax Body Contest Page</label>
								<?php
									if ($parallax_body_contest != null){
										$hidden  = 'hidden';
										$avatar  = myAvatar($parallax_body_contest, 'parallax_body_contest', 'large');
									}else{
										$hidden = '';
										$avatar = '';
									}
								?>
								<div class="wcifx-upload dropzone dz-clickable <?php echo $hidden ;?>" data-name="parallax_body_contest" data-url="web-content/upload" is-large="1">
								</div>
								<?php echo $avatar ;?>
							</div>
							<div class="form-group">
								<label>About Forex Contest</label>
								<?php 
									wcifxInput('editor', 'cnts_about', ($cnts_about != '')?$cnts_about : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>How To Take Part in Contests ?</label>
								<?php
									wcifxInput('editor', 'cnts_how_to', ($cnts_how_to !='')?$cnts_how_to : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Real Price for Virtual Account</label>
								<?php 
									wcifxInput('editor', 'cnts_real_price', ($cnts_real_price != '')?$cnts_real_price : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Term Of Participation</label>
								<?php 
									wcifxInput('editor', 'cnts_term_part', ($cnts_term_part != '')?$cnts_term_part : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Beginning and end of the contest</label>
								<?php 
									wcifxInput('editor', 'cnts_begin_end', ($cnts_begin_end != '')?$cnts_begin_end : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Term of trading</label>
								<?php 
									wcifxInput('textarea', 'cnts_term_trade', ($cnts_term_trade != '')?$cnts_term_trade : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Not allowed on Contest</label>
								<?php 
									wcifxInput('textarea', 'cnts_not_allow', ($cnts_not_allow != '')?$cnts_not_allow : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Define a winner</label>
								<?php 
									wcifxInput('textarea', 'cnts_define_win', ($cnts_define_win != '')?$cnts_define_win : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Prize fund</label>
								<?php 
									wcifxInput('editor', 'cnts_prize_fund', ($cnts_prize_fund != '')?$cnts_prize_fund : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Disputes and complaints</label>
								<?php 
									wcifxInput('editor', 'cnts_complaint', ($cnts_complaint != '')?$cnts_complaint : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Receive the prize</label>
								<?php 
									wcifxInput('editor', 'cnts_receive_prize', ($cnts_receive_prize != '')?$cnts_receive_prize : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>miscellaneous</label>
								<?php 
									wcifxInput('editor', 'cnts_miscellaneous', ($cnts_miscellaneous != '')?$cnts_miscellaneous : '', ['class' => 'form-control']);
								?>
							</div>				
						</div>
					</div>
					<div id="investment-program-01" class="tab-pane fade">
						<h3>Investment Program 01</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>Benefits</label>								
								<?php 
									wcifxInput('textarea', 'benefits_investment', ($benefits_investment != '')?$benefits_investment : '', ['class' => 'form-control']);
								?>
							</div>
						</div>
					</div>
					<div id="investment-program-02" class="tab-pane fade">
						<h3>Investment Program 02</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<label>Blala</label>
						</div>
					</div>
					<div id="partnership" class="tab-pane fade">
						<h3>Pertnership</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<label>Bolo bolo</label>
						</div>
					</div>
					<div id="trading-demo-account" class="tab-pane fade">
						<h3>Demo Account Page</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>Detail Demo Account</label>
								<?php
									wcifxInput('textarea', 'detail_demo_account', ($detail_demo_account !='')?$detail_demo_account : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Information Demo Account</label>
								<?php
									wcifxInput('editor', 'info_demo_account', ($info_demo_account !='')?$info_demo_account : '', ['class' => 'form-control']);
								?>
							</div>
						</div>
					</div>
					<div id="trading-real-account" class="tab-pane fade">
						<h3>Real Account Page</h3>
						<?php wcifxLangSelect(); ?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
								<label>Detail Real Account</label>
								<?php
									wcifxInput('textarea', 'detail_real_account', ($detail_real_account !='')?$detail_real_account : '', ['class' => 'form-control']);
								?>
							</div>
							<div class="form-group">
								<label>Information Real Account</label>
								<?php
									wcifxInput('editor', 'info_real_account', ($info_real_account !='')?$info_real_account : '', ['class' => 'form-control']);
								?>
							</div>
						</div>
					</div>
					<div id="trading-platforms" class="tab-pane fade">
						<h3>Trading Platforms Page</h3>
						<?php wcifxLangSelect() ;?>
						<div class="form-horisontal tab-general">
							<div class="form-group">
							<label>Parallax for Android Platforms</label>
								<?php
									if ($parallax_android_platforms != null){
										$hidden  = 'hidden';
										$avatar  = myAvatar($parallax_android_platforms, 'parallax_android_platforms' , 'large');
									}else{
										$hidden = '';
										$avatar = '';
									}
								?>
								<div class="wcifx-upload dropzone dz-clickable <?php echo $hidden ;?>" data-name="parallax_android_platforms" data-url="web-content/upload" is-large="1">
								</div>
								<?php echo $avatar ;?>
							</div>
							<div class="form-group">
							<label>Parallax for Iphone Platforms</label>
								<?php
									if ($parallax_iphone_platforms != null){
										$hidden  = 'hidden';
										$avatar  = myAvatar($parallax_iphone_platforms, 'parallax_iphone_platforms' , 'large');
									}else{
										$hidden = '';
										$avatar = '';
									}
								?>
								<div class="wcifx-upload dropzone dz-clickable <?php echo $hidden ;?>" data-name="parallax_iphone_platforms" data-url="web-content/upload" is-large="1">
								</div>
								<?php echo $avatar ;?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="sosmed" class="tab-pane fade">
			<div class="form-horisontal tab-general">
				<div class="form-group">
					<label>Facebook</label>
					<input type="text" value="<?php echo ($link_facebook !='')? $link_facebook : '' ;?>" name="link_facebook" class="form-control" placeholder="Facebook">
				</div>
				<div class="form-group">
					<label>Twitter</label>
					<input type="text" value="<?php echo ($link_twitter !='')? $link_twitter : '' ;?>" name="link_twitter" class="form-control" placeholder="Twitter">
				</div>
				<div class="form-group">
					<label>Youtube</label>
					<input type="text" value="<?php echo ($link_youtube !='')? $link_youtube : '' ;?>" name="link_youtube" class="form-control" placeholder="Youtube">
				</div>
				<div class="form-group">
					<label>Linkedin</label>
					<input type="text" value="<?php echo ($link_linkedin !='')? $link_linkedin : '' ;?>" name="link_linkedin" class="form-control" placeholder="Linkedin">
				</div>
				<div class="form-group">
					<label>Pinterest</label>
					<input type="text" value="<?php echo ($link_pinterest !='')? $link_pinterest : '' ;?>" name="link_pinterest" class="form-control" placeholder="Pinterest">
				</div>
				<div class="form-group">
					<label>Instagram</label>
					<input type="text" value="<?php echo ($link_instagram !='')? $link_instagram : '' ;?>" name="link_instagram" class="form-control" placeholder="Instagram">
				</div>
				<div class="form-group">
					<label>Google+</label>
					<input type="text" value="<?php echo ($link_gplus !='')? $link_gplus : '' ;?>" name="link_gplus" class="form-control" placeholder="Google+">
				</div>
				<div class="form-group">
					<label>Wordpress</label>
					<input type="text" value="<?php echo ($link_wp !='')? $link_wp : '' ;?>" name="link_wp" class="form-control" placeholder="Wordpress">
				</div>				
			</div>
		</div>		
		<div id="widget" class="tab-pane fade">
			<h3>Widgets</h3>
			<div class="form-horisontal tab-general">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#Quality-Real">Qulity &amp; Reliability</a></li>
					<li><a data-toggle="tab" href="#admin-contact" >Admin Contact</a></li>
				</ul>
				<div class="tab-content">
					<div id="Quality-Real" class="tab-pane fade in active">
						<div class="form-group">
							<label>Quality Box</label>
							<textarea name="quality" class="form-control"><?php echo ($quality != '')? $quality : '' ;?></textarea>
						</div>
						<div class="form-group">
							<label>Reliability Box</label>
							<textarea name="reliability" class="form-control"><?php echo ($reliability != '')? $reliability : '' ;?></textarea>
						</div>						
					</div>
					<div id="admin-contact" class="tab-pane fade">
						<div class="form-group general">
							<label>General Question</label>
							<div class="form-group">
								<label>Email</label>
								<input type="text" value="<?php echo ($general_email !='')?$general_email : '' ;?>" name="general_email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group phone">
								<label>Phone</label>
								<input type="text" value="<?php echo ($general_phone !='')?$general_phone : '' ;?>" name="general_phone" class="form-control" placeholder="Phone">
							</div>
						</div>
						<div class="form-group technical">
							<label>Technical Question</label>
							<div class="form-group">
								<label>Email</label>
								<input type="text" value="<?php echo ($technical_email !='')?$technical_email : '' ;?>" name="technical_email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" value="<?php echo ($technical_phone !='')?$technical_phone : '' ;?>" name="technical_phone" class="form-control" placeholder="Phone">
							</div>
						</div>
						<div class="form-group financial">
							<label>Financial Question</label>
							<div class="form-group">
								<label>Email</label>
								<input type="text" value="<?php echo ($financial_email !='')?$financial_email : '' ;?>" name="financial_email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" value="<?php echo ($financial_phone !='')?$financial_phone : '' ;?>" name="financial_phone" class="form-control" placeholder="Phone">
							</div>
						</div>
						<div class="form-group partnership">
							<label>Partnership</label>
							<div class="form-group">
								<label>Email</label>
								<input type="text" value="<?php echo ($partnership_email !='')?$partnership_email : '' ;?>" name="partnership_email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" value="<?php echo ($partnership_phone !='')?$partnership_phone : '' ;?>" name="partnership_phone" class="form-control" placeholder="Phone">
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div id="button" class="tab-pane fade">
			<h3>Button</h3>
			<div class="form-horisontal tab-general">
				<div class="form-group">
					<label>Term of trading</label>
					<select class="form-control" name="term_of_trading">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($term_of_trading == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Payment of solution</label>
					<select class="form-control" name="payment_of_solution">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($payment_of_solution == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Investment</label>
					<select class="form-control" name="investment">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($investment == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Partnership program</label>
					<select class="form-control" name="partnership_program">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($partnership_program == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Demo account</label>
					<select class="form-control" name="demo_account">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($demo_account == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Real account</label>
					<select class="form-control" name="real_account">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($real_account == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Trading instrument </label>
					<select class="form-control" name="trading_instrument">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($trading_instrument == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Payment method</label>
					<select class="form-control" name="payment_method">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($payment_method == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Investment program 1</label>
					<select class="form-control" name="investment_program_1">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($investment_program_1 == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>	
				</div>
				<div class="form-group">
					<label>Investment program 2</label>
					<select class="form-control" name="investment_program_2">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($investment_program_2 == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>	
				</div>
				<div class="form-group">
					<label>Register</label>
					<select class="form-control" name="register">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($register == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>	
				</div>
				<div class="form-group">
					<label>Signal provider </label>
					<select class="form-control" name="signal_provider">
					<?php						
						foreach ($listPage as $val) {
							$slctd = ($signal_provider == $val->post_id)? 'selected' : '';
							echo '<option value="'.$val->post_id.'" '.$slctd.'>'.translate($this, $val->title).'</option>';
						}
					?>
					</select>	
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
