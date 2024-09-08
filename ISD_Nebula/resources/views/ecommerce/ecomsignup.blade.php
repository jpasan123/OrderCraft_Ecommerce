<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Craft Signup</title>
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ecommerce/login.css')}}">
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
                    <li><a href="ecomm_category1">Category 1</a></li>
                    <li><a href="ecomm_category2">Category 2</a></li>
                    <li><a href="ecomm_category3">Category 3</a></li>
                    <li><a href="ecomm_category4">Category 4</a></li>
                    <li><a href="ecomm_category5">Category 5</a></li>
                    <li><a href="ecomm_category6">Category 6</a></li>
                    <li><a href="ecomm_category7">Category 7</a></li>
                    <li><a href="ecomm_category8">Category 8</a></li>
                    <li><a href="ecomm_category9">Category 9</a></li>
                    <li><a href="ecomm_category10">Category 10</a></li>
                </ul>
            </li>
            <li><a href="contact/index.html">Contact us</a></li>
            <li><a class="active" href="ecomm_login">Log In</a></li>
            <li id="lg-bag"><a href="ecomm_search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <!--<a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>-->
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

<div class="container_login">
    <h2>Signup For Order Craft</h2>
    @if (session('error'))
        <div class="alert alert-danger alert-custom2" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ url('/ecomm_signup') }}" method="POST" onsubmit="return validatePassword();">
        @csrf
        @if (session('success'))
            <div class="alert alert-success alert-custom" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-group">
            <label for="firstName"><b>First Name:</b></label>
            <input type="text" id="firstName" name="first_name" placeholder="Enter Your First Name" required>
        </div>
        <div class="form-group">
            <div id="firstNameError" class="error-message"></div>
            <label for="lastName"><b>Last Name:</b></label>
            <input type="text" id="lastName" name="last_name" placeholder="Enter Your Last Name" required>
        </div>
        <div class="form-group">
            <div id="lastNameError" class="error-message"></div>
            <label for="phone_number"><b>Mobile Number:</b></label>
            <input type="text" id="phone_number" name="phone_number" placeholder="07X XXX XXXX" required>
        </div>
        <div class="form-group">
            <div id="phoneNumberError" class="error-message"></div>
            <label for="password"><b>Password:</b></label>
            <input type="password" id="password" name="password"
                   placeholder="Minimum Six characters with a number and letter" required>
        </div>
        <div class="form-group">
            <div id="passwordError" class="error-message"></div>
            <label for="confirmPassword"><b>Confirm Password:</b></label>
            <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Re-enter Your Password"
                   required>
        </div>
        <div class="form-group">
            <div id="confirmPasswordError" class="error-message"></div>
        </div>
        <button type="submit">Signup</button>
        <p>Already Have Account? <a href="{{ url('/ecomm_login') }}">Login</a></p>
    </form>
</div>



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
    <script src="{{asset('ecommerce/login.js')}}"></script>
</body>
</html>
