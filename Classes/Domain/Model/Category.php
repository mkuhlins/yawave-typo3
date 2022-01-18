<?php

declare(strict_types=1);

namespace Interspark\YawavePublications\Domain\Model;


/**
 * This file is part of the "Yawave Adapter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Hannes Pries <hannes.pries@interspark.com>, Interspark GmbH
 */

/**
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * extId
     *
     * @var string
     */
    protected $extId = '';

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * slug
     *
     * @var string
     */
    protected $slug = '';

    /**
     * usedAsInterest
     *
     * @var string|null
     */
    protected $usedAsInterest = null;

    /**
     * parent
     *
     * @var \Interspark\YawavePublications\Domain\Model\Category
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $parent = null;

    /**
     * Returns the extId
     *
     * @return string $extId
     */
    public function getExtId()
    {
        return $this->extId;
    }

    /**
     * Sets the extId
     *
     * @param string $extId
     * @return void
     */
    public function setExtId(string $extId)
    {
        $this->extId = $extId;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     *
     * @param string $slug
     * @return void
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * Returns the usedAsInterest
     *
     * @return string|null $usedAsInterest
     */
    public function getUsedAsInterest()
    {
        return $this->usedAsInterest;
    }

    /**
     * Sets the usedAsInterest
     *
     * @param string|null $usedAsInterest
     * @return void
     */
    public function setUsedAsInterest(?string $usedAsInterest)
    {
        $this->usedAsInterest = $usedAsInterest;
    }

    /**
     * Returns the parent
     *
     * @return \Interspark\YawavePublications\Domain\Model\Category $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Sets the parent
     *
     * @param \Interspark\YawavePublications\Domain\Model\Category $parent
     * @return void
     */
    public function setParent(\Interspark\YawavePublications\Domain\Model\Category $parent)
    {
        $this->parent = $parent;
    }
}
