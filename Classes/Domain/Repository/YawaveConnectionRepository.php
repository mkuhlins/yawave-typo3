<?php

declare(strict_types=1);

namespace Interspark\YawavePublications\Domain\Repository;


/**
 * This file is part of the "Yawave Adapter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Hannes Pries <hannes.pries@interspark.com>, Interspark GmbH
 */

/**
 * The repository for YawaveConnections
 */
class YawaveConnectionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findAll()
    {

        $query = $this->createQuery();
        $query->getQuerySettings()
            ->setRespectStoragePage(false);

        return $query->execute();

    }
    
}
