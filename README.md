**# Code review

## Task
Develop a Laravel-Based Backend for Frontend Integration with a set of RESTful endpoints to meet the following criteria:
* Create a Job - POST `/api/jobs` - Accept a JSON request body that includes array of URLs to scrape and HTML/CSS selectors.
* Retrieve Job by ID - GET `/api/jobs/{id}` - Return job details and scraped data from URL.
* Delete Job by ID - DELETE `/api/jobs/{id}` - Remove job.

1.  Redis Data Store:<br>
    `Utilize Redis as the data store to maintain job details, statuses, and scraped data.`
2. Background Processing (Optional):
   <br> `Implement background processing (e.g., Laravel queues) to perform web scraping tasks asynchronously.`
3. Docker Containers (Bonus Points):
   <br> `Optionally, set up Docker containers for the Laravel application, including necessary services like PHP, Nginx/Apache, and Redis, earning bonus points.`

# How to run application

### WEIRD PORTS: To avoid potential conflicts with existing ports
* nginx web server - <b>8001<b>
### <b>Accessing web: `127.0.0.1:8001/api/jobs/6562203d4d6fa`<b>


### How to run this project on your machine:
1. Pull the repo
    - On windows: Be sure to have installed wsl for best optimisation and file reading. Place repo in `$wsl//` directory
    - Mac or Linux: Pull the project where you want
2. Open command terminal in your project folder
3. Write `docker-compose up --build` - for first time
    - Write `docker-compose up` if the containers were closed just this command
4. After all the process is done loading write: `docker-compose ps -q laravel`
5. Copy returned value. E.g. of mine: `a2f527561203d53623d3******************************************************`
6. Now you can access the symfony container: `docker exec -it <value_from_4_step> bash`
7. Run following:
    * `cp .env.example .env`
    * `composer install`
    * `php artisan key:generate`

### Endpoint Testing

This section details the available API endpoints and how to use them:<br>

1. **Create a Job (POST)**
    - Endpoint: `/api/jobs`
    - Request Body Format:
      ```json
      {
        "urls": ["https://9gag.com/top", "https://facebook.com/feed"],
        "selectors": [
          ["div.image", "div.class_123S_sd"],
          ["div#thisIsId", "image#thisIsNotId"]
        ]
      }
      ```
    - Return:
      ```json
      {
         "jobId":"6562203d4d6fa"
      }
      ```

2. **Retrieve a Job by ID (GET)**
    - Endpoint: `/api/jobs/{id}`
    - Description: Fetch the details of a specific job using its ID.
    - Return:
      ```json
      {
          "urls": ["https://9gag.com/top", "https://facebook.com/feed"],
        "selectors": [
          ["div.image", "div.class_123S_sd"],
          ["div#thisIsId", "image#thisIsNotId"]
        ],
        "id": "6562203d4d6fa",
        "status": "completed"
      }
      ```

3. **Delete a Job by ID (DELETE)**
    - Endpoint: `/api/jobs/{id}`
    - Description: Remove a specific job from the system using its ID.
    - Return:
      ```json
      {
          "Successfully deleted"
      }
      ```

## Considerations for future
1.  Write unit and functional tests
2.  Shift some responsibilities from one classes to other ones.
3.  Refactor architecture therefore it could be easier to implement new features or fix bugs**
