@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        {{-- @dd($parent_cat); --}}
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Edit Category</h5>
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('patch')



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



                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" name="title"
                                        value="{{ $category->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Summary</label>
                                    <textarea id="description" class="form-control" placeholder="Write about this image"
                                        name="summary">{{ $category->summary  }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Add as Parent Category? : </label>
                                    <input id="is_parent" type="checkbox" name="is_parent" value="1"> Yes
                                </div>

                                <div class="form-group {{ $category->is_parent==1 ? 'd-none' : '' }}"  id="parent_cat_div">
                                    <label for="">Parent Category <span class="text-danger">*</span></label>
                                    <select name="parent_id" class="form-control show-tick">
                                        <option value="">-- Parent Category --</option>
                                        @foreach ($parent_cat as $pcats)
                                            <option value="{{ $pcats->id }}" {{ $pcats->id == $category->parent_id ? 'selected' : ''}}>{{ $pcats->title }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Select status --</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>

                                    </select>
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
                                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $category->photo }}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
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
