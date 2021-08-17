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
<script src="{{ asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js') }}"></script>
{{-- sweetaleart cdn --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- summernote --}}
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

{{-- error notifucation --}}
<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 4000);
</script>

{{-- status active or inactive button page:Banner/index.blade.php --}}

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 

        $.ajax({
            url: "{{ route('banner.status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id,
            },
            success: function(responce) {

                // console.log(responce.status);
                if (responce.status) {
                    alert(responce.msg);

                } else {
                    alert('please try again');
                }
            }
        });
    });
</script>

{{-- script for deleting button , page:banner/index.blade.php --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this  file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! Your file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your file is safe!");
                }
            });

    });
</script>
