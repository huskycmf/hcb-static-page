<?php
namespace HcbStaticPage\Data;

use HcBackend\Data\ImageInterface;
use HcBackend\Data\PageInterface;

interface LocaleInterface extends PageInterface, ImageInterface
{
    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getLang();
}
