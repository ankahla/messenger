<?php

namespace Controller;

use Model\Utils\Url;
use Model\Services\Container;

abstract class AbstractController
{
    public function redirectTo($uri = '')
    {
        header('Location: ' . Url::getUri($uri));
        exit();
    }

    public function getRequestField($fieldName, $defaultValue = null)
    {
        return htmlspecialchars($_POST[$fieldName] ?? $defaultValue);
    }

    public function getQueryField($fieldName, $defaultValue = null)
    {
        return htmlspecialchars($_GET[$fieldName] ?? $defaultValue);
    }

    public function getContainer(): Container
    {
        return Container::getInstance();
    }

    public function renderTemplate(string $templateName, $params = []): void
    {
    	extract($params);

        include 'src/View/'.$templateName.'.php';
    }
}
