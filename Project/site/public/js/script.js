window.onload = function () {
  $("#showLogin").click(function () {
    $("#registerForm").fadeOut(200, function () {
      $("#loginForm").fadeIn(200);
      $("#authModalLabel").text("Đăng nhập");
    });
  });

  $("#showRegister").click(function () {
    $("#loginForm").fadeOut(200, function () {
      $("#registerForm").fadeIn(200);
      $("#authModalLabel").text("Đăng ký");
    });
  });
};

$(document).ready(function () {
  // HomePage
  const $items = $(".rotating-content");
  if ($items) {
    const $icons = $(".facilities i");
    let index = 0;
    let isTransitioning = false;
    // Ẩn tất cả và chỉ hiện cái đầu
    $items.hide().eq(index).fadeIn(500);

    function animateIcon() {
      // Xóa tất cả lớp cũ
      $icons.removeClass("icon-bounce");
      // Thêm hiệu ứng mới cho icon tương ứng
      $icons.eq(index).addClass("icon-bounce"); // Thêm hiệu ứng cho icon của div hiện tại
    }

    function showNext() {
      if (isTransitioning) return;
      isTransitioning = true;
      $items.eq(index).fadeOut(500, function () {
        index = (index + 1) % $items.length;
        $items.eq(index).fadeIn(500);
        isTransitioning = false;
        animateIcon();
      });
    }

    // Tự động chạy mỗi 2s
    let interval = setInterval(showNext, 5000);

    // Nút "Tiếp"
    $("#nextBtn").on("click", function () {
      clearInterval(interval); // Dừng interval hiện tại
      $items.stop(true, true);
      showNext(); // Chuyển tiếp ngay
      interval = setInterval(showNext, 5000); // Thiết lập lại
    });
  }
  // Menu in userInfo
  menu = document.getElementById("menu");
  if (menu) {
    menu.onclick = function () {
      let displayMenu = document.querySelector(".sidebar");
      if (displayMenu.style.display === "block") {
        displayMenu.style.display = "none";
        displayMenu.style.animation = "";
      } else {
        displayMenu.style.display = "block";
        displayMenu.style.animation = "2s menuAnimation";
      }
    };
    window.addEventListener("resize", () => {
      let displayMenu = document.querySelector(".sidebar");

      if (window.innerWidth > 768) {
        displayMenu.style.display = "block";
      }
    });
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const menuLinks = document.querySelectorAll(".sidebar a"); // Lấy tất cả liên kết trong sidebar
  if (menuLinks) {
    const sections = document.querySelectorAll(".content-section"); // Lấy tất cả section trong nội dung chính

    // Ẩn tất cả các phần nội dung trừ phần đầu tiên (nếu muốn mặc định hiển thị một phần khác, đổi phần này)
    sections.forEach((section, index) => {
      if (index === 0) {
        section.style.display = "block";
      } else {
        section.style.display = "none";
      }
    });

    menuLinks.forEach((link) => {
      link.addEventListener("click", function (event) {
        event.preventDefault(); // Ngăn không cho trình duyệt tải lại trang

        // Lấy ID của phần nội dung tương ứng
        const targetId = link.getAttribute("href").replace("#", "");
        const targetSection = document.getElementById(targetId);
        console.log(targetSection, targetId);
        // Ẩn tất cả phần nội dung trước khi hiển thị phần mới
        sections.forEach((section) => {
          section.style.display = "none";
        });

        // Hiển thị phần nội dung tương ứng với liên kết được click
        if (targetSection) {
          targetSection.style.display = "block";
        }
      });
    });
  }
});
// Scroll event
window.addEventListener("scroll", function () {
  // Back to top Button
  let scrollTop = document.documentElement.scrollTop;
  let backToTopButton = document.querySelector(".back-to-top");
  if (scrollTop > 200) {
    backToTopButton.style.opacity = 1;
    backToTopButton.classList.add("pointer-event");
  } else {
    backToTopButton.style.opacity = 0;
    backToTopButton.classList.remove("pointer-event");
  }
  // Tool bar
  let toolbar = document.querySelector(".navbar .container");
  let header = document.querySelector(".navbar");
  let logo = toolbar.querySelector(".navbar .container img");
  if (scrollTop > header.offsetHeight) {
    toolbar.classList.add("fixed-top");
    header.classList.add("dummy-padding");
    logo.style.width = "50px";
  } else {
    toolbar.classList.remove("fixed-top");
    header.classList.remove("dummy-padding");
    logo.classList.remove("shrunk");
    logo.style.width = "76px";
  }
});
