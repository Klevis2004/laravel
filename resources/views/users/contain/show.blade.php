@include('users.includes.header')
@if (Auth::check() && Auth::user()->role == 1 or Auth::check() && Auth::user()->role == 2)
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6"></div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('edit', ['id' => $post->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('delete', ['id' => $post->id]) }}" class="btn btn-danger"
                    onclick="confirmDelete()">Delete</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Back</a>
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
    <style>
        .modal-body body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .modal-body form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-body h2 {
            text-align: center;
            color: #333;
        }

        .modal-body label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .modal-body input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal-body button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endif

<section id="billboard" class="bg-gray padding-large">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-1 col-md-5">
                            <img src="{{ asset('storage/' . $post->photo) }}" alt="product-img" class="img-fluid mb-3">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="banner-content">
                                <h2>{{ $post->name }}</h2>
                                <p class="fs-3" style="color: black">{{ $post->author }}</p>
                                <p class="fs-5" style="color: rgba(0, 0, 0, 0.425)">{{ $post->summary }}</p>
                                <p class="fs-5" style="color: rgba(0, 0, 0, 0.425)">Rent price:
                                    {{ $post->rent_price }}$</p>
                                <p class="fs-5" style="color: rgba(0, 0, 0, 0.425)">Price: {{ $post->price }}$</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Rent now →
                                </button>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2">
                                    Shop now →
                                </button>

                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($post->sasia > 0)
                                                    <form action="{{ route('salepost', ['id' => $post->id]) }}"
                                                        method="post">
                                                        @csrf

                                                        <label for="sasia">Quantity:</label>
                                                        <input type="number" id="sasia" name="sasia"
                                                            min="1" max="{{ $post->sasia }}" required
                                                            placeholder="Available: {{ $post->sasia }}">

                                                        <label for="data_marrjes">Get Date:</label>
                                                        <input type="date" id="data_marrjes" name="data_marrjes"
                                                            required>

                                                        <label for="data_dorezimit">Deliver Date:</label>
                                                        <input type="date" id="data_dorezimit" name="data_dorezimit"
                                                            required>

                                                        <input type="hidden" id="rent_book_id" name="book_id"
                                                            value="{{ $post->id }}">
                                                        <input type="hidden" id="rent_user_id" name="user_id"
                                                            value="{{ Auth::id() }}">


                                                        <button type="submit">Submit Sale</button>
                                                    </form>
                                                @else
                                                    <div
                                                        style="text-align: center; margin-top: 20px; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                                                        <p>No books left</p>
                                                        <p>The nearest availability date for this book is
                                                            {{ $sale }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($post->sasia > 0)
                                                    <form action="{{ route('static_sale', ['id' => $post->id]) }}"
                                                        method="post">
                                                        @csrf

                                                        <label for="sasia">Quantity:</label>
                                                        <input type="number" id="sasia" name="sasia"
                                                            min="1" max="{{ $post->sasia }}" required
                                                            placeholder="Available: {{ $post->sasia }}">
                                                        <input type="hidden" id="status" name="book_id"
                                                            value="{{ $post->id }}">
                                                        <input type="hidden" id="status" name="user_id"
                                                            value="{{ Auth::id() }}">
                                                        <input type="hidden" id="status" name="bill"
                                                            value="{{ $post->price }}">

                                                        <button type="submit">Submit Sale</button>
                                                    </form>
                                                @else
                                                    <div
                                                        style="text-align: center; margin-top: 20px; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                                                        <p>No books left</p>
                                                        <p>The nearest availability date for this book is
                                                            {{ $sale }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-slider-pagination text-center mt-3"></div>
</section>

</body>

</html>
