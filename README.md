# Instructions
So this app basically pull data from CoinLore API, store them and serve through API.

We pull some global data, and 4 coins (BTC, ETH, XRP, USDT).

### Requirements:
- Docker
- Docker compose

### App setup:
1. Run `docker-compose up -d`
2. Run `make build`

### Prefill data:
- #### Manual:
    - Run `docker-compose exec app php artisan command:import:coinlore:data`
- #### Cron:
    - For local env run: 
        - `docker-compose exec app php artisan schedule:work`
        - This will run Schedule Worker every minute and execute our command every 5 min!
    - On production, I would set up cron like that: 
        - `* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1`)
    
### API Usage:
1. Open `http://localhost` in browser.
2. Register and login.
3. Generate your API token.
4. Use that token to make API calls.
5. You can find postman API collection `Currency-flow.postman_collection.json` in project root. (Make sure you replace auth token with yours!)

### Additional:
- There is PhpSniffer integration. 
    - Run `make check` to check your code.
    - Run `make cs_fix` to auto fix code.
- Also, there is PhpSniffer script added on pre-commit hook to check all files before they are committed.

    

