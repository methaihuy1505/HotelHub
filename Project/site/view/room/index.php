<?php require "layout/header.php"?>
<!-- Main Content -->
<main class="roomList">
    <section class="search-container">
        <h5><i class="fas fa-search"></i> TÌM KIẾM & LỌC</h5>
        <form>
            <div class="row">

                <div class="form-group col-xs-12 col-sm-6">
                    <label for="checkin">Ngày nhận:</label>
                    <input type="text" class="form-control" id="checkin" placeholder="Thứ 2, 28. Thg 5, 2025" />
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label for="checkout">Trả phòng:</label>
                    <input type="text" class="form-control" id="checkout" placeholder="Thứ 2, 28. Thg 5, 2025" />
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label for="roomtype">Loại phòng:</label>
                    <select class="form-control" id="roomtype">
                        <?php foreach ($roomtypes as $roomtype): ?>

                        <option value="<?php echo $roomtype->getTypeName() ?> ">
                            <?php echo $roomtype->getTypeName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-xs-12 col-sm-6">
                    <label for="price">Giá:</label>
                    <select class="form-control" id="price">
                        <option id="price-option"></option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="search-btn">Tìm Phòng</button>
                </div>
            </div>
        </form>
    </section>

    <section class="room-section">
        <h5><i class="fas fa-star"></i> Phòng nổi bật</h5>
        <div class="row">
            <?php foreach ($topRatedRooms as $room): ?>
            <div class="col-xs-12 col-md-4">
                <div class="room-card">
                    <img src="../../../upload/<?php echo $room->getFeaturedImage() ?>"
                        alt="<?php echo $room->getFeaturedImage() ?>" />
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $room->getRoomTypeDetail()->getTypeName() ?></h6>
                        <p class="rating">
                            <?php $rating = $room->getRating();
                                $fullStars                                = floor($rating);
                                $halfStar                                 = ($rating - $fullStars) >= 0.5 ? true : false;

                                for ($i = 0; $i < $fullStars; $i++) {
                                    echo "★";
                                }
                                if ($halfStar) {
                                echo "☆";
                            }?> (<?php echo $room->getFeedbackCount() ?>)</p>
                        <p class="coupon"><?php echo number_format($room->getPrice()) ?> VND</p>
                        <p class="price"><?php echo number_format($room->getSalePrice()) ?> VND</p>
                        <a href="index.php?c=bookingroom"><button class="btn">Book Now</button></a>
                        <button type="button" class="btn" data-toggle="modal" data-target="#vipModal">Detail</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="room-section">
        <h5><i class="fas fa-star"></i> Phòng ưu đãi</h5>
        <div class="row">
            <?php foreach ($topSaleRooms as $room): ?>
            <div class="col-xs-12 col-md-4">
                <div class="room-card">
                    <img src="../../../upload/<?php echo $room->getFeaturedImage() ?>"
                        alt="<?php echo $room->getFeaturedImage() ?>" />
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $room->getRoomTypeDetail()->getTypeName() ?></h6>
                        <p class="rating">
                            <?php $rating = $room->getRating();
                                $fullStars                                = floor($rating);
                                $halfStar                                 = ($rating - $fullStars) >= 0.5 ? true : false;

                                for ($i = 0; $i < $fullStars; $i++) {
                                    echo "★";
                                }
                                if ($halfStar) {
                                echo "☆";
                            }?> (<?php echo $room->getFeedbackCount() ?>)</p>
                        <p class="coupon"><?php echo number_format($room->getPrice()) ?> VND</p>
                        <p class="price"><?php echo number_format($room->getSalePrice()) ?> VND</p>
                        <a href="index.php?c=bookingroom"><button class="btn">Book Now</button></a>
                        <a href="#"><button class="btn">Detail</button></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>


</main>
<div class="modal fade" id="vipModal" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="vipModalLabel">Phòng V.I.P 1 <i class="fas fa-star text-warning"></i><i
                        class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i
                        class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Trạng thái phòng -->
                <p class="text-muted">Chỉ còn lại <strong style="color:blue;">3 phòng trống</strong></p>

                <!-- Đánh giá tổng quát -->
                <div class="d-flex align-items-center bg-light p-3 rounded mb-3">
                    <div class="mr-3 text-primary" style="font-size: 2rem; font-weight: bold;">9/10</div>
                    <div>
                        <div><strong>Rất tốt</strong> <i class="fas fa-star text-warning"></i></div>
                        <a href="#">200 đánh giá ></a>
                    </div>
                </div>

                <!-- Các đánh giá -->
                <div class="mb-3">
                    <div class="border p-2 rounded mb-2">
                        <strong>Huấn rô sè:</strong> Phòng rất tốt cho 10d
                        <span class="float-right text-muted">8.5/10</span>
                    </div>
                    <div class="border p-2 rounded mb-2">
                        <strong>Lão Tôn:</strong> Phòng này dễ ngủ vl
                        <span class="float-right text-muted">8/10</span>
                    </div>
                    <div class="border p-2 rounded mb-2">
                        <strong>Ronaldo:</strong> Tuyệt vời, SIUUUUUUUUU!!!!!!!!!
                        <span class="float-right text-muted">7/10</span>
                    </div>
                </div>

                <!-- Cơ sở vật chất -->
                <h6 class="font-weight-bold">Cơ sở vật chất</h6>
                <div class="row mb-3">
                    <div class="col-6 mb-2"><i class="fas fa-snowflake mr-2 text-info"></i> AC</div>
                    <div class="col-6 mb-2"><i class="fas fa-wifi mr-2 text-info"></i> Wifi</div>
                    <div class="col-6 mb-2"><i class="fas fa-utensils mr-2 text-info"></i> Nhà hàng</div>
                    <div class="col-6 mb-2"><i class="fas fa-elevator mr-2 text-info"></i> Thang máy</div>
                    <div class="col-6 mb-2"><i class="fas fa-concierge-bell mr-2 text-info"></i> Tiếp tân</div>
                </div>

                <!-- Mô tả -->
                <h6 class="font-weight-bold">Mô tả</h6>
                <p>
                    Phòng V.I.P 1 tại MeMe hotel được thiết kế theo phong cách ấm cúng, tinh tế, tạo không gian riêng tư
                    lý tưởng cho những buổi tiệc nhỏ hay tiếp khách quan trọng. Nơi đây mang đến trải nghiệm thoải mái &
                    đẳng cấp cho mọi khách hàng.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-success">Đặt phòng ngay</button>
            </div>

        </div>
    </div>
</div>

<script>
// Tạo map loại phòng -> giá từ PHP sang JS
const roomtypePrices = <?php echo json_encode($roomtypePrices); ?>;

const roomtypeSelect = document.getElementById("roomtype");
const priceOption = document.getElementById("price-option");

function updatePrice() {
    const selectedType = roomtypeSelect.value.trim();
    const price = roomtypePrices[selectedType] || 'Không xác định';
    priceOption.textContent = price;
    priceOption.value = price;
}

// Lần đầu gán giá trị
updatePrice();

// Khi thay đổi loại phòng
roomtypeSelect.addEventListener("change", updatePrice);
</script>

<?php require "layout/footer.php"?>