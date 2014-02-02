<?php
return array(
    //Controllers
    'HcbStaticPage-Controller-Collection-List' =>
        'HcCore\Controller\Common\Rest\Collection\ListController',
    'HcbStaticPage-Controller-Collection-Delete' =>
        'HcCore\Controller\Common\Rest\Collection\DataController',
    'HcbStaticPage-Controller-Create' => 'HcCore\Controller\Common\Rest\Collection\DataController',
    'HcbStaticPage-Controller-Locale-Update' =>
        'HcCore\Controller\Common\Rest\Collection\ResourceDataController',

    'HcbStaticPage-Controller-Locale-Create' =>
        'HcCore\Controller\Common\Rest\Collection\ResourceDataController',

    'HcbStaticPage-Controller-Locale-Collection-List' =>
        'HcCore\Controller\Common\Rest\Collection\ResourceListController',

    'HcbStaticPage-Controller-Locale-Image-Create' =>
        'Zf2FileUploader\Controller\Images\CreateController',

    //Common
    'HcbStaticPage-Paginator-ViewModel-JsonModel-Page' =>
        'Zf2Libs\Paginator\ViewModel\JsonModel',

    'HcbStaticPage-Paginator-ViewModel-JsonModel-Locale' =>
        'Zf2Libs\Paginator\ViewModel\JsonModel',

    'HcbStaticPage-Uploader-Input-Image-LoadResource-FromText-Content' =>
        'Zf2FileUploader\Input\Image\LoadResource\FromText',

    'HcbStaticPage-Service-Image-SaveService-Locale' => 'Zf2FileUploader\Service\Image\SaveService',

    'HcbStaticPage-Service-FetchService-Page' => 'HcCore\Service\FetchService',
    'HcbStaticPage-Service-FetchService-Locale' => 'HcCore\Service\FetchService',

    'HcbStaticPage-Service-Collection-IdsService-Page' => 'HcCore\Service\Collection\IdsService',
    'HcbStaticPage-Data-Collection-Entities-ByIds-Page' =>
        'HcCore\Data\Collection\Entities\ByIds',

    'HcbStaticPage-Uploader-View-Model-UploaderModel-Locale-Image' =>
        'Zf2FileUploader\View\Model\UploaderModel',

    'HcbStaticPage-Uploader-InputFilter-Image-CreateResource-Locale' =>
        'Zf2FileUploader\InputFilter\Image\CreateResource',

    'HcbStaticPage-Uploader-Input-Image-CreateResource-Locale' =>
        'Zf2FileUploader\Input\Image\CreateResource'
);
