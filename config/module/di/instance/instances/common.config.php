<?php
return array(
    'HcbStaticPage-Paginator-ViewModel-JsonModel-Page' => array(
        'parameters' => array(
            'extractor' => 'HcbStaticPage\Stdlib\Extractor\Extractor'
        )
    ),

    'HcbStaticPage-Paginator-ViewModel-JsonModel-Locale' => array(
        'parameters' => array(
            'extractor' => 'HcbStaticPage\Stdlib\Extractor\Locale\Extractor'
        )
    ),

    'HcbStaticPage\Data\Locale' => array(
        'parameters' => array(
            'resourceInputContentLoader' =>
                'HcbStaticPage-Uploader-Input-Image-LoadResource-FromText-Content'
        )
    ),

    'HcbStaticPage-Service-FetchService-Page' => array(
        'parameters' => array(
            'entityName' => 'HcbStaticPage\Entity\StaticPage'
        )
    ),

    'HcbStaticPage-Service-FetchService-Locale' => array(
        'parameters' => array(
            'entityName' => 'HcbStaticPage\Entity\StaticPage\Locale'
        )
    ),

    'HcbStaticPage-Service-Collection-IdsService-Page' => array(
        'parameters' => array(
            'entityName' => 'HcbStaticPage\Entity\StaticPage'
        )
    ),

    'HcbStaticPage-Data-Collection-Entities-ByIds-Page' => array(
        'parameters' => array(
            'idsCollection' => 'HcbStaticPage-Service-Collection-IdsService-Page',
            'inputName' => 'static_pages'
        )
    ),

    'HcbStaticPage\Service\Collection\DeleteService' => array(
        'parameters' => array(
            'deleteData' => 'HcbStaticPage-Data-Collection-Entities-ByIds-Page'
        )
    ),

    // Uploader

    'HcbStaticPage-Uploader-Input-Image-LoadResource-FromText-Content' => array(
        'parameters' => array( 'name' => 'content' )
    ),

    'HcbStaticPage-Uploader-Input-Image-CreateResource-Locale' => array(
        'parameters' => array(
            'name' => 'upload'
        )
    ),

    'HcbStaticPage-Uploader-InputFilter-Image-CreateResource-Locale' => array(
        'parameters' => array(
            'resourceInput' => 'HcbStaticPage-Uploader-Input-Image-CreateResource-Locale'
        )
    )
);
