
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
                    <div class="col-sm-4">
                        <?php echo form_open('Admin/employee/search','class="form-inline"'); ?>
                            <div class="form-group mb-2">
                                <label for="search" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="search" id="search" placeholder="Search...">
                            </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <?php echo anchor('Admin/employee/add','<i class="mdi mdi-plus-circle mr-1"></i> Add Employee','class="btn btn-danger waves-effect waves-light mb-2" data-animation="fadein" data-overlayColor="#38414a"') ?>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach ($employee as $employee): ?>
                                
                            
                            <tr data-id="<?php echo $employee['id'] ?>">
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $employee['name'] ?>
                                </td>
                                <td>
                                    <?php echo $employee['phone'] ?>
                                </td>
                                <td>
                                    <?php echo $employee['email'] ?>
                                </td>
                            </tr>
                            <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                </div>
                <?php echo $pagination ?>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-xl-4" id="detail_supplier">
        <div class="card-box">
            <div class="media mb-3">
                <img class="d-flex mr-3 rounded-circle avatar-lg" src="assets/images/users/user-8.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h4 class="mt-0 mb-1" id="employee_name">Jade M. Walker</h4>
                    <p class="text-muted" id="employee_email">Branch manager</p>
                    <p class="text-muted"><i class="mdi mdi-office-building"></i> <p id="employee_phone"></p></p>

                    <!-- <a class="btn- btn-xs btn-info">Send Email</a> -->
                    <a class="btn- btn-xs btn-secondary" id="edit">Edit</a>
                    <a class="btn- btn-xs btn-danger" id="hapus">Delete</a>
                    
                </div>
            </div>

            <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Information</h5>
            <div class="">
                <!-- <h4 class="font-13 text-muted text-uppercase">About Supplier :</h4>
                <p class="mb-3">
                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type.
                </p> -->


                <h4 class="font-13 text-muted text-uppercase mb-1">Company :</h4>
                <p class="mb-3" id="employee_company"></p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Added :</h4>
                <p class="mb-3" id="employee_created"> April 22, 2016</p>

                <h4 class="font-13 text-muted text-uppercase mb-1">Updated :</h4>
                <p class="mb-0" id="employee_edited"> Dec 13, 2017</p>

            </div>

        </div> <!-- end card-box-->
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#detail_supplier').hide();
        
    });
    $(document).on('click','tbody tr',function(){
        var id = $(this).data('id');
        // $('#detail_supplier').slideDown('slow');
        $('#data_supplier').toggleClass('col-xl-12 col-xl-8');
        $('#detail_supplier').toggle();
        var value = {
            id:id
        };
        $.ajax({
            url:'<?php echo base_url('Api/detailSupplier') ?>',
            type:'POST',
            data:value,
            success:function(data){
                var json = jQuery.parseJSON(data);
                if (json.response == 200) {
                    $.each(json.data, function(key,val){
                        var name = val.name;
                        var phone = val.phone;    
                        var id = val.id;    
                        var address = val.address;    
                        var email = val.email;    
                        var province_id = val.province_id;    
                        var disctrict_id = val.disctrict_id;    
                        var subdisctrict_id = val.subdisctrict_id;    
                        var subdisctrict_id = val.subdisctrict_id;    
                        var postal_code = val.postal_code;    
                        var date_created = val.date_created;    
                        var last_update = val.last_update;
                        $('#employee_name').text(name);
                        $('#employee_email').text(email);
                        $('#employee_phone').text(phone);
                        $('#employee_company').text(name);
                        $('#employee_created').text(date_created);
                        $('#employee_edited').text(last_update);
                        $('#edit').attr('href','<?php echo base_url('Admin/employee/edit/') ?>'+id);
                        $('#hapus').attr('href','<?php echo base_url('Admin/employee/delete/') ?>'+id);
                    });
                    
                }
            }
        })
    });
</script>