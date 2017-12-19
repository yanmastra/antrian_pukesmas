
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
