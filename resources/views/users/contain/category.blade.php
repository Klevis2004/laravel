<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .klevis {
        display: none;
        padding: 20px;
    }

    .shop_top {
        margin-top: 20px;
    }

    .shop_box {
        margin-bottom: 20px;
    }

    .shop_desc {
        margin-top: 10px;
    }

    .buttons {
        list-style: none;
        margin: 10px 0 0 0;
        padding: 0;
    }

    .buttons li {
        display: inline-block;
        margin-right: 10px;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        margin-top: 20px;
    }

    .footer_box {
        list-style: none;
        padding: 0;
    }

    .footer_box h4 {
        color: #fff;
    }

    .footer_box li {
        margin-bottom: 10px;
    }

    .footer_search {
        margin-top: 10px;
    }

    .footer_search form {
        display: flex;
    }

    .footer_search input[type="text"] {
        padding: 10px;
        width: 70%;
    }

    .footer_search input[type="submit"] {
        padding: 10px;
        background-color: #fff;
        color: #333;
        border: none;
        cursor: pointer;
    }

    .social {
        list-style: none;
        padding: 0;
        margin: 10px 0 0 0;
    }

    .social li {
        display: inline-block;
        margin-right: 10px;
    }

    .footer_bottom {
        margin-top: 10px;
    }

    .copy {
        float: left;
    }

    .dropdown {
        float: right;
    }

    .dropdown dt {
        cursor: pointer;
    }

    .dropdown dd {
        display: none;
        position: absolute;
        background-color: #333;
        padding: 10px;
    }

    .dropdown ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .dropdown ul li {
        margin-bottom: 10px;
    }

    .dropdown dd ul li a {
        color: #fff;
        text-decoration: none;
    }

    .flag {
        margin-right: 5px;
    }

    .shop_box img {
        transition: transform 0.3s ease;
    }

    .shop_box img:hover {
        transform: scale(1.1);
    }
</style>
</head>

<body>

    @include('users.includes.header')
    <div class="klevis">
        <div class="shop_top">
            <div class="container">
                <div class="row shop_box-top">
                    @foreach ($posts as $post)
                        <div class="col-md-2 shop_box">
                            <a href="{{ url('book/' . $post->id) }}">
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="product-img" class="img-fluid mb-3"
                                    style="width: 300px; height: 300px">
                                <span class="new-box"><span class="new-label">New</span></span>
                                <span class="sale-box"><span class="sale-label">Sale!</span></span>
                                <div class="shop_desc">
                                    <h3><a href="#">{{ $post->author }}</a></h3>
                                    <p>{{ $post->title }}</p>
                                    <span class="reducedfrom">$66.00</span>
                                    <span class="actual">$12.00</span><br>
                                    <ul class="buttons">
                                        <li class="cart"><a href="#">Add To Cart</a></li>
                                        <li class="shop_btn"><a href="#">Read More</a></li>
                                        <div class="clear"></div>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4>Products</h4>
                        <li><a href="#">Mens</a></li>
                        <li><a href="#">Womens</a></li>
                        <li><a href="#">Youth</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4>About</h4>
                        <li><a href="#">Careers and internships</a></li>
                        <li><a href="#">Sponserships</a></li>
                        <li><a href="#">team</a></li>
                        <li><a href="#">Catalog Request/Download</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4>Customer Support</h4>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping and Order Tracking</a></li>
                        <li><a href="#">Easy Returns</a></li>
                        <li><a href="#">Warranty</a></li>
                        <li><a href="#">Replacement Binding Parts</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4>Newsletter</h4>
                        <div class="footer_search">
                            <form>
                                <input type="text" value="Enter your email" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Enter your email';}">
                                <input type="submit" value="Go">
                            </form>
                        </div>
                        <ul class="social">
                            <li class="facebook"><a href="#"><span> </span></a></li>
                            <li class="twitter"><a href="#"><span> </span></a></li>
                            <li class="instagram"><a href="#"><span> </span></a></li>
                            <li class="pinterest"><a href="#"><span> </span></a></li>
                            <li class="youtube"><a href="#"><span> </span></a></li>
                        </ul>

                    </ul>
                </div>
            </div>
            <div class="row footer_bottom">
                <div class="copy">
                    <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
                </div>
                <dl id="sample" class="dropdown">
                    <dt><a href="#"><span>Change Region</span></a></dt>
                    <dd>
                        <ul>
                            <li><a href="#">Australia<img class="flag" src="images/as.png"
                                        alt="" /><span class="value">AS</span></a></li>
                            <li><a href="#">Sri Lanka<img class="flag" src="images/srl.png"
                                        alt="" /><span class="value">SL</span></a></li>
                            <li><a href="#">Newziland<img class="flag" src="images/nz.png"
                                        alt="" /><span class="value">NZ</span></a></li>
                            <li><a href="#">Pakistan<img class="flag" src="images/pk.png" alt="" /><span
                                        class="value">Pk</span></a></li>
                            <li><a href="#">United Kingdom<img class="flag" src="images/uk.png"
                                        alt="" /><span class="value">UK</span></a></li>
                            <li><a href="#">United States<img class="flag" src="images/us.png"
                                        alt="" /><span class="value">US</span></a></li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const klevisElements = document.querySelectorAll('.klevis');

            const showElementsWithFade = () => {
                klevisElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.style.display = 'block';
                        element.style.opacity = '0';
                        element.style.transition = 'opacity 1s ease-in-out';
                        element.style.opacity = '1';
                    }, index * 500);
                });
            };

            showElementsWithFade();
        });
    </script>

</body>

</html>
