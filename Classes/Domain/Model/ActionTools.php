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
class ActionTools extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * extId
	 *
	 * @var string
	 */
	protected $extId = '';

	/**
	 * type
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * label
	 *
	 * @var string
	 */
	protected $label = '';

	/**
	 * icon_source
	 *
	 * @var string
	 */
	protected $iconSource = '';

	/**
	 * icon_name
	 *
	 * @var string
	 */
	protected $iconName = '';

	/**
	 * icon_type
	 *
	 * @var string
	 */
	protected $iconType = '';

	/**
	 * reference
	 *
	 * @var string
	 */
	protected $reference = '';

	/**
	 * htmlcode
	 *
	 * @var string
	 */
	protected $htmlcode = '';
	
	/**
	 * active_begin
	 *
	 * @var string
	 */
	protected $activeBegin = '';
	
	/**
	 * active_end
	 *
	 * @var string
	 */
	protected $activeEnd = '';

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
	 * Returns the type
	 *
	 * @return string $type
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType(string $type)
	{
		$this->type = $type;
	}

	/**
	 * Returns the label
	 *
	 * @return string $label
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Sets the label
	 *
	 * @param string $label
	 * @return void
	 */
	public function setLabel(string $label)
	{
		$this->label = $label;
	}

	/**
	 * Returns the icon_source
	 *
	 * @return string $iconSource
	 */
	public function getIconSource()
	{
		return $this->iconSource;
	}

	/**
	 * Sets the icon_source
	 *
	 * @param string $icon_source
	 * @return void
	 */
	public function setIconSource(string $icon_source)
	{
		$this->iconSource = $icon_source;
	}

	/**
	 * Returns the icon_name
	 *
	 * @return string $iconName
	 */
	public function getIconName()
	{
		return $this->iconName;
	}

	/**
	 * Sets the icon_name
	 *
	 * @param string $iconName
	 * @return void
	 */
	public function setIconName(string $iconName)
	{
		$this->iconName = $iconName;
	}

	/**
	 * Returns the icon_type
	 *
	 * @return string $iconType
	 */
	public function getIconType()
	{
		return $this->iconType;
	}

	/**
	 * Sets the icon_type
	 *
	 * @param string $iconType
	 * @return void
	 */
	public function setIconType(string $iconType)
	{
		$this->iconType = $iconType;
	}

	/**
	 * Returns the reference
	 *
	 * @return string $reference
	 */
	public function getReference()
	{
		return $this->reference;
	}

	/**
	 * Sets the reference
	 *
	 * @param string $reference
	 * @return void
	 */
	public function setReference(string $reference)
	{
		$this->reference = $reference;
	}

	/**
	 * Returns the htmlcode
	 *
	 * @return string $htmlcode
	 */
	public function getHtmlCode()
	{
		return $this->htmlcode;
	}

	/**
	 * Sets the htmlcode
	 *
	 * @param string $htmlcode
	 * @return void
	 */
	public function setHtmlCode(string $htmlcode)
	{
		$this->htmlcode = $htmlcode;
	}
	
	/**
	 * Returns the active_begin
	 *
	 * @return string $active_begin
	 */
	public function getActiveBeginn()
	{
		return $this->activeBegin;
	}
	
	/**
	 * Sets the active_begin
	 *
	 * @param string $activeBegin
	 * @return void
	 */
	public function setActiveBeginn(string $activeBegin)
	{
		$this->activeBegin = $activeBegin;
	}
	
	/**
	 * Returns the active_end
	 *
	 * @return string $activeEnd
	 */
	public function getActiveEnd()
	{
		return $this->activeEnd;
	}
	
	/**
	 * Sets the active_end
	 *
	 * @param string $activeEnd
	 * @return void
	 */
	public function setActiveEnd(string $activeEnd)
	{
		$this->activeEnd = $activeEnd;
	}

	
}
