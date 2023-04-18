<!-- partial:partials/_footer.html -->
<footer class="footer container-fluid bg-grey pt-5">
<div class="container">
<div class="row">
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-6">
                <div class="logo-part">
                    <div class="m-1">
                        <img src="/assets/images/logo-agilizador-rm.webp" class="w-100 logo-footer" >
                        <p class="text-center font-italic font-weight-light copyright">
                            Developed by Cristian Trejo
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4">
                <h6>
                    Acerca de la empresa
                </h6>
                <p>
                    Asesores RM inmobiliaria con más de 9 años de experiencia, 
                    ofreciendo servicios exclusivos en compra, venta y alquiler de inmuebles. 
                </p>
                <p class="font-italic font-weight-light">
                    Asesores RM ¡De la mano contigo!
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6 px-2">
            <h6>Contáctanos</h6>
            <div class="row ">
                <div class="col-md-12">
                    <ul>
                        <li> 
                            <i class="fa fa-phone" aria-hidden="true"></i> 
                            +58 424-1413908
                        </li>
                        <li> 
                            <i class="fa fa-phone" aria-hidden="true"></i> 
                            +58 412-0388680
                        </li>
                        <li> 
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            soporte@tuasesorrm.com.ve
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            <div class="col-md-6 ">
            <h6>Redes sociales</h6>
            <div class="social">
                <a href="https://www.facebook.com/people/T%C3%BA-Asesor-RM/100068628493259/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/tuasesorrm/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/tiendainmueblerm/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
    <hr class="bg-light">
    <p class="text-center font-italic font-weight-light copyright">
        Copyright © 2023 Asesores RM. Todos los derechos reservados
    </p>
    </div>
</div>
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
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="/assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="/assets/js/confirm-password.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <!-- ExchangeMonitor.net Widgets -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://exchangemonitor.net/js/script.widgets-0.5.js"></script>
    <script type="text/javascript">ExchangeMonitorWidgetUnique("ve","bcv","100%","light",false);</script>
    <script type="text/javascript">ExchangeMonitorWidgetUnique("ve","enparalelovzla","100%","light",false);</script>
    <script type="text/javascript">ExchangeMonitorWidgetUnique("ve","dolartoday","100%","light",false);</script>

    <!-- DataTable -->
    <script type="text/javascript" src="/assets/js/datatable/jquery-3.5.1.js"></script>
    
    <script type="text/javascript" src="/assets/js/slider_ajax/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/js/datatable/config.dataTables.js"></script>
    <script>
        const input_documentary = document.getElementById('input_documentary');
        const label_documentary = document.getElementById('label_documentary');
        input_documentary.addEventListener('change', () => {
        const file = input_documentary.files[0];
        label_documentary.textContent = `Archivo seleccionado: ${file.name}`;
        });

        const input_graphic = document.getElementById('input_graphic');
        const label_graphic = document.getElementById('label_graphic');
        input_graphic.addEventListener('change', () => {
        const file = input_graphic.files[0];
        label_graphic.textContent = `Archivo seleccionado: ${file.name}`;
        });
    </script>
    <script>
        $(function() {
        var $tabButtonItem = $('#tab-button li'),
            $tabSelect = $('#tab-select'),
            $tabContents = $('.tab-contents'),
            activeClass = 'is-active';

        $tabButtonItem.first().addClass(activeClass);
        $tabContents.not(':first').hide();

        $tabButtonItem.find('a').on('click', function(e) {
            var target = $(this).attr('href');

            $tabButtonItem.removeClass(activeClass);
            $(this).parent().addClass(activeClass);
            $tabSelect.val(target);
            $tabContents.hide();
            $(target).show();
            e.preventDefault();
        });

        $tabSelect.on('change', function() {
            var target = $(this).val(),
                targetSelectNum = $(this).prop('selectedIndex');

            $tabButtonItem.removeClass(activeClass);
            $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
            $tabContents.hide();
            $(target).show();
        });
        });
    </script>
    <script type="text/javascript" src="/assets/js/slider_ajax/lightslider.js"></script> 
    <script> $('#lightSlider').lightSlider({
        gallery: true, item: 1, loop: true, slideMargin: 0, thumbItem: 9 }
        );
    </script>
</body>
</html>