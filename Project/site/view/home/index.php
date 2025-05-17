<?php require "layout/header.php"?>
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
        <a href="index.php?c=bookingroom"><button>Đặt Phòng</button></a>
    </section>

    <!-- Featured Rooms -->
    <section class="container-fluid room-section py-5">
        <h2 class="text-center mb-4">Phòng Nổi Bật</h2>
        <div class="row justify-content-center">
            <!-- Repeat this col for each room -->
            <div class="col-md-6 col-lg-10">
                <div class="row justify-content-around">
                    <?php foreach ($topRatedRooms as $room): ?>

                    <div class="card col-lg-5 p-0 shadow">
                        <img src="../../../upload/<?php echo $room->getFeaturedImage() ?>" class="card-img-top"
                            alt="<?php echo $room->getFeaturedImage() ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $room->getRoomTypeDetail()->getTypeName() ?></h5>
                            <p class="card-text">
                                <?php echo $room->getDescribe() ?>
                            </p>
                            <a href="index.php?c=bookingroom"><button>Đặt Phòng</button></a>
                        </div>
                    </div>
                    <?php endforeach; ?>

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
                    <p><?php echo $services[0]->getServiceName() ?></p>
                </div>
                <div class="col">
                    <i class="fas fa-cocktail"></i>
                    <p><?php echo $services[1]->getServiceName() ?></p>
                </div>
                <div class="col">
                    <i class="fas fa-shuttle-van"></i>
                    <p><?php echo $services[2]->getServiceName() ?></p>
                </div>
                <div class="col">
                    <i class="fas fa-swimmer"></i>
                    <p><?php echo $services[3]->getServiceName() ?></p>
                </div>
                <div class="col">
                    <i class="fas fa-spa"></i>
                    <p><?php echo $services[4]->getServiceName() ?></p>
                </div>
                <div class="col">
                    <i class="fas fa-dumbbell"></i>
                    <p><?php echo $services[5]->getServiceName() ?></p>
                </div>
            </div>
        </div>
        <hr class="w-100 my-4 border-top border-dark" />
        <div class="rotating-wrapper position-relative">
            <?php foreach ($services as $service): ?>
            <div class="container rotating-content">
                <div class="row">
                    <div class="col-md-5">
                        <img src="../../../upload/<?php echo $service->getFeaturedImg() ?>" class="img-fluid w-100"
                            alt="<?php echo $service->getFeaturedImg() ?>" />
                    </div>
                    <div class="col-md-7">
                        <h3><?php echo $service->getServiceName() ?></h3>
                        <p>
                            <?php echo $service->getDescribe() ?>
                        </p>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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
                    <img src="../../../upload/vip1.jpg" class="img-fluid mb-3" />
                    <p>Tiệc Cocktail tại MeMe Hotel</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="../../../upload/vip1.jpg" class="img-fluid mb-3" />
                    <p>Massage & Ẩm Thực Thiền</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#"><img src="../../../upload/vip1.jpg" class="img-fluid mb-3" />
                    <p>Buffet sang trọng & hơn 50 món ngon</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="container py-5">
        <h3 class="text-center mb-5">Happy Customer Says ...</h3>
        <div class="row text-center">
            <?php foreach ($feedbacks as $feedback): ?>
            <div class="col-md-6">
                <blockquote>
                    <?php echo $feedback->getComment() ?><br /><strong>—<?php echo $useraccountRepository->find($feedback->getUserAccount())->getFullName() ?></strong>
                </blockquote>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require "layout/footer.php"?>