<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XApi\Repository\ORM\Tests\Unit\Repository;

use Doctrine\ORM\Mapping\DefaultNamingStrategy;
use PHPUnit\Framework\MockObject\MockObject;
use XApi\Repository\Doctrine\Tests\Unit\Repository\Mapping\StatementRepositoryTest as BaseStatementRepositoryTest;
use XApi\Repository\ORM\StatementRepository;
use XApi\Repository\Doctrine\Mapping\Statement;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\UnitOfWork;
use Doctrine\ORM\Mapping\ClassMetadata;

class StatementRepositoryTest extends BaseStatementRepositoryTest
{
    protected function getObjectManagerClass(): string
    {
        return EntityManager::class;
    }

    protected function getUnitOfWorkClass(): string
    {
        return UnitOfWork::class;
    }

    protected function getClassMetadataClass(): string
    {
        return ClassMetadata::class;
    }

    protected function createMappedStatementRepository($objectManager, $unitOfWork, $classMetadata): StatementRepository
    {
        $classMetadata = new ClassMetadata(Statement::class, new DefaultNamingStrategy());

        return new StatementRepository($objectManager, $classMetadata);
    }
}
