<?php require "layout/header.php"?>
<main class="feedback">
    <div class="container">
        <h4>Gửi phản hồi</h4>
        <form action="/submit-feedback" method="post">
            <!-- Đánh giá về dịch vụ -->
            <div class="section-title">Đánh giá về dịch vụ</div>
            <div class="form-group row">
                <div class="section col-sm-9">
                    Bạn có cảm thấy hài lòng với dịch vụ mà khách sạn cung cấp không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="service_satisfaction" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="service_satisfaction" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Nhân viên lễ tân có thân thiện và chuyên nghiệp không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="staff_professional" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="staff_professional" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Các tiện nghi trong phòng (giường, chăn ga, đồ dùng vệ sinh cá
                    nhân, v.v.) có đáp ứng được mong đợi của bạn không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="room_facilities" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="room_facilities" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Menu có đa dạng và phù hợp với sở thích của bạn không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="menu_variety" value="Có" /> Có</label>
                    <label class="radio-inline2"><input type="radio" name="menu_variety" value="Không" />
                        Không</label>
                </div>
            </div>

            <!-- Đánh giá về cơ sở vật chất -->
            <div class="section-title">Đánh giá về cơ sở vật chất</div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Không gian thiết bị tại cơ sở có sạch sẽ và thoải mái không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="clean_comfortable" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="clean_comfortable" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Trang thiết bị có đáp ứng nhu cầu bạn không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="equipment_satisfied" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="equipment_satisfied" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Khu vực vệ sinh, tiện ích công cộng có đạt tiêu chuẩn không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="public_area_clean" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="public_area_clean" value="Không" />
                        Không</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="section col-sm-9">
                    Cách bố trí không gian có phù hợp và dễ chịu không?
                </div>
                <div class="col-sm-3 text-left d-flex justify-content-around">
                    <label class="radio-inline1"><input type="radio" name="layout_pleasant" value="Có" />
                        Có</label>
                    <label class="radio-inline2"><input type="radio" name="layout_pleasant" value="Không" />
                        Không</label>
                </div>
            </div>

            <!-- Mức độ hài lòng -->
            <div class="section-title">Mức độ hài lòng:</div>
            <div class="form-group">
                <div class="star-rating">
                    <label><input type="radio" name="rating" value="1" /> ★</label>
                    <label><input type="radio" name="rating" value="2" /> ★★</label>
                    <label><input type="radio" name="rating" value="3" /> ★★★</label>
                    <label><input type="radio" name="rating" value="4" /> ★★★★</label>
                    <label><input type="radio" name="rating" value="5" /> ★★★★★</label>
                </div>
            </div>

            <!-- Ý kiến khác -->
            <div class="section-title">Khác:</div>
            <div class="form-group">
                <textarea class="form-control" rows="10" cols="1" name="other_feedback"
                    placeholder="Ý kiến khác"></textarea>
            </div>

            <!-- Gửi -->
            <div class="text-center">
                <button type="submit" class="btn-send">➤ Send</button>
            </div>
        </form>
    </div>
</main>
<?php require "layout/footer.php"?>