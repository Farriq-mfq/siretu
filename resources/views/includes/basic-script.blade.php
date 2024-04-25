{{--
    turbo links not running in js
    solution 1 :
    - give the attribute "data-turbolinks-eval" and set false
--}}
<script src="{{ url('assets/js/config.js') }}" data-turbolinks-eval="false"></script>
<script src="{{ url('assets/vendor/js/helpers.js') }}" data-turbolinks-eval="false"></script>
<script src="{{ url('assets/vendor/libs/jquery/jquery.js') }}" data-turbolinks-eval="false"></script>
<script src="{{ url('assets/vendor/libs/popper/popper.js') }}" data-turbolinks-eval="false"></script>
<script src="{{ url('assets/vendor/js/bootstrap.js') }}" data-turbolinks-eval="false"></script>
<script src="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}" data-turbolinks-eval="false">
</script>
<script src="{{ url('assets/vendor/js/menu.js') }}" data-turbolinks-eval="false"></script>
@vite('resources/js/app.js')
@stack('scripts')
