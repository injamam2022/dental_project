<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li class="active">About Page</li>
</ul>
<!-- END BREADCRUMB -->

<?php
    $Aboutpagecontent = @unserialize($Aboutpagecontent_fatch[0]->description);
    if (! is_array($Aboutpagecontent)) {
        $Aboutpagecontent = array();
    }
    $ext = (isset($Aboutpagecontent[4]) && is_array($Aboutpagecontent[4])) ? $Aboutpagecontent[4] : array();
    $ext_patient_title = isset($ext['patient_title']) ? $ext['patient_title'] : '';
    $ext_h = (isset($ext['highlight']) && is_array($ext['highlight'])) ? $ext['highlight'] : array('', '', '');
    for ($__h = 0; $__h < 3; $__h++) {
        if (! isset($ext_h[$__h])) {
            $ext_h[$__h] = '';
        }
    }
    $ext_cases = (isset($ext['cases']) && is_array($ext['cases'])) ? $ext['cases'] : array();
    for ($__c = 0; $__c < 3; $__c++) {
        if (! isset($ext_cases[$__c]) || ! is_array($ext_cases[$__c])) {
            $ext_cases[$__c] = array('before' => '', 'after' => '');
        }
        if (! isset($ext_cases[$__c]['before'])) {
            $ext_cases[$__c]['before'] = '';
        }
        if (! isset($ext_cases[$__c]['after'])) {
            $ext_cases[$__c]['after'] = '';
        }
    }
    $ext_stats = (isset($ext['stats']) && is_array($ext['stats'])) ? $ext['stats'] : array();
    $ext_stat_defaults = array(
        array('value' => '', 'suffix' => '', 'label' => '', 'icon' => 'user'),
        array('value' => '', 'suffix' => '', 'label' => '', 'icon' => 'user'),
        array('value' => '', 'suffix' => '', 'label' => '', 'icon' => 'user'),
        array('value' => '', 'suffix' => '', 'label' => '', 'icon' => 'user'),
    );
    for ($__s = 0; $__s < 4; $__s++) {
        if (! isset($ext_stats[$__s]) || ! is_array($ext_stats[$__s])) {
            $ext_stats[$__s] = $ext_stat_defaults[$__s];
        }
        foreach (array('value', 'suffix', 'label', 'icon') as $__k) {
            if (! isset($ext_stats[$__s][$__k])) {
                $ext_stats[$__s][$__k] = '';
            }
        }
    }
    $ext_stats_bg = isset($ext['stats_bg']) ? $ext['stats_bg'] : '';
    $cur_status = isset($Aboutpagecontent_fatch[0]->status) ? $Aboutpagecontent_fatch[0]->status : 'active';
?>

<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>About page (public site)</strong></h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Aboutpagecontent');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">
                                    <p class="text-muted" style="margin-bottom:20px;">These fields control the About page: highlight copy, patient before/after cases, and success stats. Banner text for the hero comes from <strong>Banner</strong> (type About).</p>
                                   <form id="contentmanagement_home" class="form-horizontal" method="post" action="<?php echo site_url("Aboutpagecontent/update_data"); ?>">

                                    <input type="hidden" name="homepageContent_id" value="<?php echo $Aboutpagecontent_fatch[0]->id; ?>">

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Patient cases section title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_patient_title" class="form-control" value="<?php echo htmlspecialchars($ext_patient_title, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Patient Cases">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Highlight paragraph 1 (HTML)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="ext_highlight_1" class="form-control" rows="4"><?php echo htmlspecialchars($ext_h[0], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Highlight paragraph 2 (HTML)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="ext_highlight_2" class="form-control" rows="4"><?php echo htmlspecialchars($ext_h[1], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Highlight paragraph 3 (HTML)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="ext_highlight_3" class="form-control" rows="4"><?php echo htmlspecialchars($ext_h[2], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                    </div>

                                    <?php for ($cn = 1; $cn <= 3; $cn++) {
                                        $ci = $cn - 1;
                                        $cb = $ext_cases[$ci]['before'];
                                        $ca = $ext_cases[$ci]['after'];
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Case <?php echo $cn; ?> — before image URL</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_case<?php echo $cn; ?>_before" class="form-control" value="<?php echo htmlspecialchars($cb, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Case <?php echo $cn; ?> — after image URL</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_case<?php echo $cn; ?>_after" class="form-control" value="<?php echo htmlspecialchars($ca, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stats section background</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_stats_bg" class="form-control" value="<?php echo htmlspecialchars($ext_stats_bg, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Full URL or leave empty for default theme image">
                                        </div>
                                    </div>

                                    <?php for ($sn = 1; $sn <= 4; $sn++) {
                                        $si = $sn - 1;
                                        $st = $ext_stats[$si];
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stat <?php echo $sn; ?> — number</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_stat<?php echo $sn; ?>_value" class="form-control" value="<?php echo htmlspecialchars($st['value'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. 22">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stat <?php echo $sn; ?> — suffix</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_stat<?php echo $sn; ?>_suffix" class="form-control" value="<?php echo htmlspecialchars($st['suffix'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. K+ or +">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stat <?php echo $sn; ?> — label</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_stat<?php echo $sn; ?>_label" class="form-control" value="<?php echo htmlspecialchars($st['label'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Stat <?php echo $sn; ?> — Font Awesome icon</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="ext_stat<?php echo $sn; ?>_icon" class="form-control" value="<?php echo htmlspecialchars($st['icon'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="user, shield, hospital-o, laptop, …">
                                            <span class="help-block">Icon name only (no fa- prefix). Allowed: user, shield, hospital-o, laptop, stethoscope, user-md, smile-o, heart-o, heart, users, trophy, star, check, plus-square, medkit, ambulance.</span>
                                        </div>
                                    </div>
                                    <?php } ?>

									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" >
											  <option value="active" <?php echo ($cur_status === 'active') ? 'selected' : ''; ?>>Active</option>
											  <option value="inactivate" <?php echo ($cur_status === 'inactivate') ? 'selected' : ''; ?>>Inactivate</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('contentmanagement_home').reset();">Clear Form</button>
									<button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
							 </form>
                         </div>
                      </div>
                    </div>
                </div>
</div>
                <!-- END PAGE CONTENT WRAPPER -->
