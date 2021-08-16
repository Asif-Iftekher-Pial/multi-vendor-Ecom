@extends('Backend.backEndMaster')
@section('main_content')


    <div class="card">
        <form action="" method="POST">
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="body">
                        <h5>Create new banner</h5>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" name="title"
                                        value="{{ old('title') }}">
                                </div>
                                <div  class="form-group">
                                    <label for="">Description</label>
                                    <textarea id="description" class="form-control" placeholder="Write about this image"
                                        name="description">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Condition <span class="text-danger">*</span></label>
                                    <select name="condition" class="form-control show-tick">
                                        <option value="">-- Condition --</option>
                                        <option value="banner" {{ old('condition')=='banner' ? 'selected' : '' }}>Banner</option>
                                        <option value="promo" {{ old('condition')=='promo' ? 'selected' : '' }}>Promote</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Select status --</option>
                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Upload picture<span class="text-danger">*</span></label>
                                   
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                          </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="filepath">
                                      </div>
                                      <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                                </div>
                            </div>
                            
                        </div>
                        <button type="button" class="btn btn-primary">Create</button> &nbsp;&nbsp;
                        <button type="button" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
@endsection


