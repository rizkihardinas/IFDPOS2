
<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Information of suppliers</h5>
            <div class="form-group mb-3">
                <label for="name"> Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="ex : Garuda Indonesia" id="name">
            </div>
            <div class="form-group mb-3">
                <label for="phone"> Phone <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="ex : 0263 272739" id="phone">
            </div>
            <div class="form-group mb-3">
                <label for="email"> Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="ex : sample@gmail.com" id="email">
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col -->

    <div class="col-lg-6">
        
        <div class="card-box">
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Address</h5>

            <div class="form-group mb-3">
            	<label for="province_id"> Province <span class="text-danger">*</span></label>
                <select class="form-control" id="province_id">
                	<option value="">-- Province -- </option>
                	<?php foreach ($unit as $unit): ?>
                	<option value="<?php echo $unit['id'] ?>"><?php echo $unit['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="disctrict_id"> District <span class="text-danger">*</span></label>
                <select class="form-control" id="disctrict_id">
                    <option value="">-- District -- </option>
                    <?php foreach ($suppliers as $suppliers): ?>
                    <option value="<?php echo $suppliers['id'] ?>"><?php echo $suppliers['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
            	<label for="subdisctrict_id"> Sub District <span class="text-danger">*</span></label>
                <select class="form-control" id="subdisctrict_id">
                	<option value="">-- Sub District -- </option>
                	<?php foreach ($brand as $brand): ?>
                	<option value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="postal_code"> Postal Code  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="ex : sample@gmail.com" id="postal_code">
            </div>
            <div class="form-group mb-3">
                <label for="address"> Address  <span class="text-danger">*</span></label>
                <textarea class="form-control" placeholder="ex : sample@gmail.com" id="address"></textarea>
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="text-center mb-3">
            <?php echo anchor('Admin/suppliers','Back','class="btn w-sm btn-light waves-effect"') ?>
            <button type="button" id="btnSave" class="btn w-sm btn-success waves-effect waves-light">Save</button>
            <button type="button" class="btn w-sm btn-danger waves-effect waves-light">Delete</button>
        </div>
    </div> <!-- end col -->
</div>
<script type="text/javascript">
    $(document).on('click','#btnSave',function(){
        var name = $('#name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var email = $('#email').val();
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
        }
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
                    url:'<?php echo base_url('Api/insertSuppliers') ?>',
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
</script>