<?php
namespace HcbStaticPage\Data;

use HcBackend\Data\DataMessagesInterface;
use HcBackend\Data\Page;
use Zf2FileUploader\Resource\Persisted\ImageResourceInterface;
use HcBackend\Stdlib\Extractor\Request\Payload\Extractor;
use Zend\Di\Di;
use Zend\Http\PhpEnvironment\Request;
use Zend\I18n\Translator\Translator;
use Zend\Validator\Callback;
use Zf2FileUploader\Input\Image\LoadResourceInterface as LoadResourceInputInterface;

class Locale extends Page implements LocaleInterface, DataMessagesInterface
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
                                Extractor $requestExtractor,
                                Translator $translator,
                                LoadResourceInputInterface $resourceInputContentLoader,
                                Di $di)
    {
        parent::__construct($di);

        /* @var $input \Zend\InputFilter\Input */
        $input = $di->get('Zend\InputFilter\Input', array('name'=>'lang'));
        $input->setRequired(true);
        $input->getValidatorChain()
            ->attach($di->get('Zend\Validator\StringLength', array('options'=>array('min'=>2, 'max'=>2))))
            ->attach($di->get('Zend\Validator\Regex', array('pattern'=>'/^[a-z]{2}$/')));
        $input->getFilterChain()->attach($di->get('Zend\Filter\StringToLower'))
            ->attach($di->get('Zend\Filter\StringTrim'));
        $this->add($input);

        /* @var $input \Zend\InputFilter\Input */
        $input = $di->get('Zend\InputFilter\Input', array('name'=>'content'))
            ->setRequired(false)
            ->setAllowEmpty(true);
        $input->getFilterChain()->attach($di->get('Zend\Filter\StringTrim'));
        $this->add($input);

        $this->resourceInputContentLoader = $resourceInputContentLoader;
        $resourceInputContentLoader->setAllowEmpty(true);
        $this->add($resourceInputContentLoader);

        $this->get('pageUrl')->setRequired(true);

        $this->translate = $translator;
        $this->setData($requestExtractor->extract($request));
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
     * @return array
     */
    public function getMessages()
    {
        $invalidInputs = $this->getInvalidInput();

        $messages = array();
        if (array_key_exists('lang', $invalidInputs)) {
            $messages['lang'] = $this->translate->translate('Language must be correct');
        }

        if (array_key_exists('urlPage', $invalidInputs)) {
            $messages['urlPage'] = $this->translate->translate('Url page required and must not be empty');
        }

        return $messages;
    }
}
