<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS extension "sitemap_locator".
 *
 * Copyright (C) 2023-2024 Elias Häußler <elias@haeussler.dev>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace EliasHaeussler\Typo3SitemapLocator\Tests\Unit\Exception;

use EliasHaeussler\Typo3SitemapLocator as Src;
use TYPO3\TestingFramework;

/**
 * NoSitesAreConfiguredTest
 *
 * @author Elias Häußler <elias@haeussler.dev>
 * @license GPL-2.0-or-later
 * @covers \EliasHaeussler\Typo3SitemapLocator\Exception\NoSitesAreConfigured
 */
final class NoSitesAreConfiguredTest extends TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @test
     */
    public function constructorReturnsExceptionForNonConfiguredSites(): void
    {
        $subject = new Src\Exception\NoSitesAreConfigured();

        self::assertSame('There are no sites configured in your system.', $subject->getMessage());
        self::assertSame(1697184946, $subject->getCode());
    }
}
