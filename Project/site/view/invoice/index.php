<?php require "layout/header.php"?>
<!-- Main -->
<main>
    <div class="invoice-box">
        <div class="row">
            <div class="col-6">
                <div class="logo">
                    <img src="../../../upload/Logo.png" alt="Logo" />
                    <h4>HotelHub</h4>
                </div>
            </div>
            <div class="col-6 text-end">
                <div class="dong">
                    <strong>MeMeHotel</strong><br />
                    Cao Lỗ, quận 8, TP HCM<br />
                    Phone: +84 98 348 06 83<br />
                    nhom1@gmail.com<br />
                    www.demowebsite.com
                </div>
            </div>
        </div>

        <h2 class="text-center fw-bold">CHI TIẾT HÓA ĐƠN</h2>

        <table class="table table-borderless mb-4">
            <tbody>
                <td>Mã hóa đơn: 001</td>
                <td>Ngày lập HĐ: 21/03/2004</td>
                <tr>
                    <td>Khách hàng:</td>
                    <td><b>DuckLECopy</b></td>
                </tr>
                <tr>
                    <td>Ngày nhận phòng:</td>
                    <td><b>25/03/2004</b></td>
                </tr>
                <tr>
                    <td>Ngày trả phòng:</td>
                    <td><b>27/03/2004</b></td>
                </tr>
                <tr>
                    <td>Ngày thanh toán:</td>
                    <td><b>24/03/2004</b></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nội dung</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Phòng VIP</td>
                    <td>2 phòng/2 đêm</td>
                    <td>1.000.000 VND</td>
                    <td>4.000.000 VND</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Phòng tiêu chuẩn</td>
                    <td>1 phòng/2 đêm</td>
                    <td>600.000 VND</td>
                    <td>1.200.000 VND</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Buffet</td>
                    <td>1 phần</td>
                    <td>200.000 VND</td>
                    <td>200.000 VND</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless mb-3">
            <tbody>
                <tr>
                    <td class="text-end"><b>Tổng cộng:</b></td>
                    <td class="text-end">5.400.000 VND</td>
                </tr>
                <tr>
                    <td class="text-end"><b>Thuế:</b></td>
                    <td class="text-end">108.000 VND</td>
                </tr>
                <tr>
                    <td class="text-end"><b>Giảm giá: 10%</b></td>
                    <td class="text-end">540.000 VND</td>
                </tr>
                <tr>
                    <td class="text-end"><b>Tổng tiền thanh toán:</b></td>
                    <td class="text-end">4.752.000 VND</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?php require "layout/footer.php"?>