<?php

class PageHelper
{
    private $data;
    private $includeHeader;
    private $includeFooter;

    public function __construct(array $data, $includeHeader = true, $includeFooter = true)
    {
        $this->data = $data;
        $this->includeHeader = $includeHeader;
        $this->includeFooter = $includeFooter;
    }
    public static function getBaseURL()
    {
        return dirname($_SERVER['SCRIPT_NAME'], 2); 
    }

    // In thông tin trang, phục vụ việc debug
    private function printPageData($data)
    {
        echo '<div class="bg-primary-600" style="padding:2rem;">';
        echo '<pre style="font-size:12px;background: #121212; font-weight:bold; color: #fff; padding: 2rem; border-radius: 50px; width: 80%; margin:auto;">';
        echo "<span style='color:#8cff8c;'>### [debug]: Information -> {$data['title']} ###</span><br/>";
        echo '<span style="color:#ff9393;">### Turn off function app\PageHelper::printPageData() to remove this message !###</span><hr style="margin:1rem 0;"/>';
        print_r($data);
        echo '</pre>';
        echo '</div>';
    }

    // Render trang, bao gồm header, nội dung và footer
    public function render()
    {
        try {
            if ($this->includeHeader) {
                $this->renderTemplate('header');
            }
            // In thông tin trang (chỉ dùng khi cần debug)
            $this->printPageData($this->data);

            // Bao gồm nội dung trang
            include $this->data['pageFile'];



            if ($this->includeFooter) {
                $this->renderTemplate('footer');
            }
        } catch (Exception $e) {
            // Nếu có lỗi, chuyển đến trang 500
            http_response_code(500);
            $this->data['title'] = '500 Internal Server Error';
            $this->data['pageFile'] = '../pages/500.php';
            $this->renderTemplate('header');
            include $this->data['pageFile'];
            $this->renderTemplate('footer');
        }
    }

    // Render template header hoặc footer
    private function renderTemplate($template)
    {
        $templateFile = '../pages/templates/' . $template . '.php';
        if (file_exists($templateFile)) {
            include $templateFile;
        } else {
            echo "<!-- $template template not found -->";
        }
    }

    // Lấy dữ liệu trang dựa trên tên trang
    public static function getPageData($page)
    {
        $data = [
            'title' => 'Default Title',
            'meta_description' => 'Default description',
            'meta_keywords' => 'default, keywords',
            'meta_og' => [
                'title' => 'Default Title',
                'description' => 'Default description',
                'image' => 'default-image.jpg',
                'url' => 'http://example.com'
            ],
            'css' => ['public/css/global.css'],
            'js' => ['public/js/global.js'],
            'css_external' => [],
            'js_external' => [],
            'pageFile' => '../pages/404.php' // Đặt file mặc định là 404
        ];

        $pageData = [
            'home' => [
                'title' => 'Home Page',
                'meta_description' => 'Welcome to the home page of My Website.',
                'meta_og' => [
                    'title' => 'Home Page - My Website',
                    'description' => 'Welcome to the home page of My Website.',
                    'image' => 'path/to/home-image.jpg',
                    'url' => 'http://example.com/home'
                ],
                'css' => ['public/css/global.css', 'public/css/pages/home.css'],
                'js' => ['public/js/global.js', 'public/js/pages/home.js']
            ],
            'about' => [
                'title' => 'About Us',
                'meta_description' => 'Learn more about us on the About Us page.',
                'meta_og' => [
                    'title' => 'About Us - My Website',
                    'description' => 'Learn more about us on the About Us page.',
                    'image' => 'path/to/about-image.jpg',
                    'url' => 'http://example.com/about'
                ],
            'css' => ['public/css/global.css', 'public/css/pages/about.css'],
            'js' => ['public/js/global.js', 'public/js/pages/about.js']
            ]
        ];

        if (array_key_exists($page, $pageData)) {
            return array_merge($data, $pageData[$page], ['pageFile' => '../pages/' . $page . '.php']);
        } else {
            // Đảm bảo rằng file 404 được sử dụng cho trang không tồn tại
            http_response_code(404);
            return array_merge($data, [
                'title' => '404 Not Found',
                'meta_description' => 'Page not found.',
                'pageFile' => '../pages/404.php'
            ]);
        }
    }
}
?>
