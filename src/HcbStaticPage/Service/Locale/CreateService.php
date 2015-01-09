<?php
namespace HcbStaticPage\Service\Locale;

use HcBackend\Service\PageBinderServiceInterface;
use HcBackend\Service\ImageBinderServiceInterface;
use HcbStaticPage\Data\LocaleInterface;
use HcbStaticPage\Entity\StaticPage;
use Doctrine\ORM\EntityManagerInterface;
use HcbStaticPage\Stdlib\Service\Response\CreateResponse;

class CreateService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var CreateResponse
     */
    protected $createResponse;

    /**
     * @var UpdateService
     */
    protected $updateService;

    /**
     * @param EntityManagerInterface $entityManager
     * @param UpdateService $updateService
     * @param CreateResponse $saveResponse
     */
    public function __construct(EntityManagerInterface $entityManager,
                                UpdateService $updateService,
                                CreateResponse $saveResponse)
    {
        $this->updateService = $updateService;
        $this->entityManager = $entityManager;
        $this->createResponse = $saveResponse;
    }

    /**
     * @param StaticPage $staticPageEntity
     * @param LocaleInterface $localeData
     * @return CreateResponse
     */
    public function save(StaticPage $staticPageEntity, LocaleInterface $localeData)
    {
        try {
            $this->entityManager->beginTransaction();

            $localeEntity = new StaticPage\Locale();
            $staticPageEntity->setEnabled(1);

            $localeEntity->setStaticPage($staticPageEntity);
            $localeEntity->setLang($localeData->getLang());

            $this->updateService->update($localeEntity, $localeData);

            $this->entityManager->flush();
            $this->createResponse->setResource($localeEntity->getId());
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->createResponse->error($e->getMessage())->failed();
            return $this->createResponse;
        }

        $this->createResponse->success();
        return $this->createResponse;
    }
}
