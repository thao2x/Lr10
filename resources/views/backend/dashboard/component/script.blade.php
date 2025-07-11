<!-- Mainly scripts -->
<<<<<<< HEAD
=======
<script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
>>>>>>> 91037d29506f6dced6d6a5c73a5695397a43f39b
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

@if (isset($config['js']) && is_array($config['js'] ))
    @foreach ($config['js'] as $val)
        <script src="{{ asset($val) }}"></script>
    @endforeach
@endif
