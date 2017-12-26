# twig-compress
Output compressor like {% spaceless %}

## install

    $ composer require funcphp/twig-compress

##### without symfony:

    $loader = new \Twig_Loader_Filesystem([
        __DIR__.'/templates'
    ]);
    $this->twig = new \Twig_Environment($loader);
    
    // add extension to your twig engine
    $this->twig->addExtension(new CompressExtension());
    
##### with symfony:

add bundle

    $bundles = [
        ...
        new \Func\CompressBundle\FuncCompressBundle(),
        ...
    ];
    
## examples

#### basic usage

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
    
**output:**

    <html><head><style> body { background: #fcc200; } </style><script> alert('hello') </script></head></html>
    
#### use with secure option

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
    
you can use `{% compress secure=false %}` instead of `{% compress not secure %}`

**output:**

    <html><head><style>
                body {
                    background: #fcc200;
                }
            </style><script>
                alert('hello')
            </script></head></html>