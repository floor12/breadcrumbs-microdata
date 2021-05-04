# breadcrumbs-microdata
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/badges/build.png?b=master)](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/floor12/breadcrumbs-microdata/?branch=master)

## Installation

Add this package to your project with composer.

```bash
composer require "floor12/breadcrumbs-microdada"
```

## Usage

The breadcrumbs api is simple and clear. Here are some examples. This:

```php
use floor12\Breadcrumbs\Breadcrumbs;

$elements = [
    '/first' => 'First element 1',
    '/first/second' => 'Second element 2',
    'Current',
]; 
(new Breadcrumbs($elements))->getHtml();

```

or this:

```php
use floor12\Breadcrumbs\Breadcrumbs;

(new Breadcrumbs())
        ->addElement('First element 1', '/first')
        ->addElement('Second element 2', '/first/second')
        ->addElement('Current')
        ->getHtml();

```

... will generate this html code:

```html

<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="f12-breadcrumbs" id="f12-breadcrumbs">
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a data-pjax="0" itemprop="item" href="/first">
            <span itemprop="name">First element 1</span>
            <meta itemprop="position" content="1">
        </a>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a data-pjax="0" itemprop="item" href="/first/second"><span itemprop="name">Second element 2</span>
            <meta itemprop="position" content="2">
        </a></li>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <span itemprop="name">Current</span>
        <meta itemprop="position" content="3">
    </li>
</ol>

```

Its also possible to set your own id and CSS class name:

```php
use floor12\Breadcrumbs\Breadcrumbs;

(new Breadcrumbs([]))
    ->setMainId('some-id')
    ->setCssClass('some-css-class')
    ->getHtml();

```

## Css styles

To make default pretty styled breadcrumbs, include `scss/f12-breadcrumbs.scss` or `scss/f12-breadcrumbs.css` 
to your project styles and override what you need. 


## Contributing

I will be glad of any help in the development, support and bug reporting of this module.
