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
class YawaveConnectionTest extends UnitTestCase
{
    /**
     * @var \Interspark\YawavePublications\Domain\Model\YawaveConnection|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Interspark\YawavePublications\Domain\Model\YawaveConnection::class,
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
    public function getRefIdReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRefId()
        );
    }

    /**
     * @test
     */
    public function setRefIdForStringSetsRefId(): void
    {
        $this->subject->setRefId('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('refId'));
    }

    /**
     * @test
     */
    public function getApiKeyReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getApiKey()
        );
    }

    /**
     * @test
     */
    public function setApiKeyForStringSetsApiKey(): void
    {
        $this->subject->setApiKey('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('apiKey'));
    }

    /**
     * @test
     */
    public function getApiSecretReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getApiSecret()
        );
    }

    /**
     * @test
     */
    public function setApiSecretForStringSetsApiSecret(): void
    {
        $this->subject->setApiSecret('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('apiSecret'));
    }

    /**
     * @test
     */
    public function getApplicationIdReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getApplicationId()
        );
    }

    /**
     * @test
     */
    public function setApplicationIdForStringSetsApplicationId(): void
    {
        $this->subject->setApplicationId('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('applicationId'));
    }
}
