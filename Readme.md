# Open Movie Database App

This app uses [OMDB Api](http://www.omdbapi.com)

# Installation
## Prerequisites

- PHP
- Composer

## Step 1 (Clone Repository):
Clone this repository using `git`.
```bash
git clone https://github.com/ruman63/omdbapi
cd omdbapi
```

## Step 2 (Install Dependencies):
This app requires `guzzlehttp/guzzle` as a composer dependency.
```bash
composer install
```

## Step 3 (Set your API KEY):
Goto `app/config.php`, set `OMDB_KEY` to your api key. You can get it [here](http://www.omdbapi.com/).

## Step 4 (Boot Server):
Boot up a php server with document root a `public` directory.

```bash
php -S 0.0.0.0:8000 -t public
```

Open Browser goto `localhost:8000`. Thats it! :thumbsup: