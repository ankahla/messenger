<?php

namespace Controller;

class DefaultController extends AbstractController
{
    public function notFoundPage()
    {
        $this->renderTemplate('404');
    }
}