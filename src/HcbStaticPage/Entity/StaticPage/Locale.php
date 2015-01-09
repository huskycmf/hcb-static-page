<?php
namespace HcbStaticPage\Entity\StaticPage;

use HcBackend\Entity\PageInterface;
use HcCore\Entity\EntityInterface;
use HcBackend\Entity\PageBindInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use HcbStaticPage\Entity\StaticPage;
use HcBackend\Entity\ImageBindInterface;
use Zf2FileUploader\Entity\ImageInterface;

/**
 * Locale
 *
 * @ORM\Table(name="static_page_locale")
 * @ORM\Entity
 */
class Locale implements EntityInterface, ImageBindInterface, PageBindInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=6, nullable=false)
     */
    private $lang = '';

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content = '';

    /**
     * @var StaticPage
     *
     * @ORM\ManyToOne(targetEntity="HcbStaticPage\Entity\StaticPage",
     *                inversedBy="locale",
     *                cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="static_page_id", referencedColumnName="id")
     * })
     */
    private $staticPage = null;

    /**
     * @var Page
     *
     * @ORM\OneToOne(targetEntity="HcBackend\Entity\Page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     * })
     */
    private $page = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="HcBackend\Entity\Image", cascade={"persist"})
     * @ORM\JoinTable(name="static_page_locale_image",
     *   joinColumns={
     *     @ORM\JoinColumn(name="static_page_locale_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     *   }
     * )
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_timestamp", type="datetime", nullable=false)
     */
    private $updatedTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set page
     *
     * @param \HcBackend\Entity\PageInterface $page
     * @return Locale
     */
    public function setPage(PageInterface $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \HcBackend\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add image
     *
     * @param ImageInterface $image
     * @return Locale
     */
    public function addImage(ImageInterface $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param ImageInterface $image
     */
    public function removeImage(ImageInterface $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Locale
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Locale
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updatedTimestamp
     *
     * @param \DateTime $updatedTimestamp
     * @return Locale
     */
    public function setUpdatedTimestamp($updatedTimestamp)
    {
        $this->updatedTimestamp = $updatedTimestamp;

        return $this;
    }

    /**
     * Get updatedTimestamp
     *
     * @return \DateTime 
     */
    public function getUpdatedTimestamp()
    {
        return $this->updatedTimestamp;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Locale
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime 
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Set static page
     *
     * @param \HcbStaticPage\Entity\StaticPage $staticPage
     * @return Locale
     */
    public function setStaticPage(\HcbStaticPage\Entity\StaticPage $staticPage = null)
    {
        $this->staticPage = $staticPage;

        return $this;
    }

    /**
     * Get StaticPage
     *
     * @return \HcbStaticPage\Entity\StaticPage
     */
    public function getStaticPage()
    {
        return $this->staticPage;
    }
}
