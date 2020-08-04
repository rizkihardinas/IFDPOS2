
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/kendo/kendo.common.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/kendo/kendo.default.min.css') ?>">
<style>
.k-treeview .k-minus {
     background: url('https://img.icons8.com/android/16/000000/minus.png')center center;
}
.k-treeview .k-plus{
     background: url('https://img.icons8.com/android/16/000000/plus.png')center center;
} 
</style>
<div class="row">
    <div class="col-md-6">
        <?php if ($this->session->flashdata('response')): ?>
        <div class="alert alert-<?php echo $this->session->flashdata('response') ?>" role="alert">
            <i class="mdi mdi-check-all mr-2"></i> <?php echo   $this->session->flashdata('messages') ?>
        </div>    
        <?php endif ?>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo form_open('index.php/Admin/roles/add') ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Roles Name
                </div>
                <div class="card-body">
                    <input type="hidden" name="result" id="result">
                    <div class="form-group">
                        <label>Roles Name</label>
                        <input type="text" name="name" class="form-control" required>
                        
                    </div>
                     <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div id="k-treeview"></div>
                    </div>
                </div>
            </div>
        </div> 
    <?php echo form_close() ?>
   </div>
</div>

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
<script type="text/javascript" src="<?php echo base_url('assets/lib/kendo/kendo.all.min.js') ?>"></script>
<script type="text/javascript">
	jQuery("#k-treeview").kendoTreeView({

	checkboxes: {
	checkChildren: true,
	//template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>"
	/*template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'><span class='custom-control-label'>#= item.text # <small>#= item.add_info #</small></span></label>"
	},
	template: "<label><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'> #= item.text #</label>"
	},*/
	template: "<label class='custom-control custom-checkbox'><input type='checkbox' #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'><span class='custom-control-label'>#= item.text #</span></label>"
	},
	//<label class='custom-control custom-checkbox'><input type='checkbox' class='#= item.class #' name='role_resources[]' value='#= item.value #'  /><span class='custom-control-indicator'></span><span class='custom-control-description'>#= item.text #</span><span class='custom-control-info'>#= item.add_info #</span></label>
	
	//template: "<label class="custom-control custom-checkbox"><input type="checkbox" #= item.check# class='#= item.class #' name='role_resources[]' value='#= item.value #'><span class="custom-control-label">#= item.add_info #</span></label>"
	check: onCheck,
	dataSource: <?php echo $menu ?>
	});
	// function that gathers IDs of checked nodes
        function checkedNodeIds(nodes, checkedNodes) {
            for (var i = 0; i < nodes.length; i++) {
                if (nodes[i].checked) {
                    getParentIds(nodes[i], checkedNodes);
                    checkedNodes.push(nodes[i].id);
                }

                if (nodes[i].hasChildren) {
                    checkedNodeIds(nodes[i].children.view(), checkedNodes);
                }
            }
        }

        function getParentIds(node, checkedNodes) {
            if (node.parent() && node.parent().parent() && checkedNodes.indexOf(node.parent().parent().id) == -1) {
                getParentIds(node.parent().parent(), checkedNodes);
                checkedNodes.push(node.parent().parent().id);
            }
        }

        // show checked node IDs on datasource change
        function onCheck() {
            var checkedNodes = [],
                treeView = $("#k-treeview").data("kendoTreeView"),
                message;

            checkedNodeIds(treeView.dataSource.view(), checkedNodes);

            if (checkedNodes.length > 0) {
                message = checkedNodes.join(",");
            } else {
                message = "No nodes checked.";
            }

            $("#result").val(message);
            console.log(message);
        }
        var selectedNode = treeView.select();
</script>