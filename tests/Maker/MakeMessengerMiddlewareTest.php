<?php

/*
 * This file is part of the Symfony MakerBundle package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\MakerBundle\Tests\Maker;

use Symfony\Bundle\MakerBundle\Maker\MakeMessengerMiddleware;
use Symfony\Bundle\MakerBundle\Test\AbstractMakerTestCase;
use Symfony\Bundle\MakerBundle\Test\MakerTestRunner;

class MakeMessengerMiddlewareTest extends AbstractMakerTestCase
{
    protected static function getMakerClass(): string
    {
        return MakeMessengerMiddleware::class;
    }

    public static function getTestDetails(): \Generator
    {
        yield 'it_generates_messenger_middleware' => [self::createMakerTest()
            ->run(static function (MakerTestRunner $runner) {
                $runner->runMaker(
                    [
                        // middleware name
                        'CustomMiddleware',
                    ]);

                self::assertFileExists($runner->getPath('src/Middleware/CustomMiddleware.php'));
            }),
        ];
    }
}
