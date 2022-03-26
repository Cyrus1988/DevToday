### There are several step to run this project, run the following commands:

1. git clone https://gitlab.com/cyrus5723126/developstoday.git
2. composer install
3. cp .env.example .env
4. set up database connection in .env
5. php artisan migrate
6. php artisan key:generate
7. Add to crontab:
* * * * * cd /path_to_project/ && php artisan schedule:run >> /dev/null 2>&1

### Available methods of REST API:

Postman-doc -> https://www.postman.com/winter-rocket-894889/workspace/developstoday/api/abea5b7e-58b0-4d98-93fc-e3abeed357b5

#### Comments


| Method        | Url                           | ControllerMethod  |
| ------------- |:--------------                |:-----:    |
| GET           | /api/comments                 | index     |
| POST          | /api/comments                 | store     |
| GET           | /api/comments/{id}            | show      |
| PUT/PATCH     | /api/comments/{id}            | update    |
| DELETE        | /api/comments/{id}            | destroy   |

#### Posts

| Method        | Url                           | ControllerMethod  |
| ------------- |:--------------                |:-----:    |
| GET           | /api/posts                 | index     |
| POST          | /api/posts                 | store     |
| GET           | /api/posts/{id}            | show      |
| PUT/PATCH     | /api/posts/{id}            | update    |
| DELETE        | /api/posts/{id}            | destroy   |
| POST        | /api/posts-vote           | vote   |
