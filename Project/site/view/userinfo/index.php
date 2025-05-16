<?php require "layout/header.php"?>
<!-- Main Content -->
<main class="userInfo">
    <div class="container mt-5">
        <!-- Toggle Button for Mobile -->
        <button class="btn btn-primary d-md-none mb-3" id="menu">☰ Menu</button>
        <div class="row">
            <!-- Sidebar (Profile Section) -->

            <section class="col-md-4 sidebar">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        <img src="../../../upload/<?php echo $useraccount->getUserImage() ?>" alt="Profile"
                            class="profile-img mb-3" />
                        <a href="#personalInfo">Thông tin cá nhân</a>
                        <a href="#changePassword">Đổi mật khẩu</a>
                        <a href="#roomHistory">Lịch sử đặt phòng</a>
                        <a href="#bill">Hóa đơn</a>
                    </div>
                </div>
            </section>
            <!-- Main Content -->
            <div class="col-md-8 ">
                <a href="index.php?c=userinfo&a=logout" role="button" class="btn btn-danger btn-sm w-100">Đăng xuất</a>
                <!-- Thông tin cá nhân -->
                <section id="personalInfo" class="content-section mb-4">
                    <div class="card card-custom">
                        <div class="card-body text-center">
                            <h5 class="card-title">Thông tin cá nhân</h5>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" placeholder="Họ và tên"
                                        value="<?php echo $useraccount->getFullName(); ?>" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="email" class="form-control" placeholder="Địa chỉ email"
                                        value="<?php echo $_SESSION['user']->getEmail(); ?>" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" placeholder="Số điện thoại"
                                        value="<?php echo $useraccount->getPhoneNumber(); ?>" disabled />
                                </div>
                                <div class="mb-3 gioitinh">
                                    <h6>Giới tính</h6>
                                    <label class="form-label">
                                        <input type="radio" value="Nam" name="gioitinh" <?php if ($useraccount->getGender() === "Nam") {
                                                                                                echo "checked";
                                                                                        }
                                                                                        ?> disabled /> Nam
                                    </label>
                                    <label class="form-label">
                                        <input type="radio" value="Nữ" name="gioitinh" <?php if ($useraccount->getGender() === "Nữ") {
                                                                                                 echo "checked";
                                                                                         }
                                                                                         ?> disabled /> Nữ
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- Thay đổi mật khẩu -->
                <section id="changePassword" class="content-section mb-4">
                    <div class="card card-custom">
                        <div class="card-body text-center">
                            <h5 class="card-title">Thay đổi mật khẩu</h5>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu cũ" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu mới" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- Phòng vip -->
                <section id="roomHistory" class="content-section">
                    <div class="card card-custom">
                        <div class="card-body viproom">
                            <h5 class="card-title text-center">Lịch sử đặt phòng</h5>
                            <?php foreach ($useraccount->getBookingRooms() as $bookingRoom): ?>
                            <div class="room-item">
                                <div>
                                    <img src="../../../upload/<?php echo $bookingRoom->getRooms()[0]->getFeaturedImage() ?>"
                                        alt="<?php echo $bookingRoom->getRooms()[0]->getFeaturedImage() ?>" />
                                </div>
                                <div class="room-item-info">
                                    <p><?php echo $bookingRoom->getRooms()[0]->getRoomTypeDetail()->getTypeName() ?></p>
                                    <p>Thời điểm:
                                        <?php echo $bookingRoom->getCheckinDate() ?>-<?php echo $bookingRoom->getCheckoutDate() ?>
                                    </p>
                                    <a href="index.php?c=invoice">Xem hóa đơn</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!-- Hóa đơn -->
                <section id="bill" class="content-section">
                    <div class="card card-custom">
                        <div class="card-body bill">
                            <h5 class="card-title text-center">Hóa đơn</h5>
                            <?php foreach ($useraccount->getInvoices() as $invoice):
                            ?>
                            <div class="bill-item">
                                <div>
                                    <img src="../../../upload/bill.png" alt="" />
                                </div>
                                <div class="bill-item_info">
                                    <p>Mã hóa đơn:<?php echo $invoice->getInvoiceID() ?></p>
                                    <p>Thời điểm lập HĐ:<?php echo $invoice->getInvoiceDate() ?></p>
                                    <p>Thời điểm thanh toán
                                        HĐ:<?php echo $invoice->getPaymentDate() ?? "chưa thanh toán" ?></p>
                                    <p>Tổng:<?php echo number_format($invoice->getFinalAmount()) ?>đ</p>
                                </div>
                                <div class="bill-item_status">
                                    <div>
                                        <p><?php echo $invoice->getStatus() ?></p>
                                        <img src="../../../upload/around.png" alt="" />
                                    </div>
                                    <a href="#">Xuất hóa đơn</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php require "layout/footer.php"?>