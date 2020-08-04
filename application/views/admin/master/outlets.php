

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary waves waves-default" id="add<?php echo ucwords(str_replace('_', '', $this->uri->segment(2))) ?>">Add <?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2))) ?></button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
            </div>
        </div>
    </div> 
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2))) ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="John">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="John">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="control-label">phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="John">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="reciept_header" class="control-label">Receipt Header</label>
                            <input type="text" class="form-control" id="reciept_header" placeholder="John">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="receipt_footer" class="control-label">Receipt Footer</label>
                            <input type="text" class="form-control" id="receipt_footer" placeholder="John">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" id="save" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#add<?php echo ucwords(str_replace('_', '', $this->uri->segment(2))) ?>',function(){
            $('#modal').modal('show');
            $('#save').attr('idnya',0);
            $('#name').val('');
            $('#address').val();
            $('#phone').val();
            $('#reciept_header').val();
            $('#receipt_footer').val();

        });
        $(document).on('click','#btnEdit',function(){
            $('#modal').modal('show');
            var id = $(this).data('id');
            var value = {
                id:id
            }
            $.ajax({
                url:'<?php echo base_url('Api/detailMaster/'.str_replace('_', '', $this->uri->segment(2)).'') ?>',
                type:'POST',
                data:value,
                success:function(data){
                    var json = jQuery.parseJSON(data);
                    if (json.response == 200) {
                        $.each(json.data, function(key,val){
                            $('#name').val(val.name);
                            $('#address').val(val.address);
                            $('#phone').val(val.phone);
                            $('#reciept_header').val(val.reciept_header);
                            $('#receipt_footer').val(val.receipt_footer);
                            $('#save').attr('idnya',val.id);
                        });
                        
                    }
                }
            });
        });
        $('#table').DataTable({
            language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
            "ajax":{
                "url": "<?php echo base_url('Api/getAllOutlets/')?>",
                "type": "POST"
            }
        });
        $(document).on('click','#btnHapus',function(){
            var id = $(this).data('id');
            var value = {
                id:id,
            };
            Swal.fire({
                title:"Apa anda yakin?",
                text:"Data akan dihapus!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Ya, Hapus saja!"
            }).then(function(t){
                $.ajax({
                    url:'<?php echo base_url('Api/deleteMaster/'.str_replace('_', '', $this->uri->segment(2)).'') ?>',
                    type:'POST',
                    data:value,
                    success:function(data){
                        var json = jQuery.parseJSON(data);
                        if (json.response == 200) {
                            Swal.fire("Berhasil!",json.message,"success");
                            var table = $('#table').DataTable();
                            table.ajax.reload(null,false);
                        }
                    }
                });
                
            });
        });
        $(document).on('click','#save',function(){
            var id = $(this).attr('idnya');
            var name = $('#name').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var reciept_header = $('#reciept_header').val();
            var receipt_footer = $('#receipt_footer').val();
            var value = {
                id:id,
                name:name,
                address:address,
                phone:phone,
                reciept_header:reciept_header,
                receipt_footer:receipt_footer
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
                    url:'<?php echo base_url('Api/insertOutlets/') ?>',
                    type:'POST',
                    data:value,
                    success:function(data){
                        var json = jQuery.parseJSON(data);
                        if (json.response == 200) {
                            Swal.fire("Berhasil!",json.message,"success");
                            var table = $('#table').DataTable();
                            table.ajax.reload(null,false);
                            $('#modal').modal('hide');
                        }
                    }
                });
                
            });
            
        });
    });

</script>                  
