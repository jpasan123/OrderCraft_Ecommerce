<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Craft</title>
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ecommerce/item.css')}}">
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
                <a href="" class="dropdown-toggle">Categories</a>
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


    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <div class="main-img-container">
                <img src="{{ asset('storage/' . $pre_item->main_img) }}" id="MainImg" alt="{{ $pre_item->item_name }}">
            </div>
            <div class="small-img-group">
                @if($pre_item->first_img)
                    <img src="{{ asset('storage/' . $pre_item->first_img) }}" class="small-img" alt="{{ $pre_item->item_name }}">
                @endif
                @if($pre_item->second_img)
                    <img src="{{ asset('storage/' . $pre_item->second_img) }}" class="small-img" alt="{{ $pre_item->item_name }}">
                @endif
                @if($pre_item->third_img)
                    <img src="{{ asset('storage/' . $pre_item->third_img) }}" class="small-img" alt="{{ $pre_item->item_name }}">
                @endif
            </div>
        </div>
        <div class="single-pro-details">
            <h1>{{ $pre_item->item_name }}</h1>
            <p>Type: {{ $pre_item->item_type }}</p>
            <p>Category: {{ $pre_item->category }}</p>
            <br>
            <h3>Rs: {{ number_format($pre_item->price - ($pre_item->price * $pre_item->discount / 100), 2) }}/=</h3>
            @if($pre_item->discount > 0)
                <h6><span style="text-decoration: line-through;">Rs {{ number_format($pre_item->price, 2) }}</span></h6>
            @endif

            <form method="POST" action="{{ url('/add_to_cart/' . $pre_item->id) }}">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input class="form-control" name="quantity" id="quantity" type="number" value="1" max="{{ $pre_item->quantity }}" min="1">
                </div>
                <br>
                <button type="submit" class="normal">Add To Cart</button>
            </form>
            <br>
            <p>{{ $pre_item->quantity }} items available</p>

            <h4>Product Details</h4>
            <p>{{ $pre_item->description }}</p>
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

    <footer class="footer section-p1">
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
    <script src="{{asset('ecommerce/item.js')}}"></script>
</body>

</html>