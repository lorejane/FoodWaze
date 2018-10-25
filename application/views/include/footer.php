
<!-- for homepage footer -->
<footer class="site-footer">
    <div class="row">
        <div class="col-md-12">
        <p class="text-center text-md-left">Copyright © 2018 <a href="#">FoodWaze</a>. All rights reserved.</p>
        </div>

        <!-- <div class="col-md-6">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
            <a class="nav-link" href="../help/articles.html">Documentation</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../help/faq.html">FAQ</a>
            </li>
        </ul>
        </div> -->
    </div>
    </footer>
<!-- END for Footer -->


</main>



    <!-- Global quickview -->
    <div id="qv-global" class="quickview" data-url="../assets/data/quickview-global.html">
      <div class="spinner-linear">
        <div class="line"></div>
      </div>
    </div>
    <!-- END Global quickview -->





<!-- Scripts -->
<script src = "<?php echo base_url('assets/js/core.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/script.min.js'); ?>"></script>


<!-- for callback -->
 <script>
      // Callback functions
      function test(tab) {
        //alert( tab.html() );
      }


      function callbackOnNext(tab, navigation, index) {
        app.toast('Next');
      }


      function callbackOnPrevious(tab, navigation, index) {
        app.toast('Previous');
      }


      function callbackOnFinish(tab, navigation, index) {
        app.toast('Submit');
      }

    </script>



</body>
</html>