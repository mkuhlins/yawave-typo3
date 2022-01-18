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
class ContentPartTest extends UnitTestCase
{
    /**
     * @var \Interspark\YawavePublications\Domain\Model\ContentPart|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Interspark\YawavePublications\Domain\Model\ContentPart::class,
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
    public function getDescriptionReturnsInitialValueForString|null(): void
    {
    }

    /**
     * @test
     */
    public function setDescriptionForString|nullSetsDescription(): void
    {
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('image'));
    }

    /**
     * @test
     */
    public function getFocusXReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getFocusX()
        );
    }

    /**
     * @test
     */
    public function setFocusXForIntSetsFocusX(): void
    {
        $this->subject->setFocusX(12);

        self::assertEquals(12, $this->subject->_get('focusX'));
    }

    /**
     * @test
     */
    public function getFocusYReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getFocusY()
        );
    }

    /**
     * @test
     */
    public function setFocusYForIntSetsFocusY(): void
    {
        $this->subject->setFocusY(12);

        self::assertEquals(12, $this->subject->_get('focusY'));
    }

    /**
     * @test
     */
    public function getChecksumReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getChecksum()
        );
    }

    /**
     * @test
     */
    public function setChecksumForStringSetsChecksum(): void
    {
        $this->subject->setChecksum('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('checksum'));
    }
}
