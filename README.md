# Fenom Template Engine for Laravel

## Documentation

- [English docs](https://github.com/fenom-template/fenom/blob/master/docs/en/readme.md)
- [Russian docs](https://github.com/fenom-template/fenom/blob/master/docs/ru/readme.md)

## Configuration

Run command:

```
php artisan vendor:publish --provider="Neva\Fenom\FenomServiceProvider"
```

Then edit by yourself: `config/fenom.php`

## Important info

To reference views from another package, use '#' instead of ':' as delimiter. For instance:

```
{extends 'other_package#some.view'}
```


