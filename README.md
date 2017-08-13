Create local pages
==================
Create local pages

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
        'layoutPath' => '@app/path/to/your/layouts',
        'layout' => 'admin'
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