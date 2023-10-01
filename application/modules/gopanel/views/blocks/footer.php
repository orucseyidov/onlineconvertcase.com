            <footer class="footer">© <?=date("Y") ?> Veltrix <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Goweb Creative Agency  </span>.</footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="/assets/gopanel/js/jquery.min.js"></script>
    <script src="/assets/gopanel/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/gopanel/js/metisMenu.min.js"></script>
    <script src="/assets/gopanel/js/jquery.slimscroll.js"></script>
    <script src="/assets/gopanel/js/waves.min.js"></script>
    <!-- Tostar Notification -->
    <script src="/assets/gopanel/js/toastr.min.js"></script>
    <!-- Jquery Tags input -->
    <script src="/assets/gopanel/plugins/jquery.tagsinput/jquery.tagsinput.js"></script>
    <!-- Sweet-Alert  -->
    <script src="/assets/gopanel/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <!-- CK editor -->
    <script src="/assets/gopanel/ckeditor/ckeditor.js"></script>

    <!--Chartist Chart-->
    <script src="/assets/gopanel/plugins/chartist/js/chartist.min.js"></script>
    <script src="/assets/gopanel/plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
    <!-- peity JS -->
    <script src="/assets/gopanel/plugins/peity-chart/jquery.peity.min.js"></script>
    <script src="/assets/gopanel/pages/dashboard.js"></script>
    
    <?php 
        if ($this->uri->segment(2) != false) {
            if ($this->uri->segment(2) != 'statics') {
                if (in_array($this->uri->segment(3), $front)) {
                    $scripts = $this->uri->segment(3) != false ? $this->uri->segment(3) : 'manage';
                    $this->load->view($app."/blocks/scripts/".$scripts);
                }
                else{
                    $this->load->view($app."/blocks/scripts/manage");
                }
            }
            else{
                $this->load->view($app."/blocks/scripts/statics");
            }
        }
    ?>
    <!-- App js -->
    <script src="/assets/gopanel/js/app.js"></script>
    <script src="/assets/gopanel/main/app.js"></script>
    <?php $this->load->view("gopanel/blocks/flashdata"); ?>
    <?php $this->load->view("gopanel/blocks/scripts"); ?>
    <?php echo $footerdata; ?>
    
</body>
</html>