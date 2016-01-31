<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrOAuth2\Server\Doctrine\Container;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use Interop\Container\ContainerInterface;
use ZfrOAuth2\Server\Model\RefreshToken;
use ZfrOAuth2\Server\Doctrine\Repository;

/**
 * Class RefreshTokenRepositoryFactory
 *
 * @todo implement DoctrineOptions to get doctrine manager name
 */
class RefreshTokenRepositoryFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /** @var ManagerRegistry $managerRegistry */
        $managerRegistry = $container->get(ManagerRegistry::class);

//        /** @var DoctrineOptions $doctrineOptions */
//        $doctrineOptions = $container->get(DoctrineOptions::class);
//
//        /** @var ObjectManager $objectManager */
//        $objectManager = $managerRegistry->getManager($doctrineOptions->getObjectManager() ?: null);

        /** @var ObjectManager $objectManager */
        $objectManager = $managerRegistry->getManager('orm_default');

        /** @var ClassMetadata $meta */
        $meta = $objectManager->getClassMetadata(RefreshToken::class);

        return new Repository\RefreshTokenRepository($objectManager, $meta);
    }
}
