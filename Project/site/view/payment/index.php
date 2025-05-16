<?php require "layout/header.php"?>
<!-- Main -->
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <form>
                <div class="payment">
                    <h2>Hình thức thanh toán</h2>
                    <div class="form-group">
                        <label for="cash" class="payment-option">
                            <input type="radio" name="payment" id="cash" />
                            Tiền mặt
                        </label>
                        <label for="momo" class="payment-option">
                            <input type="radio" name="payment" id="momo" />
                            MoMo
                        </label>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-2" placeholder="Tên khách hàng" />
                            <input type="text" class="form-control mb-2" placeholder="Số điện thoại" />
                            <input type="email" class="form-control mb-2" placeholder="Email" />
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="../images/room1.png" alt="QR Thanh toán" class="img-fluid" />
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-start">
                        <input type="checkbox" id="updates" class="mt-1" />
                        <div class="ml-2">
                            <label for="updates">
                                Tôi đồng ý nhận thông tin cập nhật và chương trình khuyến
                                mãi về HotelHub và các chi nhánh hoặc đối tác kinh doanh của
                                HotelHub thông qua nhiều kênh, bao gồm WhatsApp. Có thể nhận
                                thông tin bất cứ lúc nào. Đọc thêm trong Chính sách Quyền
                                riêng tư.
                            </label>
                            <p>
                                Thực hiện bước tiếp theo đồng nghĩa với việc quý khách chấp
                                nhận tuân theo Điều khoản Sử dụng và Chính sách Quyền riêng
                                tư của HotelHub.
                            </p>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">ĐẶT NGAY</button>
            </form>
        </div>
        <div class="col-lg-4 payment-info">
            <div class="title-box">
                <h2>Khách Sạn HOTELHUB</h2>
                <p>
                    <strong>Ngày đặt phòng:</strong> T7, 26 tháng 4 - T4, 6 tháng 5
                </p>
                <p><strong>Loại phòng:</strong> 1 x giường đôi</p>
                <p><strong>Phòng cuối cùng ở mức giá này!</strong></p>
            </div>

            <div class="title-box">
                <h3>Chi tiết giá</h3>

                <p><del>Giá gốc: 1.700.234đ</del></p>
                <p>Giá giảm: 1.382.299đ</p>
                <p><strong>Phí đặt trước:</strong> MIỄN PHÍ</p>
                <p>
                    <strong>Tổng tiền:</strong> 1.567.447đ (đã bao gồm thuế 8% & phí
                    dịch vụ 5%)
                </p>
                <p>Lựa chọn thông minh! Bạn đã tiết kiệm được 318.005đ</p>
            </div>
            <div class="title-box">
                <h3>Chính sách hủy phòng</h3>

                <p>
                    Đặt chỗ không rủi ro! Quý khách có thể dễ dàng hủy hoặc thay đổi
                    đơn đặt phòng miễn phí.
                </p>
            </div>
            <div class="title-box">
                <h3>Hỗ trợ trực tuyến</h3>
                <p>HotelHub hỗ trợ 24/7 theo ngôn ngữ của quý khách.</p>
            </div>
        </div>
    </div>
</div>
<?php require "layout/footer.php"?>