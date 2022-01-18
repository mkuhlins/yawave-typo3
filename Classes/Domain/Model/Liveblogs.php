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
class Liveblogs extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * extId
	 *
	 * @var string
	 */
	protected $extId = '';

	/**
	 * createTime
	 *
	 * @var string
	 */
	protected $createTime = '';

	/**
	 * sportradarId
	 *
	 * @var string
	 */
	protected $sportradarId = '';

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
	 * cover
	 *
	 * @var \Interspark\YawavePublications\Domain\Model\ContentPart
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 */
	protected $cover = null;

	/**
	 * type
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * status
	 *
	 * @var string
	 */
	protected $status = '';

	/**
	 * location
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * startDate
	 *
	 * @var string
	 */
	protected $startDate = '';

	/**
	 * homeCompetitor
	 *
	 * @var string
	 */
	protected $homeCompetitor = '';

	/**
	 * awayCompetitor
	 *
	 * @var string
	 */
	protected $awayCompetitor = '';

	/**
	 * yawaveSources
	 *
	 * @var string
	 */
	protected $yawaveSources = '';

	/**
	 * entrys
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\LiveblogEntrys>
	  * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 */
	protected $entrys = '';
	
	/**
	 * __construct
	 */
	public function __construct()
	{

		// Do not remove the next line: It would break the functionality
		$this->initializeObject();
	}

	/**
	 * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	public function initializeObject()
	{
		$this->entrys = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
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
	 * Returns the createtime
	 *
	 * @return string $createtime
	 */
	public function getCreateTime()
	{
		return $this->createtime;
	}

	/**
	 * Sets the createtime
	 *
	 * @param string $createtime
	 * @return void
	 */
	public function setCreateTime(string $createtime)
	{
		$this->createtime = $createtime;
	}

	/**
	 * Returns the sportradarId
	 *
	 * @return string $sportradarId
	 */
	public function getSportradarId()
	{
		return $this->sportradarId;
	}

	/**
	 * Sets the sportradarId
	 *
	 * @param string $sportradarId
	 * @return void
	 */
	public function setSportradarId(string $sportradarId)
	{
		$this->sportradarId = $sportradarId;
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
	 * Returns the cover
	 *
	 * @return \Interspark\YawavePublications\Domain\Model\ContentPart $cover
	 */
	public function getCover()
	{
		return $this->cover;
	}

	/**
	 * Sets the cover
	 *
	 * @param \Interspark\YawavePublications\Domain\Model\ContentPart $cover
	 * @return void
	 */
	public function setCover(\Interspark\YawavePublications\Domain\Model\ContentPart $cover)
	{
		$this->cover = $cover;
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
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation(string $location)
	{
		$this->location = $location;
	}

	/**
	 * Returns the startDate
	 *
	 * @return string $startDate
	 */
	public function getStartDate()
	{
		return $this->startDate;
	}

	/**
	 * Sets the startDate
	 *
	 * @param string $startDate
	 * @return void
	 */
	public function setStartDate(string $startDate)
	{
		$this->startDate = $startDate;
	}

	/**
	 * Returns the homeCompetitor
	 *
	 * @return string $homeCompetitor
	 */
	public function getHomeCompetitor()
	{
		return $this->homeCompetitor;
	}

	/**
	 * Sets the homeCompetitor
	 *
	 * @param string $homeCompetitor
	 * @return void
	 */
	public function setHomeCompetitor(string $homeCompetitor)
	{
		$this->homeCompetitor = $homeCompetitor;
	}

	/**
	 * Returns the awayCompetitor
	 *
	 * @return string $awayCompetitor
	 */
	public function getAwayCompetitor()
	{
		return $this->awayCompetitor;
	}

	/**
	 * Sets the awayCompetitor
	 *
	 * @param string $awayCompetitor
	 * @return void
	 */
	public function setAwayCompetitor(string $awayCompetitor)
	{
		$this->awayCompetitor = $awayCompetitor;
	}

	/**
	 * Returns the yawaveSources
	 *
	 * @return string $yawaveSources
	 */
	public function getYawaveSources()
	{
		return $this->yawaveSources;
	}

	/**
	 * Sets the yawaveSources
	 *
	 * @param string $yawaveSources
	 * @return void
	 */
	public function setYawaveSources(string $yawaveSources)
	{
		$this->yawaveSources = $yawaveSources;
	}

	/**
	 * Adds the entrys
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\LiveblogEntrys> $entrys
	 * @return void
	 */
	public function addEntrys(\Interspark\YawavePublications\Domain\Model\LiveblogEntrys $entrys)
	{
		$this->entrys->attach($entrys);
	}

	/**
	 * Removes a entrys
	 *
	 * @param \Interspark\YawavePublications\Domain\Model\LiveblogEntrys $entrysToRemove The Entrys to be removed
	 * @return void
	 */
	public function removeEntrys(\Interspark\YawavePublications\Domain\Model\LiveblogEntrys $entrysToRemove)
	{
		$this->entrys->detach($entrysToRemove);
	}

	/**
	 * Returns the entrys
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\LiveblogEntrys> $entrys
	 */
	public function getEntrys()
	{
		return $this->entrys;
	}

	/**
	 * Sets the entrys
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\LiveblogEntrys> $entrys
	 * @return void
	 */
	public function setEntrys(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $entrys)
	{
		$this->entrys = $entrys;
	}
	

	
}
