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
 * YawaveConnection
 */
class YawaveConnection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * refId
     *
     * @var string
     */
    protected $refId = '';

    /**
     * apiKey
     *
     * @var string
     */
    protected $apiKey = '';

    /**
     * apiSecret
     *
     * @var string
     */
    protected $apiSecret = '';

    /**
     * applicationId
     *
     * @var string
     */
    protected $applicationId = '';

    /**
     * apiUrl
     *
     * @var string
     */
    protected $apiUrl = '';

    /**
     * publicationDetailsPageUid
     *
     * @var int
     */
    protected $publicationDetailsPageUid = '';

    /**
     * apiSsoKey
     *
     * @var string
     */
    protected $apiSsoKey = '';

    /**
     * yawaveStoragePid
     *
     * @var int
     */
    protected $yawaveStoragePid = 0;

    /**
     * Returns the refId
     *
     * @return string $refId
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Sets the refId
     *
     * @param string $refId
     * @return void
     */
    public function setRefId(string $refId)
    {
        $this->refId = $refId;
    }

    /**
     * Returns the apiKey
     *
     * @return string $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Sets the apiKey
     *
     * @param string $apiKey
     * @return void
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Returns the apiSecret
     *
     * @return string $apiSecret
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * Sets the apiSecret
     *
     * @param string $apiSecret
     * @return void
     */
    public function setApiSecret(string $apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * Returns the applicationId
     *
     * @return string $applicationId
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * Sets the applicationId
     *
     * @param string $applicationId
     * @return void
     */
    public function setApplicationId(string $applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Returns the apiUrl
     *
     * @return string $apiUrl
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Sets the apiUrl
     *
     * @param string $apiUrl
     * @return void
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * Returns the publicationDetailsPageUid
     *
     * @return int $publicationDetailsPageUid
     */
    public function getPublicationDetailsPageUid()
    {
        return $this->publicationDetailsPageUid;
    }

    /**
     * Sets the publicationDetailsPageUid
     *
     * @param int $publicationDetailsPageUid
     * @return void
     */
    public function setPublicationDetailsPageUid(int $publicationDetailsPageUid)
    {
        $this->publicationDetailsPageUid = $publicationDetailsPageUid;
    }

    /**
     * Returns the apiSsoKey
     *
     * @return string $apiSsoKey
     */
    public function getApiSsoKey()
    {
        return $this->apiSsoKey;
    }

    /**
     * Sets the apiSsoKey
     *
     * @param string $apiSsoKey
     * @return void
     */
    public function setApiSsoKey(string $apiSsoKey)
    {
        $this->apiSsoKey = $apiSsoKey;
    }

    /**
     * Returns the yawaveStoragePid
     *
     * @return int $yawaveStoragePid
     */
    public function getYawaveStoragePid()
    {
        return $this->yawaveStoragePid;
    }

    /**
     * Sets the yawaveStoragePid
     *
     * @param int $yawaveStoragePid
     * @return void
     */
    public function setYawaveStoragePid(int $yawaveStoragePid)
    {
        $this->yawaveStoragePid = $yawaveStoragePid;
    }
}
