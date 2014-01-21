<?php
return array(
    'HcbStaticPage-Controller-Collection-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbStaticPage\Service\Collection\FetchQbBuilderService',
            'viewModel' => 'HcbStaticPage-Paginator-ViewModel-JsonModel-Page'
        )
    ),

    'HcbStaticPage-Controller-Create' => array(
        'parameters' => array(
            'serviceCommand' => 'HcbStaticPage\Service\CreateService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbStaticPage-Controller-Collection-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbStaticPage-Data-Collection-Entities-ByIds-Page',
            'serviceCommand' => 'HcbStaticPage\Service\Collection\DeleteService',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Json\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbStaticPage-Controller-Locale-Update' => array(
        'parameters' => array(
            'inputData' => 'HcbStaticPage\Data\Locale',
            'fetchService' => 'HcbStaticPage-Service-FetchService-Locale',
            'serviceCommand' => 'HcbStaticPage\Service\Locale\UpdateCommand',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Uploader\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbStaticPage-Controller-Locale-Create' => array(
        'parameters' => array(
            'inputData' => 'HcbStaticPage\Data\Locale',
            'fetchService' => 'HcbStaticPage-Service-FetchService-Page',
            'serviceCommand' => 'HcbStaticPage\Service\Locale\CreateCommand',
            'jsonResponseModelFactory' => 'Zf2Libs\View\Model\Uploader\Specific\StatusMessageDataModelFactory'
        )
    ),

    'HcbStaticPage-Controller-Locale-Collection-List' => array(
        'parameters' => array(
            'fetchService' => 'HcbStaticPage-Service-FetchService-Page',
            'paginatorDataFetchService' => 'HcbStaticPage\Service\Collection\FetchQbBuilderService',
            'viewModel' => 'HcbStaticPage-Paginator-ViewModel-JsonModel-Locale'
        )
    ),

    'HcbStaticPage-Controller-Locale-Image-Create' => array(
        'parameters' => array(
            'saveService' => 'HcBackend-Images-Default-SaveService',
            'uploaderModel' => 'HcbStaticPage-Uploader-View-Model-UploaderModel-Locale-Image',
            'createResourceData' => 'HcbStaticPage-Uploader-InputFilter-Image-CreateResource-Locale'
        )
    ),
);
