  
<?php if ($this->session->flashdata('messages')): ?>
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-toggle="toast">
    <div class="toast-header">
        <img src="assets/images/logo-sm.png" alt="brand-logo" height="12" class="mr-1" />
        <strong class="mr-auto">Infuture Dev</strong>
        <small>Baru saja</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $this->session->flashdata('messages') ?>
    </div>
</div>
<?php endif ?>


<!-- end page title --> 
<br>
                        <!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">Sort By</label>
                            <select class="custom-select" id="status-select">
                                <option selected="">All</option>
                                <option value="1">Popular</option>
                                <option value="2">Price Low</option>
                                <option value="3">Price High</option>
                                <option value="4">Sold Out</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-settings"></i></button>
                        <?php echo anchor('Products/products/add','<i class="mdi mdi-plus-circle mr-1"></i> Add New','class="btn btn-danger waves-effect waves-light"') ?>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <?php foreach ($products as $products): ?>
        <div class="col-md-6 col-xl-3">
            <div class="card-box product-box">

                <div class="product-action">
                    <a href="javascript: void(0);" class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                    <a href="javascript: void(0);" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                </div>

                <div>
                    <img src="<?php echo base_url('uploads/images/products/'.$products['image']) ?>" alt="product-pic" class="img-fluid" />
                </div>

                <div class="product-info">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="font-16 mt-0 sp-line-1">
                                <?php echo anchor('Products/products/detail/'.$products['id'],$products['name'],'class="text-dark"') ?>
                            </h5>
                            <div class="text-warning mb-2 font-13">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h5 class="m-0"> <span class="text-muted"> Stocks : 98 pcs</span></h5>
                        </div>
                        <div class="col-auto">
                            <div class="product-price-tag">
                                <?php echo number_format($products['purchase_price'],0,',','.') ?>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end product info-->
            </div> <!-- end card-box-->
        </div>    
    <?php endforeach ?>
     <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-12">
        <?php echo $pagination ?>
    </div> <!-- end col-->
</div>
