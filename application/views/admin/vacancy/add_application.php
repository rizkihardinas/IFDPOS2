
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 header-title">Add Applications</h4>
                    <div class="form-group row mb-3">
                        <label for="name" class="col-3 col-form-label">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="phone" class="col-3 col-form-label">Phone</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="gender" class="col-3 col-form-label">Gender</label>
                        <div class="col-9 form-inline">
                            <div class="radio radio-success col-md-6">
                                <input type="radio" name="gender" value="male" id="male" class="form-control"><label for="male">Male</label>
                            </div>
                            <div class="radio radio-danger col-md-6">
                                <input type="radio" name="gender" value="female" id="female" class="form-control"><label for="female">Female</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="username" class="col-3 col-form-label">Username</label>
                        <div class="col-9">
                            <input type="username" class="form-control" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="address" class="col-3 col-form-label">Address</label>
                        <div class="col-9">
                            <textarea class="form-control" id="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button id="save" class="btn btn-info waves-effect waves-light">Add</button>
                        </div>
                    </div>

            </div>  <!-- end card-body -->
        </div>  <!-- end card -->
    </div>  <!-- end col -->
    <div class="col-lg-6">
        <div class="card-box project-box">
            <!-- Title-->
            <h4 class="mt-0"><a href="javascript: void(0);" class="text-dark"><?php echo $vacancy[0]['name'] ?></a></h4>
            <p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small><?php echo $vacancy[0]['department'] ?> - <?php echo $vacancy[0]['designation'] ?></small></p>
            <?php if ($vacancy[0]['type'] == 'normal'){ ?>
               <div class="badge bg-soft-success text-success mb-3"><?php echo ucwords($vacancy[0]['type']) ?></div> 
            <?php }else{

             ?>
            <div class="badge bg-soft-danger text-danger mb-3"><?php echo ucwords($vacancy[0]['type']) ?></div> 
             <?php 
             }
              ?>
            
            <!-- Desc-->
            <p class="text-muted font-13 mb-3 sp-line-2">
                Qualification : <br>
                <?php echo $vacancy[0]['note'] ?>
            </p>
            <!-- Task info-->
            <?php 

            $cek = $this->Constants_model->getNumRowsWhere('applications',array('vacancy_id' => $vacancy[0]['id']));
            if ($cek == 0) {
                # code...
            }else{


             ?>
             <p class="mb-1">
                <span class="pr-2 text-nowrap mb-2 d-inline-block">
                    <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                    <b><?php echo $cek ?></b> Participant
                </span>
            </p>
    
            <!-- Team-->
            <div class="avatar-group mb-3">
                <?php 
                for ($i=0; $i < $cek; $i++) { 
                    # code...
                
                 ?>
                 <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme">
                    <img src="<?php echo base_url('assets/images/users/user-1.jpg') ?>" class="rounded-circle avatar-sm" alt="friend" />
                </a>
                <?php 
                }
                 ?>
            </div>
            <?php 
            }
             ?>
        </div> <!-- end card box-->
    </div><!-- end col-->
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo anchor('Admin/vacancy/','Back','class="btn btn-success"') ?>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click','#save',function(){
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var address = $('#address').val();
        var vacancy_id = <?php echo $this->uri->segment(4) ?>;
        var gender = $('input[name=gender]:checked').val();
        var value = {
            name:name,
            phone:phone,
            email:email,
            username:username,
            password:password,
            address:address,
            vacancy_id:vacancy_id,
            gender:gender
        };
        $.ajax({
            url:'<?php echo base_url('api/insertApplication') ?>',
            data:value,
            type:'POST',
            success:function(data){
                var json = jQuery.parseJSON(data);
                if (json.response == 200) {
                    Swal.fire('Success','Successfully Added','success');
                }
            }
        })
    });

</script>