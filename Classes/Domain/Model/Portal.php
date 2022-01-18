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
 * Portal
 */
class Portal extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * extId
     *
     * @var string
     */
    protected $extId = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * headerImage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $headerImage = null;

    /**
     * publicationSort
     *
     * @var string
     */
    protected $publicationSort = '';

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
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the headerImage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $headerImage
     */
    public function getHeaderImage()
    {
        return $this->headerImage;
    }

    /**
     * Sets the headerImage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $headerImage
     * @return void
     */
    public function setHeaderImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $headerImage)
    {
        $this->headerImage = $headerImage;
    }

    /**
     * Sets the publicationSort
     *
     * @param string $publicationSort
     * @return void
     */
    public function setPublicationSort(string $publicationSort)
    {
        $this->publication_sort = $publicationSort;
    }

    /**
     * Returns the publicationSort
     *
     * @return string $publicationSort
     */
    public function getPublicationSort()
    {
        return $this->publication_sort;
    }
}
