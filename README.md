Getting Started With StfalconAbTestBundle
==================================

Simple small bundle for add Google analytics A/B test code on site pages

## Prerequisites

This version of the bundle requires:

1. PHP >= 5.3.2
2. Symfony >= 2.1
3. SonataAdminBundle >=2.1

## Installation

Installation is a quick 4 step process:

1. Add StfalconAbTestBundle in your composer.json
2. Enable the StfalconAbTestBundle
3. Import StfalconAbTestBundle routing and update your config file
4. Update your database schema

### Step 1: Add StfalconAbTestBundle in your composer.json

```js
{
    "require": {
        "stfalcon-studio/ab-test-bundle": "*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update stfalcon-studio/ab-test-bundle
```

Composer will install the bundle to your project's `vendor/stfalcon` directory.

### Step 2: Enable the StfalconAbTestBundle and requiremented bundles

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        // For SonataAdminBundle
        new Sonata\CoreBundle\SonataCoreBundle(),
        new Sonata\BlockBundle\SonataBlockBundle(),
        new Knp\Bundle\MenuBundle\KnpMenuBundle(),
        new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
        new Sonata\AdminBundle\SonataAdminBundle(),
        
        new Stfalcon\AbTestBundle\StfalconAbTestBundle(),
        // ...
    );
}
```

### Step 3: Update your database schema

Now that the bundle is configured, the last thing you need to do is update your
database schema because you have added a new entity the `AbTest`.

Run the following command.

``` bash
$ php app/console doctrine:schema:update --force
```

At this point you can already access the admin dashboard by visiting the url: http://yoursite.local/admin/dashboard.
[Getting started with SonataAdminBundle](http://sonata-project.org/bundles/admin/2-0/doc/reference/getting_started.html)

### Step 4: Add code in template

For add Google Analytics A/B test code in your pages you must add following code after `<head>` tag in your main template.

``` twig
{{ init_ab_test() }}
```

For add AbTest fill the form in admin part of site with:

**Page Url** - url of page where you want add A/B test code in header. Example: `/page/some-page-slug`

**Code** - Code of Google analytics A/B test. Example: `12345-6`

And now if you'll open http://your-project/page/some-page-slug in HTML code of page will be added code for Google analytics A/B test


### That's all!
Now that you have completed the installation and configuration of the StfalconAbTestBundle!
