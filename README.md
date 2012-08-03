README
======

Installation
------------

Install using Composer:

```
./composer require evercodelab/banner-bundle
```

Add the bundle to your AppKernel.php:

``` php
$bundles = array(
    //...
    new Evercode\Bundle\BannerBundle\EvercodeBannerBundle(),
);
```

Add it to your routing.yml:

```
EvercodeBannerBundle:
    resource: "@EvercodeBannerBundle/Controller/"
    type:     annotation
```

In your templates, add:

```
{% render 'EvercodeBannerBundle:Banner:view' with {'place': 'Main_horizontal'} %}
```

You can optionally specify a filter to automatically crop/resize/compress your images using the AvalancheImagineBundle:

```
{% render 'EvercodeBannerBundle:Banner:view' with {'place': 'Main_horizontal', 'filter': 'banner_main_horizontal'} %}
```

See https://github.com/avalanche123/AvalancheImagineBundle#basic-usage for information on how to set up the filters.