<?php
declare(strict_types=1);

namespace Interspark\YawavePublications\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Hannes Pries <hannes.pries@interspark.com>
 */
class PublicationTest extends UnitTestCase
{
    /**
     * @var \Interspark\YawavePublications\Domain\Model\Publication|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Interspark\YawavePublications\Domain\Model\Publication::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getExtIdReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getExtId()
        );
    }

    /**
     * @test
     */
    public function setExtIdForStringSetsExtId(): void
    {
        $this->subject->setExtId('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('extId'));
    }

    /**
     * @test
     */
    public function getSlugReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSlug()
        );
    }

    /**
     * @test
     */
    public function setSlugForStringSetsSlug(): void
    {
        $this->subject->setSlug('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('slug'));
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForStringSetsType(): void
    {
        $this->subject->setType('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('type'));
    }

    /**
     * @test
     */
    public function getStylesReturnsInitialValueForString|null(): void
    {
    }

    /**
     * @test
     */
    public function setStylesForString|nullSetsStyles(): void
    {
    }

    /**
     * @test
     */
    public function getHeaderContentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getHeaderContent()
        );
    }

    /**
     * @test
     */
    public function setHeaderContentForStringSetsHeaderContent(): void
    {
        $this->subject->setHeaderContent('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('headerContent'));
    }

    /**
     * @test
     */
    public function getBadgeReturnsInitialValueForString|null(): void
    {
    }

    /**
     * @test
     */
    public function setBadgeForString|nullSetsBadge(): void
    {
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getContentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );
    }

    /**
     * @test
     */
    public function setContentForStringSetsContent(): void
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('content'));
    }

    /**
     * @test
     */
    public function getContentCheckSumReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContentCheckSum()
        );
    }

    /**
     * @test
     */
    public function setContentCheckSumForStringSetsContentCheckSum(): void
    {
        $this->subject->setContentCheckSum('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('contentCheckSum'));
    }

    /**
     * @test
     */
    public function getFeatureImageCheckSumReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFeatureImageCheckSum()
        );
    }

    /**
     * @test
     */
    public function setFeatureImageCheckSumForStringSetsFeatureImageCheckSum(): void
    {
        $this->subject->setFeatureImageCheckSum('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('featureImageCheckSum'));
    }

    /**
     * @test
     */
    public function getKpiMetricsReturnsInitialValueForString|null(): void
    {
    }

    /**
     * @test
     */
    public function setKpiMetricsForString|nullSetsKpiMetrics(): void
    {
    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForCategory(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function setCategoriesForObjectStorageContainingCategorySetsCategories(): void
    {
        $category = new \Interspark\YawavePublications\Domain\Model\Category();
        $objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);
        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertEquals($objectStorageHoldingExactlyOneCategories, $this->subject->_get('categories'));
    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories(): void
    {
        $category = new \Interspark\YawavePublications\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories(): void
    {
        $category = new \Interspark\YawavePublications\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);
    }

    /**
     * @test
     */
    public function getCoverReturnsInitialValueForContentPart(): void
    {
        self::assertEquals(
            null,
            $this->subject->getCover()
        );
    }

    /**
     * @test
     */
    public function setCoverForContentPartSetsCover(): void
    {
        $coverFixture = new \Interspark\YawavePublications\Domain\Model\ContentPart();
        $this->subject->setCover($coverFixture);

        self::assertEquals($coverFixture, $this->subject->_get('cover'));
    }

    /**
     * @test
     */
    public function getHeaderReturnsInitialValueForContentPart(): void
    {
        self::assertEquals(
            null,
            $this->subject->getHeader()
        );
    }

    /**
     * @test
     */
    public function setHeaderForContentPartSetsHeader(): void
    {
        $headerFixture = new \Interspark\YawavePublications\Domain\Model\ContentPart();
        $this->subject->setHeader($headerFixture);

        self::assertEquals($headerFixture, $this->subject->_get('header'));
    }

    /**
     * @test
     */
    public function getTagsReturnsInitialValueForTag(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTags()
        );
    }

    /**
     * @test
     */
    public function setTagsForObjectStorageContainingTagSetsTags(): void
    {
        $tag = new \Interspark\YawavePublications\Domain\Model\Tag();
        $objectStorageHoldingExactlyOneTags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTags->attach($tag);
        $this->subject->setTags($objectStorageHoldingExactlyOneTags);

        self::assertEquals($objectStorageHoldingExactlyOneTags, $this->subject->_get('tags'));
    }

    /**
     * @test
     */
    public function addTagToObjectStorageHoldingTags(): void
    {
        $tag = new \Interspark\YawavePublications\Domain\Model\Tag();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tag));
        $this->subject->_set('tags', $tagsObjectStorageMock);

        $this->subject->addTag($tag);
    }

    /**
     * @test
     */
    public function removeTagFromObjectStorageHoldingTags(): void
    {
        $tag = new \Interspark\YawavePublications\Domain\Model\Tag();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tag));
        $this->subject->_set('tags', $tagsObjectStorageMock);

        $this->subject->removeTag($tag);
    }

    /**
     * @test
     */
    public function getPortalsReturnsInitialValueForPortal(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPortals()
        );
    }

    /**
     * @test
     */
    public function setPortalsForObjectStorageContainingPortalSetsPortals(): void
    {
        $portal = new \Interspark\YawavePublications\Domain\Model\Portal();
        $objectStorageHoldingExactlyOnePortals = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePortals->attach($portal);
        $this->subject->setPortals($objectStorageHoldingExactlyOnePortals);

        self::assertEquals($objectStorageHoldingExactlyOnePortals, $this->subject->_get('portals'));
    }

    /**
     * @test
     */
    public function addPortalToObjectStorageHoldingPortals(): void
    {
        $portal = new \Interspark\YawavePublications\Domain\Model\Portal();
        $portalsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $portalsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($portal));
        $this->subject->_set('portals', $portalsObjectStorageMock);

        $this->subject->addPortal($portal);
    }

    /**
     * @test
     */
    public function removePortalFromObjectStorageHoldingPortals(): void
    {
        $portal = new \Interspark\YawavePublications\Domain\Model\Portal();
        $portalsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $portalsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($portal));
        $this->subject->_set('portals', $portalsObjectStorageMock);

        $this->subject->removePortal($portal);
    }
}
