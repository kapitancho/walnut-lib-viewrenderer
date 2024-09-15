# PHP View Renderer
This is a very basic view renderer that maps any PHP class (view) to a template file.

## Examples
The usage is straightforward

```php
//Setup (usually done via DI)
$renderer = new PhpTemplateRenderer(
	new PerFileTemplateNameMapper('templates', 'php')
);

$viewMapper = new LookupViewMapper([
    HomePageView::class => 'home-page',
    AboutPageView::class => 'about-page'
])

$adapter = new ViewRendererAdapter($renderer, $viewMapper);

//Usage
$view = new HomePageView;
$adapter->render($view);
```
