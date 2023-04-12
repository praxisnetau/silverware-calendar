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
use SilverStripe\Forms\FormField;

/**
 * An extension which adds SilverWare Calendar functionality to form fields.
 *
 * @package SilverWare\Calendar\Extensions
 * @author Colin Tucker <colin@praxis.net.au>
 * @copyright 2017 Praxis Interactive
 * @license https://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @link https://github.com/praxisnetau/silverware-calendar
 */
class FormFieldExtension extends Extension
{
    /**
     * Holds the calendar picker config for the extended object.
     *
     * @var array
     */
    protected $calendarConfig = [];

    /**
     * If set to true, disables the calendar picker for the extended object.
     *
     * @var boolean
     */
    protected $calendarDisabled = false;

    /**
     * Defines either the named calendar config value, or the calendar config array.
     *
     * @param string|array $arg1
     * @param string $arg2
     *
     * @return $this
     */
    public function setCalendarConfig($arg1, $arg2 = null)
    {
        if (is_array($arg1)) {
            $this->calendarConfig = $arg1;
        } else {
            $this->calendarConfig[$arg1] = $arg2;
        }

        return $this;
    }

    /**
     * Answers either the named calendar config value, or the calendar config array.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getCalendarConfig($name = null)
    {
        if (!is_null($name)) {
            return isset($this->calendarConfig[$name]) ? $this->calendarConfig[$name] : null;
        }

        return $this->calendarConfig;
    }

    /**
     * Defines the value of the calendarDisabled attribute.
     *
     * @param boolean $calendarDisabled
     *
     * @return $this
     */
    public function setCalendarDisabled($calendarDisabled)
    {
        $this->calendarDisabled = (boolean) $calendarDisabled;

        return $this;
    }

    /**
     * Answers the value of the calendarDisabled attribute.
     *
     * @return boolean
     */
    public function getCalendarDisabled()
    {
        return $this->calendarDisabled;
    }

    /**
     * Event method called before the field is rendered.
     *
     * @param FormField $field
     *
     * @return void
     */
    public function onBeforeRender(FormField $field)
    {
        if ($class = $field->config()->calendar_datepicker_class) {
            $field->addExtraClass($class);
        }
    }

    /**
     * Updates the given array of HTML attributes from the extended object.
     *
     * @param array $attributes
     *
     * @return void
     */
    public function updateAttributes(&$attributes)
    {
        $attributes['data-calendar-config']  = $this->owner->getCalendarConfigJSON();
        $attributes['data-calendar-enabled'] = $this->owner->getCalendarEnabled();
    }

    /**
     * Answers 'true' if the calendar is enabled for the extended object.
     *
     * @return string
     */
    public function getCalendarEnabled()
    {
        if ($this->owner->isReadonly() || $this->owner->isDisabled()) {
            return 'false';
        }

        return ($this->calendarDisabled || $this->owner->config()->calendar_disabled) ? 'false' : 'true';
    }

    /**
     * Answers a JSON-encoded string containing the config for the calendar.
     *
     * @return string
     * @throws \JsonException
     */
    public function getCalendarConfigJSON()
    {
        return json_encode($this->owner->getCalendarConfig(), JSON_THROW_ON_ERROR | JSON_FORCE_OBJECT);
    }
}
