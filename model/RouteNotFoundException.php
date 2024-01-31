<?php

namespace model;

use Exception;


class RouteNotFoundException extends Exception
{
    // Bạn có thể thêm các phương thức hoặc thuộc tính khác nếu cần
    public $message = "Không tìm thấy đường dẫn nèeee !!!";
    // return $message;
    // echo "dsad";

}