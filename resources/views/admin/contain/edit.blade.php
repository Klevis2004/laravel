@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <style>
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                margin-top: 5px;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                resize: vertical;
            }

            textarea::placeholder {
                color: #999;
            }

            textarea:focus {
                outline: none;
                border-color: #66afe9;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(102, 175, 233, 0.6);
            }

            label.form-label {
                display: block;
                margin-bottom: .5rem;
                color: #333;
            }

            button.btn-info {
                background-color: #17a2b8;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                color: white;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            button.btn-info:hover {
                background-color: #138496;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edito librin</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update', ['id' => $post->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter the item name" required
                                        value="{{ old('name', $post->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        placeholder="Enter the author name" required
                                        value="{{ old('name', $post->author) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category_id">
                                        <option disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label for="author" class="form-label">Sasia</label>
                                    <input type="number" class="form-control" id="author" name="sasia"
                                        placeholder="Enter sasia" required value="{{ old('name', $post->sasia) }}"
                                        min="0">
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Summary</label>
                                    <textarea name="summary" id="" cols="30" rows="10">{{ old('name', $post->summary) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="author" name="price"
                                        placeholder="Enter price" required value="{{ old('name', $post->price) }}"
                                        min="0">
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Rent price</label>
                                    <input type="number" class="form-control" id="author" name="rent_price"
                                        placeholder="Enter rent price" required
                                        value="{{ old('rent_price', $post->rent_price) }}" min="0">
                                </div>

                                <div class="mb-3">
                                    <label for="photo">Choose Photo:</label>
                                    <input type="file" name="photo" id="photo" accept="image/*">
                                </div>

                                <button type="submit" class="btn btn-info" style="color: white;">Update</button>

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
        </div>
    </body>

    </html>
@endif
