
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#table-antrian').dataTable({
                language : {
                    lengthMenu : "Tampilkan _MENU_ per halaman",
                    search : "Cari : ",
                    zeroRecords : "Hasil tidak ditemukan",
                    info : "Halaman _PAGE_ dari _PAGES_ halaman <br/>",
                    infoEmpty : "Data tabel kosong", 
                    infoFiltered : "Menampilkan _START_ s/d _END_ dari _TOTAL_ data.",
                        paginate : {
                            first : "<i class='fa fa-step-backward fa-fw'></i>",
                            last : "<i class='fa fa-step-forward fa-fw'></i>",
                            previous : "<i class='fa fa-backward fa-fw'></i>",
                            next: "<i class='fa fa-forward fa-fw'></i>"
                        }
                },
                sort : false,
                responsive : true
            });
        });
    </script>
