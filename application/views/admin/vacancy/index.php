
<div class="row mb-2">
    <div class="col-sm-4">
        <?php echo anchor('admin/vacancy/add','<i class="mdi mdi-plus"></i> Create New Vacancy','class="btn btn-danger btn-rounded mb-3"') ?>
        <?php echo anchor('admin/application/','<i class="mdi mdi-briefcase-account"></i> List Applications','class="btn btn-primary btn-rounded mb-3"') ?>
    </div>  
</div>
<div class="row">
    <?php foreach ($vacancy as $vacancy): ?>
        
    <div class="col-xl-4">
        <div class="card-box project-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php echo anchor('Admin/vacancy/edit/'.$vacancy['id'],'Edit','class="dropdown-item"') ?>
                    <?php echo anchor('Admin/vacancy/delete/'.$vacancy['id'],'Delete','class="dropdown-item"') ?>
                    <?php echo anchor('Admin/vacancy/application/'.$vacancy['id'],'Add Applications','class="dropdown-item"') ?>
                </div>
            </div> <!-- end dropdown -->
            <!-- Title-->
            <h4 class="mt-0"><a href="javascript: void(0);" class="text-dark"><?php echo $vacancy['name'] ?></a></h4>
            <p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small><?php echo $vacancy['department'] ?> - <?php echo $vacancy['designation'] ?></small></p>
            <?php if ($vacancy['type'] == 'normal'){ ?>
               <div class="badge bg-soft-success text-success mb-3"><?php echo $vacancy['type'] ?></div> 
            <?php }else{

             ?>
            <div class="badge bg-soft-danger text-danger mb-3"><?php echo $vacancy['type'] ?></div> 
             <?php 
             }
              ?>
            
            <!-- Desc-->
            <p class="text-muted font-13 mb-3 sp-line-2"><?php echo $vacancy['note'] ?>
            </p>
            <!-- Task info-->
            <?php 

            $cek = $this->constants_model->getNumRowsWhere('applications',array('vacancy_id' => $vacancy['id']));
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
    <?php endforeach ?>

</div>
<div class="row">
    <?php echo $pagination ?>
</div>