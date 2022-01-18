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
 * YawaveEvent
 */
class YawaveEvent extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
	 * @var string
	 */
	protected $description = '';
	
	/**
	 * image
	 *
	 * @var \Interspark\YawavePublications\Domain\Model\ContentPart
	 */
	protected $image = null;
	
	/**
	 * video_url
	 *
	 * @var string
	 */
	protected $videoUrl = '';
	
	/**
	 * embed_post
	 *
	 * @var string
	 */
	protected $embedPost = '';
	
	/**
	 * use_video
	 *
	 * @var string
	 */
	protected $useVideo = '';
	
	/**
	 * overlay_color
	 *
	 * @var string
	 */
	protected $overlayColor = '';
	
	/**
	 * opacity
	 *
	 * @var string
	 */
	protected $opacity = '';
	
	/**
	 * location_type
	 *
	 * @var string
	 */
	protected $locationType = '';
	
	/**
	 * show_conversions
	 *
	 * @var string
	 */
	protected $showConversions = '';
	
	/**
	 * conversion_label
	 *
	 * @var string
	 */
	protected $conversionLabel = '';
	
	/**
	 * event_start_displayed
	 *
	 * @var string
	 */
	protected $eventStartDisplayed = '';
	
	/**
	 * event_start
	 *
	 * @var string
	 */
	protected $eventStart = '';
	
	/**
	 * event_end_displayed
	 *
	 * @var string
	 */
	protected $eventEndDisplayed = '';
	
	/**
	 * event_end
	 *
	 * @var string
	 */
	protected $eventEnd = '';
	
	/**
	 * initial_header_type
	 *
	 * @var string
	 */
	protected $initialHeaderType = '';
	
	/**
	 * content_alignment
	 *
	 * @var string
	 */
	protected $contentAlignment = '';
	
	/**
	 * appearance
	 *
	 * @var string
	 */
	protected $appearance = '';
	
	/**
	 * publication_id
	 *
	 * @var string
	 */
	protected $publicationId = '';
	
	/**
	 * publication
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication>
	 */
	protected $publication = null;
	
	/**
	 * location_street
	 *
	 * @var string
	 */
	protected $locationStreet = '';
	
	/**
	 * location_number
	 *
	 * @var string
	 */
	protected $locationNumber = '';
	
	/**
	 * location_zip_code
	 *
	 * @var string
	 */
	protected $locationZipCode = '';

	/**
	 * location_city
	 *
	 * @var string
	 */
	protected $locationCity = '';
	
	/**
	 * location_country
	 *
	 * @var string
	 */
	protected $locationCountry = '';
	
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
	 * Returns the image
	 *
	 * @return \Interspark\YawavePublications\Domain\Model\ContentPart $image
	 */
	public function getImage()
	{
		return $this->image;
	}
	
	/**
	 * Sets the image
	 *
	 * @param \Interspark\YawavePublications\Domain\Model\ContentPart $image
	 * @return void
	 */
	public function setImage(\Interspark\YawavePublications\Domain\Model\ContentPart $image)
	{
		$this->image = $image;
	}
	
	/**
	 * Returns the video_url
	 *
	 * @return string $videoUrl
	 */
	public function getVideoUrl()
	{
		return $this->videoUrl;
	}
	
	/**
	 * Sets the video_url
	 *
	 * @param string $videoUrl
	 * @return void
	 */
	public function setVideoUrl(string $videoUrl)
	{
		$this->videoUrl = $videoUrl;
	}
	
	/**
	 * Returns the embed_post
	 *
	 * @return string $embedPost
	 */
	public function getEmbedPost()
	{
		return $this->embedPost;
	}
	
	/**
	 * Sets the embed_post
	 *
	 * @param string $embedPost
	 * @return void
	 */
	public function setEmbedPost(string $embedPost)
	{
		$this->embedPost = $embedPost;
	}
	
	/**
	 * Returns the use_video
	 *
	 * @return string $useVideo
	 */
	public function getUseVideo()
	{
		return $this->useVideo;
	}
	
	/**
	 * Sets the use_video
	 *
	 * @param string $useVideo
	 * @return void
	 */
	public function setUseVideo(string $useVideo)
	{
		$this->useVideo = $useVideo;
	}
	
	/**
	 * Returns the overlay_color
	 *
	 * @return string $overlayColor
	 */
	public function getOverlayColor()
	{
		return $this->overlayColor;
	}
	
	/**
	 * Sets the overlay_color
	 *
	 * @param string overlayColor
	 * @return void
	 */
	public function setOverlayColor(string $overlayColor)
	{
		$this->overlayColor = $overlayColor;
	}
	
	/**
	 * Returns the opacity
	 *
	 * @return string $opacity
	 */
	public function getOpacity()
	{
		return $this->opacity;
	}
	
	/**
	 * Sets the opacity
	 *
	 * @param string $opacity
	 * @return void
	 */
	public function setOpacity(string $opacity)
	{
		$this->opacity = $opacity;
	}
	
	/**
	 * Returns the location_type
	 *
	 * @return string $locationType
	 */
	public function getLocationType()
	{
		return $this->locationType;
	}
	
	/**
	 * Sets the location_type
	 *
	 * @param string $locationType
	 * @return void
	 */
	public function setLocationType(string $locationType)
	{
		$this->locationType = $locationType;
	}
	
	/**
	 * Returns the show_conversions
	 *
	 * @return string $showConversions
	 */
	public function getShowConversions()
	{
		return $this->showConversions;
	}
	
	/**
	 * Sets the show_conversions
	 *
	 * @param string $showConversions
	 * @return void
	 */
	public function setShowConversions(string $showConversions)
	{
		$this->showConversions = $showConversions;
	}
	
	/**
	 * Returns the conversion_label
	 *
	 * @return string $conversionLabel
	 */
	public function getConversionLabel()
	{
		return $this->conversion_label;
	}
	
	/**
	 * Sets the conversion_label
	 *
	 * @param string $conversionLabel
	 * @return void
	 */
	public function setConversionLabel(string $conversionLabel)
	{
		$this->conversionLabel = $conversionLabel;
	}
	
	/**
	 * Returns the event_start_displayed
	 *
	 * @return string $eventStartDisplayed
	 */
	public function getEventStartDisplayed()
	{
		return $this->eventStartDisplayed;
	}
	
	/**
	 * Sets the event_start_displayed
	 *
	 * @param string $eventStartDisplayed
	 * @return void
	 */
	public function setEventStartDisplayed(string $eventStartDisplayed)
	{
		$this->eventStartDisplayed = $eventStartDisplayed;
	}
	
	/**
	 * Returns the event_start
	 *
	 * @return string $eventStart
	 */
	public function getEventStart()
	{
		return $this->eventStart;
	}
	
	/**
	 * Sets the event_start
	 *
	 * @param string $eventStart
	 * @return void
	 */
	public function setEventStart(string $eventStart)
	{
		$this->eventStart = $eventStart;
	}
	
	/**
	 * Returns the event_end_displayed
	 *
	 * @return string $eventEndDisplayed
	 */
	public function getEventEndDisplayed()
	{
		return $this->eventEndDisplayed;
	}
	
	/**
	 * Sets the event_end_displayed
	 *
	 * @param string $eventEndDisplayed
	 * @return void
	 */
	public function setEventEndDisplayed(string $eventEndDisplayed)
	{
		$this->eventEndDisplayed = $eventEndDisplayed;
	}
	
	/**
	 * Returns the event_end
	 *
	 * @return string $eventEnd
	 */
	public function getEventEnd()
	{
		return $this->eventEnd;
	}
	
	/**
	 * Sets the event_end
	 *
	 * @param string $eventEnd
	 * @return void
	 */
	public function setEventEnd(string $eventEnd)
	{
		$this->eventEnd = $eventEnd;
	}
	
	/**
	 * Returns the initial_header_type
	 *
	 * @return string $initialHeaderType
	 */
	public function getInitialHeaderType()
	{
		return $this->initialHeaderType;
	}
	
	/**
	 * Sets the initial_header_type
	 *
	 * @param string $initialHeaderType
	 * @return void
	 */
	public function setInitialHeaderType(string $initialHeaderType)
	{
		$this->initialHeaderType = $initialHeaderType;
	}
	
	/**
	 * Returns the content_alignment
	 *
	 * @return string $contentAlignment
	 */
	public function getContentAlignment()
	{
		return $this->contentAlignment;
	}
	
	/**
	 * Sets the content_alignment
	 *
	 * @param string $content_alignment
	 * @return void
	 */
	public function setContentAlignment(string $contentAlignment)
	{
		$this->contentAlignment = $contentAlignment;
	}
	
	/**
	 * Returns the appearance
	 *
	 * @return string $appearance
	 */
	public function getAppearance()
	{
		return $this->appearance;
	}
	
	/**
	 * Sets the appearance
	 *
	 * @param string $appearance
	 * @return void
	 */
	public function setAppearance(string $appearance)
	{
		$this->appearance = $appearance;
	}
	
	/**
	 * Returns the publication_id
	 *
	 * @return string $publicationId
	 */
	public function getPublicationId()
	{
		return $this->publicationId;
	}
	
	/**
	 * Sets the publication_id
	 *
	 * @param string $publicationId
	 * @return void
	 */
	public function setPublicationId(string $publicationId)
	{
		$this->publicationId = $publicationId;
	}
	
	/**
	 * set publication
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Publication> $publication
	 * @return void
	 */
	public function setPublication(\Interspark\YawavePublications\Domain\Model\Publication $publication) {
	  $this->publication = $publication;
	}
	
	/**
	 * Returns the publication
	 *
	 * @return string $publication
	 */
	public function getPublication()
	{
		return $this->publication;
	}
	
	/**
	 * Returns the location_street
	 *
	 * @return string $locationStreet
	 */
	public function getLocationStreet()
	{
		return $this->locationStreet;
	}
	
	/**
	 * Sets the location_street
	 *
	 * @param string $locationStreet
	 * @return void
	 */
	public function setLocationStreet(string $locationStreet)
	{
		$this->locationStreet = $locationStreet;
	}
	
	/**
	 * Returns the location_number
	 *
	 * @return string $locationNumber
	 */
	public function getLocationNumber()
	{
		return $this->locationNumber;
	}
	
	/**
	 * Sets the location_number
	 *
	 * @param string $locationNumber
	 * @return void
	 */
	public function setLocationNumber(string $locationNumber)
	{
		$this->locationNumber = $locationNumber;
	}
	
	/**
	 * Returns the location_zip_code
	 *
	 * @return string $locationZipCode
	 */
	public function getLocationZipCode()
	{
		return $this->locationZipCode;
	}
	
	/**
	 * Sets the location_zip_code
	 *
	 * @param string $locationZipCode
	 * @return void
	 */
	public function setLocationZipCode(string $locationZipCode)
	{
		$this->locationZipCode = $locationZipCode;
	}
	
	/**
	 * Returns the location_city
	 *
	 * @return string $locationCity
	 */
	public function getLocationCity()
	{
		return $this->locationCity;
	}
	
	/**
	 * Sets the location_city
	 *
	 * @param string $locationCity
	 * @return void
	 */
	public function setLocationCity(string $locationCity)
	{
		$this->locationCity = $locationCity;
	}
	
	/**
	 * Returns the location_country
	 *
	 * @return string $locationCountry
	 */
	public function getLocationCountry()
	{
		return $this->locationCountry;
	}
	
	/**
	 * Sets the location_country
	 *
	 * @param string $locationCountry
	 * @return void
	 */
	public function setLocationCountry(string $locationCountry)
	{
		$this->locationCountry = $locationCountry;
	}
	

}
