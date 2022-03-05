@extends('layouts.pattern')


@section('content')
  {{-- modals --}}
  <div class="modal" tabindex="-1" id="signUpForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" onsubmit="handleSignUpSubmit(event, this)" name="signUpForm">
                    @csrf
                    <input type="text" name="userName"class="form-control mt-1" placeholder="User name" required>
                    <input type="email" name="userEmail"  class="form-control mt-1" placeholder="Email" required>
                    <div class="d-flex align-items-center">
                        <input type="password" name="password1" id="signUpPass1" class="form-control mt-1"
                            placeholder="Password" oninput="handlePasswordChange()" required>
                        <img class="icon" src="img/icons/eye.svg" alt=""
                            onclick="ShowPassword('signUpPass1')">
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="password" name="password2" id="signUpPass2" class="form-control my-1"
                            placeholder="Repeat password" oninput="handlePasswordChange()" required>
                        <img class="icon" src="img/icons/eye.svg" alt=""
                            onclick="ShowPassword('signUpPass2')">
                    </div>
                    <div class="alert alert-danger" role="alert" id="dangerAlert" style="display: none"></div>
                    <div class="alert alert-success" role="alert" id="successAlert" style="display: none"><span>Success sign up<span/></div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="signInForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" onsubmit="handleSignInSubmit(event, this)" name="signInForm">
                    @csrf
                    <input type="text" name="userName" class="form-control my-1" placeholder="User name" required>
                    <div class="d-flex align-items-center">
                        <input type="password" name="password" id="signInPass" class="form-control my-1"
                            placeholder="Password" required>
                        <img class="icon" src="img/icons/eye.svg" alt=""
                            onclick="ShowPassword('signInPass')">
                    </div>
                    <div class="alert alert-danger" role="alert" id="dangerAlert" style="display: none"></div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modals --}}
    <section id="main">
        <div class="row">
            <div class="col-6 neon-line">
                <h1>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </h1>
                <span>
                    Voluptatem sapiente aliquam tempora qui eligendi reprehenderit, in dolorum impedit atque tenetur nulla laboriosam veritatis, distinctio inventore repellat nemo quis? Magni, expedita.
                </span>
            </div>
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/bg-img1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/bg-img2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/bg-img3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="orders">
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="images">
                        <div style="background: url('../img/img1.jpg') center center"></div>
                        <div style="background: url('../img/img2.jpg') center center"></div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order name</h5>
                        <p class="card-text">order type</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="images">
                        <div style="background: url('../img/img1.jpg') center center"></div>
                        <div style="background: url('../img/img2.jpg') center center"></div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order name</h5>
                        <p class="card-text">order type</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="images">
                        <div style="background: url('../img/img1.jpg') center center"></div>
                        <div style="background: url('../img/img2.jpg') center center"></div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order name</h5>
                        <p class="card-text">order type</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="images">
                        <div style="background: url('../img/img1.jpg') center center"></div>
                        <div style="background: url('../img/img2.jpg') center center"></div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Order name</h5>
                        <p class="card-text">order type</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
