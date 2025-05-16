<?php
class BookingroomController
{
    public function index()
    {
        $roomtypeRepository = new RoomTypeRepository();
        $roomtypes          = $roomtypeRepository->getAll();
        $roomtypePrices     = [];
        foreach ($roomtypes as $roomtype) {
            $typeName                  = $roomtype->getTypeName();
            $priceRange                = $roomtype->getPriceRange();
            $roomtypePrices[$typeName] = $priceRange; // loại phòng -> giá
        }
        $roomRepository     = new RoomRepository();
        $serviceRepository  = new ServiceRepository();
        $feedbackRepository = new FeedBackRepository();
        $amenitiesRepo      = new AmenitiesRepository();
        $amenities          = $amenitiesRepo->getAll();
        $cond               = [];                   // Không lọc gì cả
        $sort               = ["rating" => "DESC"]; // Sắp xếp theo rating giảm dần
        $page               = 1;
        $item_per_page      = 4; // Chỉ lấy 3 phòng
        $topRatedRooms      = $roomRepository->getBy($cond, $sort, $page, $item_per_page);

        $sort2 = [];

        $allRoom = $roomRepository->getBy($cond, $sort2, $page, $item_per_page);

        $sortService           = []; // Không cần sắp xếp nếu không yêu cầu
        $item_per_page_service = 6;  // Lấy 6 service
        $services              = $serviceRepository->getBy($cond, $sortService, $page, $item_per_page_service);

        $sortFeedback           = []; // Không cần sắp xếp nếu không yêu cầu
        $item_per_page_feedback = 2;  // Lấy 2 feedback
        $feedbacks              = $feedbackRepository->getBy($cond, $sortFeedback, $page, $item_per_page_feedback);
        require "view/bookingroom/index.php";
    }
}