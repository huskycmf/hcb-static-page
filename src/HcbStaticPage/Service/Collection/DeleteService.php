<?php
namespace HcbStaticPage\Service\Collection;

use HcCore\Data\Collection\Entities\ByIdsInterface;
use HcCore\Service\CommandInterface;
use HcbStaticPage\Entity\StaticPage as StaticPageEntity;
use HcbStaticPage\Entity\StaticPage\Locale as StaticPageLocaleEntity;
use Doctrine\ORM\EntityManagerInterface;
use Zf2FileUploader\Resource\Handler\Remover\RemoverInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class DeleteService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var ByIdsInterface
     */
    protected $deleteData;

    /**
     * @var RemoverInterface
     */
    protected $removerService;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $deleteData
     * @param RemoverInterface $removerService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $response,
                                ByIdsInterface $deleteData,
                                RemoverInterface $removerService)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->removerService = $removerService;
        $this->deleteData = $deleteData;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->delete($this->deleteData);
    }

    /**
     * @param \HcCore\Data\Collection\Entities\ByIdsInterface $postsToDelete
     * @internal param \HcCore\Data\Collection\Entities\ByIdsInterface $clientsToBlock
     * @return Response
     */
    protected  function delete(ByIdsInterface $postsToDelete)
    {
        try {
            $this->entityManager->beginTransaction();
            $staticPageEntities = $postsToDelete->getEntities();

            /* @var $staticPageEntities StaticPageEntity[] */
            foreach ($staticPageEntities as $staticPageEntity) {
                /* @var $localeStaticPageEntity StaticPageLocaleEntity */
                foreach ($staticPageEntity->getLocales() as $localeStaticPageEntity) {
                    foreach ($localeStaticPageEntity->getImage() as $imageEntity) {
                        $this->removerService->remove($imageEntity->getImage());
                    }
                }
                $this->entityManager->remove($staticPageEntity);
            }

            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->response->error($e->getMessage())->failed();
            return $this->response;
        }

        $this->response->success();
        return $this->response;
    }
}
