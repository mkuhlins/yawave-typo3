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
class TagTest extends UnitTestCase
{
    /**
     * @var \Interspark\YawavePublications\Domain\Model\Tag|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Interspark\YawavePublications\Domain\Model\Tag::class,
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
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
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
}
