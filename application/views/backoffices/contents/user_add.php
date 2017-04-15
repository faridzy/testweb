<?php
$optCountry = '';
foreach ($listCountry as $country){
  if (set_value('country') == $country){
    $selected = 'selected';
  }else{
    $selected = '';
  }
  $optCountry .= '<option '.$selected.'>'.$country.'</option>';
}


$optRole = '';
foreach ($listRole as $role) {
  if (set_value('role_id') == $role->role_id){
    $selected = 'selected';
  }else{
    $selected = '';
  }
  $optRole .= '<option value="'.$role->role_id.'" '.$selected.'>'.$role->name.'</option>';
}

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
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
        Add User</h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Add User
        </li>
     </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
<div class="col-md-12">
  <?php echo $message;?>
</div>
  <form action="<?php echo base_url().'admin/user/add';?> " method='post' >
    <div class="col-lg-6">
      <div class="form-group">
        <label><?php echo _('Username') ?></label>
        <input type="text" value="<?php echo set_value('username'); ?>" class="form-control" name="username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" value="<?php echo set_value('email'); ?>" class="form-control" name="email" placeholder="enter email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="enter password">
      </div>
     <div class="form-group">
        <label>Ulangi Password</label>
        <input type="password" class="form-control" name="retype-pass" placeholder="Retype Password">
      </div>
      <div class="form-group">
        <label>Nama depan</label>
        <input type="text" value="<?php echo set_value('firstname'); ?>" class="form-control" name="firstname" placeholder="enter First name">
      </div>
      <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text" value="<?php echo set_value('lastname'); ?>" class="form-control" name="lastname" placeholder="enter Last name">
      </div>
      <div class="form-group">
        <label>Tanggal lahir</label>
        <div class='input-group date'>
          <input type='date' value="<?php echo set_value('birthday'); ?>" name="birthday" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label>Jenis kelamin</label>
        <select class="form-control" name="gender">
          <option value="L" <?php echo (set_value('gender') == 'L')? 'selected' : '' ;?>><?php echo gender('L'); ?></option>
          <option value="P" <?php echo (set_value('gender') == 'P')? 'selected' : '' ;?>><?php echo gender('P'); ?></option>
        </select>
      </div>
      <div class="form-group">
        <label>Negara</label>
        <select name="country" class="form-control">
          <?php echo $optCountry; ?>
        </select>
      </div> 
    </div>
    <div class="col-lg-6">
      <div class="form-group">
          <label>Kota</label>
          <input type="text" value="<?php echo set_value('city'); ?>" class="form-control" name="city" placeholder="enter City">
      </div>
      <div class="form-group">
            <label>Handphone</label>
            <input type="text" value="<?php echo set_value('phone'); ?>" name="phone" class="form-control">
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" value="<?php echo set_value('address'); ?>" name="address" class="form-control">
      </div>
      <div class="form-group">
        <label>Role</label>
        <select class="form-control" name="role_id">
          <?php echo $optRole;?>
        </select>
      </div>
      <div class="form-group">
        <label>Status Staf</label>
        <select class="form-control" name="status">
          <option value="0" <?php echo (set_value('status') == '0')? 'selected' : '' ;?>><?php echo statusStaff('0') ;?></option>
          <option value="1" <?php echo (set_value('status') == '1')? 'selected' : '' ;?>><?php echo statusStaff('1') ;?></option>
          <option value="2" <?php echo (set_value('status') == '2')? 'selected' : '' ;?>><?php echo statusStaff('2') ;?></option>
        </select>
      </div>
      <div class="form-group">
        <label>Avatar</label>
        <div class="wcifx-upload dropzone <?php echo $hdnDz ;?>" data-url="user/upload" data-name="avatar"></div>
        <?php echo $imgBox ;?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
      </div>
    </div>
  <?php csrfToken($this); ?>
  </form>
</div>