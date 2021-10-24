# Yashry Task

### 1 - Run The App
If you use valet just execute on `domain_name/api/carts` .
```bash
git clone git@github.com:Bellal22/YashryTask.git
cd YashryTask
```

- Go to the project path and configure your environment:
    - Copy the `.env.example` file to `.env`:
        ```bash
        cd ./YashryTask
    
        cp .env.example .env
        ```
    - Configure the database in your `.env` file:
        ```dotenv
        DB_DATABASE=yashry
        DB_USERNAME=root
        DB_PASSWORD=
        ```
    - Install composer packages using the following command:
        ```bash
        composer install
        ```
    - Generate the project key using the following artisan command:
        ```bash
        php artisan key:generate
        php artisan serve
        ```
    - Go to your browser and visit: [http://localhost:8000](http://localhost:8000)
### 2 - Application Usage
- Application has Build TO Serve RESTFUL APIs, Although Only one POST request has been developed to cover the required functionality.  
- **Two Ways to use:**
    - POSTMAN:
        - ```` 
          https://www.getpostman.com/collections/280fdb05bcfedb18b794
          ````
    - Unit test:
      - ````
        php artisan test
        ````
    
### 3 - Application Architecture
For Feeling Comfort I've Decided to work with <b>Laravel Framework</b> . 
- **MVP Structure:**
  - reasons: suite to task type which have data, logic layer and resource.
- **Array based data source:**
    - reasons: Simplicity, Nice Designed and Easy to use with low cost on memory.
  - Location: Following Framework-Structure => Config/constants.php.
- **Form Request Validation:**
    - reasons: easy to code, reusable and has rules and custom messages which I do not need more. 
- **Security:**
  - The Task Needs no security Which it demands on Create Cart Which any user has authority to create before Checkout.
- **Repository Design Pattern:**
  - reasons: 
    - testability, Which Business and data access logic can be tested separately. 
    - Centralization of the data access logic makes code easier to maintain
    - Reduces duplication of code.
    - structure:
      - ````
        `app
        ```Reposatory
        ````Eloquent
        ''''''InvoiceRepository.php
        ''''''BaseRepository.php
        ''''InvoiceRepositoryInterface.php
        ''''EloquentRepositoryInterface.php
        ````
      -  Bind Dependencies On boot __RepositoryServiceProvider.php__
- **Not Used Design Patterns:**
  - Strategy Design Pattern:
    - Need: On Select The Suit _Offer_.
    - reason to use:
      - super organized and clean to expand (open-close Principle). 
    - reason not to use:
      - Multiple File Structures and Dependencies.
      - Complex logic on select multi Instance.
      - over development on simple task.
  - Decorator Design Pattern
    - Need: On Select The Suit _Offer_.
    - reason to use:
      - it does the job directly.
      - easy to develop.
    - reason not to use:
      - ambiguous when we have multi instance, bad to expand.
