@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        {{-- @dd($allBanners); --}}


        <div class="header">
            <h2>Basic Example 2</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 c_list">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBanners as $banner )
                        <tr>
                            <td >
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                
                                <p class="c_name">{{ $banner->title }} </p>
                            </td>
                            <td>
                                {{ $banner->description }} 
                               
                            </td>
                            <td>
                                <img src="{{$banner->photo}}" alt="banner photo" style="max-height: 90px; max-idth: 120px">
                            </td>
                            <td>
                               @if ($banner->condition=='banner')
                                    <span class="badge badge-warning">{{ $banner->condition }}</span>
                                @else
                                   <span class="badge badge-primary">{{ $banner->condition }}</span>
                               @endif
                            </td>
                            <td>


                            </td>
                            <td>
                                <button type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                                <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert"
                                    title="Delete"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                       
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
