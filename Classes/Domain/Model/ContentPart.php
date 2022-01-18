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
 * ContentPart
 */
class ContentPart extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string|null
     */
    protected $description = null;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * focusX
     *
     * @var int
     */
    protected $focusX = 0;

    /**
     * focusY
     *
     * @var int
     */
    protected $focusY = 0;

    /**
     * checksum
     *
     * @var string
     */
    protected $checksum = '';

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
     * @return string|null $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string|null $description
     * @return void
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the focusX
     *
     * @return int $focusX
     */
    public function getFocusX()
    {
        return $this->focusX;
    }

    /**
     * Sets the focusX
     *
     * @param int $focusX
     * @return void
     */
    public function setFocusX(int $focusX)
    {
        $this->focusX = $focusX;
    }

    /**
     * Returns the focusY
     *
     * @return int $focusY
     */
    public function getFocusY()
    {
        return $this->focusY;
    }

    /**
     * Sets the focusY
     *
     * @param int $focusY
     * @return void
     */
    public function setFocusY(int $focusY)
    {
        $this->focusY = $focusY;
    }

    /**
     * Returns the checksum
     *
     * @return string $checksum
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * Sets the checksum
     *
     * @param string $checksum
     * @return void
     */
    public function setChecksum(string $checksum)
    {
        $this->checksum = $checksum;
    }
}
