<?php

require_once '../app/PageHelper.php';
require_once '../app/Route.php';

// Lấy URI từ yêu cầu HTTP
$requestUri = $_SERVER['REQUEST_URI'];

$rootPath = dirname($_SERVER['SCRIPT_NAME'], 2); 

// Tạo đối tượng Route và xác định trang hiện tại và file view
$route = new Route($requestUri, $rootPath);
$pageFile = $route->getPageFile();

// Tạo đối tượng PageHelper với tùy chọn nạp header và footer
$data = PageHelper::getPageData($route->getCurrentPage());
$data['pageFile'] = $pageFile;  // Thêm đường dẫn file view vào dữ liệu
$helper = new PageHelper($data, true, true);  // Thay đổi tham số để không nạp header/footer nếu cần
$helper->render();
?>