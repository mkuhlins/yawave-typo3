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
 * Publication
 */
class Publication extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * extId
     *
     * @var string
     */
    protected $extId = '';

    /**
     * slug
     *
     * @var string
     */
    protected $slug = '';

    /**
     * type
     *
     * @var string
     */
    protected $type = '';

    /**
     * styles
     *
     * @var string|null
     */
    protected $styles = null;

    /**
     * headerContent
     *
     * @var string
     */
    protected $headerContent = '';

    /**
     * badge
     *
     * @var string|null
     */
    protected $badge = null;

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * content
     *
     * @var string
     */
    protected $content = '';

    /**
     * contentCheckSum
     *
     * @var string
     */
    protected $contentCheckSum = '';

    /**
     * featureImageCheckSum
     *
     * @var string
     */
    protected $featureImageCheckSum = '';

    /**
     * kpiMetrics
     *
     * @var string|null
     */
    protected $kpiMetrics = null;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Category>
     */
    protected $categories = null;

    /**
     * cover
     *
     * @var \Interspark\YawavePublications\Domain\Model\ContentPart
     */
    protected $cover = null;

    /**
     * header
     *
     * @var \Interspark\YawavePublications\Domain\Model\ContentPart
     */
    protected $header = null;

    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * portals
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Portal>
     */
    protected $portals = null;

    /**
     * begin_date
     *
     * @var string|null
     */
    protected $beginDate = null;

    /**
     * actiontools
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\ActionTools>
     */
    protected $actiontools = null;

    /**
     * headervideourl
     *
     * @var string|null
     */
    protected $headervideourl = null;
    
    /**
     * linkurltitle
     *
     * @var string|null
     */
    protected $linkurltitle = null;
    
    /**
     * coverlanding
     *
     * @var string|null
     */
    protected $coverlanding = null;
    
    /**
     * yawaveEvent
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\YawaveEvent>
     */
    protected $yawaveEvent = null;
    
    /**
     * contentUrl
     *
     * @var string|null
     */
    protected $contentUrl = null;
    
    /**
     * sysLanguageUid
     *
     * @var string|null
     */
    protected $sysLanguageUid = null;
    
    /**
     * l10nParent
     *
     * @var string|null
     */
    protected $l10nParent = null;
    
    /**
     * l10nSource
     *
     * @var string|null
     */
    protected $l10nSource = null;
    
    /**
     * linkurlFile
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $linkurlFile = null;
    
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
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->portals = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->actiontools = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->yawaveEvent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the styles
     *
     * @return string|null $styles
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Sets the styles
     *
     * @param string|null $styles
     * @return void
     */
    public function setStyles(?string $styles)
    {
        $this->styles = $styles;
    }

    /**
     * Returns the headerContent
     *
     * @return string $headerContent
     */
    public function getHeaderContent()
    {
        return $this->headerContent;
    }

    /**
     * Sets the headerContent
     *
     * @param string $headerContent
     * @return void
     */
    public function setHeaderContent(string $headerContent)
    {
        $this->headerContent = $headerContent;
    }

    /**
     * Returns the badge
     *
     * @return string|null $badge
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Sets the badge
     *
     * @param string|null $badge
     * @return void
     */
    public function setBadge(?string $badge)
    {
        $this->badge = $badge;
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
     * Returns the content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Returns the contentCheckSum
     *
     * @return string $contentCheckSum
     */
    public function getContentCheckSum()
    {
        return $this->contentCheckSum;
    }

    /**
     * Sets the contentCheckSum
     *
     * @param string $contentCheckSum
     * @return void
     */
    public function setContentCheckSum(string $contentCheckSum)
    {
        $this->contentCheckSum = $contentCheckSum;
    }

    /**
     * Returns the featureImageCheckSum
     *
     * @return string $featureImageCheckSum
     */
    public function getFeatureImageCheckSum()
    {
        return $this->featureImageCheckSum;
    }

    /**
     * Sets the featureImageCheckSum
     *
     * @param string $featureImageCheckSum
     * @return void
     */
    public function setFeatureImageCheckSum(string $featureImageCheckSum)
    {
        $this->featureImageCheckSum = $featureImageCheckSum;
    }

    /**
     * Returns the kpiMetrics
     *
     * @return string|null $kpiMetrics
     */
    public function getKpiMetrics()
    {
        return $this->kpiMetrics;
    }

    /**
     * Sets the kpiMetrics
     *
     * @param string|null $kpiMetrics
     * @return void
     */
    public function setKpiMetrics(?string $kpiMetrics)
    {
        $this->kpiMetrics = $kpiMetrics;
    }

    /**
     * Adds a Category
     *
     * @param \Interspark\YawavePublications\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\Interspark\YawavePublications\Domain\Model\Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param \Interspark\YawavePublications\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\Interspark\YawavePublications\Domain\Model\Category $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Category> $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
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
     * Returns the header
     *
     * @return \Interspark\YawavePublications\Domain\Model\ContentPart $header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Sets the header
     *
     * @param \Interspark\YawavePublications\Domain\Model\ContentPart $header
     * @return void
     */
    public function setHeader(\Interspark\YawavePublications\Domain\Model\ContentPart $header)
    {
        $this->header = $header;
    }

    /**
     * Adds a Tag
     *
     * @param \Interspark\YawavePublications\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\Interspark\YawavePublications\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * Removes a Tag
     *
     * @param \Interspark\YawavePublications\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\Interspark\YawavePublications\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Tag> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Adds a Portal
     *
     * @param \Interspark\YawavePublications\Domain\Model\Portal $portal
     * @return void
     */
    public function addPortal(\Interspark\YawavePublications\Domain\Model\Portal $portal)
    {
        $this->portals->attach($portal);
    }

    /**
     * Removes a Portal
     *
     * @param \Interspark\YawavePublications\Domain\Model\Portal $portalToRemove The Portal to be removed
     * @return void
     */
    public function removePortal(\Interspark\YawavePublications\Domain\Model\Portal $portalToRemove)
    {
        $this->portals->detach($portalToRemove);
    }

    /**
     * Returns the portals
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Portal> $portals
     */
    public function getPortals()
    {
        return $this->portals;
    }

    /**
     * Sets the portals
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\Portal> $portals
     * @return void
     */
    public function setPortals(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $portals)
    {
        $this->portals = $portals;
    }
    

    /**
     * Returns the beginDate
     *
     * @return string|null $beginDate
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Sets the beginDate
     *
     * @param string|null $beginDate
     * @return void
     */
    public function setBeginDate(?string $beginDate)
    {
        $this->beginDate = $beginDate;
    }
    
    
    /**
     * Adds the ActionTools
     *
     * @param \Interspark\YawavePublications\Domain\Model\ActionTools $actiontools
     * @return void
     */
    public function addActionTools(\Interspark\YawavePublications\Domain\Model\ActionTools $actiontools)
    {
        $this->actiontools->attach($actiontools);
    }

    /**
     * Removes a ActionTools
     *
     * @param \Interspark\YawavePublications\Domain\Model\ActionTools $actionToolToRemove The Actiontool to be removed
     * @return void
     */
    public function removeActionTools(\Interspark\YawavePublications\Domain\Model\ActionTools $actionToolToRemove)
    {
        $this->actiontools->detach($actionToolToRemove);
    }

    /**
     * Returns the ActionTools
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\ActionTools> $actiontools
     */
    public function getActionTools()
    {
        return $this->actiontools;
    }

    /**
     * Sets the portals
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\ActionTools> $actiontools
     * @return void
     */
    public function setActionTools(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $actiontools)
    {
        $this->actiontools = $actiontools;
    }
    

    /**
     * Returns the headervideourl
     *
     * @return string|null $headervideourl
     */
    public function getHeaderVideoUrl()
    {
        return $this->headervideourl;
    }

    /**
     * Sets the headervideourl
     *
     * @param string|null $headervideourl
     * @return void
     */
    public function setHeaderVideoUrl(?string $headervideourl)
    {
        $this->headervideourl = $headervideourl;
    }
        
    
    /**
     * Returns the linkurl
     *
     * @return string|null $linkurl
     */
    public function getLinkurl()
    {
        return $this->linkurl;
    }

    /**
     * Sets the linkurl
     *
     * @param string|null $linkurl
     * @return void
     */
    public function setLinkurl(?string $linkurl)
    {
        $this->linkurl = $linkurl;
    }
            
        
    /**
     * Returns the coverlanding
     *
     * @return string|null $coverlanding
     */
    public function getCoverlanding()
    {
        return $this->coverlanding;
    }

    /**
     * Sets the coverlanding
     *
     * @param string|null $coverlanding
     * @return void
     */
    public function setCoverlanding(?string $coverlanding)
    {
        $this->coverlanding = $coverlanding;
    }
    
    /**
     * Adds a YawaveEvent
     *
     * @param \Interspark\YawavePublications\Domain\Model\YawaveEvent $yawaveEvent
     * @return void
     */
    public function addYawaveEvent(\Interspark\YawavePublications\Domain\Model\YawaveEvent $yawaveEvent)
    {
        $this->yawaveEvent->attach($yawaveEvent);
    }
    
    /**
     * Removes a YawaveEvent
     *
     * @param \Interspark\YawavePublications\Domain\Model\YawaveEvent $yawaveEvent The Category to be removed
     * @return void
     */
    public function removeYawaveEvent(\Interspark\YawavePublications\Domain\Model\YawaveEvent $yawaveEvent)
    {
        $this->yawaveEvent->detach($yawaveEvent);
    }
    
    /**
     * Returns the YawaveEvent
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\YawaveEvent> $yawaveEvent
     */
    public function getYawaveEvent()
    {
        return $this->yawaveEvent;
    }
    
    /**
     * Sets the YawaveEvent
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Interspark\YawavePublications\Domain\Model\YawaveEvent> $yawaveEvent
     * @return void
     */
    public function setYawaveEvent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $yawaveEvent)
    {
        $this->yawaveEvent = $yawaveEvent;
    }
    
    /**
     * Returns the contentUrl
     *
     * @return string|null $contentUrl
     */
    public function getContentUrl()
    {
        return $this->contentUrl;
    }
    
    /**
     * Sets the contentUrl
     *
     * @param string|null $contentUrl
     * @return void
     */
    public function setContentUrl(?string $contentUrl)
    {
        $this->contentUrl = $contentUrl;
    }
    
    /**
     * Set sys language
     *
     * @param int $sysLanguageUid
     * @return void
    */
    public function setSysLanguageUid($sysLanguageUid) 
    {
        $this->_languageUid = $sysLanguageUid;
    }
    
    /**
     * Set l10n parent
     *
     * @param int $l10nParent
     * @return void
    */
    public function setL10nParent($l10nParent) 
    {
        $this->l10nParent = $l10nParent;
    }
    
    /**
     * Set l10n source
     *
     * @param int $l10nSource
     * @return void
    */
    public function setL10nSource($l10nSource) 
    {
        $this->l10nSource = $l10nSource;
    }
    
    /**
     * Returns the linkurlFile
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $linkurlFile
     */
    public function getLinkurlFile()
    {
        return $this->linkurlFile;
    }
    
    /**
     * Sets the linkurlFile
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $linkurlFile
     * @return void
     */
    public function setLinkurlFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $linkurlFile)
    {
        $this->linkurlFile = $linkurlFile;
    }
    
}
