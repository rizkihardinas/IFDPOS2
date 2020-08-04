
<br>
<?php echo form_open_multipart('Products/products/insert',array('id' => 'form')) ?>
<div class="row">
    
    <div class="col-lg-6">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Grouping</h5>
            <div class="form-group mb-3">
                <label for="type_product_id"> Type Of Goods <span class="text-danger">*</span></label>
                <select class="form-control" name="type_product_id" required>
                	<option value="">-- Please choose Type Of Goods -- </option>
                	<?php foreach ($type_products as $type_products): ?>
                	<option value="<?php echo $type_products['id'] ?>"><?php echo $type_products['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="divisionproduct"> Division Products <span class="text-danger">*</span></label>
                <select class="form-control" id="divisionproduct" required>
                	<option value="">-- Please choose Division Products -- </option>
                	<?php foreach ($divisionproduct as $divisionproduct): ?>
                	<option value="<?php echo $divisionproduct['id'] ?>"><?php echo $divisionproduct['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="categoryproduct"> Category Products <span class="text-danger">*</span></label>
                <select class="form-control" id="categoryproduct" required>
                	<option value="">-- Please choose Category Products -- </option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="subcategoryproduct"> Sub Category Products <span class="text-danger">*</span></label>
                <select class="form-control" id="subcategoryproduct" name="sub_category_id" required>
                	<option value="">-- Please choose Sub Category Products -- </option>
                </select>
            </div>
            
        </div> <!-- end card-box -->
    </div> <!-- end col -->

    <div class="col-lg-6">

        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <div class="form-group mb-3">
                <label for="barcode">Barcode <span class="text-danger">*</span></label>
                <input type="text" id="barcode" name="barcode" class="form-control" placeholder="[Enter] for generate barcode" required>
            </div>
            <div class="form-group mb-3">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" id="name" max="50" class="form-control" name="name" placeholder="e.g : Apple iMac" required>
            </div>
            <div class="form-group mb-3">
                <label for="short_name">Short Name (Max 25) <span class="text-danger">*</span></label>
                <input type="text" id="short_name" class="form-control" name="short_name" max="25" placeholder="e.g : Apple iMac" required>
            </div>
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>

            <div class="form-group mb-3">
            	<label for="unit"> Unit <span class="text-danger">*</span></label>
                <select required class="form-control" id="unit" name="unit_id">
                	<option value="">-- Please Unit -- </option>
                	<?php foreach ($unit as $unit): ?>
                	<option value="<?php echo $unit['id'] ?>"><?php echo $unit['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
            	<label for="brand"> Brand <span class="text-danger">*</span></label>
                <select required class="form-control" id="brand" name="brand_id">
                	<option value="">-- Please Brand -- </option>
                	<?php foreach ($brand as $brand): ?>
                	<option value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
            <div class="form-group mb-3">
            	<label for="supplier"> Supplier <span class="text-danger">*</span></label>
                <select required class="form-control" id="supplier" name="suppliers_id">
                	<option value="">-- Please Supplier -- </option>
                	<?php foreach ($suppliers as $suppliers): ?>
                	<option value="<?php echo $suppliers['id'] ?>"><?php echo $suppliers['name'] ?></option>
                	<?php endforeach ?>
                </select>
            </div>
        </div>

    </div> <!-- end col-->
</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Configuration</h4>

            <ul class="nav nav-tabs nav-bordered">
                <li class="nav-item">
                    <a href="#pricing" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Pricing
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#image" data-toggle="tab" aria-expanded="true" class="nav-link ">
                        Product Image
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#messages-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                        Description
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="pricing">
                    <div class="form-group mb-3">
                        <label for="purchase_price">Purchase Price <span class="text-danger">*</span></label>
                        <input type="number" required id="purchase_price" name="purchase_price" class="form-control" placeholder="e.g : 15.000">

                    </div>
                    <?php foreach ($price as $price): ?>
                        <div class="form-group mb-3">
                        <label for="<?php echo strtolower(str_replace(' ', '_', $price['name'])) ?>"><?php echo $price['name'] ?> <span class="text-danger">*</span></label>
                        <input type="number" required id="<?php echo strtolower(str_replace(' ', '_', $price['name'])) ?>" name="<?php echo strtolower(str_replace(' ', '_', $price['name'])) ?>" class="form-control" placeholder="e.g : 15.000">
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="tab-pane show" id="image">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="fallback">
                            <input type="file" required name="photo[]" class="dropify" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fallback">
                            <input type="file" required name="photo[]" class="dropify" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fallback">
                            <input type="file" required name="photo[]" class="dropify" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fallback">
                            <input type="file" required name="photo[]" class="dropify" />
                        </div>
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages-b1">
                    <textarea class="form-control" name="description" id="description" required placeholder="Description"></textarea>
                </div>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
<div class="row">
    <div class="col-12">
        <div class="text-center mb-3">
            <?php echo anchor('Admin/list_product','Back','class="btn w-sm btn-light waves-effect"') ?>
            <input type="submit" class="btn w-sm btn-success waves-effect waves-light" value="Save">
            <input type="reset" class="btn w-sm btn-danger waves-effect waves-light"  value="Cancel" />
        </div>
    </div> <!-- end col -->
</div>
<?php echo form_close() ?>
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
    $(document).on('change','#divisionproduct',function(){
        var id = $(this).val();
        var value = {
            id:id
        };
        $.ajax({
            url:'<?php echo base_url('Api/get_category_products') ?>',
            data:value,
            type:'POST',
            success:function(data){
                $('#categoryproduct').html(data);
            }
        });
    });
    $(document).on('change','#categoryproduct',function(){
        var id = $(this).val();
        var value = {
            id:id
        };
        $.ajax({
            url:'<?php echo base_url('Api/get_sub_category_products') ?>',
            data:value,
            type:'POST',
            success:function(data){
                $('#subcategoryproduct').html(data);
            }
        });
    });
    function generate_barcode(){
        $.ajax({
        url:'<?php echo base_url('Api/generate_barcode') ?>',
            success:function(data){
                $('#barcode').val(data);
            }
        })
    }
    $(document).on('keypress','#barcode',function(e){
        if (e.which == 13) {
            
            if ($('#barcode').val() == '') {
                Swal.fire({
                    title:"Generate Barcode",
                    text:"Apakah anda akan generate barcode otomatis ?",
                    type:"warning",
                    showCancelButton:!0,
                    confirmButtonColor:"#3085d6",
                    cancelButtonColor:"#d33",
                    confirmButtonText:"Ya!"
                }).then(function(t){
                    generate_barcode();
                    
                });
            }else{
                var barcode = $('#barcode').val();
                var value = {
                    barcode:barcode
                }
                $.ajax({
                    url:'<?php echo base_url('Api/check_barcode') ?>',
                    type:'POST',
                    data:value,
                    success:function(data){
                        var json = jQuery.parseJSON(data);
                        if (json.response == 400) {
                            Swal.fire({
                                title:"Gagal!",
                                text:"Barcode sudah dipakai",
                                type:"error",
                            });
                        }
                    }
                })
            }
            
        }
    });
    $(document).on('keyup','#form',function(e){
        if (e.which == 13) {
            
            e.preventDefault();
            return false;
            
        }
    });
</script>