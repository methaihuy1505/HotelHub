<?php
class UserinfoController
{
    public function index()
    {
        $userRepo = new UserRepository();

        $useraccount = $_SESSION['user']->getUserAccount();

        require "view/userinfo/index.php";
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email    = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            // Giả sử bạn có UserRepository:
            $userRepo = new UserRepository();
            $user     = $userRepo->findEmailAndPassword($email, $password);

            if ($user) {
                // Lưu thông tin đăng nhập vào session
                $_SESSION['user'] = $user;
                header("Location: index.php?c=userinfo");
                exit;
            } else {
                $_SESSION['login_error'] = "Sai email hoặc mật khẩu";
                header("Location: index.php#authModal");
                exit;
            }
        }
    }
    public function logout()
    {

        session_start();
        session_unset(); // Xoá toàn bộ biến session
        session_destroy();

        // Hủy session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        header('Location: index.php'); // Quay về trang chủ
        exit;
    }

}