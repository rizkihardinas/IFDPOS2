
<div class="row ">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                <div id="progressbarwizard" style="background: #FFF">

                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                    <li class="nav-item">
                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span class="d-none d-sm-inline">Personal Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-face-profile mr-1"></i>
                            <span class="d-none d-sm-inline">Advance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#company" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-home-city mr-1"></i>
                            <span class="d-none d-sm-inline">Company</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#salary" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-currency-usd mr-1"></i>
                            <span class="d-none d-sm-inline">Salary</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bank" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-bank mr-1"></i>
                            <span class="d-none d-sm-inline">Bank Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#job_history" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-bank mr-1"></i>
                            <span class="d-none d-sm-inline">Job History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                            <span class="d-none d-sm-inline">Finish</span>
                        </a>
                    </li>
                </ul>
            
                <div class="tab-content b-0 mb-0">
            
                    <div id="bar" class="progress mb-3" style="height: 7px;">
                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                    </div>
            
                    <div class="tab-pane" id="account-2">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 ">
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <input type="file" class="dropify" name=""  />
                                    </div>
                                    <div class="col-md-9" >
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name"> Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="ex : Garuda Indonesia" id="name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone"> Phone <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" placeholder="ex : 0263 272739" id="phone">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="email"> Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="ex : sample@gmail.com" id="email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date_of_birth"> Date Of Birth <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_of_birth">
                                        </div>

                                        
                                    </div>
                                    
                                    
                                    </div>

                                </div>
                                
                            </div>
                        </div> <!-- end row -->
                    </div>

                    <div class="tab-pane" id="profile-tab-2">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="name1"> Gender</label>
                                    <div class="col-md-9">
                                        <div class="form-inline">
                                            <div class="radio radio-success">
                                                <input type="radio" name="gender" value="male" id="male" class="form-control"><label for="male">Male</label>
                                            </div>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;
                                            <div class="radio radio-danger">
                                                <input type="radio" name="gender" value="female" id="female" class="form-control"><label for="female">Female</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="surname1"> Married Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control">
                                            <option value="">Choose</option>
                                            <option value="married">Married</option>
                                            <option value="single">Single</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="email1">Address</label>
                                    <div class="col-md-9">
                                         <textarea class="form-control" placeholder="ex : sample@gmail.com" id="address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="username">Username</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control col-md-3" placeholder="Recipient's username" aria-label="Recipient's username" id="username">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark waves-effect waves-light" id="checkUsername" type="button">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="password">Password</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    
                    <div class="tab-pane" id="company">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="name1"> Date Of Joining</label>
                                    <div class="col-md-9">
                                        <input type="date" name="date_of_joining" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="roles_id"> Roles</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="roles_id" name="roles_id">
                                            <option value="">-- Please choose a roles --</option>
                                            <?php foreach ($roles as $roles): ?>
                                            <option value="<?php echo $roles['id'] ?>"><?php echo $roles['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="surname1"> Departmen</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="department_id">
                                            <option value="">-- Please choose a department --</option>
                                            <?php foreach ($department as $department): ?>
                                            <option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="email1">Designation</label>
                                    <div class="col-md-9">
                                         <select class="form-control" id="designation_id">
                                            <option value="">-- Please choose a designation --</option>
                                            <?php foreach ($designation as $designation): ?>
                                            <option value="<?php echo $designation['id'] ?>"><?php echo $designation['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="username">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control">
                                            <option value="">-- Please choose a status employee --</option>
                                            <?php foreach ($employeestatus as $employeestatus): ?>
                                            <option value="<?php echo $employeestatus['id'] ?>"><?php echo $employeestatus['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="tab-pane" id="bank">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="surname1"> Bank</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="department_id">
                                            <option value="">-- Please choose a bank --</option>
                                            <?php foreach ($bank as $bank): ?>
                                            <option value="<?php echo $bank['id'] ?>"><?php echo $bank['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="name1"> Account Holder Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="account_holder_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="name1"> Account Number</label>
                                    <div class="col-md-9">
                                        <input type="text" name="account_number" class="form-control">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="tab-pane" id="salary">
                        <div class="row">
                            <div class="col-12">
                                <?php foreach ($typesalary as $typesalary): ?>
                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-form-label" for="<?php echo strtolower(str_replace(' ', '_', $typesalary['name'])) ?>"> <?php echo $typesalary['name'] ?></label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="<?php echo strtolower(str_replace(' ', '_', $typesalary['name'])) ?>" value="0">
                                    </div>
                                </div>
                                <?php 
                                    endforeach
                                 ?>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="tab-pane" id="job_history">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success" id="addJob"><i class="mdi mdi-add"></i> Add</button>
                                &nbsp;
                                <hr>
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Date From</th>
                                            <th>To Date</th>
                                            <th>Reason Leaving</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <div class="tab-pane" id="finish-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                    <h3 class="mt-0">Thank you !</h3>

                                    <p class="w-75 mb-2 mx-auto">Are you sure this data is complete ? this data maybe cannot be edit.</p>

                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="checkValidity">
                                            <label class="custom-control-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <?php echo anchor('Admin/employee','Back','class="btn w-sm btn-light waves-effect"') ?>
                                        <button type="button" id="btnSave" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                    <br>
                    <ul class="list-inline mb-0 wizard">
                        <li class="previous list-inline-item">
                            <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                        </li>
                        <li class="next list-inline-item float-right">
                            <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                        </li>
                    </ul>

                </div> <!-- tab-content -->
            </div>
        
            </div>
        </div>
        
            

    </div>
</div>
<div class="modal fade" id="modal">
    <div class="modal-dialog" >
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title">Add Job History</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="company_job_hitory">Company</label>
                        <input type="text" id="company_job_hitory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="department_job_hitory">Department</label>
                        <input type="text" id="department_job_hitory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="designation_job_hitory">Designation</label>
                        <input type="text" id="designation_job_hitory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="start_date_job_hitory">Start Date</label>
                        <input type="date" id="start_date_job_hitory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="end_date_job_hitory">End Date</label>
                        <input type="date" id="end_date_job_hitory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="reason_job_hitory">Reason</label>
                        <input type="text" id="reason_job_hitory" class="form-control">
                    </div>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnAddHistory" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <script src="<?php echo base_url('assets/plugin/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".dropify").dropify({
        messages:{
            default:"Drag and drop a file here or click",
            replace:"Drag and drop or click to replace",
            remove:"Remove",
            error:"Ooops, something wrong appended."},
            error:{
                fileSize:"The file size is too big (1M max)."}
            });
    });
    $(document).on('click','#btnSave',function(){
        var name = $('#name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var email = $('#email').val();
        var gender = $('input[name=gender]:checked').val();
        var check = $('input[name=checkValidity]:checked').val();
        var province_id = 1;//$('#province_id').val();
        var disctrict_id = 1;//$('#disctrict_id').val();
        var subdisctrict_id = 1;//$('#subdisctrict_id').val();
        var postal_code = $('#postal_code').val();
        var value = {
            name:name,
            phone:phone,
            address:address,
            email:email,
            province_id:province_id,
            disctrict_id:disctrict_id,
            subdisctrict_id:subdisctrict_id,
            postal_code:postal_code
        };
        Swal.fire({
                title:"Apa anda yakin?",
                text:"Ada akan disimpan!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Ya, Simpan saja!"
            }).then(function(t){
                $.ajax({
                    url:'<?php echo base_url('Api/insertEmployee') ?>',
                    type:'POST',
                    data:value,
                    success:function(data){
                        var json = jQuery.parseJSON(data);
                        if (json.response == 200) {
                            Swal.fire("Berhasil!",json.message,"success");
                        }else{
                            Swal.fire("Gagal!",json.message,"danger");
                        }
                    }
                });
                
            });
    });
    function insertDocument(){}
    function insertSalary(){

    }
    $(document).on('change','#department_id',function(){
        var department_id = $(this).val();
        if(department_id != '')
            $.ajax({
                data: {department_id:department_id},
                type:'POST',
                url     : '<?php echo site_url('Api/getDesignation/'); ?>',
                success : function(response)
                {
                    jQuery('#designation_id').html(response);
                }
            });
        else
            jQuery('#designation_id').html('<option value="">Select department first</option>');
    });
    $(document).on('click','#checkUsername',function(){
        var username = $('#username').val();
        if(username != '')
            $.ajax({
                data: {username:username},
                type:'POST',
                url     : '<?php echo site_url('Api/checkUsername/'); ?>',
                success : function(response)
                {
                    var json = jQuery.parseJSON(response);
                    if (json.response != 400) {
                        Swal.fire("Warning!","Username already used!","warning");

                    }else{
                        $('#username').attr('disabled',true);
                        $('#password').focus();
                        $('#checkUsername').removeClass();
                        $('#checkUsername').addClass("btn btn-success");
                        $('#checkUsername').attr('disabled');
                        $('#checkUsername').html('<i class="mdi mdi-check"></i>');
                    }
                }
            });
    });
    $(document).on('click','#addJob',function(){
        $('#modal').modal('show');
    });
    $(document).on('click','#btnAddHistory',function(){
        var table = $('#table tbody');
        var company_job_hitory = $('#company_job_hitory').val();
        var department_job_hitory = $('#department_job_hitory').val();
        var designation_job_hitory = $('#designation_job_hitory').val();
        var start_date_job_hitory = $('#start_date_job_hitory').val();
        var end_date_job_hitory = $('#end_date_job_hitory').val();
        var reason_job_hitory = $('#reason_job_hitory').val();
        var data = {
            company_job_hitory:company_job_hitory,
            department_job_hitory:department_job_hitory,
            designation_job_hitory:designation_job_hitory,
            start_date_job_hitory:start_date_job_hitory,
            end_date_job_hitory:end_date_job_hitory,
            reason_job_hitory:reason_job_hitory
        };
        $.ajax({
            data: data,
                type:'POST',
                url     : '<?php echo site_url('Employee/addJobHistory/'); ?>',
                success : function(response)
                {
                    alert(response);
                }
        })
        // var html = 

        // '<tr><td>'+company_job_hitory+'</td><td>'+department_job_hitory+'</td><td>'+designation_job_hitory+'</td><td>'+start_date_job_hitory+'</td><td>'+end_date_job_hitory+'</td><td>'+reason_job_hitory+'</td></tr>';
        // table.append(html);
        $('#modal').modal('toggle');

    });
</script>