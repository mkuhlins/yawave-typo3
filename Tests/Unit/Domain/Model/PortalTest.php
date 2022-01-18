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
class PortalTest extends UnitTestCase
{
    /**
     * @var \Interspark\YawavePublications\Domain\Model\Portal|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Interspark\YawavePublications\Domain\Model\Portal::class,
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
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getHeaderImageReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getHeaderImage()
        );
    }

    /**
     * @test
     */
    public function setHeaderImageForFileReferenceSetsHeaderImage(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setHeaderImage($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('headerImage'));
    }
}
