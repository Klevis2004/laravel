@include('users.includes.header')
<div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('assets/images/1326370.png') }}" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>WELCOME READER</h5>
                <p>“A room without books is like a body without a soul.”</p>
                <button type="button" class="btn btn-outline-light">Send me there</button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('assets/images/1326370.png') }}" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>BEST SELLER</h5>
                <p>“Good friends, good books, and a sleepy conscience: this is the ideal life.”.</p>
                <button type="button" class="btn btn-outline-light">Send me there</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/1326370.png') }}" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>NEW BOOKS</h5>
                <p>“So many books, so little time.”</p>
                <button type="button" class="btn btn-outline-light">Send me there</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <img src="{{ asset('images/a.png') }}" alt="">
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <img src="{{ asset('images/a2.png') }}" alt="">
    </button>
</div>

<div class="carousel-innerr bg-gray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2 mb-4">
                <img src="{{ asset('images/harry.jpg') }}" class="card-img-top" alt="Book 1" style="width: 200px">
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">SPIRITUAL</h5>
                        <p class="card-text">This book is specially designed.</p>
                        <a href="#" class="shop-link">Shop Collection →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <img src="{{ asset('images/harry2.jpg') }}" class="card-img-top" alt="Book 2" style="width: 200px">
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PEACEFUL</h5>
                        <p class="card-text">This book is specially designed.</p>
                        <a href="#" class="shop-link">Shop Collection →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <img src="{{ asset('images/harry3.jpg') }}" class="card-img-top" alt="Book 3" style="width: 200px">
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LIFE</h5>
                        <p class="card-text">This book is specially designed.</p>
                        <a href="#" class="shop-link">Shop Collection →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <img src="{{ asset('images/harry4.jpg') }}" class="card-img-top" alt="Book 4" style="width: 200px">
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">NATURE</h5>
                        <p class="card-text">This book is specially designed.</p>
                        <a href="#" class="shop-link">Shop Collection →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main">
    <div class="content-top">
        <h2>Most Wanted Books</h2>
        <p>Here are the most rated books of the year.</p>
        <div class="scrolling-wrapper">
            <ul id="flexiselDemo3">
                @foreach ($posts as $post)
                    @if ($loop->index < 10)
                        <li>
                            <a href="{{ url('book/' . $post->id) }}">
                                <img src="{{ asset('images/' . $post->photo) }}" alt="product-item"
                                    class="img-fluid" style="height: 300px;">
                            </a>
                        </li>
                    @else
                    @break
                @endif
            @endforeach
        </ul>
    </div>
    <h3>Latest versions of the books</h3>
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flexisel.js') }}"></script>
</div>
</div>


</div>
<a href="#" id="scrollToTop" class="btn btn-primary"><i class="bi bi-arrow-up"></i></a>
<script>
    var scrollToTopButton = document.getElementById("scrollToTop");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 200) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    });

    scrollToTopButton.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>

</html>
