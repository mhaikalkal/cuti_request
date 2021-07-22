
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>vendor/Stellar/vendors/js/vendor.bundle.base.js"></script>
    <!-- Custom js for this page -->
    <script src="<?= base_url(); ?>vendor/Stellar/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <!-- Buat dynamic header, pas page di resize -->
    <script src="<?= base_url();?>vendor/Stellar/js/off-canvas.js"></script>

    <!-- datepicker jquery -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>assets/customizedSA.js"></script>

    <!-- Datatables / Harus Paling Bawah-->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Datatables -->
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

    <!-- Waktu Dashboard -->
    <script>
        $(document).ready(function(){
            let timestamp = `<?= time(); ?>`;
            let dateSET = `date("d-m-Y H:i:s", ${timestamp})`;

            function updateTime() {
                $('#time').html(Date(dateSET));
                
                dateSET++;

            } $(function(){
                setInterval(updateTime, 1000);

            });

        });

    </script>

    <!-- Date Picker -->
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
    });
    </script>
    

    <!-- Searchbox Periode  -->
    <script>
        $(document).ready(function(){
            $('#btn-search').click(function(){ // execute function pas click
                $.ajax ({
                    url: '<?= base_url('cuti/searchCutiPeriode'); ?>', // method untuk carinya
                    type: 'POST', // type nya POST apa GET 
                    data: { // isi inputnya apa aja?
                        awal: $('#tgl_awal').val(), 
                        akhir: $('#tgl_akhir').val(),
                    },
                    dataType: "JSON", // berubah jadi json
                    success: function(response){
                        $('#dataCuti').html(response.showCuti); // showCuti ini array dari controller cuti

                        if (!response.showCuti.includes("Data tidak Ditemukan.")) // Kalau data NULL maka tombol print ilang (gabisa di print)
                        {
                            $('#btn-print').show();

                        } else // Kalau data ada maka tombol print muncul (bisa print)
                        {
                            $('#btn-print').hide();

                        }
                    }

                });
            });

            $('#btn-print').click(function(){
                $.ajax({
                    url: '<?= base_url('export/periodeMPDF'); ?>',
                    type: 'POST',
                    data: {
                        awal: $('#tgl_awal').val(),
                        akhir: $('#tgl_akhir').val(),
                    },

                });

            })

        });
    </script>


</body>
</html>