@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        {{-- @dd($allBanners); --}}


        <div class="header">
            <h2>All Shippings</h2>
            <br>
            <a href="{{ route('shipping.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new shippings</i> </a>
            <h2>
                <p class="float-right ">Tottal shippings : {{ App\Models\Shipping::count() }} </p>
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
                            <th>Shipping Address</th>
                            <th>Delivery times</th>
                            <th>Delivery charge</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shippings as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    <p class="c_name">{{ $item->shipping_address }} </p>
                                </td>
                                <td>
                                    
                                    <p>{{ $item->delivery_time }}</p>

                                </td>
                                <td>
                                    <p>{{ number_format($item->delivery_charge,2) }}</p>
                                </td>
                                
                                <td>
                                    <input type="checkbox"  name="toogle" value="{{ $item->id }}"
                                        data-toggle="switchbutton" {{ $item->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{ route('shipping.edit', $item->id) }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-warning" title="edit"><i
                                            class="fa fa-edit"></i></a>
                                    <form class="float-left ml-2 " action="{{ route('shipping.destroy', $item->id) }}"
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
                
            </div>
        </div>
    </div>
@endsection
