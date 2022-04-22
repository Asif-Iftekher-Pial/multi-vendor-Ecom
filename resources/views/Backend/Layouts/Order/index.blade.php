@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        <div class="header">
            <h2 class="badge badge-success">All Orders</h2>
            <h2>
                <p class="float-right ">Tottal orders : {{ app\models\Order::count() }} </p>
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
                            <th style="width:60px;">S.N</th>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order_number }}</td>
                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                <td><img src="{{ $item->photo }}" alt="User img"></td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->payment_method == 'cod' ? 'cash on delivery' : $item->payment_method }}</td>
                                <td>{{ ucfirst($item->payment_status) }}</td>
                                <td>${{ number_format($item->total_amount, 2) }}</td>
                                <td><span
                                        class="badge 
                                    @if ($item->condition == 'pending')
                                    badge-info
                                    @elseif ($item->condition == 'processing')
                                    badge-primary
                                    @elseif ($item->condition == 'delivered')
                                    badge-success
                                    @else
                                    badge-danger
                                    @endif
                                    ">{{ $item->condition }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('order.show', $item->id) }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-warning" title="view"><i
                                            class="fa fa-eye"></i></a>
                                    <form class="float-left ml-2 " action="{{ route('order.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                            title="delete" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No order found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{-- {{ $coupons->links() }} --}}
            </div>
        </div>
    </div>
@endsection


@section('backend_script')

    {{-- status toggle --}}
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
