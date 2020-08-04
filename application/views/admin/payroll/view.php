
<?php echo form_open(site_url('admin/payroll_selector')); ?>
    
<div class="card card-box">
    
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Departmenr</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    <option value="">Select department</option>
                    <?php
                    foreach($department as $row): ?>
                        <option value="<?php echo $row['id']; ?>"
                            <?php if($row['id'] == $department_id) echo 'selected'; ?>>
                                <?php echo $row['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Employee</label>
                <select name="employee_id" class="form-control" id="employee_holder" required>
                    <?php
                    foreach($employee as $row): ?>
                        <option value="<?php echo $row['id']; ?>"
                            <?php if($row['id'] == $employee_id) echo 'selected'; ?>>
                                <?php echo $row['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label">Month</label>
                <select name="month" class="form-control" required>
                    <option value="">Select Month</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++):
                        if ($i == 1)
                            $m = ucwords('january');
                        else if ($i == 2)
                            $m = ucwords('february');
                        else if ($i == 3)
                            $m = ucwords('march');
                        else if ($i == 4)
                            $m = ucwords('april');
                        else if ($i == 5)
                            $m = ucwords('may');
                        else if ($i == 6)
                            $m = ucwords('june');
                        else if ($i == 7)
                            $m = ucwords('july');
                        else if ($i == 8)
                            $m = ucwords('august');
                        else if ($i == 9)
                            $m = ucwords('september');
                        else if ($i == 10)
                            $m = ucwords('october');
                        else if ($i == 11)
                            $m = ucwords('november');
                        else if ($i == 12)
                            $m = ucwords('december'); ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $month) echo 'selected'; ?>>
                                <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo ucwords('year'); ?></label>
                <select name="year" class="form-control" required>
                    <option value="">Select year</option>
                    <?php
                    for($i = 2016; $i <= 2026; $i++): ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $year) echo 'selected'; ?>>
                                <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2" style="margin-top: 25px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">Submit</button>
        </div>

    </div>
</div>

<?php echo form_close(); ?>
<script type="text/javascript">
    
    $(document).on('change','#department_id',function(){
        var department_id = $(this).val();
        if(department_id != '')
            $.ajax({
                url     : '<?php echo site_url('Api/get_employees/'); ?>' + department_id,
                success : function(response)
                {
                    jQuery('#employee_holder').html(response);
                }
            });
        else
            jQuery('#employee_holder').html('<option value="">Select department first</option>');
    });

</script>