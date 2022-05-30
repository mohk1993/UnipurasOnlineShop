<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/bootstrap-select.min.css')}}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('user-tmp/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Toster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--   Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('user.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('user.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('user-tmp/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/echo.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('user-tmp/assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('user-tmp/assets/js/scripts.js')}}"></script>

    <!-- Toster -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
    @endif

    <!-- Add to cart product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="productName"></strong></h5>
                    <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="card-img-top" src="" alt="" style="height: 200px; width:200px" id="productimage">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">Code: <strong id="productCode"></strong></li>
                                <li class="list-group-item">Price: <strong id="productPrice"></strong></li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" class="form-control" id="qty" aria-describedby="emailHelp" value="1" min="1" oninput="validity.valid||(value='');">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary" onclick="addToCart()">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // Start Product View with Modal 
        function productModalCartView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#productName').text(data.product.product_name_en);
                    $('#productPrice').text(data.product.product_price);
                    $('#productCode').text(data.product.product_code);
                    $('#productimage').attr('src', '/' + data.product.product_thambnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option 
                }
            })

        }

        //--------------- Add product To Cart ---------------
        function addToCart() {
            var product_name = $('#productName').text();
            var id = $('#product_id').val();
            var price = $('#productPrice').text();
            var code = $('#productCode').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    price: price,
                    code: code,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    $('#closeModal').click();
                    console.log(data)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }
    </script>

    <script type="text/javascript">
        // --------------------Get Carts -------------------------------
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);
                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> 
                    <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();
        // ------------------------ Remove Cart --------------------
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
    </script>

    <!-- Add To WishList -->
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/user/add-to-wishlist/" + product_id,
                success: function(data) {
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            })
        }
    </script>

    <!-- Load WishList Items -->

    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += ` <tr>
                            <td class="col-md-2"><img src="/${value.product.product_thambnail} " style="height:150px; width:200px; border-radius: 20%;"></td>
                            <td class="col-md-7">
                                <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                                <div class="price">
                                    <span>${value.product.product_price}</span>
                                </div>
                            </td>
                            <td class="col-md-2">
                            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productModalCartView(this.id)">@if(session()->get('language') == 'lithuanian') Į krepšelį @else Add to cart @endif </button>
                            </td>
                            <td class="col-md-1 close-btn">
                            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();
        // ------------- Remove WishList
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
    </script>

    <!-- ----- Cart Page Products -->
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `
                        <tr>
                            <td class="col-md-2">
                                <img src="/${value.options.image} " style="height:150px; width:200px; border-radius: 20%;">
                            </td>
                            <td class="col-md-4 ">
                                <div class="product-name">
                                    <a href="#">${value.name}</a>
                                </div>
                                <div class="price">$ 
                                    ${value.price}
                                </div>
                            </td>
                            <td class="col-md-2">
                                ${value.qty > 1
                                    ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `
                                    : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
                                }     
                                <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >      
                                <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>  
                            </td>
                            <td class="col-md-2">
                                <strong>$${value.subtotal} </strong> 
                            </td>
                            <td class="col-md-1 close-btn">
                                <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>`
                    });
                    $('#cartPage').html(rows);
                }
            })
        }
        cart();

        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
        // -------- Increase Qty By 1 on + click -----------
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }
        // ------- Decrement Qty By 1 on - click-----------
        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                }
            });
        }
    </script>
</body>

</html>