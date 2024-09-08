<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/f0e01b6c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ecommerce/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            <li><a href="Login/index.php">Log In</a></li>
            <li id="lg-bag"><a href="searchpage.lade.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


    <div class="container">
        <form class="e_form" action="{{ url('/ecomm_add_item') }}" method="POST" enctype="multipart/form-data" id="add_item_form">
            @csrf
            <h2> Add Item </h2>
            <div id="errorPopupContainer"></div>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <hr>
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name" required>
            </div>

            <div class="form-group">
                <label for="item_type">Item type</label>
                <input type="text" class="form-control" id="item_type" name="item_type" placeholder="Enter Item Type" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="" selected disabled>Select Category</option>
                    <option value="books">Books</option>
                    <option value="cloths">Cloths</option>
                    <option value="computer">Computer</option>
                    <option value="footwear">Footwear</option>
                    <option value="furniture">Furniture</option>
                    <option value="household">Household Items</option>
                    <option value="laptop">Laptop</option>
                    <option value="stationary">Stationary</option>
                    <option value="tires">Tires</option>
                    <option value="computer_accessories">Computer Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label for="discount">Discount Percentage (%)</label>
                <input type="text" class="form-control" id="discount" placeholder="Enter Discount Percentage" name="discount">
            </div>

            <div class="form-group">
                <label for="quantity">Enter Quantity</label>
                <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label for="main_img" class="form-label">Add Main Image</label>
                    <input class="form-control" type="file" id="main_img" name="main_img">
                </div>
                <div class="mb-3 col">
                    <label for="first_img" class="form-label">Add Image 01</label>
                    <input class="form-control" type="file" id="first_img" name="first_img">
                </div>
                <div class="mb-3 col">
                    <label for="second_img" class="form-label">Add Image 02</label>
                    <input class="form-control" type="file" id="second_img" name="second_img">
                </div>
                <div class="mb-3 col">
                    <label for="third_img" class="form-label">Add Image 03</label>
                    <input class="form-control" type="file" id="third_img" name="third_img">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter Description" name="description" rows="10"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" id="add_item" value="Add Item" name="add_item">
        </form>
        <hr>
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

    <script src="{{asset('ecommerce/script.js')}}"></script>

</body>

</html>
