<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Craft</title>
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ecommerce/style.css')}}">
    <!-- Favicons -->
    <link href="{{asset('ecommerce/IMG/favicon.ico')}}" rel="icon">
    <link href="{{asset('ecommerce/IMG/apple-touch-icon.png')}}" rel="apple-touch-icon">

</head>

<body>
    <section id="header">
        <div class="logo">
            <a href="#" class="logo-link"><img src="{{ asset('ecommerce/IMG/logo1.png') }}" alt="" class="img-fluid"></a>
            <div class="logo-text">
                <h1><span style="font-weight: bold; color:aliceblue ">Order Craft</span></h1>
            </div>
        </div>
        <ul id="navbar">
            <li><a href="ecomm_index">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Categories</a>
                <ul class="dropdown-menu">
                    <li><a href="accessories/mens1.html">Category 1</a></li>
                    <li><a href="accessories/womens1.html">Category 2</a></li>
                    <li><a href="accessories/kids1.html">Category 3</a></li>
                    <li><a href="accessories/sports1.html">Category 4</a></li>
                    <li><a href="accessories/others1.html">Category 5</a></li>
                </ul>
            </li>
            <li><a href="contact/index.html">Contact us</a></li>
            <li><a href="Login/index.php">Log In</a></li>
            <li id="lg-bag"><a class="active" href="ecomm_search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <br>

    <div class="search-container" id="searchContainer">
        <p class="search-text">Find what you're looking for:</p>
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input type="text" name="query" class="search-input" placeholder="Search for products..." onfocus="reducePadding()">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>


    @if (isset($items))
    <section id="productz1" class="section-p1">
        @if (count($items) > 0)
        <h3>Here is the search result of "{{ $query }}"</h3>
        <div class="pro-container">
            @foreach ($items as $item)
            <a href="/ecomm_item/{{ $item->id }}">
                <div class="pro">
                    <img src="{{ asset('storage/'.$item->main_img) }}" alt="{{ $item->item_name }}">
                    <div class="des">
                        <span>{{ $item->item_type }}</span>
                        <h5>{{ $item->item_name }}</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        @php
                        // Calculate price after discount
                        $priceAfterDiscount = $item->price - ($item->price * ($item->discount / 100));
                        @endphp
                        <h4>Rs {{ number_format($priceAfterDiscount, 0) }}</h4>
                        <h4>
                            <span style="text-decoration: line-through;">Rs {{ number_format($item->price, 0) }}</span>
                            <span style="margin-left: 10px;">-{{$item->discount}}%</span>
                        </h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <h3>No results found for "{{ $query }}".</h3>
        @endif
    </section>
    @endif

    <footer class="footer section-p1new">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address</strong> One Galle Face Mall 1A Central Road,Colombo</p>
            <p><strong>Hours</strong> 09:00 To 17:00 - Mon to Sun </p>
            <p><strong>Contact</strong> +94 769637703</p>
            <div class="Follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Informations</a>
            <a href="#">Privecy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store Or Google Play</p>
            <div class="row">
                <img src="{{asset('ecommerce/IMG/apps122.png')}}" alt="app" height="30px" width="200px">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="{{asset('ecommerce/IMG/payment11.png')}}" alt="pay" height="100px" width="200">
        </div>

    </footer>

    <script src="{{asset('ecommerce/script.js')}}"></script>

</body>

</html>