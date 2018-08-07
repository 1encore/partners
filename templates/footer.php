<!-- Have to remove the $_GET['page']=='search') on alpha version -->
<footer id="footer-1" style="
  <?php if($_GET['page']=='login') echo 'position:absolute;' ?>
  left: 0;
  bottom: 0;
  width: 100%;
  z-index: 10;
  margin-top: 0px;
">


    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p>© 2018 <a href="#" class="logo">Easy Solutions</a>. Все права защищены. </p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <ul class="social-icons">
                        <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
                        <li>
                          <!-- ZERO.kz -->
                          <span id="_zero_71134">
                          <noscript>
                          <a href="http://zero.kz/?s=71134" target="_blank">
                          <img src="http://c.zero.kz/z.png?u=71134" width="88" height="31" alt="ZERO.kz" />
                          </a>
                          </noscript>
                          </span>

                          <script type="text/javascript"><!--
                          var _zero_kz_ = _zero_kz_ || [];
                          _zero_kz_.push(["id", 71134]);
                          _zero_kz_.push(["type", 1]);

                          (function () {
                              var a = document.getElementsByTagName("script")[0],
                              s = document.createElement("script");
                              s.type = "text/javascript";
                              s.async = true;
                              s.src = (document.location.protocol == "https:" ? "https:" : "http:")
                              + "//c.zero.kz/z.js";
                              a.parentNode.insertBefore(s, a);
                          })(); //-->
                          </script>
                          <!-- End ZERO.kz -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- Start Back To Top -->
<a id="back-to-top"><i class="icon ion-chevron-up"></i></a>
<!-- End Back To Top -->

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.cleditor.js"></script>
