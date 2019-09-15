<?php

/**
 * This file is part of SilverWare.
 *
 * PHP version >=5.6.0
 *
 * For full copyright and license information, please view the
 * LICENSE.md file that was distributed with this source code.
 *
 * @package SilverWare\Calendar\Extensions
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-calendar
 */

namespace SilverWare\Calendar\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\i18n\i18n;
use SilverStripe\View\Requirements;

/**
 * An extension which adds SilverWare Calendar functionality to controllers.
 *
 * @package SilverWare\Calendar\Extensions
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-calendar
 */
class ControllerExtension extends Extension
{
    /**
     * Event handler method triggered before the extended controller has initialised.
     *
     * @return void
     */
    public function onBeforeInit()
    {
        if ($this->owner->getCalendarHighlightColor()) {
            Requirements::customCSS($this->getCustomCSS());
        }
    }
    
    /**
     * Event handler method triggered after the extended controller has initialised.
     *
     * @return void
     */
    public function onAfterInit()
    {
        // (try &) load locale file + set default locale for flatpickr to current users' i18n locale
        $userLangIso = i18n::getData()->langFromLocale(i18n::get_locale());
        Requirements::javascript("//npmcdn.com/flatpickr/dist/l10n/$userLangIso.js");
        Requirements::customScript("flatpickr.localize(flatpickr.l10ns.$userLangIso);", "FlatpickrLocalization");
    }
    
    /**
     * Answers the calendar highlight color from configuration.
     *
     * @return string
     */
    public function getCalendarHighlightColor()
    {
        return $this->owner->config()->calendar_highlight_color;
    }
    
    /**
     * Answers the custom CSS required for the extension.
     *
     * @return string
     */
    protected function getCustomCSS()
    {
        return $this->owner->renderWith(sprintf('%s\CustomCSS', self::class));
    }
}
