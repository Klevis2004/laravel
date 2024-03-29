@include('admin.includes.header')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <div class="container-fluid pt-4 px-4">
        <div class="row justify-content-center">
            <div style="margin-top: 50px" class="col-sm-12 col-xl-6 mx-auto ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Category Registration</h6>
                    <form action="{{ route('category') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter the Category" required value="{{ old('category') }}">
                        </div>

                        <button type="submit" class="btn btn-info" style="color: white;">Submit</button>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Category Panel</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                @if ($categories->isNotEmpty())
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                <th>Category</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <a href="{{ route('cat.delete', $category->id) }}" onclick="confirmDelete()"
                                            class="delete" data-toggle="modal"><button type="button"
                                                class="btn btn-square btn-outline-danger m-2"><i class="material-icons"
                                                    data-toggle="tooltip" title="Delete">&#xE872;</i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No categories available.</p>
                @endif
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
