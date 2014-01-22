<?php
namespace HcbStaticPage\Entity;

use HcBackend\Entity\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use HcbStaticPage\Entity\StaticPage\Locale;

/**
 * StaticPage
 *
 * @ORM\Table(name="static_page")
 * @ORM\Entity
 */
class StaticPage implements EntityInterface
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
     * @var integer
     *
     * @ORM\Column(name="enabled", type="integer", nullable=false)
     */
    private $enabled = 0;

    /**
     * @var Locale
     *
     * @ORM\OneToMany(targetEntity="HcbStaticPage\Entity\StaticPage\Locale", mappedBy="staticPage")
     * @ORM\OrderBy({"updatedTimestamp" = "DESC"})
     */
    private $locale = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;

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
     * Set enabled
     *
     * @param int $enabled
     * @return StaticPage
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return int
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return StaticPage
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
     * Constructor
     */
    public function __construct()
    {
        $this->locale = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add locale
     *
     * @param \HcbStaticPage\Entity\StaticPage\Locale $locale
     * @return StaticPage
     */
    public function addLocale(\HcbStaticPage\Entity\StaticPage\Locale $locale)
    {
        $this->locale[] = $locale;

        return $this;
    }

    /**
     * Remove locale
     *
     * @param \HcbStaticPage\Entity\StaticPage\Locale $locale
     */
    public function removeLocale(\HcbStaticPage\Entity\StaticPage\Locale $locale)
    {
        $this->locale->removeElement($locale);
    }

    /**
     * Get locales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocales()
    {
        return $this->locale;
    }
}
