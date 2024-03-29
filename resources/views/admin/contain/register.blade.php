@include('admin.includes.header')
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

@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <div class="container">
        <div class="row justify-content-center">
            <div style="margin-top: 50px" class="col-sm-12 col-xl-6 mx-auto ">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Book Registration</h6>
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter the item name" required value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                placeholder="Enter the author name" required value="{{ old('author') }}">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Sasia</label>
                            <input type="number" class="form-control" id="author" name="sasia"
                                placeholder="Enter sasia" required value="{{ old('sasia') }}" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Summary</label>
                            <textarea name="summary" id="" cols="30" rows="10">{{ old('summary') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Price</label>
                            <input type="number" class="form-control" id="author" name="price"
                                placeholder="Enter price" required value="{{ old('price') }}" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Rent price</label>
                            <input type="number" class="form-control" id="author" name="rent_price"
                                placeholder="Enter rent price" required value="{{ old('rent_price') }}" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="photo">Choose Photo:</label>
                            <input type="file" name="photo" id="photo" accept="image/*">
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
@else
@endif
@include('admin.includes.footer')
