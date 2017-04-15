<?php
$optCountry = '';
foreach ($listCountry as $country){
  if ($userdata[0]->country == $country){
    $selected = 'selected';
  }else{
    $selected = '';
  }
  $optCountry .= '<option '.$selected.'>'.$country.'</option>';
}
$optRole = '';
foreach ($listRole as $role) {
  if ($userdata[0]->role_id == $role->role_id){
    $selected = 'selected';
  }else{
    $selected = '';
  }
  $optRole .= '<option value="'.$role->role_id.'" '.$selected.'>'.$role->name.'</option>';
}
?>
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
        Edit User</h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>Edit User
        </li>
     </ol>
    </div>
</div>
<div class="row">
<div class="col-md-12">
  <?php echo $message;?>
</div>
<form method='post'>
  <div class="col-lg-6">
    <div class="form-group">
      <label><?php echo _('Username') ?></label>
      <input type="text" value="<?php echo $userdata[0]->username; ?>" class="form-control" name="username" placeholder="Enter username">
    </div>

    <div class="form-group">
          <label>Email</label>
          <input type="text" value="<?php echo $userdata[0]->email ;?>" class="form-control" name="email" placeholder="enter email">
    </div>

    <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Kosongi Jika Tidak Diubah">
    </div>

    <div class="form-group">
          <label>Re-type Password</label>
          <input type="password" class="form-control" name="retype-pass" placeholder="Ulangi Password">
    </div>
    
    <div class="form-group">
          <label>Nama depan</label>
          <input type="text" value="<?php echo $userdata[0]->firstname ;?>" class="form-control" name="firstname" placeholder="enter First name">
    </div>
    
    <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text" value="<?php echo $userdata[0]->lastname ;?>" class="form-control" name="lastname" placeholder="enter Last name">
    </div>
    
    <div class="form-group">
      <label>Tanggal lahir</label>
      <div class='input-group date'>
          <input type='date' value="<?php echo $userdata[0]->birthday ;?>" name="birthday" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <label>Jenis kelamin</label>
      <select class="form-control" name="gender">
        <option <?php echo ($gender == 'L')? 'selected':'' ;?>><?php echo gender('L'); ?></option>
        <option <?php echo ($gender == 'P')? 'selected':'' ;?>><?php echo gender('P'); ?></option>
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
      <input type="text" value="<?php echo $userdata[0]->city ;?>" class="form-control" name="city" placeholder="enter City">
    </div>

    <div class="form-group">
      <label>Handphone</label>
      <input type="text" value="<?php echo $userdata[0]->phone ;?>" name="phone" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Address</label>
      <input type="text" value="<?php echo $userdata[0]->address ;?>" name="address" class="form-control">
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
            <option value="0" <?php echo ($status == '0')? 'selected' : '' ;?>><?php echo statusStaff('0') ;?></option>
            <option value="1" <?php echo ($status == '1')? 'selected' : '' ;?>><?php echo statusStaff('1') ;?></option>
            <option value="2" <?php echo ($status == '2')? 'selected' : '' ;?>><?php echo statusStaff('2') ;?></option>
      </select>
    </div>

    <div class="form-group">
      <label>Avatar</label>
      <div class="wcifx-upload dropzone hidden" data-url="user/upload" data-name="avatar"></div>
      <div class="avatar">
        <img src="<?php echo $img_path; ?>" alt="Avatar" class="img-avatar img-responsive">
        <button class="btn btn-primary btn-avatar del-img-dz">Remove Image</button>
        <input type="hidden" name="avatar" value="<?php echo $userdata[0]->avatar ;?>">
      </div>
    </div>

    <div class="form-group">      
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    </div>
  </div>
  <?php csrfToken($this); ?>
</form>
</div>