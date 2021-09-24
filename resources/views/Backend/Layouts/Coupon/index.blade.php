@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
       


        <div class="header">
            <h2>All Coupons</h2>
            <br>
            <a href="{{ route('coupon.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new coupon</i> </a>
            <h2>
                <p class="float-right ">Tottal coupons : {{ $tottal_coupon }} </p>
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
                            <th>Code</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    <p class="c_name">{{ $item->code }} </p>
                                </td>
                               
                                <td>
                                    @if ($item->type == 'fixed')
                                        <span class="badge badge-warning">{{ $item->type }}</span>
                                    @else
                                        <span class="badge badge-primary">{{ $item->type }}</span>
                                    @endif
                                </td>
                                <td>
                                    <p class="c_name">{{ $item->value }}%</p>
                                </td>
                                <td>
                                    <input type="checkbox"  name="toogle" value="{{ $item->id }}"
                                        data-toggle="switchbutton" {{ $item->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{ route('coupon.edit', $item->id) }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-warning" title="edit"><i
                                            class="fa fa-edit"></i></a>
                                    <form class="float-left ml-2 " action="{{ route('coupon.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                            title="delete" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
@endsection


@section('backend_script')

<script>
    $('input[name=toogle]').change(function() {
        var mode = $(this).prop('checked');
        var id = $(this).val();
        //alert(id); 
        $.ajax({
            url: "{{ route('coupon.status') }}",
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
    
@endsection
