@extends('layouts.pattern')


@section('content')
    <section id="main">
        <div class="row">
            <div class="col-6">
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
        </div>
    </section>
@endsection
