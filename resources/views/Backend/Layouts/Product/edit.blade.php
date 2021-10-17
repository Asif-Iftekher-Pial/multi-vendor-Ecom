@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Edit Product</h5>
                    <form action="{{ route('product.update',$product->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        {{-- new error message --}}
                        {{-- <div class="col-lg-12">
                            @include('Backend.Partials.Notification.notification')
                        </div> --}}

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

                        {{-- @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif --}}
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" name="title"
                                        value="{{ $product->title }}">
                                </div> 
                                
                                <div class="form-group">
                                    <label for="">Summary <span class="text-danger">*</span></label>
                                    <textarea id="summary" class="form-control" placeholder="Some text...." name="summary">{{ $product->summary }}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea id="description" class="form-control description" placeholder="Write about this image"
                                        name="description">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Stock <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="Stock" name="stock"
                                        value="{{ $product->stock }}">
                                </div> 

                                <div class="form-group">
                                    <label for="">Price <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" placeholder="Price" name="price"
                                        value="{{ $product->price }}">
                                </div> 
                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <input type="number" min="0" max="100" step="any" class="form-control" placeholder="Discount" name="discount"
                                        value="{{ $product->discount }}">
                                </div> 

                                <div class="form-group">
                                    <label for="">Brands<span class="text-danger">*</span></label>
                                    <select name="brand_id" class="form-control show-tick">
                                        <option value="">-- Brands --</option>
                                       @foreach (\App\Models\Brand::get() as $brand)
                                       <option value="{{ $brand->id }}"   {{ $brand->id==$product->brand_id ? 'selected' : '' }} >{{ $brand->title }}</option>
                                       @endforeach

                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Category <span class="text-danger">*</span></label>
                                    <select id="cat_id" name="cat_id" class="form-control show-tick">
                                        <option value="">-- Category --</option>
                                        @foreach (\App\Models\Categorie::where('is_parent',1)->get() as $cat)
                                       <option value="{{ $cat->id }}" {{ $cat->id==$product->cat_id ? 'selected' : '' }}>{{ $cat->title }}</option>
                                       @endforeach

                                    </select>
                                </div>

                                <div class="form-group d-none" id="child_cat_div">
                                    <label for="">Child Category<span class="text-danger">*</span></label>
                                    <select id="child_cat_id" name="child_cat_id" class="form-control show-tick">
                                        

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Size <span class="text-danger">*</span></label>
                                    <select name="size" class="form-control show-tick">
                                        <option value="">-- Select Size --</option>
                                        <option value="S" {{ $product->size == 'S' ? 'selected' : '' }}>Small</option>
                                        <option value="M" {{ $product->size == 'M' ? 'selected' : '' }}>Medium</option>
                                        <option value="L" {{ $product->size == 'L' ? 'selected' : '' }}>Large</option>
                                        <option value="XL"{{ $product->size == 'XL' ? 'selected' : '' }}>Extra Large</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Condition <span class="text-danger">*</span></label>
                                    <select name="conditions" class="form-control show-tick">
                                        <option value="">-- Select Condition --</option>
                                        <option value="new" {{ $product->conditions == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="popular" {{ $product->conditions == 'popular' ? 'selected' : '' }}>Popular</option>
                                        <option value="winter" {{ $product->conditions == 'winter' ? 'selected' : '' }}>Winter</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Vendors<span class="text-danger">*</span></label>
                                    <select name="vendor_id" class="form-control show-tick">
                                        <option value="">-- Vendors --</option>
                                       @foreach (\App\Models\User::where('role','vendor')->get() as $vendor)
                                       <option value="{{ $vendor->id }}" {{ $vendor->id==$product->vendor_id ? 'selected' : '' }}>{{ $vendor->full_name }}</option>
                                       @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Select status --</option>
                                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Additional Information</label>
                                    <textarea id="description" class="form-control description" placeholder="Write about this image"
                                        name="additional_info">{{ $product->additional_info }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Return & Cancallation</label>
                                    <textarea id="description" class="form-control description" placeholder="Write about this image"
                                        name="return_cancellation">{{ $product->return_cancellation }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Upload picture<span class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $product->photo }}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Size Guide<span class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm1" data-input="thumbnail1" data-preview="holder1"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail1" class="form-control" type="text" value="{{ $product->size_guide }}" name="size_guide">
                                    </div>
                                    <div id="holder1" style="margin-top:15px;max-height:100px;"> </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                        <button type="" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('backend_script')
{{-- description for additional info ,size giude and return cancallation ,class="description" --}}
<script>
    $(document).ready(function() {
        $('.description').summernote();
    });
</script>
{{-- description for additional info ,size giude and return cancallation ,class="description" --}}


<script>

    var child_cat_id={{ $product->child_cat_id }};
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

                            html_option +="<option value='"+id+"' "+(child_cat_id==id ? 'selected' : '')+">"+title+"</option>"
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
    if(child_cat_id != null){
        $('#cat_id').change();
    }
</script>
    
@endsection