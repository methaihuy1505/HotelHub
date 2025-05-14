<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; HotelHub.com | All Rights Reserved</p>
        <p>
            <a href="#">About Us</a> | <a href="#">Contact Us</a> |
            <a href="#">Privacy</a>
        </p>
        <div>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
</footer>
<!-- Modal Box -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true"
    data-keyboard="true">
    <div class="modal-dialog slide-down">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex justify-content-between w-100">
                    <h5 class="modal-title" id="authModalLabel">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <button id="showLogin" class="btn btn-secondary">
                        Đăng nhập
                    </button>
                    <button id="showRegister" class="btn btn-secondary">
                        Đăng ký
                    </button>
                </div>
                <hr />
                <div id="loginForm">
                    <form>
                        <div class="form-group">
                            <label for="email">Email hoặc Tên đăng nhập</label>
                            <input type="text" class="form-control" id="email"
                                placeholder="Nhập email hoặc tên đăng nhập" />
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Đăng nhập
                        </button>
                        <div class="text-center mt-3">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                    </form>
                    <hr />
                    <div class="text-center">
                        <p>Hoặc đăng nhập bằng</p>
                        <button class="btn btn-danger">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button class="btn btn-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                    </div>
                </div>
                <div id="registerForm" style="display: none">
                    <form>
                        <div class="form-group">
                            <label for="fullName">Họ và Tên</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Nhập họ tên" />
                        </div>
                        <div class="form-group">
                            <label for="regEmail">Email</label>
                            <input type="email" class="form-control" id="regEmail" placeholder="Nhập email" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại" />
                        </div>
                        <div class="form-group">
                            <label for="regPassword">Mật khẩu</label>
                            <input type="password" class="form-control" id="regPassword" placeholder="Nhập mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Nhập lại mật khẩu" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block">
                            Xác nhận đăng ký
                        </button>
                    </form>
                    <hr />
                    <div class="text-center">
                        <p>Hoặc đăng ký bằng</p>
                        <button class="btn btn-danger">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button class="btn btn-primary">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../site/public/vendor/jquery-3.5.1.min.js"></script>
<script src="../../site/public/vendor/popper.min.js"></script>
<script src="../../site/public/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../../site/public/js/script.js"></script>
</body>

</html>