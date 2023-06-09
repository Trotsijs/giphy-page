# GIPHY Page [![PHP 7.4](https://img.shields.io/badge/PHP-7.4-grey?labelColor=777BB4)](https://www.php.net/)
Application for displaying GIFS from GIPHY.

![Powered by GIPHY](https://i.imgur.com/ujUSHlP.png)
### Installation:

1. Clone or Download the project.
2. Run:
````
composer install
````
3. Get your API key from [GIPHY](https://developers.giphy.com/)
4. Rename `.env.example` to `.env`
5. Modify `.env` with your API key:
```php
API_KEY= // Paste your API key here.
```
6. Start server in your terminal:
````
php -S localhost:8000
````
7. Navigate to http://localhost:8000 to see the site.

### Resources:

* [GIPHY Documentation](https://developers.giphy.com/docs/api)
* [Change endpoints](https://developers.giphy.com/explorer/)

### Preview:

Trending gifs are displayed on front page.

You can search for gifs by entering keyword in search bar.


<img src="https://i.ibb.co/x67pYKc/preview.png" width=500 height=50% alt="image">



