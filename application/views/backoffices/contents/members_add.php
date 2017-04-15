<?php
$imgBox = '';
$hdnDz  = '';
if(set_value('avatar') !=''){
  $hdnDz = 'hidden';
  $imgBox .= '<div class="avatar">';
    $imgBox .= '<img src="'.$img_path.'" alt="Avatar" class="img-avatar img-responsive">';
    $imgBox .= '<button class="btn btn-primary btn-avatar del-img-dz">Remove Image</button>';
    $imgBox .= '<input type="hidden" name="avatar" value="'.set_value('avatar').'">';
  $imgBox .= '</div>';
}
?>

<div class="add_member col-lg-12">
	<div class="page-header text-center">
		<h2>Add / Edit Member Form</h2>
	</div>
	<form action="" method="" class="form-horisontal">
		<div class="form-groub member"> 
			<div class="row">
			<div class="col-lg-6">
				<label class="label-avatar"><strong>Avatar</strong></label>
				<div class="avatar">
        			<div class="wcifx-upload dropzone <?php echo $hdnDz ;?>" data-url="members/upload_avatar" data-name="avatar">
        			</div>
        			<?php echo $imgBox ;?>
				</div>
				<label for="nickname" ><strong>Nick Name: </strong></label>
				<input type="text" name="nickname" placeholder="Enter Nick Name" class="form-control">
				<label for="email"><strong>Email : </strong></label>
				<input type="text" name="email" placeholder="Enter Email" class="form-control">
				<label for="pass"><strong>Password</strong></label>
				<input type="password" name="password" placeholder="Enter Password" class="form-control">
				<label for="re-pass"><strong>Repeat Password</strong></label>
				<input type="" name="" class="form-control" placeholder="Repeat Password">
				<label><strong>Name</strong></label>
					<input type="text" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="col-lg-6">
				<label><strong>Last Name</strong></label>
				<input type="text" class="form-control" name="last-name" placeholder="Last Name">
				<label><strong>Birtday</strong></label>
				<select class="form-control" id="birtday">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<label><strong>Gender</strong></label>
				<select class="form-control" id="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
				<label><strong>Country</strong></label>
				<select class="form-control" id="country">
					<option>Indonesia</option>
					<option>Malaysia</option>
				</select>
				<label><strong>City</strong></label>
				<input type="text" name="city" placeholder="Enter the City" class="form-control">
				<label><strong>Phone Number</strong></label>
				<input type="number" name="phone-number" placeholder="Phone" class="form-control">
				<label><strong>Status Member</strong></label>
				<select class="form-control" id="status-member">
					<option>Banned</option>
					<option>Verified</option>
					<option>Active</option>
				</select>
				<button class="btn btn-success btn-add-member">Register</button>
			</div>

			</div>
		</div>
	</form>
</div>