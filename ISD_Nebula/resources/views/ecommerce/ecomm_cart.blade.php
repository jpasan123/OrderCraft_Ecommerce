<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Add to Cart</title>
    <link rel="stylesheet" href="{{asset('ecommerce/login.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
            body{
        background:#eee;
    }
    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card{
        box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
        box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
        vertical-align: middle;
    }
        </style>
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
                    <li><a href="accessories/mens1.html">Category 1</a></li>
                    <li><a href="accessories/womens1.html">Category 2</a></li>
                    <li><a href="accessories/kids1.html">Category 3</a></li>
                    <li><a href="accessories/sports1.html">Category 4</a></li>
                    <li><a href="accessories/others1.html">Category 5</a></li>
                </ul>
            </li>
            <li><a href="contact/index.html">Contact us</a></li>
            <li><a href="Login/index.php">Log In</a></li>
            <li id="lg-bag"><a href="searchpage.lade.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <a href="#" id="close"><i class="fa-solid fa-x"></i></a>
        </ul>


        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container px-3 my-5 clearfix">

    <div class="card">
        <div class="card-header">
        <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered m-0">
        <thead>
        <tr>

        <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
        <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
        <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
        <th class="text-right py-3 px-4" style="width: 100px;">Discount</th>
        <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
        </tr>
        </thead>
        <tbody>


            @if($item->isNotEmpty())
                @foreach($item as $item)
                    <tr>
                        <td class="p-4">
                            <div class="media align-items-center">
                                <img src="{{asset('storage/'.$item->main_img)}}" class="d-block ui-w-40 ui-bordered mr-4" alt>
                                <div class="media-body">

                                    <a href="/ecomm_member_item/{{$item->user_id}}" class="d-block text-dark">{{$item->item_name}}</a>

                                    <small>
                                        <span class="text-muted">Color:</span>
                                        <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                        <span class="text-muted">Size: </span> EU 37 &nbsp;
                                        <span class="text-muted">Ships from: </span> China
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4">Rs. {{number_format($item->price,2)}}/-</td>
                        <td class="align-middle p-4"><input type="text" class="form-control text-center" value="{{$item->quantity}}" disabled></td>
                        <td class="text-right font-weight-semibold align-middle p-4">Rs.{{number_format($item->discount * $item->price /100 * $item->quantity,2)}}/-</td>
                        <td class="text-right font-weight-semibold align-middle p-4">Rs. {{number_format($item->price * $item->quantity,2)}}/-</td>
                        <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title data-original-title="Remove">×</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="p-4">
                        <div class="media align-items-center">
                            <h5>No data Found</h5>
                        </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">Rs. 0/-</td>
                    <td class="align-middle p-4"><input type="text" class="form-control text-center" value="None" disabled></td>
                    <td class="text-right font-weight-semibold align-middle p-4">Rs. 0/-</td>
                </tr>
            @endif


        </tbody>
        </table>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
        <div class="mt-4">
        <label class="text-muted font-weight-normal">Promocode</label>
        <input type="text" placeholder="ABC" class="form-control">
        </div>
        <div class="d-flex">
        <div class="text-right mt-4 mr-5">
        <label class="text-muted font-weight-normal m-0">Discount</label>
        <div class="text-large"><strong>Rs.{{$discount}}/-</strong></div>
        </div>
        <div class="text-right mt-4">
        <label class="text-muted font-weight-normal m-0">Total price</label>
        <div class="text-large"><strong>Rs.{{$total - $discount}}/-</strong></div>
        </div>
        </div>
        </div>
        <div class="float-right">
            <a href="/ecomm_member_index"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
            <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>

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
</body>
</html>
