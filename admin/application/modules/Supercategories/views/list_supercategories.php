<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Supercategories'); ?>">Sub Sub Category List</a></li>

</ul>
<!-- END BREADCRUMB -->

<div class="panel panel-default">
    <!-- START HEADER SCETION -->
    <div class="panel-heading">
        <h3 class="panel-title">Sub Sub Category List</h3>
        <div class="btn-group pull-right" style="margin-right: 2%;">
            <button class="btn btn-danger" onClick="ischeckbox()"><i class="fa fa-trash-o"></i> Remove </button>
        </div>
        <div class="btn-group pull-right" style="margin-right: 2%;">
            <a href="<?php echo site_url('Supercategories/add_supercategories');?>">
                <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Sub Sub Category</button>
            </a>
        </div>
    </div>
    <!-- END HEADER SCETION -->
    <div class="panel-body">
        <form id="form1" method="post" action="<?php echo site_url("Supercategories/multi_cat_del");?>">
            <table id="customers2" class="table datatable">
                <thead>
                    <tr>
                        <th style="padding: 0;">
                            <label class="check">
                                <input type="checkbox" name="check_all" id="selectall" class="" />
                            </label>
                        </th>
                        <th>S.No</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Sub Category Name</th>
                        <th>Sub Sub Category Description</th>
                        <th>Sub Sub Category Img</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
					if($sup_cat_fatch){
					    foreach($sup_cat_fatch as $key=>$Sup_category_lists){  ?>
				                   
                        <tr>
                            <td style="padding: 0;">
                                <label class="check">
                                    <input type="checkbox" name="checklist[]" value="<?php echo $Sup_category_lists->super_catid; ?>" class="checkbox1" />
                                </label>
                            </td>
                            <td>
                                <?php echo $key+1; ?>
                            </td>
                           <td>
                                <?php echo $Sup_category_lists->cat_name; ?>
                            </td>
                            <td>
                                <?php echo $Sup_category_lists->subcat_name; ?>
                            </td>
                            <td>
                                <?php echo $Sup_category_lists->supercat_name; ?>
                            </td>
                             <td>
                                <?php echo $Sup_category_lists->description; ?>
                            </td>
                             <td><img src="<?php echo site_url('webroot/uploads/super_cat').'/'.$Sup_category_lists->cat_image;?>" alt="Smiley face" height="42" width="42" /></td>
                            <td>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <label class="switch">
                                            <input type="checkbox" onClick='confirm_del("<?php echo $Sup_category_lists->super_catid;?>")' name="maintain_ration" class="maintain_ration" <?php if($Sup_category_lists->status =="active"){ echo "checked"; } else { } ?> value="
                                            <?php echo $Sup_category_lists->status ;?>"/>
                                                <span></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                             <?php $id=encode_url($Sup_category_lists->super_catid);?>
                                    <a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url("Supercategories/edit_supercategories/$id");?>"><span class="fa fa-pencil"></span></a>
                                    <a class="btn btn-danger btn-rounded btn-sm" onClick='confirm_delete("<?php echo encode_url($Sup_category_lists->super_catid);?>")'><span class="fa fa-times"></span></a>
                            </td>
                        </tr>
                        <?php  } }   ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- END DATATABLE EXPORT -->

<script>
    var id = "";

    function confirm_delete(getid) {

        id = getid;
        var box = $("#mb-remove-row-single");
        box.addClass("open");
    }

    function delete_single() {

        window.location.href = "<?php echo site_url('Supercategories/delet_supercategories');?>/" + id;
    }
</script>

<script>
    var ids = "";

    function confirm_del(getid) {
        id = getid;
        var box = $("#mb-remove-dec");
        box.addClass("open");

    }

    function Deactive_category() {
        window.location.href = "<?php echo site_url('Supercategories/supercategories_act_inactive');?>/" + id;
    }
	function page_refresh() {
        window.location.reload();
    }
</script>
<!-- START MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Removes <strong>Data</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to remove selected row?</p>
                <p>Press Yes if you sure.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes" onClick="continue_delete()">Yes</button>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!--START MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row-single">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to remove this row?</p>
                <p>Press Yes if you sure.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes" onClick="delete_single()">Yes</button>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-dec">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span>Change Status
                <strong> Category </strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to Change Status Category ?</p>
                <p>Press Yes if you sure.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes" onClick="Deactive_category()">Yes</button>
                    <button class="btn btn-default btn-lg mb-control-close"onClick="page_refresh()">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->