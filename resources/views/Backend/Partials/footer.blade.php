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
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


{{-- Data Table CDN --}}
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


{{-- filemanager --}}
<script>
    $('#lfm').filemanager('image');
</script>

{{-- summer note --}}
<script src="{{ asset('backend/assets/summernote/summernote.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('#summary').summernote();
    });
</script>
{{-- error notification --}}
<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 4000);
</script>

{{--............................ Banner script ..................... --}}
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
                    //alert(responce.msg);
                    swal("Status Updated", {
                        icon: "success",
                    });

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
                text: "Once deleted, you will not be able to recover this file!",
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
                    swal("Your file is safe!", {
                        icon: "success",
                    });
                }
            });
    });
</script>
{{-- .....................Banner script end........................ --}}








{{-- ........................Category Script..................... --}}
{{-- status active or inactive button page:Category/index.blade.php --}}

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 
        $.ajax({
            url: "{{ route('category.status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id,
            },
            success: function(responce) {

                // console.log(responce.status);
                if (responce.status) {
                    //alert(responce.msg);
                    swal("Status Updated", {
                        icon: "success",
                    });

                } else {
                    alert('please try again');
                }
            }
        });
    });
</script>

{{-- script for category IS_parent check box ,checked or not --}}
<script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        //alert(is_checked);
        if(is_checked)
        {
            $('#parent_cat_div').addClass('d-none'); //if box is unchecked  parent category will be appear
            $('#parent_cat_div').val('');

        }else{
            $('#parent_cat_div').removeClass('d-none');     //if box is checked  parent category will **NOT** be appear
        }

    });
</script>
{{-- .....................category Scropt end...................... --}}






{{-- ........................Brand Script..................... --}}
{{-- status active or inactive button page:Brand/index.blade.php --}}

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 
        $.ajax({
            url: "{{ route('brand.status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id,
            },
            success: function(responce) {

                // console.log(responce.status);
                if (responce.status) {
                    //alert(responce.msg);
                    swal("Status Updated", {
                        icon: "success",
                    });

                } else {
                    alert('please try again');
                }
            }
        });
    });
</script>

{{-- script for brand IS_parent check box ,checked or not --}}
<script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        //alert(is_checked);
        if(is_checked)
        {
            $('#parent_cat_div').addClass('d-none'); //if box is unchecked  parent category will be appear
            $('#parent_cat_div').val('');

        }else{
            $('#parent_cat_div').removeClass('d-none');     //if box is checked  parent category will **NOT** be appear
        }

    });
</script>
{{-- .....................category Scropt end...................... --}}


{{-- ........................Product Script..................... --}}
{{-- status active or inactive button page:Product/index.blade.php --}}

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 
        $.ajax({
            url: "{{ route('product.status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id,
            },
            success: function(responce) {

                // console.log(responce.status);
                if (responce.status) {
                    //alert(responce.msg);
                    swal("Status Updated", {
                        icon: "success",
                    });

                } else {
                    alert('please try again');
                }
            }
        });
    });
</script>

{{-- .....................category Scropt end...................... --}}



{{-- ......................Create Product blade file script --}}

<script>
    $('#cat_id').change(function(){
        var cat_id=$(this).val();
        //alert(cat_id);
        if(cat_id !=null){
            $.ajax({
                url:"/admin/category/"+cat_id+"/child",
                type:"POST",
                data:{
                    _token:"{{ csrf_token() }}",
                    cat_id:cat_id,

                },
                success:function(response){
                    var html_option="<option value=''>-- Child Category --</option>";
                    //console.log(response);
                    if(response.status){
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data,function(id,title){

                            html_option +="<option value='"+id+"'>"+title+"</option>"
                        });
                        
                    }
                    else{
                       $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                }
            });
        }

    });
</script>


@yield('script') {{-- this yield is for product edit.blade.php --}}
{{-- ......................Create Product bladefile script  End--}}




