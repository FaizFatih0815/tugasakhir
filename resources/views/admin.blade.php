@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <div style="margin-bottom:20px">
                    <h1 class="font-weight-bold mb-0 text-gray-100">User</h1>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6>Error</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif

            </div>

            <div class="table-responsive card mb-3" style="background: #222831">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th class="text-gray-100" scope="col">Nama</th>
                            <th class="text-gray-100" scope="col">Email</th>
                            <th class="text-gray-100" scope="col">Role</th>
                            <th class="text-gray-100 w-25" style="text-align:center" scope="col">Customize</th>

                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach ($paginatedResults as $res)
                            <tr>
                                <th class="text-gray-100" scope="row">{{ $res['time'] }}</th>
                                <td class="text-gray-100">{{ $res['value'] }} V</td>
                            </tr>
                        @endforeach --}}
                        @foreach ($users as $user)
                            <tr>
                                <td style="color:#FFFFFF">{{ $user->name }}</td>
                                <td style="color:#FFFFFF">{{ $user->email }}</td>
                                <td style="color:#FFFFFF">{{ $user->role }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary" style="margin-right: 2%"
                                            data-toggle="modal" data-target="#editmodal{{ $user->id }}">
                                            <i class="fas fa-solid fa-pen mr-2"></i>
                                            <span class="font-weight-bold" style="color:#FFFFFF">Edit</span>
                                        </button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deletemodal{{ $user->id }}">
                                            <i class="fas fa-solid fa-trash pr-2"></i>
                                            <span class="font-weight-bold" style="color:#FFFFFF">Delete</span>
                                        </button>


                                        <div class="modal fade" id="editmodal{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.updateuser', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                                    <input type="text" name="name"
                                                                        class="form-control form-control-user"
                                                                        id="exampleFirstName" placeholder="Name"
                                                                        style="border-radius:2rem"
                                                                        value="{{ $user->name }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                                    <input type="text" name="email"
                                                                        class="form-control form-control-user"
                                                                        id="exampleFirstName" placeholder="Email"
                                                                        style="border-radius:2rem"
                                                                        value="{{ $user->email }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1">Role
                                                                        </label>
                                                                        <select name="role" class="form-control"
                                                                            id="exampleFormControlSelect1">
                                                                            <option value="admin"
                                                                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                                                admin</option>
                                                                            <option value="user"
                                                                                {{ $user->role == 'user' ? 'selected' : '' }}>
                                                                                user</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" type="submit">Simpan</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="deletemodal{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.deleteuser', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus user "{{ $user->name }}"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" type="submit">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addusermodal">
                    <i class="fas fa-solid fa-plus pr-2"></i>
                    <span class="font-weight-bold" style="color:#FFFFFF">Tambah User</span>
                </button>

            </div>
            {{ $users->links('pagination::custom') }}
        </div>
    </div>

    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('admin.adduser') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" name="name" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Name" style="border-radius:2rem" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" name="email" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Email" style="border-radius:2rem" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="password" style="border-radius:2rem"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role
                                    </label>
                                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                                        <option value="admin">
                                            admin</option>
                                        <option value="user">
                                            user</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });
        })
    </script>
@stop
