@extends('layouts.pattern')

@section('content')
    {{-- modals --}}
    {{-- <div class="modal" tabindex="-1" id="changeInfoFrom">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" name="">
                        <input type="text" name="new_name" class="form-control mt-1" placeholder="New name">
                        <input type="text" name="new_email" class="form-control mt-1" placeholder="New email">
                        <div class="d-flex align-items-center">
                            <input type="password" name="new_password" id="newPassword" class="form-control my-1"
                                placeholder="Password" oninput="handlePasswordChange(this, 'newPasswordRepeat')">
                            <img class="icon" src="img/icons/eye.svg" alt=""
                                onclick="ShowPassword('newPassword')">
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="password" name="new_password" id="newPasswordRepeat" class="form-control mb-1"
                                placeholder="Repeat password" oninput="handlePasswordChange(this, 'newPassword')">
                            <img class="icon" src="img/icons/eye.svg" alt=""
                                onclick="ShowPassword('newPasswordRepeat')">
                        </div>
                        <button type="submit" class="btn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal" tabindex="-1" id="addOrder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addOrderForm" method="POST" onsubmit="addOrder(event, this)" enctype="multipart/form-data">
                        <input type="text" name="orderName" class="form-control my-1" placeholder="Order name" required>
                        <select name="orderCategory" class="form-control my-1" placeholder="Order type" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="description" class="form-control my-1" placeholder="Order description"
                            required>
                        <input type="file" name="image" class="form-control my-1" placeholder="Select image" required>
                        <div class="alert alert-danger" role="alert" id="addOrderAlert" style="display: none">
                            Wrong file type</div>

                        <button type="submit" class="btn btn-primary">Add order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modals --}}
    <section id="UserInfo">
        <div class="row">
            <div class="col-12 col-md-3">
                <svg class="bd-placeholder-img" width="100%" height="100%" role="img" aria-label="Placeholder: Thumbnail"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                </svg>
            </div>
            <div class="col-12 col-md-9">
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
                <p>user</p>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#changeInfoFrom">
                    Change User Info
                </button>
            </div>
        </div>
    </section>
    <section>
        <h2>Your orders </h2>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addOrder">Add order</button>
        <select class="form-control my-1 w-50" onchange="sortOrders(this)">
            <option value="0">All</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-6 col-md-3 my-3" data-category="{{ $order->category }}">
                    <div class="card" style="width: 18rem;">
                        <div class="images">
                            @if ($order->image_2)
                                <div style="background: url('../img/img1.jpg') center center"></div>
                                <div style="background: url('../img/img2.jpg') center center"></div>
                            @else
                                <div style="background: url('../images/orders/{{ $order->image_1 }}') center center">
                                </div>
                                <div style="background: url('../images/orders/{{ $order->image_1 }}') center center">
                                </div>
                            @endif


                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $order->name }}</h5>
                            <p class="card-text">{{ $order->description }}</p>
                            <p class="card-text">{{ $order->price }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection
