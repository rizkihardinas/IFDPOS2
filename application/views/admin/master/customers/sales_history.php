
<div class="row">
    <div class="col-md-6">
        <?php if ($this->session->flashdata('response')): ?>
        <div class="alert alert-<?php echo $this->session->flashdata('response') ?>" role="alert">
            <i class="mdi mdi-check-all mr-2"></i> <?php echo   $this->session->flashdata('messages') ?>
        </div>    
        <?php endif ?>
        
    </div>
    <div class="col-xl-12" id="data_supplier">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <?php echo form_open('Admin/customers/sales_history','class="form-inline"'); ?>
                            <div class="col-sm-3">
                                <label for="start_date" class="sr-only">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Search...">
                            </div>
                            <div class="col-sm-3">
                                <label for="end_date" class="sr-only">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Search...">
                            </div>
                            <div class="col-sm-3">
                                <input type="submit" name="submit" class="btn btn-success" value="Search">
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Transaction Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>