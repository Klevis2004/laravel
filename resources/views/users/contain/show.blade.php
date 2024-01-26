@include('users.includes.header')

@if (session('status'))
    <div id="statusMessage"
        style="background-color: #4CAF50; color: #fff; text-align: center; padding: 20px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
        <i class="fas fa-check-circle" style="font-size: 30px;"></i>
        <p style="font-size: 18px; margin-top: 10px;">{{ session('status') }}</p>
    </div>

    <script>
        setTimeout(function() {
            var statusMessage = document.getElementById('statusMessage');
            if (statusMessage) {
                statusMessage.style.display = 'none';
            }
        }, 3000);
    </script>
@endif

<div class="container">
    <div class="row mt-4">
        <div class="col-md-6">
            <h2>{{ $post->name }}</h2>
            <p class="fs-3" style="color: black">{{ $post->author }}</p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="{{ route('welcome') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

<section id="billboard" class="bg-gray padding-large">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-1 col-md-5">
                            <img src="{{ asset('images/' . $post->photo) }}" alt="product-img" class="img-fluid mb-3">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="banner-content">
                                <a href="single-product.html" class="btn btn-primary mb-3">Shop now →</a>
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
