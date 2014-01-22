<?php
namespace HcbStaticPage\Stdlib\Extractor\Locale;

use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcbStaticPage\Entity\StaticPage\Locale as LocaleEntity;
use HcBackend\Stdlib\Extractor\Page\Extractor as PageExtractor;

class Extractor implements ExtractorInterface
{
    /**
     * @var PageExtractor
     */
    protected $pageExtractor;

    /**
     * @param PageExtractor $pageExtractor
     */
    public function __construct(PageExtractor $pageExtractor)
    {
        $this->pageExtractor = $pageExtractor;
    }

    /**
     * Extract values from an object
     *
     * @param  LocaleEntity $locale
     * @throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract($locale)
    {
        if (!$locale instanceof LocaleEntity) {
            throw new InvalidArgumentException("Expected HcbStaticPage\\Entity\\StaticPage\\Locale
                                                object, invalid object given");
        }

        $createdTimestamp = $locale->getCreatedTimestamp();
        if ($createdTimestamp) {
            $createdTimestamp = $createdTimestamp->format('Y-m-d H:i:s');
        }

        $updatedTimestamp = $locale->getUpdatedTimestamp();
        if ($updatedTimestamp) {
            $updatedTimestamp = $updatedTimestamp->format('Y-m-d H:i:s');
        }

        $localData = array('id'=>$locale->getId(),
                           'lang'=>$locale->getLang(),
                           'content'=>$locale->getContent(),
                           'createdTimestamp'=>$createdTimestamp,
                           'updatedTimestamp'=>$updatedTimestamp);

        if (!is_null($locale->getPage())) {
            return array_merge($localData, $this->pageExtractor->extract($locale->getPage()));
        } else {
            return $localData;
        }
    }
}
