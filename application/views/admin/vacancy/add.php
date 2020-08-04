
  
 <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3 header-title">Add Vacancy</h4>

                    <div class="form-group row mb-3">
                        <label for="name" class="col-3 col-form-label">Title</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="range_salary" class="col-3 col-form-label">Range Salary</label>
                        <div class="col-4">
                            <input type="number" class="form-control" id="min" placeholder="Min">
                        </div>
                        <div class="col-5">
                            <input type="number" class="form-control" id="max" placeholder="Max">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="department_id" class="col-3 col-form-label">Department</label>
                        <div class="col-9">
                            <select class="form-control" id="department_id">
                            	<option value="">Choose a department</option>
                            	<?php foreach ($department as $department): ?>
                            		<option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
                            	<?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="designation_id" class="col-3 col-form-label">Designation</label>
                        <div class="col-9">
                            <select class="form-control" id="designation_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="type" class="col-3 col-form-label">Type</label>
                        <div class="col-9">
                            <select class="form-control" id="type">
                            	<option value="">Choose a type</option>
                            	<option value="normal">Normal</option>
                            	<option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="note" class="col-3 col-form-label">Note</label>
                        <div class="col-9">
                            <textarea class="form-control" id="note"></textarea>
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

</div>
<div class="row">
	<div class="col-md-12">
		<?php echo anchor('Admin/vacancy/','Back','class="btn btn-success"') ?>
	</div>
</div>
<script src="<?php echo base_url('assets/plugin/summernote/summernote-bs4.min.js') ?>"></script>
<script type="text/javascript">
    $("#note").summernote();
    $(document).on('change','#department_id',function() {
        var department_id = $('#department_id').val();
        var value = {
            department_id:department_id
        };
        $.ajax({
            url:'<?php echo base_url('Api/getDesignation') ?>',
            type:'POST',
            data:value,
            success:function(data){
                $('#designation_id').html(data);
            }
        })
    });
    $(document).on('click','#save',function(){
        var name = $('#name').val();
        var max = $('#max').val();
        var min = $('#min').val();
        var department_id = $('#department_id').val();
        var designation_id = $('#designation_id').val();
        var note = $('#note').val();
        var type = $('#type').val();
        var value = {
            name:name,
            max:max,
            min:min,
            department_id:department_id,
            designation_id:designation_id,
            note:note,
            type:type
        };
        $.ajax({
            url:'<?php echo base_url('Api/insertVacancy') ?>',
            data:value,
            type:'POST',
            success:function(data){
                var json = jQuery.parseJSON(data);
                if (json.response == 200) {
                    Swal.fire("Berhasil!",json.message,"success");
                }
            }
        })
    });
</script>