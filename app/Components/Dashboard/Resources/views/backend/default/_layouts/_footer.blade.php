    <!-- jQuery -->
    <script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('templates/backend/default/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('templates/backend/default/dist/js/admin.js')}}"></script>
    <script type="text/javascript">
        var base_url = '{{ url('/') }}';
    </script>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/chosen/chosen.jquery.min.js')}}"></script>

    <script src="{{asset('templates/backend/default/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templates/backend/default/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/fancybox/jquery.fancybox.js?v=2.1.5')}}"></script>

    <script type="text/javascript">
        $(function(){
            $('.form-delete').submit(function(){
                return confirm("Are you sure you want to delete the selected record ?");
            });
            $( 'textarea.editor-ckeditor' ).ckeditor();
            $('.dataTables').DataTable({
                responsive: true
            });
            $('.datepicker').datepicker();
            $(".chosen-select").chosen();
            $('.fancybox').fancybox();
        }(jQuery));
    </script>

    @section('scripts')

    @show
</body>
</html