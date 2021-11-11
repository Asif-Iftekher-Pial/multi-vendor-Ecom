@extends('Backend.backEndMaster')
@section('main_content')

    <div class="card">
        <div class="header">
            <h2>Name-<strong>{{ $product->title }}</strong></h2>
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
            <div class="content">
                <form action="{{ route('product.attribute', $product->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div id="product_attribute" class="content"
                                data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                <div class="row">
                                    <div class="col-md-11"><button type="button" id="btnAdd-1"
                                            class="btn btn-sm my-2 btn-primary"><i class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                                <div class="row group">
                                    <div class="col-md-2">
                                        <label for="">Size</label>
                                        <input class="form-control form-control-sm" name="size[]" placeholder="eg. S or XL"
                                            type="text">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Original Price</label>
                                        <input class="form-control form-control-sm" name="original_price[]"
                                            placeholder="eg. 2000" step="any" type="number">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Offer Price</label>
                                        <input class="form-control form-control-sm" name="offer_price[]"
                                            placeholder="eg. 2000" step="any" type="number">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Stock</label>
                                        <input class="form-control form-control-sm" name="stock[]" placeholder="eg. 4"
                                            type="number">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class=" mt-4 btn btn-danger btn-sm btnRemove"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-top: 10px">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                           
                        </div>
                </form>
                {{-- table --}}
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0 c_list">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Size</th>
                                    <th>Original</th>
                                    <th>Offer</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($productattr) > 0)
                                    @foreach ($productattr as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>$ {{ number_format($item->original_price, 2) }}</td>
                                            <td>$ {{ number_format($item->offer_price, 2) }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>
                                                <form class="float-left ml-2 "
                                                    action="{{ route('product.attribute.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip"
                                                        class="dltBtn btn btn-sm btn-outline-danger" title="delete"
                                                        data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('backend/assets/jquery.multifield.min.js') }}"></script>
    <script>
        $('#product_attribute').multifield();
    </script>

@endsection
