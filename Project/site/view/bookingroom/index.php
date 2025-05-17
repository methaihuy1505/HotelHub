<?php require "layout/header.php"?>
<main class="bookingRoom">
    <section class="container py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-3 mb-2 mb-md-0">
                            <select class="form-control form-control-sm mb-2">
                                <option>Select Branch</option>
                                <option value="TPHCM">
                                    <a class="dropdown-item" href="#">TP.HCM</a>
                                </option>
                                <option value="ANGIANG">
                                    <a class="dropdown-item" href="#">An Giang</a>
                                </option>
                                <option value="TIENGIANG">
                                    <a class="dropdown-item" href="#">Tiền Giang</a>
                                </option>
                                <option value="HAIPHONG">
                                    <a class="dropdown-item" href="#">Hải Phòng</a>
                                </option>
                                <option value="DAKLAK">
                                    <a class="dropdown-item" href="#">Đắk Lắk</a>
                                </option>
                                <option value="DANANG">
                                    <a class="dropdown-item" href="#">Đà Nẵng</a>
                                </option>
                            </select>
                        </div>
                        <div class="check-in">
                            <label for="checkin">Check in</label>
                            <input type="date" class="form-control form-control-sm" id="checkin" />
                        </div>
                        <div class="check-out">
                            <label for="checkout">Check out </label>
                            <input type="date" class="form-control form-control-sm" id="checkout" />
                        </div>
                        <div class="col-md-3 text-right">
                            <a href="index.php?c=payment" class="btn btn-link position-relative">
                                <i class="fa fa-file-invoice-dollar fa-2x"></i>
                                <span class="badge badge-danger rounded-circle position-absolute"
                                    style="top: -5px; right: 0px">1</span>
                            </a>
                        </div>
                    </div>
                </div>
    </section>
    <div class="container mt-4">
        <div class="row">
            <aside class="col-md-3">
                <div class="filter-group mb-3">
                    <a href="index?c=bookingroom">
                        <h3>Tất cả phòng</h3>
                    </a>
                </div>
                <div class="filter-group mb-3">
                    <h3>Khoảng giá</h3>
                    <select class="form-control form-control-sm mb-2">
                        <?php foreach ($roomtypes as $roomtype): ?>

                        <option value="<?php echo $roomtype->getTypeName() ?>"
                            data-price="<?php echo $roomtype->getPriceRange(); ?>">
                            <?php echo $roomtype->getTypeName() ?>

                        </option>
                        <?php endforeach; ?>

                    </select>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="price" id="price1" />
                        <label class="form-check-label" for="price1">250.000-300.000 VND</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="price" id="price2" />
                        <label class="form-check-label" for="price2">300.000-600.000 VND</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="price" id="price3" />
                        <label class="form-check-label" for="price3">600.000-2.000.000 VND</label>
                    </div>
                </div>

                <div class="filter-group mb-3">
                    <h3>Đánh giá sao</h3>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="star1" />
                        <label class="form-check-label" for="star1">1 <span class="star">★</span></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="star2" />
                        <label class="form-check-label" for="star2">2 <span class="star">★★</span></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="star3" />
                        <label class="form-check-label" for="star3">3 <span class="star">★★★</span></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="star4" />
                        <label class="form-check-label" for="star4">4 <span class="star">★★★★</span></label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="star5" />
                        <label class="form-check-label" for="star5">5 <span class="star">★★★★★</span></label>
                    </div>
                </div>

                <div class="filter-group mb-3">
                    <h3>Tiện nghi phòng</h3>
                    <?php foreach ($amenities as $amenity): ?>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="amenity1" />
                        <label class="form-check-label" for="amenity1"><i
                                class="fa"></i><?php echo $amenity->getName() ?></label>
                    </div>
                    <?php endforeach?>
                </div>
            </aside>

            <main class="col-md-9">
                <div class="row row-cols-1 g-3">
                    <?php foreach ($allRoom as $room): ?>
                    <div class="col">
                        <div class="card">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-4">
                                    <img src="../../../upload/<?php echo $room->getFeaturedImage() ?>"
                                        class="card-img rounded-left" alt="V.I.P 1 Room" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $room->getRoomTypeDetail()->getTypeName() ?>
                                            <span class="star">
                                                <?php $rating = $room->getRating();
                                                    $fullStars                                                    = floor($rating);
                                                    $halfStar                                                     = ($rating - $fullStars) >= 0.5 ? true : false;
                                                for ($i = 0; $i < $fullStars; $i++) {echo "★";}
                                                if ($halfStar) {echo "☆";}?></span>
                                        </h5>
                                        <ul class="list-unstyled">
                                            <?php
                                            foreach ($room->getAmenities() as $amenity): ?>
                                            <li>
                                                <i class="fa fa-check-square text-success mr-1"></i>
                                                <?php echo $amenity->getName() ?>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text1">
                                            <strong class="price"><?php echo number_format($room->getPrice()) ?> VND
                                            </strong>
                                        </p>
                                        <p class="card-text">
                                            <strong class="price"><?php echo number_format($room->getSalePrice()) ?>
                                                VND</strong>
                                        </p>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#serviceModal">
                                            Chọn Phòng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach?>

                </div>
            </main>
        </div>
    </div>
    <!-- Modal Box Service -->
    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg slide-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serviceModalLabel">Dịch vụ khác</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php foreach ($services as $service): ?>
                    <div class="mb-4 p-3 border rounded"
                        style="background-image: url(../../../upload/<?php echo $service->getFeaturedImg() ?>)">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="swim" />
                            <label class="form-check-label font-weight-bold h5"
                                for="swim"><?php echo $service->getServiceName() ?></label>
                        </div>
                        <p>
                            <?php echo $service->getDescribe() ?> </p>

                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-success">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require "layout/footer.php"?>