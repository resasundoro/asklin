<!-- Vendor -->
<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/lazysizes/lazysizes.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/vivus/vivus.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('frontend/js/theme.js') }}"></script>

<!-- Admin Extension Specific Page Vendor -->
<script src="{{ asset('frontend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>
    // Bootstrap Datepicker No Conflict
    if (typeof($.fn.datepicker) != 'undefined') {
        $.fn.bootstrapDP = $.fn.datepicker.noConflict();
    }
</script>
<script src="{{ asset('frontend/vendor/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/vendor/select2/js/select2.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- Theme Custom -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('frontend/js/theme.init.js') }}"></script>

@yield('js')