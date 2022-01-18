<?php

declare(strict_types=1);

namespace Interspark\YawavePublications\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * This file is part of the "Yawave Adapter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Hannes Pries <hannes.pries@interspark.com>, Interspark GmbH
 */

/**
 * The repository for Publications
 */
class PublicationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = ['begin_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING];

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findAll(int $limit = 0): QueryResultInterface
    {
        $query = $this->createQuery();
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query->execute();
    }
}
