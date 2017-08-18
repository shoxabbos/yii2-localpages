Create multi language static pages
==================
Create multi language static pages

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shoxabbos/yii2-localpages "*"
```

or add

```
"shoxabbos/yii2-localpages": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Run migrate
```php
php yii migrate --migrationPath=@vendor/shoxabbos/yii2-localpages/migrations
```


Add module to web/config
```php
'modules' => [
    'pages' => [
        'class' => '\shoxabbos\localpages\Module',
        'langs' => [
            'ru' => 'Russian',
            'en' => 'English',
        ],
        'defaultRoute' => 'page',
        'defaultLang' => 'ru',
        'layoutPath' => '@app/path/to/layouts',
        'layout' => 'admin',
        'pagesTableName' => 'pages',
        'pagesContentTableName' => 'page_contents',
    ],
]
```

Add action to your controller (viewFile: your view file for showing pages)
```php
public function actions()
{
    return [
        'page' => [
            'class' => 'shoxabbos\localpages\actions\ViewAction',
            'viewFile' => 'page'
        ],
    ];
}
```

__For add news__: http://localhost:8080/pages/page/create

__For see created your post__: http://localhost:8080/site/page?slug=test

__If you want a nice url you can set up the URL manager__: 
```php
'page/<slug:\w+>' => 'site/page'
```

__After that, you can open the pages as__:

Before: ~~http://localhost:8080/site/page?slug=test~~

After: http://localhost:8080/page/test
