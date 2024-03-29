@include('admin.includes.header')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@if (Auth::check() && Auth::user()->role == 2)
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Admin Panel</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="table_id">
                    <thead>

                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role == 1)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $user->id }}</td>
                                    <td><img style="width: 100px" src="{{ asset('storage/' . $user->profile_photo) }}"
                                            alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('removeadmin', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-square btn-outline-success m-2"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Change Status">&#xE254;</i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}"
                                            onclick="confirmDelete()" class="delete" data-toggle="modal"><button
                                                type="button" class="btn btn-square btn-outline-danger m-2"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i></button></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">User Panel</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="user_id">
                    <thead>

                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role == 0)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $user->id }}</td>
                                    <td><img style="width: 100px" src="{{ asset('storage/' . $user->profile_photo) }}"
                                            alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('makeadmin', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-square btn-outline-success m-2"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Change Status">&#xE254;</i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}"
                                            onclick="confirmDelete()" class="delete" data-toggle="modal"><button
                                                type="button" class="btn btn-square btn-outline-danger m-2"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i></button></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this post?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@else
@endif
@include('admin.includes.footer')
