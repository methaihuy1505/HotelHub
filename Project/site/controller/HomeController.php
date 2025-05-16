<?php
class HomeController
{
    public function index()
    {
        $roomRepository        = new RoomRepository();
        $serviceRepository     = new ServiceRepository();
        $feedbackRepository    = new FeedBackRepository();
        $useraccountRepository = new UserAccountRepository;

        $cond          = [];                   // Không lọc gì cả
        $sort          = ["rating" => "DESC"]; // Sắp xếp theo rating giảm dần
        $page          = 1;
        $item_per_page = 4; // Chỉ lấy 4 phòng
        $topRatedRooms = $roomRepository->getBy($cond, $sort, $page, $item_per_page);

        $sortService           = []; // Không cần sắp xếp nếu không yêu cầu
        $item_per_page_service = 6;  // Lấy 6 service
        $services              = $serviceRepository->getBy($cond, $sortService, $page, $item_per_page_service);

        $sortFeedback           = []; // Không cần sắp xếp nếu không yêu cầu
        $item_per_page_feedback = 2;  // Lấy 2 feedback
        $feedbacks              = $feedbackRepository->getBy($cond, $sortFeedback, $page, $item_per_page_feedback);

        require "view/home/index.php";
    }
}