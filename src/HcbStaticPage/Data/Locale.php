<?php
namespace HcbStaticPage\Data;

use HcCore\Data\DataMessagesInterface;
use Zf2FileUploader\Resource\Persisted\ImageResourceInterface;
use HcCore\Stdlib\Extractor\Request\Payload\Extractor;
use Zend\Di\Di;
use Zend\Http\PhpEnvironment\Request;
use Zend\I18n\Translator\Translator;
use HcCore\InputFilter\InputFilter;
use Zf2FileUploader\Input\Image\LoadResourceInterface as LoadResourceInputInterface;

class Locale extends InputFilter implements LocaleInterface, DataMessagesInterface
{
    /**
     * @var Translator
     */
    protected $translate;

    /**
     * @var LoadResourceInputInterface
     */
    protected $resourceInputContentLoader;

    /**
     * @param Request $request
     * @param Extractor $requestExtractor
     * @param Translator $translator
     * @param \Zf2FileUploader\Input\Image\LoadResourceInterface $resourceInputContentLoader
     * @param \Zend\Di\Di $di
     * @internal param \Zf2FileUploader\Input\Image\LoadResourceInterface $resourceInputLoader
     * @return \HcbStaticPage\Data\Locale
     */
    public function __construct(Request $request,
                                Extractor $dataExtractor,
                                Translator $translator,
                                LoadResourceInputInterface $resourceInputContentLoader,
                                Di $di)
    {
        /* @var $input \HcBackend\InputFilter\Input\Locale */
        $input = $di->get('HcBackend\InputFilter\Input\Locale',
                           array('name' => 'lang'))
                    ->setRequired(true);
        $this->add($input);

        $this->add(array('type'=>'HcBackend\InputFilter\Page'), 'page');

        /* @var $input \Zend\InputFilter\Input */
        $input = $di->get('Zend\InputFilter\Input', array('name'=>'content'))
                    ->setRequired(false)
                    ->setAllowEmpty(true);
        $input->getFilterChain()->attach($di->get('Zend\Filter\StringTrim'));
        $this->add($input);

        $this->resourceInputContentLoader = $resourceInputContentLoader;
        $resourceInputContentLoader->setAllowEmpty(true);
        $this->add($resourceInputContentLoader);

        $this->translate = $translator;
        $this->setData($dataExtractor->extract($request));
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getValue('content');
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->getValue('lang');
    }

    /**
     * @return ImageResourceInterface[]
     */
    public function getResources()
    {
        return $this->resourceInputContentLoader->getResources();
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->getValue('page')['pageDescription'];
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->getValue('page')['pageKeywords'];
    }

    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->getValue('page')['pageTitle'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->getValue('page')['pageUrl'];
    }
}
