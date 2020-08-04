
<div class="row">
	<div class="col-md-2">
            	<?php foreach ($applicationsstatus as $applicationsstatus): ?>
                		<?php 
                		if ($this->uri->segment(4) == $applicationsstatus['id']) {
                			$text = "text-danger";
                		}else{
                			$text = "";
                		}
                		echo anchor('Admin/application/list/'.$applicationsstatus['id'],$applicationsstatus['name'],'class="list-group-item '.$text.' border-0 font-weight-bold"') ?>
                	<?php endforeach ?>
            </div>
            <div class="col-md-10 card-box">
            	<table class="table table-bordered table-stripped responsive-table">
            		<thead>
            			<tr>
            				<th>No</th>
            				<th>Name</th>
            				<th>Vacancy</th>
            				<th>Apply Date</th>
            				<th><center><i class="mdi mdi-settings"></i></center></th>
            			</tr>
            		</thead>
            		<tbody>
                    <?php $i =1;foreach ($applications as $applications): ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $applications['employee']; ?></td>
                            <td><?php echo $applications['vacancy']; ?></td>
                            <td><?php echo $applications['apply_date']; ?></td>
                        </tr> 
                    <?php $i++;endforeach ?>      
                    </tbody>
            	</table>
            </div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<?php echo anchor('Admin/vacancy/','Back','class="btn btn-success"') ?>
	</div>
</div>
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Content is Responsive</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name"  readonly placeholder="John">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="vacancy" class="control-label">Vacancy</label>
                            <input type="text" class="form-control" id="vacancy" readonly  placeholder="John">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="apply_date" class="control-label">Apply Date</label>
                            <input type="date" class="form-control" id="apply_date" placeholder="Address">
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="apply_date" class="control-label">Status</label>
                            <select class="form-control" id="">
                            	<?php foreach ($statusapplications as $statusapplications): ?>
                            	<option value="<?php echo $applicationsstatus['id'] ?>"><?php echo $applicationsstatus['name'] ?></option>	
                            	<?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div>