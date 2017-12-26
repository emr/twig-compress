# twig-compress
output**compressor**for**twig**butbetterthan`{% spaceless %}`

## install

    $ composer require funcphp/twig-compress

##### without symfony:

```php
$loader = new \Twig_Loader_Filesystem([
    __DIR__.'/templates'
]);
$this->twig = new \Twig_Environment($loader);

// add extension to your twig engine
$this->twig->addExtension(new CompressExtension());
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