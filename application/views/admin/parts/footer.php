                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo FOOTER ?> . <a href="#">Team</a>   &copy; 2020
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                    <a href="#">Version <?php echo VERSION ?> </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        

        <script src="<?php echo base_url('assets/plugin/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
        
        <!-- Dashboar 1 init js-->
        <!-- <script src="<?php echo base_url('assets/js/pages/dashboard-2.init.js') ?>"></script> -->
        
        <!-- App js-->
        <script src="<?php echo base_url('assets/plugin/dropify/dropify.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugin/bootstrap-colorpicker/bootstrap-colorpicker.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/app.min.js') ?>"></script>
        <script type="text/javascript">
            !function(i){"use strict";var e=function(){};e.prototype.init=function(){i("#basic-colorpicker").colorpicker(),i("#hexa-colorpicker").colorpicker({format:"auto"}),i("#component-colorpicker").colorpicker({format:null}),i("#horizontal-colorpicker").colorpicker({horizontal:!0}),i("#inline-colorpicker").colorpicker({color:"#DD0F20",inline:!0,container:!0})},i.FormPickers=new e,i.FormPickers.Constructor=e}(window.jQuery),function(e){"use strict";window.jQuery.FormPickers.init()}();
        </script>
    </body>
</html>