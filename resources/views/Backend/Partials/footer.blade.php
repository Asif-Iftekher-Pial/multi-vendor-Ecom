<!-- Javascript -->
<script src="{{ asset('backend/additional/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('backend/additional/assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('backend/additional/assets/bundles/jvectormap.bundle.js') }}"></script>
<!-- JVectorMap Plugin Js -->
<script src="{{ asset('backend/additional/assets/bundles/morrisscripts.bundle.js') }}"></script>
<!-- Morris Plugin Js -->
<script src="{{ asset('backend/additional/assets/bundles/knob.bundle.js') }}"></script>
<!-- Jquery Knob-->

<script src="{{ asset('backend/additional/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('backend/additional/assets/js/index8.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    $('#lfm').filemanager('image');
</script>
<script src="{{ asset('backend/assets/summernote/summernote.js') }}"></script>
<script>
    $(document).ready(
        function() {
            $('#description').summernote();
        }
    );
</script>

<script>
setTimeout(function(){
    $('#alert').slideUp();
},4000);
</script>
