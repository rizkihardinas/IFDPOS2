
 <style type="text/css">
     .stroked {
        text-decoration: line-through;
     }
 </style>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('Admin/access_level',array('method'=>'get')) ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="department_id" class="col-form-label">Email</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    <option value="">-- Pilih Department -- </option>
                                    <?php foreach ($department as $department): ?>
                                        <option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <br>
                                <br>
                                <button class="btn btn-success" id="btnRefresh"><i class="fe-refresh-cw"></i></button>
                            </div>
                        </div>

                        <!-- <button type="submit" class="btn btn-primary waves-effect waves-light">Sign in</button> -->

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
                        </div>
<div class="row">
    
    <div class="col-12">
        <div class="card-box">
            
            <div class="row">
                <div class="col-lg-12">
                    <ul class="sitemap">
                        <?php 
                        if ($this->input->get('department_id') != null) {
                            # code...
                        
                         ?>
                        <li><a href="javascript: void(0);" class="text-uppercase font-weight-bold"><i class="mdi mdi-adjust mr-1"></i><?php echo str_replace('_', ' ', $this->uri->segment(2)) ?></a>
                            <ul>
                                <?php foreach ($parent_menu as $parent_menu): ?>
                                    <li><a><i class="<?php echo $parent_menu['icon'] ?> mr-1"></i><?php echo $parent_menu['name'] ?></a>
                                    <ul>
                                        <?php   
                                            $data = $this->db->query(
                                                "SELECT accesslevel.*,menu.name,parentmenu.id as parent_menu_id  FROM accesslevel RIGHT JOIN menu ON accesslevel.menu_id = menu.id RIGHT JOIN parentmenu ON menu.parent_menu_id = parentmenu.id WHERE menu.parent_menu_id=".$parent_menu['id']." AND accesslevel.department_id=".$this->input->get('department_id')
                                            )->result_array();
                                            foreach ($data as $menu) {
                                                if ($menu['status'] != 1) {
                                                    echo '
                                                    <li class="stroked">
                                                        
                                                        <a href="javascript: void(0);" id="setMenu" menu_id="'.$menu['id'].'" status="'.$menu['status'].'" class="'.$menu['id'].'_'.$this->input->get('department_id').'">'.$menu['name'].' </a>
                                                    </li>';
                                                }else{
                                                    echo '<li><a href="javascript: void(0);" id="setMenu" menu_id="'.$menu['id'].'" status="'.$menu['status'].'" class="'.$menu['id'].'_'.$this->input->get('department_id').'">'.$menu['name'].'</a></li>';
                                                }
                                                
                                            }
                                         ?>
                                        
                                    </ul>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                         <?php 
                            }else{
                                echo "<center><h4>Pilih Department dahulu!</h4></center>";
                            }
                          ?>
                        
                    </ul>
                </div> <!-- end col-->
            </div> <!-- end row-->

        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<script type="text/javascript">
    $(document).on('click','#setMenu',function(){
        var menu_id = $(this).attr('menu_id');
        var status = $(this).attr('status');
        var department_id = <?php echo $this->input->get('department_id') ?>;
        var value = {
            menu_id:menu_id,
            department_id:department_id
        };
        $.ajax({
            url: '<?php echo base_url('Api/updateAccessLevel') ?>',
            data:value,
            type:'POST',
            success:function(data){
                
                if (data == 0) {
                    $('.'+menu_id+'_'+department_id).parent().removeClass('stroked');
                    $('.'+menu_id+'_'+department_id).attr('status',1);
                }else{
                    $('.'+menu_id+'_'+department_id).parent().addClass('stroked');
                    $('.'+menu_id+'_'+department_id).attr('status',0);
                }
            }
        });
        
        
        
        
    });
</script>