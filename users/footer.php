
    <style type="text/css">
      .btn-scroll{
        background-color: #18bc9c;
        color: #fff;
      }
      .btn-scroll:hover{
        background-color:#fff;
        color: #18bc9c;
      }
      .footer-p{
        font-size: 16px;
      }
    </style>
    <div style="position: fixed; bottom: 20px; right: 20px; display: inline-block; z-index: 3">
      <a class="js-scroll-trigger btn-success btn-social" href="#page-top">
        <i class="fa fa-arrow-circle-up fa-lg"></i>
      </a>
    </div>
    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-6">
              <h4>Puskesmas Kuta Selatan</h4>
              <p class='footer-p'>Kuta Selatan, Kuta, Badung, Bali
                <br>Kode post : 8348, Telp : (0361) 297168</p>
            </div>
            <div class="col-md-6">
              <h4>INFORMASI DAN SARAN</h4>
              <p class='footer-p'>Untuk mengetahui lebih lanjut tentang pelayanan kami atau anda ingin mengajukan saran untuk kami silahkan kunjungi akun media sosial kami.</p>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="https://www.facebook.com/" target="_blank">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="https://plus.google.com/" target="_blank">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="https://www.twitter.com/" target="_blank">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="https://github.com/yanmastra/" target="_blank">
                    <i class="fa fa-sm fa-github"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; 2017 By Kangguru Team
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.min.js"></script>
    <script src='../vendor/jquery/jquery.datetimepicker.full.min.js'></script>

<script>
$('#tanggal_lahir').datetimepicker({
  timepicker:false,
  format:'Y-m-d',
  maxDate: new Date().toLocaleDateString() 
});
</script>