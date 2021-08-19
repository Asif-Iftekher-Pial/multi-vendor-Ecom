@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        {{-- @dd($allBanners); --}}


        <div class="header">
            <h2>All Banners</h2>
            <br>
            <a href="{{ route('banner.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new banner</i> </a>
            <h2>
                <p class="float-right ">Tottal banners : {{ $total_banners }} </p>
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
                        @foreach ($allBanners as $banner)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    <p class="c_name">{{ $banner->title }} </p>
                                </td>
                                <td>
                                    
                                    {!! html_entity_decode($banner->description) !!}

                                </td>
                                <td>
                                    <img src="{{ $banner->photo }}" alt="banner photo"
                                        style="max-height: 90px; max-idth: 120px">
                                </td>
                                <td>
                                    @if ($banner->condition == 'banner')
                                        <span class="badge badge-warning">{{ $banner->condition }}</span>
                                    @else
                                        <span class="badge badge-primary">{{ $banner->condition }}</span>
                                    @endif
                                </td>
                                <td>
                                    <input type="checkbox"  name="toogle" value="{{ $banner->id }}"
                                        data-toggle="switchbutton" {{ $banner->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>
                                <td>
                                    <a href="{{ route('banner.edit', $banner->id) }}" data-toggle="tooltip"
                                        class=" float-left btn btn-sm btn-outline-warning" title="edit"><i
                                            class="fa fa-edit"></i></a>
                                    <form class="float-left ml-2 " action="{{ route('banner.destroy', $banner->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="" data-toggle="tooltip" class="dltBtn btn btn-sm btn-outline-danger"
                                            title="delete" data-id="{{ $banner->id }}"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $allBanners->links() }}
            </div>
        </div>
    </div>
@endsection
