
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Department</th>
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
                            <label for="department_id" class="control-label">Name</label>
                            <select class="form-control" id="department_id">
                                <option value="id">Choose department</option>
                                <?php foreach ($department as $department): ?>
                                    <option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="John">
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

        });
        $(document).on('click','#btnEdit',function(){
            $('#modal').modal('show');
            var id = $(this).attr('idnya');
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
                            $('#department_id').val(val.department_id);
                            $('#save').attr('idnya',val.id);
                        });
                        
                    }
                }
            });
        });
        $('#table').DataTable({
            language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
            "ajax":{
                "url": "<?php echo base_url('Api/getAllDesignation') ?>", // URL file untuk proses select datanya
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
            var department_id = $('#department_id').val();
            var value = {
                id:id,
                name:name,
                department_id:department_id
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
                    url:'<?php echo base_url('Api/insertDesignation') ?>',
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