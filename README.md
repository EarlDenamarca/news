

## Setup Instructions

- go to https://newsapi.org and sign up to get your free api key
- Open wsl terminal.
- Clone the repo
- create a .env file and copy the content of .env.example to .env file
- also add this to your .env file - NEWS_API=<newsapi_key_from_your_account>
- run the command docker compose up
- run the command $docker exec news-app php artisan migrate
- run the command $docker exec news-app php artisan db:seed
- run the command $docker exec news-app php artisan news:fetch --category=sport|entertainment|business --from=<YYYY-MM-DD> --to=<YYYY-MM-DD> --limit=10|20|30 --page=1|2|3


