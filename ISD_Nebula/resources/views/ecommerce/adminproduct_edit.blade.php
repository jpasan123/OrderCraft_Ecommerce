<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ecommerce/pedit.css')}}">
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
            <li><a class="active" href="ecomm_admin_dash">Home</a></li>
            <li><a href="Login/index.php">Log Out</a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container">
        <form class="e_form" action="{{ route('update_product', $item->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            @method('PUT')
            <h2>Edit Product</h2>
            <div id="popupContainer" style="display:none;"></div> <!-- Popup Container -->

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name" value="{{ $item->item_name }}" required>
            </div>

            <div class="form-group">
                <label for="item_type">Item Type</label>
                <input type="text" class="form-control" id="item_type" name="item_type" placeholder="Enter Item Type" value="{{ $item->item_type }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ $item->price }}" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="" disabled>Select Category</option>
                    <option value="category1" {{ $item->category == 'category1' ? 'selected' : '' }}>Category 1</option>
                    <option value="category2" {{ $item->category == 'category2' ? 'selected' : '' }}>Category 2</option>
                    <option value="category3" {{ $item->category == 'category3' ? 'selected' : '' }}>Category 3</option>
                    <option value="category4" {{ $item->category == 'category4' ? 'selected' : '' }}>Category 4</option>
                    <option value="category5" {{ $item->category == 'category5' ? 'selected' : '' }}>Category 5</option>
                    <option value="category6" {{ $item->category == 'category6' ? 'selected' : '' }}>Category 6</option>
                    <option value="category7" {{ $item->category == 'category7' ? 'selected' : '' }}>Category 7</option>
                    <option value="category8" {{ $item->category == 'category8' ? 'selected' : '' }}>Category 8</option>
                    <option value="category9" {{ $item->category == 'category9' ? 'selected' : '' }}>Category 9</option>
                    <option value="category10" {{ $item->category == 'category10' ? 'selected' : '' }}>Category 10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="discount">Discount Percentage (%)</label>
                <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount Percentage" value="{{ $item->discount }}">
            </div>

            <div class="form-group">
                <label for="quantity">Enter Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" value="{{ $item->quantity }}">
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label for="main_img" class="form-label">Main Image</label>
                    <input class="form-control" type="file" id="main_img" name="main_img">
                </div>
                <div class="mb-3 col">
                    <label for="first_img" class="form-label">First Image</label>
                    <input class="form-control" type="file" id="first_img" name="first_img">
                </div>
                <div class="mb-3 col">
                    <label for="second_img" class="form-label">Second Image</label>
                    <input class="form-control" type="file" id="second_img" name="second_img">
                </div>
                <div class="mb-3 col">
                    <label for="third_img" class="form-label">Third Image</label>
                    <input class="form-control" type="file" id="third_img" name="third_img">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="10">{{ $item->description }}</textarea>
            </div>

            <input type="submit" class="btn btn-primary" value="Update Product">
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

    <script src="{{asset('ecommerce/pedit.js')}}"></script>

</body>

</html>