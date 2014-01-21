<?php
namespace HcbStaticPage\Service\Locale;

use HcBackend\Entity\EntityInterface;
use HcBackend\Service\ResourceCommandInterface;
use HcbStaticPage\Data\LocaleInterface;
use HcbStaticPage\Entity\StaticPage;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class CreateCommand implements ResourceCommandInterface
{
    /**
     * @var LocaleInterface
     */
    protected $localeData;

    /**
     * @var CreateService
     */
    protected $service;

    public function __construct(LocaleInterface $localeData,
                                CreateService $service)
    {
        $this->localeData = $localeData;
        $this->service = $service;
    }

    /**
     * @param \HcBackend\Entity\EntityInterface|\HcbStaticPage\Entity\StaticPage $staticPageEntity
     *
     * @return Response
     */
    public function execute(EntityInterface $staticPageEntity)
    {
        return $this->service->save($staticPageEntity, $this->localeData);
    }
}
