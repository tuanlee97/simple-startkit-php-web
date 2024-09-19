<?php

class Route
{
    private $requestUri;
    private $rootPath;

    public function __construct($requestUri, $rootPath)
    {
        $this->requestUri = $requestUri;
        $this->rootPath = $rootPath;
    }

    public function getCurrentPage()
    {
        $uri = ltrim(substr($this->requestUri, strlen($this->rootPath)), '/');
        return $uri ?: 'home';
    }

    public function getPageFile()
    {
        $page = $this->getCurrentPage();
        $pageFile = '../pages/' . $page . '.php';
        return file_exists($pageFile) ? $pageFile : '../pages/404.php';
    }
}
?>
