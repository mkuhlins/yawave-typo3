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
class LiveBlogEntrys extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * extId
	 *
	 * @var string
	 */
	protected $extId = '';

	/**
	 * source
	 *
	 * @var string
	 */
	protected $source = '';

	/**
	 * period
	 *
	 * @var string
	 */
	protected $period = '';

	/**
	 * time_minute
	 *
	 * @var string
	 */
	protected $timeMinute = '';

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * post_content
	 *
	 * @var string
	 */
	protected $postContent = '';

	/**
	 * url
	 *
	 * @var string
	 */
	protected $url = '';

	/**
	 * publication_id
	 *
	 * @var string
	 */
	protected $publicationId = '';

	/**
	 * pinned
	 *
	 * @var string
	 */
	protected $pinned = '';

	/**
	 * createdate
	 *
	 * @var string
	 */
	protected $createdate = '';

	/**
	 * embed_code
	 *
	 * @var string
	 */
	protected $embedCode = '';

	/**
	 * timeline_timestamp
	 *
	 * @var string
	 */
	protected $timelineTimestamp = '';

	/**
	 * action_id
	 *
	 * @var string
	 */
	protected $actionId = '';

	/**
	 * person_id
	 *
	 * @var string
	 */
	protected $personId = '';

	/**
	 * person_infos
	 *
	 * @var string
	 */
	protected $personInfos = '';

	/**
	 * action_infos
	 *
	 * @var string
	 */
	protected $actionInfos = '';
	
	/**
	 * external_id
	 *
	 * @var string
	 */
	protected $externalId = '';
	
	/**
	 * type
	 *
	 * @var string
	 */
	protected $type = '';
	
	/**
	 * stoppage_time
	 *
	 * @var string
	 */
	protected $stoppageTime = '';
	
	/**
	 * match_clock
	 *
	 * @var string
	 */
	protected $matchClock = '';
	
	/**
	 * competitor
	 *
	 * @var string
	 */
	protected $competitor = '';
	
	/**
	 * players
	 *
	 * @var string
	 */
	protected $players = '';
		
	/**
	 * home_score
	 *
	 * @var string
	 */
	protected $homeScore = '';
		
	/**
	 * away_score
	 *
	 * @var string
	 */
	protected $awayScore = '';
		
	/**
	 * injury_time
	 *
	 * @var string
	 */
	protected $injuryTime = '';
	
	/**
	 * publication
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication>
	 */
	protected $publication = null;
	
	/**
	 * @var array
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Transient
	 */
	protected $competitorArray;
		
	/**
	 * @var array
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Transient
	 */
	protected $playersArray;
	
	/**
	 * url_type
	 *
	 * @var string
	 */
	protected $urlType = null;
	
	/**
	 * url_file
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $urlFile = null;
	
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
		$this->publication = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the source
	 *
	 * @return string $source
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Sets the source
	 *
	 * @param string $source
	 * @return void
	 */
	public function setSource(string $source)
	{
		$this->source = $source;
	}

	/**
	 * Returns the period
	 *
	 * @return string $period
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * Sets the period
	 *
	 * @param string $period
	 * @return void
	 */
	public function setPeriod(string $period)
	{
		$this->period = $period;
	}

	/**
	 * Returns the timeMinute
	 *
	 * @return string $timeMinute
	 */
	public function getTimeMinute()
	{
		return $this->timeMinute;
	}

	/**
	 * Sets the timeMinute
	 *
	 * @param string $timeMinute
	 * @return void
	 */
	public function setTimeMinute(string $timeMinute)
	{
		$this->timeMinute = $timeMinute;
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
	 * Returns the postContent
	 *
	 * @return string $postContent
	 */
	public function getPostContent()
	{
		return $this->postContent;
	}

	/**
	 * Sets the postContent
	 *
	 * @param string $postContent
	 * @return void
	 */
	public function setPostContent(string $postContent)
	{
		$this->postContent = $postContent;
	}

	/**
	 * Returns the url
	 *
	 * @return string $url
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
	}

	/**
	 * Returns the publicationId
	 *
	 * @return string $publicationId
	 */
	public function getPublicationId()
	{
		return $this->publicationId;
	}

	/**
	 * Sets the publicationId
	 *
	 * @param string $publicationId
	 * @return void
	 */
	public function setPublicationId(string $publicationId)
	{
		$this->publicationId = $publicationId;
	}

	/**
	 * Returns the pinned
	 *
	 * @return string $pinned
	 */
	public function getPinned()
	{
		return $this->pinned;
	}

	/**
	 * Sets the pinned
	 *
	 * @param string $pinned
	 * @return void
	 */
	public function setPinned(string $pinned)
	{
		$this->pinned = $pinned;
	}

	/**
	 * Returns the createdate
	 *
	 * @return string $createdate
	 */
	public function getCreateDate()
	{
		return $this->createdate;
	}

	/**
	 * Sets the createdate
	 *
	 * @param string $createdate
	 * @return void
	 */
	public function setCreateDate(string $createdate)
	{
		$this->createdate = $createdate;
	}

	/**
	 * Returns the embedCode
	 *
	 * @return string $embedCode
	 */
	public function getEmbedCode()
	{
		return $this->embedCode;
	}

	/**
	 * Sets the embedCode
	 *
	 * @param string $embedCode
	 * @return void
	 */
	public function setEmbedCode(string $embedCode)
	{
		$this->embedCode = $embedCode;
	}

	/**
	 * Returns the timelineTimestamp
	 *
	 * @return string $timelineTimestamp
	 */
	public function getTimelineTimestamp()
	{
		return $this->timelineTimestamp;
	}

	/**
	 * Sets the timelineTimestamp
	 *
	 * @param string $timelineTimestamp
	 * @return void
	 */
	public function setTimelineTimestamp(string $timelineTimestamp)
	{
		$this->timelineTimestamp = $timelineTimestamp;
	}

	/**
	 * Returns the actionId
	 *
	 * @return string $actionId
	 */
	public function getActionId()
	{
		return $this->actionId;
	}

	/**
	 * Sets the actionId
	 *
	 * @param string $actionId
	 * @return void
	 */
	public function setActionId(string $actionId)
	{
		$this->actionId = $actionId;
	}

	/**
	 * Returns the personId
	 *
	 * @return string $personId
	 */
	public function getPersonId()
	{
		return $this->personId;
	}

	/**
	 * Sets the personId
	 *
	 * @param string $personId
	 * @return void
	 */
	public function setPersonId(string $personId)
	{
		$this->personId = $personId;
	}

	/**
	 * Returns the personInfos
	 *
	 * @return string $personInfos
	 */
	public function getPersonInfos()
	{
		return $this->personInfos;
	}

	/**
	 * Sets the personInfos
	 *
	 * @param string $personInfos
	 * @return void
	 */
	public function setPersonInfos(string $personInfos)
	{
		$this->personInfos = $personInfos;
	}

	/**
	 * Returns the actionInfos
	 *
	 * @return string $actionInfos
	 */
	public function getActionInfos()
	{
		return $this->actionInfos;
	}

	/**
	 * Sets the actionInfos
	 *
	 * @param string $actionInfos
	 * @return void
	 */
	public function setActionInfos(string $actionInfos)
	{
		$this->actionInfos = $actionInfos;
	}
	
	/**
	 * Returns the externalId
	 *
	 * @return string $externalId
	 */
	public function getExternalId()
	{
		return $this->externalId;
	}

	/**
	 * Sets the externalId
	 *
	 * @param string $externalId
	 * @return void
	 */
	public function setExternalId(string $externalId)
	{
		$this->externalId = $externalId;
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
	 * Returns the stoppageTime
	 *
	 * @return string $stoppageTime
	 */
	public function getStoppageTime()
	{
		return $this->stoppageTime;
	}

	/**
	 * Sets the stoppageTime
	 *
	 * @param string $stoppageTime
	 * @return void
	 */
	public function setStoppageTime(string $stoppageTime)
	{
		$this->stoppageTime = $stoppageTime;
	}
		
	/**
	 * Returns the matchClock
	 *
	 * @return string $matchClock
	 */
	public function getMatchClock()
	{
		return $this->matchClock;
	}

	/**
	 * Sets the matchClock
	 *
	 * @param string $matchClock
	 * @return void
	 */
	public function setMatchClock(string $matchClock)
	{
		$this->matchClock = $matchClock;
	}
			
	/**
	 * Returns the competitor
	 *
	 * @return array
	 */
	public function getCompetitor()
	{
		return $this->competitor;
	}

	/**
	 * Sets the competitor
	 *
	 * @param string $matchClock
	 * @return void
	 */
	public function setCompetitor(string $competitor)
	{
		$this->competitor = $competitor;
	}
				
	/**
	 * Returns the players
	 *
	 * @return array
	 */
	public function getPlayers()
	{
		return $this->players;
	}

	/**
	 * Sets the players
	 *
	 * @param string $players
	 * @return void
	 */
	public function setPlayers(string $players)
	{
		$this->players = $players;
	}
					
	/**
	 * Returns the homeScore
	 *
	 * @return string $homeScore
	 */
	public function getHomeScore()
	{
		return $this->homeScore;
	}

	/**
	 * Sets the homeScore
	 *
	 * @param string $homeScore
	 * @return void
	 */
	public function setHomeScore(string $homeScore)
	{
		$this->homeScore = $homeScore;
	}
						
	/**
	 * Returns the awayScore
	 *
	 * @return string $awayScore
	 */
	public function getAwayScore()
	{
		return $this->awayScore;
	}

	/**
	 * Sets the awayScore
	 *
	 * @param string $awayScore
	 * @return void
	 */
	public function setAwayScore(string $awayScore)
	{
		$this->awayScore = $awayScore;
	}
							
	/**
	 * Returns the injuryTime
	 *
	 * @return string $injuryTime
	 */
	public function getInjuryTime()
	{
		return $this->injuryTime;
	}

	/**
	 * Sets the injuryTime
	 *
	 * @param string $injuryTime
	 * @return void
	 */
	public function setInjuryTime(string $injuryTime)
	{
		$this->injuryTime = $injuryTime;
	}
	
	/**
	 * @return array
	 */
	public function getCompetitorArray() {
	  return json_decode($this->competitor, true);
	}
		
	/**
	 * @return array
	 */
	public function getPlayersArray() {
	  return json_decode($this->players, true);
	}
	
	
	/**
	 * Adds publication
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication> $publications
	 * @return void
	 */
	public function addPublication(\Interspark\YawavePublications\Domain\Model\Publication $publication)
	{
		$this->publication->attach($publication);
	}
	
	/**
	 * Removes a publication
	 *
	 * @param \Interspark\YawavePublications\Domain\Model\Publication $entrysToRemove The Entrys to be removed
	 * @return void
	 */
	public function removePublication(\Interspark\YawavePublications\Domain\Model\Publication $publicationToRemove)
	{
		$this->publication->detach($publicationToRemove);
	}
	
	/**
	 * Returns the publication
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication> $publication
	 */
	public function getPublication()
	{
		return $this->publication;
	}
	
	/**
	 * Sets the publication
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication> $publications
	 * @return void
	 */
	public function setPublication(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $publication)
	{
		$this->publication = $publication;
	}
	
	/**
	 * Returns the urlType
	 *
	 * @return string $urlType
	 */
	public function getUrlType()
	{
		return $this->urlType;
	}
	
	/**
	 * Sets the urlType
	 *
	 * @param string $urlType
	 * @return void
	 */
	public function setUrlType(string $urlType)
	{
		$this->urlType = $urlType;
	}
	
	/**
	 * Returns the urlFile
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $urlFile
	 */
	public function getUrlFile()
	{
		return $this->urlFile;
	}
	
	/**
	 * Sets the urlFile
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $urlFile
	 * @return void
	 */
	public function setUrlFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $urlFile)
	{
		$this->urlFile = $urlFile;
	}
	
	
}