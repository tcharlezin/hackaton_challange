#WeBrArDevs App


## How to install

- cp .env.example .env
- docker-compose up -d
- unzip database/data/FACL_products-csv.zip
- docker-compose exec app bash
- php artisan migrate --seed


# Web Application
- go to localhost:8000

# API Application

`/api/recomend?code=SKU_ID`
