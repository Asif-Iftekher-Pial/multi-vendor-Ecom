@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">
        {{-- @dd($products); --}}


        <div class="header">
            <h2>All users</h2>
            <br>
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-outline-primary"><i class="icon-plus">Create new
                    users</i> </a>
            <h2>
                <p class="float-right ">Tottal users : {{ $tottal_users }} </p>
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
                            <th>Photo</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            @php
                                $photo = explode(',', $item->photo);
                            @endphp
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img src="{{ $photo[0] }}" alt="Product photo"
                                        style="border-radius: 50%; max-height: 60px; max-width: 100%">
                                </td>

                                <td>
                                    <p class="c_name">{{ $item->full_name }} </p>
                                </td>

                                <td>
                                    <p class="c_name">{{ $item->username }} </p>
                                </td>


                                <td>
                                    {{ $item->email }}
                                </td>

                                <td>

                                    @if ($item->role == 'admin')

                                        <p class="badge badge-danger">{{ $item->role }}</p>

                                    @elseif ($item->role=='vendor')

                                        <p class="badge badge-warning">{{ $item->role }}</p>

                                    @else

                                        <p class="badge badge-primary">{{ $item->role }}</p>

                                    @endif

                                </td>

                                <td>
                                    <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                        data-toggle="switchbutton" {{ $item->status == 'active' ? 'checked' : '' }}
                                        data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success"
                                        data-offstyle="danger">
                                </td>
                                <td>
                                    <div style="display: flex; jusity-content:space-between; ">

                                        <div style="margin-right:11px;">
                                            <a href="{{ route('user.show', $item->id) }}" data-toggle="modal"
                                                data-target="#userID{{ $item->id }}" data-toggle="tooltip"
                                                class=" float-left ml-2 btn btn-sm btn-outline-primary" title="view"><i
                                                    class="fa fa-eye"></i></a>


                                        </div>
                                        <div>

                                            <a href="{{ route('user.edit', $item->id) }}" data-toggle="tooltip"
                                                class=" float-right ml-2 btn btn-sm btn-outline-warning" title="edit"><i
                                                    class="fa fa-edit"></i></a>

                                        </div>

                                        <div>
                                            <form class="float-left ml-2 "
                                                action="{{ route('user.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle="tooltip"
                                                    class="dltBtn btn btn-sm btn-outline-danger" title="delete"
                                                    data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                            </form>
                                        </div>
                                    </div>



                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="userID{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        @php
                                            $user = \App\Models\User::where('id', $item->id)->first();
                                        @endphp
                                        
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div style="text-center">
                                                    <img src="{{ $photo[0] }}" alt="Product photo"
                                                        style="border-radius:50%;max-height: 90px; max-idth: 120px ; margin-bottom: -22px;">
                                                </div>
                                                {{-- <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ Str::upper($user->full_name) }} <br>
                                                    ({{ Str::upper($user->username) }})
                                                </h5> --}}

                                                <div class="col align-self-end"
                                                    style="  padding-right: initial;text-align: right;">
                                                    <strong>Status:</strong>
                                                    @if ($user->status == 'inactive')
                                                        <p class="badge badge-danger">{{ $user->status }}</p>
                                                    @else
                                                        <p class="badge badge-success">{{ $user->status }}</p>
                                                    @endif

                                                </div>

                                            </div>
                                            <div class="modal-body">


                                               



                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <strong>Address:</strong>
                                                        <p>{{ $user->address }}</p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <strong>Phone:</strong>
                                                        <p class="badge badge-success">
                                                            {{ $item->phone }}</p>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <strong>Role:</strong>
                                                        <p class="badge badge-success">
                                                            {{ $item->role }}</p>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal end --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
