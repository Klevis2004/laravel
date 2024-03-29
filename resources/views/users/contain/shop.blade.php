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

    @include('users.includes.footer')
