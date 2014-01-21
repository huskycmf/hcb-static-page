<?php
return array(
    //Controllers
    'HcbStaticPage-Controller-Collection-List' => 'HcBackend\Controller\Common\Collection\ListController',
    'HcbStaticPage-Controller-Delete' => 'HcBackend\Controller\Common\Collection\DataController',
    'HcbStaticPage-Controller-Create' => 'HcBackend\Controller\Common\Collection\DataController',
    'HcbStaticPage-Controller-Locale-Update' =>
        'HcBackend\Controller\Common\Collection\ResourceDataController',

    'HcbStaticPage-Controller-Locale-Create' =>
        'HcBackend\Controller\Common\Collection\ResourceDataController',

    'HcbStaticPage-Controller-Locale-Collection-List' =>
        'HcBackend\Controller\Common\Collection\ResourceListController',

    'HcbStaticPage-Controller-Locale-Image-Create' =>
        'Zf2FileUploader\Controller\Images\BaseCreateController',

    //Common
    'HcbStaticPage-Paginator-ViewModel-JsonModel-Page' =>
        'Zf2Libs\Paginator\ViewModel\JsonModel',

    'HcbStaticPage-Paginator-ViewModel-JsonModel-Locale' =>
        'Zf2Libs\Paginator\ViewModel\JsonModel',

    'HcbStaticPage-Uploader-Input-Image-LoadResource-FromText-Content' =>
        'Zf2FileUploader\Input\Image\LoadResource\FromText',

    'HcbStaticPage-Service-Image-SaveService-Locale' => 'Zf2FileUploader\Service\Image\SaveService',

    'HcbStaticPage-Service-FetchService-Page' => 'HcBackend\Service\FetchService',
    'HcbStaticPage-Service-FetchService-Locale' => 'HcBackend\Service\FetchService',

    'HcbStaticPage-Service-Collection-IdsService-Page' => 'HcBackend\Service\Collection\IdsService',
    'HcbStaticPage-Data-Collection-Entities-ByIds-Page' => 'HcBackend\Data\Collection\Entities\ByIds',

    'HcbStaticPage-Uploader-View-Model-UploaderModel-Locale-Image' =>
        'Zf2FileUploader\View\Model\UploaderModel',

    'HcbStaticPage-Uploader-InputFilter-Image-CreateResource-Locale' =>
        'Zf2FileUploader\InputFilter\Image\CreateResource',

    'HcbStaticPage-Uploader-Input-Image-CreateResource-Locale' =>
        'Zf2FileUploader\Input\Image\CreateResource'
);
