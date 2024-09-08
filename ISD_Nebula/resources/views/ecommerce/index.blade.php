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
            <li><a class="active" href="ecomm_index">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Categories</a>
                <ul class="dropdown-menu">
                    <li><a href="ecomm_books">Books</a></li>
                    <li><a href="ecomm_cloths">Cloths</a></li>
                    <li><a href="ecomm_computer_accessories">Computer Accessories</a></li>
                    <li><a href="ecomm_computer">Computer</a></li>
                    <li><a href="ecomm_footwear">Footwear</a></li>
                    <li><a href="ecomm_furniture">Furniture</a></li>
                    <li><a href="ecomm_household">Household Items</a></li>
                    <li><a href="ecomm_laptop">Laptop</a></li>
                    <li><a href="ecomm_stationary">Stationary</a></li>
                    <li><a href="ecomm_tires">Tires</a></li>
                </ul>
            </li>
            <li><a href="#footer">Contact us</a></li>
            <li><a href="/ecomm_login">Log In</a></li>
            <li id="lg-bag"><a href="ecomm_search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>

        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section class="dual-slider">
        <div class="slider left-slider">
            <div class="slides">
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image1.png') }}" alt="Image 1" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image2.png') }}" alt="Image 2" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image3.png') }}" alt="Image 3" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image4.png') }}" alt="Image 4" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image5.png') }}" alt="Image 5" class="slide1">
                </div>
            </div>
            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <button class="arrow left-arrow"><i class="fas fa-chevron-left"></i></button>
            <button class="arrow right-arrow"><i class="fas fa-chevron-right"></i></button>
        </div>

        <div class="slider right-slider">
            <div class="slides">
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image6.png') }}" alt="Image 6" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image7.png') }}" alt="Image 7" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image8.png') }}" alt="Image 8" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image9.png') }}" alt="Image 9" class="slide1">
                </div>
                <div class="slide">
                    <img src="{{ asset('ecommerce/IMG/image10.png') }}" alt="Image 10" class="slide1">
                </div>
            </div>
            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <button class="arrow left-arrow"><i class="fas fa-chevron-left"></i></button>
            <button class="arrow right-arrow"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/free.jpg')}}" alt="free Shipping">
            <h6>Free Shipping</h6>
        </div>

        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/oder.JPG')}}" alt="Online Oder">
            <h6>Online Oder</h6>
        </div>

        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/save.JPG')}}" alt="Save Money">
            <h6>Save Money</h6>
        </div>

        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/promoo.JPG')}}" alt="Promotions">
            <h6>Promotions</h6>
        </div>

        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/sale.JPG')}}" alt="Happy Sell">
            <h6>Happy Sell</h6>
        </div>

        <div class="fe-box">
            <img src="{{asset('ecommerce/IMG/247.JPG')}}" alt="24/7">
        </div>
    </section>

    <section id="productz1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            @foreach ($item as $item)
            <a href="/ecomm_item/{{$item->id}}">
                <div class="pro">
                    <img src="{{asset('storage/'.$item->main_img)}}" alt="1">
                    <div class="des">
                        <span>{{$item->item_type}}</span>
                        <h5>{{$item->item_name}}</h5>
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
                        <h4>Rs {{ number_format($priceAfterDiscount, 2) }}</h4>
                        <h4>
                            <span style="text-decoration: line-through;">Rs {{ number_format($item->price, 2) }}</span>
                            <span style="margin-left: 10px;">-{{$item->discount}}%</span>
                        </h4>

                    </div>
                    <a href="/ecomm_login"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </a>
            @endforeach
        </div>
    </section>




    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>

    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy Deals</h4>
            <h2>Buy 1 Get 1 Free</h2>
            <span>The best classic dress is on sale</span>
            <button class="white">Lern More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Spring/Summer</h4>
            <h2>Upcomming Season</h2>
            <span>The best classic dress is on sale</span>
            <button class="white">Lern More</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOORWEAR COLLECTION</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRT</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newslwtters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="    Your Email address">
            <button class="normal">Sign Up</button>
        </div>

    </section>

    <footer class="footer section-p1new" id="footer">
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