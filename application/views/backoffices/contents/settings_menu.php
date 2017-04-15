<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Menu</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i>Menu
            </li>
         </ol>
    </div>
</div>
<a href="<?php echo $adminUrl.'/settings/menu-add';?>" class="add-new btn btn-primary">Add new</a>
<table class="wcifx-datatable table table-bordered" data-controller='settings' data-method='menu-datatable' >
<thead>
    <tr>
        <th>ID</th>
        <th>Nama Menu</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
</tbody>
</table>