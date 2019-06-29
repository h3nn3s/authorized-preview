<?php
declare(strict_types = 1);
namespace B13\AuthorizedPreview;

/*
 * This file is part of TYPO3 CMS extension authorized_preview by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;

/**
 * Class SiteWrapper
 *
 * Wrapper class for easy access to disabled languages
 */
class SiteWrapper
{
    /**
     * @var Site
     */
    protected $site = null;

    /**
     * SitePreview constructor.
     *
     * @param Site $site
     */
    public function __construct(Site $site)
    {
        $this->site = $site;
    }

    /**
     * @return SiteLanguage[]
     */
    public function getDisabledLanguages(): array
    {
        $languages = [];
        foreach ($this->site->getAllLanguages() as $languageId => $language) {
            if ($language->enabled() === false) {
                $languages[] = $language;
            }
        }
        return $languages;
    }

    /**
     * @return Site
     */
    public function getSite(): Site
    {
        return $this->site;
    }
}
