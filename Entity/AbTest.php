<?php

namespace Stfalcon\AbTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * AbTest
 *
 * @ORM\Table(name="ab_tests")
 * @ORM\Entity
 * @UniqueEntity("pageUrl")
 */
class AbTest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pageUrl", type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $pageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20)
     * @Assert\NotBlank
     */
    private $code;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean")
     */
    private $enable = false;


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
     * Set pageUrl
     *
     * @param string $pageUrl
     * @return AbTest
     */
    public function setPageUrl($pageUrl)
    {
        $this->pageUrl = $pageUrl;

        return $this;
    }

    /**
     * Get pageUrl
     *
     * @return string 
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return AbTest
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return AbTest
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean 
     */
    public function isEnable()
    {
        return $this->enable;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->getId()?$this->getPageUrl():'New Item';
    }
}
