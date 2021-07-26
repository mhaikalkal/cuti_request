
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SyRa Projects 2021</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
            </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- container-scroller -->
    <!-- plugins:js Buat Profile di Pojok Kiri Atas -->
    <script src="<?= base_url();?>vendor/Stellar/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url();?>vendor/Stellar/js/off-canvas.js"></script>
    <!-- endinject -->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>assets/customizedSA.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script>
    $(document).ready(function(){
        $('#tgl_awal').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {format: 'YYYY-MM-DD'},
        });

        $('#tgl_akhir').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {format: 'YYYY-MM-DD'},
        });

        $('#tgl_masuk').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {format: 'YYYY-MM-DD'},
        });

    });
        
    </script>
    
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                paging:   false,
                info:     false,
                scrollX: true,
                searching: false
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#divisi').change(function(){
                let id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('profile/getJabatan'); ?>',
                    data: {id:id},
                    dataType: "JSON",
                    success: function(response)
                    {
                        $('#jabatan').html(response);

                    }

                })
            })
        })
    </script>

    <script>
        const back = document.querySelector(".back")
        
        back.addEventListener("click", function(){
            window.history.back();
        });
        
    </script>
</html>