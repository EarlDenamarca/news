

## Setup Instructions

- Open wsl terminal.
- Clone the repo.
- After cloning, run the command docker compose up
- run the command $docker exec news-app php artisan migrate
- run the command $docker exec news-app php artisan db:seed
- run the command $docker exec news-app php artisan news:fetch --category=sport|entertainment|business --from=<YYYY-MM-DD> --to=<YYYY-MM-DD> --limit=10|20|30 --page=1|2|3


