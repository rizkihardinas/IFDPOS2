
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Url</th>                    
                    <th>Description</th>
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
<div id="modal_menu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_menu" aria-hidden="true" style="display: none;">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="url" class="control-label">Url</label>
                            <input type="url" class="form-control" id="url" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="icon" class="control-label">Icon</label>
                            <input type="text" class="form-control" id="icon" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" id="description"></textarea>
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
        $(document).on('click','#addParentMenu',function(){
            $('#modal_menu').modal('show');

        });
        $(document).on('click','#btnEditParentMenu',function(){
            $('#modal_menu').modal('show');
            var id = $(this).data('id');
            var value = {
                id:id
            }
            $.ajax({
                url:'<?php echo base_url('Api/detailParentMenu') ?>',
                type:'POST',
                data:value,
                success:function(data){
                    var json = jQuery.parseJSON(data);
                    if (json.response == 200) {
                        $.each(json.data, function(key,val){
                            $('#name').val(val.name);
                            $('#url').val(val.url);
                            $('#description').val(val.description);
                            $('#icon').val(val.icon);
                            $('#save').attr('data-id',val.id);
                        });
                        
                    }
                }
            });
        });
        $('#table').DataTable({
            language:{paginate:{previous:"<i class='mdi mdi-chevron-left'>",next:"<i class='mdi mdi-chevron-right'>"}},drawCallback:function(){$(".dataTables_paginate > .pagination").addClass("pagination-rounded")},
            "ajax":{
                "url": "<?php echo base_url('Api/getAllParentMenu') ?>", // URL file untuk proses select datanya
                "type": "POST"
            }
        });
        $(document).on('click','#btnHapusParentMenu',function(){
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
                    url:'<?php echo base_url('Api/deleteMenu') ?>',
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
            var id = $(this).data('id');
            var parent_menu_id = $('#parent_menu_id').val();
            var name = $('#name').val();
            var url = $('#url').val();
            var icon = $('#icon').val();
            var description = $('#description').val();
            var value = {
                id:id,
                name:name,
                url:url,
                icon:icon,
                description:description
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
                    url:'<?php echo base_url('Api/insertParentMenu') ?>',
                    type:'POST',
                    data:value,
                    success:function(data){
                        var json = jQuery.parseJSON(data);
                        if (json.response == 200) {
                            Swal.fire("Berhasil!",json.message,"success");
                            var table = $('#table').DataTable();
                            table.ajax.reload(null,false);
                            $('#modal_menu').modal('hide');
                        }
                    }
                });
                
            });
            
        });
    });

</script>                  