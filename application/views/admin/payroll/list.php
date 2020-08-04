
<div class="card card-box">
    <div class="card-heading">
        <h4>Search Payslip</h4>
    </div>
    <hr>
        <?php echo form_open(site_url('admin/payroll/list')); ?>
    
    <div class="row">
        
        <div class="col-md-offset-2 col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;">
                    Month
                </label>
                <select name="month" class="form-control ">
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
                        
                        <option value="<?php echo $i; ?>" <?php if ($i == $month) {
                        	echo "selected";
                        } ?>>
                                <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
             </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;">
                    Year
                </label>
                <select name="year" class="form-control">
                    <?php
                    $year_list = array("2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026");
                    foreach($year_list as $row) { ?>
                        <option value="<?php echo $row; ?>" <?php if ($row == $year) {
                        	echo "selected";
                        } ?>>
                                <?php echo $row; ?>
                        </option>
                    <?php } ?>
                </select>
             </div>
        </div>

        <div class="col-md-2" style="margin-top: 25px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">Search</button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="card card-box">
	<div class="table-responsive">
        <table class="table table-centered table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	<?php $i =1; foreach ($payroll as $payroll):
	                if ($payroll['month'] == 1)
	                    $m = ucwords('january');
	                else if ($payroll['month'] == 2)
	                    $m = ucwords('february');
	                else if ($payroll['month'] == 3)
	                    $m = ucwords('march');
	                else if ($payroll['month'] == 4)
	                    $m = ucwords('april');
	                else if ($payroll['month'] == 5)
	                    $m = ucwords('may');
	                else if ($payroll['month'] == 6)
	                    $m = ucwords('june');
	                else if ($payroll['month'] == 7)
	                    $m = ucwords('july');
	                else if ($payroll['month'] == 8)
	                    $m = ucwords('august');
	                else if ($payroll['month'] == 9)
	                    $m = ucwords('september');
	                else if ($payroll['month'] == 10)
	                    $m = ucwords('october');
	                else if ($payroll['month'] == 11)
	                    $m = ucwords('november');
	                else if ($payroll['month'] == 12)
	                    $m = ucwords('december');
	                
            	 ?>
            		<tr>
            			<td><?php echo $i; ?></td>
            			<td><?php echo $payroll['employee'] ?></td>
            			<td><?php echo $payroll['total'] ?></td>
            			<td><?php echo $m ?> - <?php echo $payroll['year'] ?></td>
            			<td><?php if ($payroll['status'] == 1) {
            				echo "<span class='badge bg-soft-success text-success'><i class='mdi mdi-coin'></i>Paid</span>";
            			}else{
            				echo "<span class='badge bg-soft-warning text-warning'> <i class='mdi mdi-timer-sand'></i>Unpaid</span>";
            			} ?></td>
            			<td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
            		</tr>
            	<?php $i++;endforeach ?>
            </tbody>
        </table>
    </div>
</div>