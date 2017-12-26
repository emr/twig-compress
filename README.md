# twig-compress
output**compressor**for**twig**butbetterthan`{% spaceless %}`

## install
download repo

    $ composer require funcphp/twig-compress "dev-master"

##### without symfony:

```php
// add extension to your twig engine
$twigEngine->addExtension(new \Func\Twig\CompressExtension());
```

##### with symfony:

enable bundle

```php
$bundles = [
    ...
    new \Func\CompressBundle\FuncCompressBundle(),
    ...
];
```
    
## examples

#### basic usage

```twig
{% compress %}
<html>
    <head>
        <style>
            body {
                background: #fcc200;
            }
        </style>
        <script>
            alert('hello')
        </script>
    </head>
</html>
{% endcompress %}
```

**output:**

```twig
<html><head><style> body { background: #fcc200; } </style><script> alert('hello') </script></head></html>
```
    
#### use with secure option

this does the same thing with `{% spaceless %}`

```twig
{% compress not secure %}
<html>
    <head>
        <style>
            body {
                background: #fcc200;
            }
        </style>
        <script>
            alert('hello')
        </script>
    </head>
</html>
{% endcompress %}
```
you can use `{% compress secure=false %}` instead of `{% compress not secure %}`

**output:**

```twig
<html><head><style>
            body {
                background: #fcc200;
            }
        </style><script>
            alert('hello')
        </script></head></html>
```