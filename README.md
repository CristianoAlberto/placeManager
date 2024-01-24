<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Place manager API

This is a simple API for managing places.

## Functionalities

- [x] Create place
- [x] Edit a place
- [x] Get a specific place
- [x] List places and filter them by name

## Technology Used

- Laravel 10

## Pré-requisitos

- [Php 8.3](https://windows.php.net/download#php-8.3)
- [Visual Studio](https://visualstudio.microsoft.com/) or another code editor
- [Composer](https://getcomposer.org/download/)
- [Laravel 10](https://laravel.com/docs/10.x/installation)

## Environment Setting

1. **Clone this repository:**

    ```bash
    git clone https://github.com/CristianoAlberto/placeManager.git
    cd placeManager
    ```

2. **MySQL Database Configuration:**

   Before running the API, you need to set up a MySQL instance for the database. Follow the steps below:

   2.1. **MySQL Installation:**
      Make sure you have MySQL installed on your machine. You can download it [here](https://dev.mysql.com/downloads/mysql/).

3. **Run the Project:**

    ```bash
    php artisan migrate
    php artisan serve
    ```

## Usage Examples

### List places and filter them by name
```http
Endpoint: GET /places
Content-Type: application/json
OptionalParameters: name(string), filters the results based on the provided name
ExampleUsagewithNameQuery: GET /places?name=DesiredName
```

### Create a new place
```http
Endpoint: POST /createPlace
Content-Type: application/json
Body:
{
  "name": "Copacabana",
  "city": "Rio de Janeiro",
  "state": "Rio de Janeiro"
}
```
### Update information for a place
```http
Endpoint: PUT /placeUpdate/{id}
Content-Type: application/json
Body:
{  
    "name": "Praia do Forte",
    "city": "Mata de São João",
    "state": "Bahia"
}
```
### Find a place by ID
```http
Endpoint: GET /findPlace/{id}
Content-Type: application/json
```

**This comprehensive guide makes it easy to set up your environment, including installing MySQL. If you have any questions or issues, please feel free to get in touch. 🚀✨**
