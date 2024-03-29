@include('admin.includes.header')
@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        .status-container {
            display: flex;
            align-items: center;
        }

        .status-point {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .pending {
            background-color: orange;
        }

        .completed {
            background-color: green;
        }
    </style>

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
                                <th>Book Id</th>
                                <th>User Id</th>
                                <th>Sasia</th>
                                <th>Payment Status</th>
                                <th>Bill</th>
                                <th>Data Blerjes</th>
                                <th>Finish</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{ $sale->id }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link libri saleButton"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $sale->book_id }}">
                                            {{ $book = \App\helper_books($sale->book_id)->name }}
                                        </button>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-link libri usersButton"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                            data-id="{{ $sale->user_id }}">
                                            {{ $user = \App\helper_user($sale->user_id)->name }}
                                        </button>
                                    </td>
                                    <td>{{ $sale->sasia }}</td>
                                    <td>
                                        @if ($sale->payment_status == 0)
                                            <div class="status-container"><span
                                                    class="status-point pending"></span>Pending
                                            </div>
                                        @elseif ($sale->payment_status == 1)
                                            <div class="status-container"><span
                                                    class="status-point completed"></span>Completed</div>
                                        @endif
                                    </td>

                                    <td>{{ $sale->bill }}</td>
                                    <td>{{ $sale->data_blerjes }}</td>
                                    <td>
                                        <form action="{{ route('sale_dorezimi', ['id' => $sale->id]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-square btn-outline-success m-2"><i
                                                    class="fa-regular fa-calendar-check"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete_staticsales', ['id' => $sale->id]) }}"
                                            onclick="return confirmDelete()" class="delete" data-toggle="modal">
                                            <button type="button" class="btn btn-square btn-outline-danger m-2">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="libri_show text-center">
                            <form action="">
                                <div id="bookInfoContainer" class="d-flex flex-column align-items-center">
                                    <img style="width: 150px; border-radius: 8px;" src="" alt=""
                                        id="bookImage">
                                    <h2 id="bookName" class="mt-3"></h2>
                                    <p id="bookAuthor"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="libri_show text-center">
                            <form action="">
                                <div id="bookInfoContainer" class="d-flex flex-column align-items-center">
                                    <img style="width: 150px; border-radius: 8px;" src="" alt=""
                                        id="userImage">
                                    <h2 id="userName" class="mt-3"></h2>
                                    <p id="userEmail" class="mt-1"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $(".saleButton").on("click", function() {
                    var saleId = $(this).data("id");

                    $.ajax({
                        url: "/getBookInfo/" + saleId,
                        method: "GET",
                        success: function(response) {
                            $("#bookImage").attr("src", "{{ asset('storage/') }}" + '/' + response
                                .photo);
                            $("#bookName").text(response.name);
                            $("#bookAuthor").text(response.author);

                            $('#exampleModal').modal('show');
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $(".usersButton").on("click", function() {
                    var userId = $(this).data("id");

                    $.ajax({
                        url: "/getUsersInfo/" + userId,
                        method: "GET",
                        success: function(response) {
                            $("#userImage").attr("src", "{{ asset('storage/') }}" + '/' + response
                                .profile_photo);
                            $("#userName").text(response.name + ' ' + response.surname);
                            $("#userEmail").text(response.email);

                            $('#exampleModal2').modal('show');
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>

        <script>
            function confirmDelete() {
                if (confirm("Are you sure you want to delete this item?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    @else
    @endif
    @include('admin.includes.footer')
@endif
