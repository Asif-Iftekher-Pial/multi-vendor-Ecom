@extends('Backend.sellerMaster')
@section('seller_main_content')
    <div class="card">
        {{-- @dd($allBanners); --}}


        <div class="header">
            <h2>Seller Brands</h2>
            <br>
            <a href="{{ route('SellerBrand.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new brand</i> </a>
            <h2>
                <p class="float-right ">Tottal brands :  </p>
            </h2>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="body">
            <div class="table-responsive">
                <table id="table_id" class="table table-hover m-b-0 c_list">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBrands as $brand)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    <p class="c_name">{{ $brand->title }} </p>
                                </td>
                                <td>
                                    
                                    {!! html_entity_decode($brand->slug) !!}

                                </td>
                                <td>
                                    <img src="{{ $brand->photo }}" alt="brand photo"
                                        style="max-height: 90px; max-idth: 120px">
                                </td>
                                
                                <td>
                                    <input type="checkbox"  name="toogle" value="{{ $brand->id }}"
                                        data-toggle="switchbutton" {{ $brand->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{ route('SellerBrand.edit', $brand->id) }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-warning" title="edit"><i
                                            class="fa fa-edit"></i></a>
                                    <form class="float-left ml-2 " action="{{ route('SellerBrand.destroy', $brand->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                            title="delete" data-id="{{ $brand->id }}"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $allBrands->links() }}
            </div>
        </div>
    </div>
@endsection



@section('sellerbackend_script')
{{-- status active or inactive --}}
<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 
        $.ajax({
            url: "{{ route('sellerBrand.status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                mode: mode,
                id: id,
            },
            success: function(responce) {

                 //console.log(responce.status);
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


@endsection
