<?php require "layout/header.php" ?>
<!-- Main -->
<main class="homePage">
    <!-- Hero Section -->
    <section class="hero">
        <h1>MeMe Hotel</h1>
        <div class="overlay">
            <form class="form-inline">
                <select class="form-control mr-2">
                    <option>Select Branch</option>
                </select>
                <label for="dateCheckIn">Check in<input id="dateCheckIn" type="date" class="form-control" /></label>
                <label for="dateCheckOut">Check out<input id="dateCheckOut" type="date" class="form-control" /></label>
                <a href="#">Check <br />
                    Availability <i class="fas fa-chevron-right"></i>
                </a>
            </form>
        </div>
        <a href="#"><button>Đặt Phòng</button></a>
    </section>

    <!-- Featured Rooms -->
    <section class="container-fluid room-section py-5">
        <h2 class="text-center mb-4">Phòng Nổi Bật</h2>
        <div class="row justify-content-center">
            <!-- Repeat this col for each room -->
            <div class="col-md-6 col-lg-10">
                <div class="row justify-content-around">
                    <div class="card col-lg-5 p-0 shadow">
                        <img src="../../../upload/room1.png" class="card-img-top" alt="room1" />
                        <div class="card-body">
                            <h5 class="card-title">V.I.P 1 Room</h5>
                            <p class="card-text">
                                Phong cách đẳng cấp, tiện nghi cao cấp.
                            </p>
                            <a href="#"><button>Đặt Phòng</button></a>
                        </div>
                    </div>
                    <div class="card col-lg-5 p-0 shadow">
                        <img src="../../../upload/room1.png" class="card-img-top" alt="room1" />
                        <div class="card-body">
                            <h5 class="card-title">V.I.P 1 Room</h5>
                            <p class="card-text">
                                Phong cách đẳng cấp, tiện nghi cao cấp.
                            </p>
                            <a href="#"><button>Đặt Phòng</button></a>
                        </div>
                    </div>
                    <div class="card col-lg-5 p-0 shadow">
                        <img src="../../../upload/room1.png" class="card-img-top" alt="room1" />
                        <div class="card-body">
                            <h5 class="card-title">V.I.P 1 Room</h5>
                            <p class="card-text">
                                Phong cách đẳng cấp, tiện nghi cao cấp.
                            </p>
                            <a href="#"><button>Đặt Phòng</button></a>
                        </div>
                    </div>
                    <div class="card col-lg-5 p-0 shadow">
                        <img src="../../../upload/room1.png" class="card-img-top" alt="room1" />
                        <div class="card-body">
                            <h5 class="card-title">V.I.P 1 Room</h5>
                            <p class="card-text">
                                Phong cách đẳng cấp, tiện nghi cao cấp.
                            </p>
                            <a href="#"><button>Đặt Phòng</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more rooms here -->
        </div>
    </section>

    <!-- Facilities -->
    <section class="facilities-section d-flex flex-column justify-content-center align-items-center">
        <h1 class="mt-3 text-center">Cơ sở vật chất</h1>
        <div class="container text-center facilities py-4">
            <div class="row">
                <div class="col">
                    <i class="fas fa-utensils"></i>
                    <p>Nhà Hàng</p>
                </div>
                <div class="col">
                    <i class="fas fa-cocktail"></i>
                    <p>Bar</p>
                </div>
                <div class="col">
                    <i class="fas fa-shuttle-van"></i>
                    <p>Đưa Đón</p>
                </div>
                <div class="col">
                    <i class="fas fa-swimmer"></i>
                    <p>Hồ Bơi</p>
                </div>
                <div class="col">
                    <i class="fas fa-spa"></i>
                    <p>Spa</p>
                </div>
                <div class="col">
                    <i class="fas fa-dumbbell"></i>
                    <p>Gym</p>
                </div>
            </div>
        </div>
        <hr class="w-100 my-4 border-top border-dark" />
        <div class="rotating-wrapper position-relative">
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/room1.png" class="img-fluid w-100" alt="room1" />
                    </div>
                    <div class="col-md-7">
                        <h3>World Class Restaurant</h3>
                        <p>
                            Thưởng thức ẩm thực đỉnh cao tại nhà hàng sang trọng của MeMe
                            Hotel.
                        </p>
                        <p><strong>Thời gian phục vụ:</strong> 6:30 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
            <button id="nextBtn" class="position-absolute" style="bottom: 10px; right: 10px">
                Tiếp
            </button>
        </div>
    </section>

    <!-- Blog -->
    <section class="blog-section container-fluid py-5">
        <h3 class="text-center">Our Blog</h3>
        <div class="row">
            <div class="col-md-4">
                <a href="#">
                    <img src="../../../upload/room1.png" class="img-fluid mb-3" />
                    <p>Tiệc Cocktail tại MeMe Hotel</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="../../../upload/room1.png" class="img-fluid mb-3" />
                    <p>Massage & Ẩm Thực Thiền</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="../../../upload/room1.png" class="img-fluid mb-3" />
                    <p>Buffet sang trọng & hơn 50 món ngon</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="container py-5">
        <h3 class="text-center mb-5">Happy Customer Says ...</h3>
        <div class="row text-center">
            <div class="col-md-6">
                <blockquote>
                    "Me and my wife had a delightful weekend getaway..."<br /><strong>— Ronaldo</strong>
                </blockquote>
            </div>
            <div class="col-md-6">
                <blockquote>
                    "We were upgraded free of charge..."<br /><strong>— Messi</strong>
                </blockquote>
            </div>
        </div>
    </section>
</main>
<?php require "layout/footer.php" ?>