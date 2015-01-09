<?php
namespace HcbStaticPage\Stdlib\Extractor;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;

use HcbStaticPage\Entity\StaticPage as StaticPageEntity;
use HcbStaticPage\Entity\StaticPage\Locale as LocaleEntity;

class Extractor implements ExtractorInterface
{
    /**
     * Extract values from an object
     *
     * @param  StaticPageEntity $staticPage
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($staticPage)
    {
        if (!$staticPage instanceof StaticPageEntity) {
            throw new InvalidArgumentException("Expected HcbStaticPage\\Entity\\StaticPage object, invalid object given");
        }

        $createdTimestamp = $staticPage->getCreatedTimestamp();

        if ($createdTimestamp) {
            $createdTimestamp = $createdTimestamp->format('Y-m-d H:i:s');
        }

        $filtrated = $staticPage->getLocales();

        $url = '__EMPTY__';

        /* @var $localeEntity LocaleEntity */
        if ($filtrated->count() > 0) {
            $localeEntity = $filtrated->current();
            $page = $localeEntity->getPage();
            if (!is_null($page)) {
                $url = $page->getUrl();
            }
        }

        return array('id'=>$staticPage->getId(),
                     'url'=>$url,
                     'createdTimestamp'=>$createdTimestamp);
    }
}
