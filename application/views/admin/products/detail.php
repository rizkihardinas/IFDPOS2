
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-xl-5">

                    <div class="tab-content pt-0">
                        <div class="tab-pane active show" id="product-1-item">
                            <img src="<?php echo base_url('assets/images/products/product-9.jpg') ?>" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <div class="tab-pane" id="product-2-item">
                            <img src="<?php echo base_url('assets/images/products/product-10.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <div class="tab-pane" id="product-3-item">
                            <img src="<?php echo base_url('assets/images/products/product-11.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <div class="tab-pane" id="product-4-item">
                            <img src="<?php echo base_url('assets/images/products/product-12.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a href="#product-1-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb active show">
                                <img src="<?php echo base_url('assets/images/products/product-9.jpg"') ?> alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-2-item" data-toggle="tab" aria-expanded="true" class="nav-link product-thumb">
                                <img src="<?php echo base_url('assets/images/products/product-10.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-3-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb">
                                <img src="<?php echo base_url('assets/images/products/product-11.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-4-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb">
                                <img src="<?php echo base_url('assets/images/products/product-12.jpg') ?>" alt="" class="img-fluid mx-auto d-block rounded">
                            </a>
                        </li>
                    </ul>
                </div> <!-- end col -->
                <div class="col-xl-7">
                    <div class="pl-xl-3 mt-3 mt-xl-0">
                        <a href="#" class="text-primary"><?php echo $products['division_name'] ?> > <?php echo $products['category_name'] ?> > <?php echo $products['subcategory_name'] ?></a>
                        <h4 class="mb-3"><?php echo $products['name'] ?></h4>
                        <p class="text-muted float-left mr-3">
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star text-warning"></span>
                            <span class="mdi mdi-star"></span>
                        </p>
                        <p class="mb-4"><a href="#" class="text-muted">( 36 Customer Reviews )</a></p>
                        <!-- <h6 class="text-danger text-uppercase">20 % Off</h6> -->
                        <h4 class="mb-4">Harga : 
                        	<br>
                        	&nbsp;
                        	<table class="table table-bordered">
                        			<tbody>
                        	<?php foreach ($price as $price): ?>
                        		<tr>
                        			<td><?php echo $price['name'] ?></td>
                        			<td>:</td>
                        			<td><?php echo $price['price'] ?></td>
                        		</tr>	
                        	<?php endforeach ?>
                        	</tbody>	
                        		</table>
                        <h4><span class="badge bg-soft-success text-success mb-4">Instock</span></h4>
                        <p class="text-muted mb-4"><?php echo $products['description'] ?></p>
                        

                        
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->


            <div class="table-responsive mt-4">
                <table class="table table-bordered table-centered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Outlets Stock</th>
                            <th>Stock</th>
                            <th>Sales This Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ASOS Ridley Outlet - NYC</td>
                            <td>
                                <div class="progress-w-percent mb-0">
                                    <span class="progress-value">478 </span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$1,89,547</td>
                        </tr>
                        <tr>
                            <td>Marco Outlet - SRT</td>
                            <td>
                                <div class="progress-w-percent mb-0">
                                    <span class="progress-value">73 </span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$87,245</td>
                        </tr>
                        <tr>
                            <td>Chairtest Outlet - HY</td>
                            <td>
                                <div class="progress-w-percent mb-0">
                                    <span class="progress-value">781 </span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$5,87,478</td>
                        </tr>
                        <tr>
                            <td>Nworld Group - India</td>
                            <td>
                                <div class="progress-w-percent mb-0">
                                    <span class="progress-value">815 </span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>$55,781</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
