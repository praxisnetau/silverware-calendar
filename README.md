# SilverWare Calendar Module

[![Latest Stable Version](https://poser.pugx.org/silverware/calendar/v/stable)](https://packagist.org/packages/silverware/calendar)
[![Latest Unstable Version](https://poser.pugx.org/silverware/calendar/v/unstable)](https://packagist.org/packages/silverware/calendar)
[![License](https://poser.pugx.org/silverware/calendar/license)](https://packagist.org/packages/silverware/calendar)

A date and time picker module for [SilverStripe v4][silverstripe-framework] which adds [flatpickr][flatpickr] to
standard SilverStripe `DateField`, `DatetimeField` and `TimeField` instances.

<p align="center"><img src="https://i.imgur.com/fodX6kt.png" alt="Datepicker"></p>

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Issues](#issues)
- [Contribution](#contribution)
- [Attribution](#attribution)
- [Maintainers](#maintainers)
- [License](#license)

## Requirements

- [SilverStripe Framework v4][silverstripe-framework]

## Installation

Installation is via [Composer][composer]:

```
$ composer require silverware/calendar
```

**Note:** forms on the website will automatically make use of the datepicker if
the app is using [SilverWare][silverware]. If you are using a vanilla SilverStripe
project, you'll need to load the module script and styles in your app bundle
(jQuery is required):

- `silverware/calendar: client/dist/js/bundle.js`
- `silverware/calendar: client/dist/styles/bundle.css`

## Configuration

As with all SilverStripe modules, configuration is via YAML. Extensions to `LeftAndMain` and
`ContentController` are applied via `config.yml`.

### Highlight Color

The module supports a custom highlight color for both the CMS and forms on the website. To
define the highlight color, use the following YAML configuration:

```yml
# Custom highlight color for CMS:

SilverStripe\Admin\LeftAndMain:
  calendar_highlight_color: '#abc'

# Custom highlight color for website forms:

SilverStripe\CMS\Controllers\ContentController:
  calendar_highlight_color: '#cba'
```

### Datepicker Class

SilverStripe will not apply it's own JavaScript to form fields which have a certain
datepicker class. To prevent conflicts, use the following configuration to define the class
which SilverStripe will detect:

```yml
SilverStripe\Forms\FormField:
  calendar_datepicker_class: 'hasDatepicker'
```

### Disabling via Configuration

If you need to disable the datepicker for all instances of a certain form field, use
the following configuration:

```yml
# Disable for all date fields:

SilverStripe\Forms\DateField:
  calendar_disabled: true
```

## Usage

Out of the box, the module will automatically add a [flatpickr][flatpickr] to
all `DateField`, `DatetimeField` and `TimeField` instances. Each field will
be configured automatically with default settings for each use case. A flatpickr 
language file will be loaded and used (if available) based on the current i18n locale.

If you need to apply additional options supported by [flatpickr][flatpickr], you
can do so by using YAML config (static), or the `setCalendarConfig()` method (instance):

```yml
SilverWare\Calendar\Extensions\FormFieldExtension:
  flatpickr_base_config:
    time_24hr: true
    altFormat: "l j F Y \\o\\m H:i"
```

```php
use SilverStripe\Forms\DateField;

$field = DateField::create('Date', 'Date');

$field->setCalendarConfig([
  'minDate' => date('Y-m-d'),
  'shorthandCurrentMonth' => true
]);
```

In addition to accepting an array, the `setCalendarConfig()` method also supports
the setting of individual config settings:

```php
$field->setCalendarConfig('weekNumbers', true);
```

To see a full list of the supported options, please refer to the
[flatpickr documentation](https://chmln.github.io/flatpickr/options).

### Disabling by Instance

If you need to disable the datepicker for a particular field instance,
as opposed to all instances, you may call the `setCalendarDisabled()` method
on the field:

```php
$field->setCalendarDisabled(true);
```

## Issues

Please use the [GitHub issue tracker][issues] for bug reports and feature requests.

## Contribution

Your contributions are gladly welcomed to help make this project better.
Please see [contributing](CONTRIBUTING.md) for more information.

## Attribution

- Makes use of [flatpickr] by [Gregory Petrosyan](https://github.com/chmln) and
  [others](https://github.com/chmln/flatpickr/graphs/contributors).

## Maintainers

[![Colin Tucker](https://avatars3.githubusercontent.com/u/1853705?s=144)](https://github.com/colintucker) | [![Praxis Interactive](https://avatars2.githubusercontent.com/u/1782612?s=144)](http://www.praxis.net.au)
---|---
[Colin Tucker](https://github.com/colintucker) | [Praxis Interactive](http://www.praxis.net.au)

## License

[BSD-3-Clause](LICENSE.md) &copy; Praxis Interactive

[composer]: https://getcomposer.org
[silverstripe-framework]: https://github.com/silverstripe/silverstripe-framework
[silverware]: https://github.com/praxisnetau/silverware
[issues]: https://github.com/praxisnetau/silverware-calendar/issues
[flatpickr]: https://github.com/chmln/flatpickr
