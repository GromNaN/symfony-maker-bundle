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

use Symfony\Bundle\MakerBundle\Maker\MakeTest;
use Symfony\Bundle\MakerBundle\Test\AbstractMakerTestCase;
use Symfony\Bundle\MakerBundle\Test\MakerTestDetails;
use Symfony\Bundle\MakerBundle\Test\MakerTestRunner;

class MakeTestTest extends AbstractMakerTestCase
{
    protected static function getMakerClass(): string
    {
        return MakeTest::class;
    }

    public static function getTestDetails(): \Generator
    {
        yield 'it_makes_TestCase_type' => [self::createMakerTest()
            ->run(static function (MakerTestRunner $runner) {
                $runner->runMaker(
                    [
                        // type
                        'TestCase',
                        // class name
                        'FooBar',
                    ]
                );

                $runner->runTests();
            }),
        ];

        yield 'it_makes_KernelTestCase_type' => [self::createMakerTest()
            ->run(static function (MakerTestRunner $runner) {
                $runner->copy(
                    'make-test/basic_setup',
                    ''
                );

                $runner->runMaker(
                    [
                        // type
                        'KernelTestCase',
                        // functional test class name
                        'FooBar',
                    ]
                );

                $runner->runTests();
            }),
        ];

        yield 'it_makes_WebTestCase_type' => [self::createMakerTest()
            ->run(static function (MakerTestRunner $runner) {
                $runner->copy(
                    'make-test/basic_setup',
                    ''
                );

                $runner->runMaker(
                    [
                        // type
                        'WebTestCase',
                        // functional test class name
                        'FooBar',
                    ]
                );

                $runner->runTests();
            }),
        ];

        yield 'it_makes_PantherTestCase_type' => [self::getPantherTest()
            ->addExtraDependencies('panther')
            ->run(static function (MakerTestRunner $runner) {
                $runner->copy(
                    'make-test/basic_setup',
                    ''
                );

                $runner->runMaker(
                    [
                        // type
                        'PantherTestCase',
                        // functional test class name
                        'FooBar',
                    ]
                );

                $runner->runProcess('composer require --dev dbrekelmans/bdi');
                $runner->runProcess('php vendor/dbrekelmans/bdi/bdi detect drivers');

                $runner->runTests();
            }),
        ];
    }

    protected static function getPantherTest(): MakerTestDetails
    {
        return self::createMakerTest()
            ->skipTest(
                message: 'Panther test skipped - MAKER_SKIP_PANTHER_TEST set to TRUE.',
                skipped: getenv('MAKER_SKIP_PANTHER_TEST')
            );
    }
}
