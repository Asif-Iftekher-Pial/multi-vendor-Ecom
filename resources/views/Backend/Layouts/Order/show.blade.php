@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

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
                <h3>Customer Info</h3>
                <table class="table table-hover m-b-0 c_list">
                    <thead>
                        <tr>
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

                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td><img src="{{ $order->photo }}" alt="User img"></td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->payment_method == 'cod' ? 'cash on delivery' : $order->payment_method }}</td>
                            <td>{{ ucfirst($order->payment_status) }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td><span
                                    class="badge 
                                    @if ($order->condition == 'pending')
                                    badge-info
                                    @elseif ($order->condition == 'processing')
                                    badge-primary
                                    @elseif ($order->condition == 'delivered')
                                    badge-success
                                    @else
                                    badge-danger
                                    @endif
                                    ">{{ $order->condition }}</span>
                            </td>
                            <td>
                                <a href="{{ route('order.show', $order->id) }}" data-toggle="tooltip"
                                    class=" float-left btn btn-sm btn-outline-success" title="download"><i
                                        class="fa fa-download"></i></a>
                                <form class="float-left ml-2 " action="{{ route('order.destroy', $order->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                        title="delete" data-id="{{ $order->id }}"><i class="fa fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>


                    </tbody>
                </table>
                <br>
                <br>
                <h3>Order Details</h3>
                <table class="table table-hover m-b-0 c_list">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $item)

                            @php
                                $image = explode(',', $item->photo);
                            @endphp
                            <tr>
                                <td></td>
                                <td><img src="{{ $image[0] }}" alt="product img" style="max-width: 100px"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>

                            </tr>

                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-5 border py-3">
                <p><strong>SubTotal</strong>:${{ number_format($order->sub_total, 2) }}</p>
                <p><strong>Shipping Cost</strong>:${{ number_format($order->delivery_charge, 2) }}</p>
                @if ($order->coupon > 0)
                    <p><strong>Coupon</strong>:${{ number_format($order->coupon, 2) }}</p>
                @else
                    <p class="badge badge-danger">No coupon applied</p>
                @endif

                <p><strong>Total</strong>:${{ number_format($order->total_amount, 2) }}</p>

                <form action="{{ route('order.status', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <strong>Status:</strong>
                    <select name="condition" class="form-control" id="">
                        <option value="pending"
                            {{ $order->condition == 'delivered' || $order->condition == 'cancelled' ? 'disabled' : '' }}
                            {{ $order->condition == 'pending' ? 'selected' : '' }}>Pending</option>

                        <option value="processing"
                            {{ $order->condition == 'delivered' || $order->condition == 'cancelled' ? 'disabled' : '' }}
                            {{ $order->condition == 'processing' ? 'selected' : '' }}>Processing</option>

                        <option value="delivered" {{ $order->condition == 'cancelled' ? 'disabled' : '' }}
                            {{ $order->condition == 'delivered' ? 'selected' : '' }}>Delivered</option>

                        <option value="cancelled" {{ $order->condition == 'delivered' ? 'disabled' : '' }}
                            {{ $order->condition == 'cancelled' ? 'selected' : '' }}>Cancelled</option>


                    </select>
                    <button type="submit" class=" btn btn-sm btn-success">Update</button>
                </form>
            </div>
            <div class="col-1"></div>
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
