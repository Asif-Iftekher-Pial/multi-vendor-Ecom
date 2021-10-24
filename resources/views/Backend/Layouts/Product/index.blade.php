@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        {{-- @dd($products); --}}


        <div class="header">
            <h2>All Product</h2>
            <br>
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new
                    Product</i> </a>
            <h2>
                <p class="float-right ">Tottal Products : {{ $tottal_products }} </p>
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
                            <th>Photo</th>
                            <th>Size Guide</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Size</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        @php
                            $photo=explode(',',$item->photo);
                            $sizephoto=explode(',', $item->size_guide);
                        @endphp
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    <p class="c_name">{{ $item->title }} </p>
                                </td>

                                <td>
                                    <img src="{{ $photo[0] }}" alt="Product photo"
                                        style=";max-height: 100px; max-width: 100px">
                                </td> 
                                <td>
                                    <img src="{{ $sizephoto[0] }}" alt="Product size"
                                        style=";max-height: 100px; max-width: 100px">
                                </td> 
                                <td>
                                    ${{ number_format($item->price, 2) }}
                                </td>

                                <td>
                                    {{ $item->discount, 2 }}%
                                </td>
                                <td>{{ $item->size }}</td>

                                <td>
                                    @if ($item->conditions == 'new')
                                        <span class="badge badge-success">{{ $item->conditions }}</span>
                                    @elseif ($item->conditions == 'popular')
                                        <span class="badge badge-primary">{{ $item->conditions }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $item->conditions }}</span>
                                    @endif
                                </td>
                                <td>
                                    <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                        data-toggle="switchbutton" {{ $item->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>


                                {{-- buttons --}}
                                <td>
                                    <a href="javascript:void(0);" data-toggle="modal"
                                        data-target="#productID{{ $item->id }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-secondary ml-2" title="view"><i
                                            class="fa fa-eye"></i></a>

                                    <a href="{{ route('product.show', $item->id) }}"  data-toggle="tooltip"
                                        class=" float-left ml-2 btn btn-sm btn-outline-primary" title="add attribute"><i class="fa fa-plus-circle"></i></a>


                                    <a href="{{ route('product.edit', $item->id) }}" data-toggle="tooltip"
                                        class=" float-right btn btn-sm btn-outline-warning" title="edit"><i
                                            class="fa fa-edit"></i></a>


                                    <form class="float-left ml-2 " action="{{ route('product.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                            title="delete" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>





                                <!-- Modal -->
                                <div class="modal fade" id="productID{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">


                                        @php
                                            $product = \App\Models\Product::where('id', $item->id)->first();
                                        @endphp


                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ Str::upper($product->title) }}
                                                </h5>

                                                <div class="col align-self-end"
                                                    style="  padding-right: initial;text-align: right;">
                                                    <strong>Status:</strong>
                                                    @if ($product->status == 'inactive')
                                                        <p class="badge badge-danger">{{ $product->status }}</p>
                                                    @else
                                                        <p class="badge badge-success">{{ $product->status }}</p>
                                                    @endif

                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <strong>Summary:</strong>
                                                <p>{!! html_entity_decode($product->summary) !!}</p>

                                                <strong>Description:</strong>
                                                <p>{!! html_entity_decode($product->description) !!}</p>

                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <strong>Price:</strong>
                                                        <p class="badge badge-primary">
                                                            ${{ number_format($product->price, 2) }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Discount:</strong>
                                                        <p class="badge badge-danger">{{ $product->discount }}%</p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <strong>Offer Price:</strong>
                                                        <p class="badge badge-success">
                                                            ${{ number_format($product->offer_price, 2) }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Brand:</strong>
                                                        <p class="badge badge-primary">
                                                            {{ \App\Models\Brand::where('id', $product->brand_id)->value('title') }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Stock:</strong>
                                                        <p class="badge badge-primary">
                                                            {{ $product->stock }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Size:</strong>
                                                        <p class="badge badge-success">{{ $product->size }}</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>Category:</strong>
                                                        <p class="badge badge-warning">
                                                            {{ \App\Models\Categorie::where('id', $product->cat_id)->value('title') }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Child Category:</strong>
                                                        <p class="badge badge-warning">
                                                            {{ \App\Models\Categorie::where('id', $product->child_cat_id)->value('title') }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Condition:</strong>
                                                        <p class="badge badge-primary">{{ $product->conditions }}</p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <strong>Vendor:</strong>
                                                        <p class="badge badge-success">
                                                            {{ \App\Models\Seller::where('id', $product->vendor_id)->value('full_name') }}
                                                        </p>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal end --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

