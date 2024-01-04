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

namespace EliasHaeussler\Typo3SitemapLocator\Tests\Functional\Fixtures\Classes;

use TYPO3\CMS\Core;

/**
 * DummySiteFinder
 *
 * @author Elias Häußler <elias@haeussler.dev>
 * @license GPL-2.0-or-later
 * @internal
 */
final class DummySiteFinder extends Core\Site\SiteFinder
{
    public ?Core\Site\Entity\Site $expectedSite = null;

    /**
     * @var Core\Site\Entity\Site[]|null
     */
    public ?array $expectedSites = null;

    /** @noinspection PhpMissingParentConstructorInspection */
    public function __construct()
    {
        // Parent call missing on purpose.
    }

    public function getSiteByIdentifier(string $identifier): Core\Site\Entity\Site
    {
        return $this->expectedSite
            ?? throw new Core\Exception\SiteNotFoundException('No site found for identifier ' . $identifier, 1521716628);
    }

    public function getAllSites(bool $useCache = true): array
    {
        if ($this->expectedSites !== null) {
            return $this->expectedSites;
        }

        return parent::getAllSites($useCache);
    }
}
