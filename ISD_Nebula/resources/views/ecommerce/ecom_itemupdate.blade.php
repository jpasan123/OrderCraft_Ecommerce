<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            <li><a class="active" href="ecomm_admin_dash">Home</a></li>
            <li><a href="Login/index.php">Log Out</a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <main id="admin-content">
        <h2>All Products</h2>
        <table id="admin-table">
            <thead>
                <tr>
                    <th class="admin-th">Main Image</th>
                    <th class="admin-th">Item Name</th>
                    <th class="admin-th">Price</th>
                    <th class="admin-th">Quantity</th>
                    <th class="admin-th">Edit</th>
                    <th class="admin-th">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="admin-td"><img src="{{ asset('storage/' . $item->main_img) }}" alt="Main Image" class="admin-img" width="100"></td>
                    <td class="admin-td">{{ $item->item_name }}</td>
                    <td class="admin-td">{{ $item->price }}</td>
                    <td class="admin-td">{{ $item->quantity }}</td>
                    <td class="admin-td"><a href="{{ route('edit_product', $item->id) }}" class="admin-button edit">Edit</a></td>
                    <td class="admin-td">
                        <form action="{{ route('delete_product', $item->id) }}" method="POST" id="delete-form-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="admin-button delete" onclick="confirmDelete('{{ $item->id }}')">Delete</button> <!-- added quotes around item id -->
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this product?</p>
            <div>
                <button id="confirmDeleteBtn">Yes</button>
                <button id="cancelDeleteBtn">No</button>
            </div>
        </div>
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