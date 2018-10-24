<?php

namespace Eklektos\Eklektos\PageTypes;

use PageController;

class HomePageController extends PageController
{
    public function getBlogPage()
    {
        return Blog::get_one(Blog::class);
    }

    /**
     * @param int $amount The amount of items to provide.
     */
    public function getBlogItems($amount = 2)
    {
        $blogHolder = $this->getNewsPage();
        if ($blogHolder) {
            $controller = BlogController::create($blogHolder);
            return $controller->Updates()->limit($amount);
        }
    }
}
