# INSTALLATION

## Summary 
LaSalle Software email list management.  


## composer.json:

```
{
    "require": {
        "lasallecrm/lasallecrmapi": "0.9.*",
    }
}
```


## Service Provider

In config/app.php:
```
Lasallecrm\Lasallecrmapi\LasallecrmapiServiceProvider::class,
```


## Facade Alias

* none


## Dependencies
* none


## Publish the Package's Config

With Artisan:
```
php artisan vendor:publish
```

## Migration

With Artisan:
```
php artisan migrate
```

## Notes

* view files will be published to the main app's view folder
* first: install all your packages 
* second: run "vendor:publish" (once for all packages) 
* third:  run "migrate" (once for all packages)


## Serious Caveat 

This package is designed to run specifically with my LaSalle Customer Relationship Management packages.