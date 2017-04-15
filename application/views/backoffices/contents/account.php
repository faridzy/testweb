<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
        User</h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i>User
        </li>
     </ol>
    </div>
</div>
<a href="<?php echo site_url('admin/user/add');?>" class="add-new btn btn-primary">Add new</a>
<?php echo $message ;?>
<table class="wcifx-datatable table table-bordered" data-controller='user' data-method='datatable' >
<thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
</tbody>
</table>