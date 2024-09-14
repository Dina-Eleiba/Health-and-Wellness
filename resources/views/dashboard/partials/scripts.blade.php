   <!-- plugins:js -->
   <script src="{{ asset('assets/dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <script src="{{ asset('assets/dashboard/vendors/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="{{ asset('assets/dashboard/js/off-canvas.js') }}"></script>
   <script src="{{ asset('assets/dashboard/js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('assets/dashboard/js/misc.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page -->
   <script src="{{ asset('assets/dashboard/js/dashboard.js') }}"></script>
   <script src="{{ asset('assets/dashboard/js/main.js') }}"></script>
   <script src="{{ asset('assets/dashboard/js/todolist.js') }}"></script>
   <script src="{{ asset('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

   <script>
    document.querySelectorAll('textarea').forEach(textarea => {
        ClassicEditor
            .create(textarea, {
                toolbar: ['undo', 'redo', 'heading', 'bold', 'italic', 'underline', 'strikethrough', 'alignment',
                    'bulletedList', 'numberedList',
                    'imageUpload',
                    'link', 'mediaEmbed', 'selectAll', 'alignment:left', 'alignment:right', 'alignment:center',
                    'alignment:justify'
                ],
                alignment: {
                    options: ['left', 'center', 'right', 'justify']
                }
            })
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    });
</script>

   <!-- End custom js for this page -->
@stack('js')
