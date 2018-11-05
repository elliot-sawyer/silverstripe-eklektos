<?php

namespace Eklektos\Eklektos\PageTypes;

use PageController,
    SilverStripe\ORM\DataObject,
    SilverStripe\Blog\Model\BlogPost;

class HomePageController extends PageController
{
    public function BlogPosts() {
        $posts = BlogPost::get();
        return $posts;
    }
}

/*
    public function Classifieds($count = 10)
    {
        $ClassifiedsItems = DataObject::get('ClassifiedsItem')
            ->filter('ClosingDate:GreaterThanOrEqual', time());
        return $ClassifiedsItems->limit($count)->sort('Created', 'DESC');
    }
*/
