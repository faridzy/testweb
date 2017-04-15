<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Menu add</h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <?php wcifxLangSelect(); ?>
        <div class="row">
            <div class="col-md-6 accord">
            <ul class="list-unstyled" class="form-item-menu">
                <li>
                    <a href="#" class="accordion top">Page</a>
                    <div class="panel">
                        <form class="form-parent">
                            <div class="form-group">
                                <label >Select Pages :</label>
                                <select class="form-control" name="object">
                                    <option value="">Select Page</option>
                                    <?php
                                    if($pages != null){
                                        $temp = '';
                                        foreach ($pages as $page) {
                                            $temp .= '<option value="'.$page->post_id.'">'.translate($this , $page->title).'</option>';
                                        }
                                        echo $temp;
                                    }
                                    ?>
                                </select>
                            </div>
                            <a href="#" class="btn btn-success item-add-page">Add Item</a>
                        </form>
                    </div>
                </li>
                <li>
                    <a href="#" class="accordion top">Custom Links</a>
                    <div class="panel">
                        <form class="form-parent">
                            <div class="form-group">
                                <label>Judul :</label>
                                <?php echo wcifxInput('text','item_title' , '' ,['class'=>'form-control']);?>
                            </div>
                            <div class="form-group">
                              <label>Link :</label>
                              <input type="text" name="object" class="form-control" placeholder="Link">
                            </div>
                            <button class="btn btn-default item-add-custom">Add Item</button>
                        </form>
                    </div>
                </li>
            </ul>
                
            </div>
            <div class="col-md-6" id="menu-list">
                <form method="post" class="form-parent">
                    <div class="form-group">
                        <label>Judul Menu</label>
                        <?php echo wcifxInput('text','menu_title' , ($data != null)?$data[0]->menu_title:'' ,['class'=>'form-control']);?>
                    </div>
                    <?php echo $formNested;?>
                   <input type="hidden" name="menu_data">
                   <input type="hidden" name="menu_id">
                   <input type="submit" id="btn-menu-save" name="submit" value="submit" class="hidden">
                   <a href="javascript:void(0)" class="btn btn-primary" id="save-menu">Save</a>
                </form>
            </div>
        </div>
    </div>
</div>
