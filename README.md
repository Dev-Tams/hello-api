# Hello API

This is a basic Laravel project that exposes an API endpoint to greet visitors, show their IP address, city location, and the current temperature in that city.

## Features

- Expose an API endpoint to greet visitors.
- Retrieve the client's IP address and location.
- Fetch the current temperature for the client's location.

## Requirements

- PHP 7.4 or higher
- Composer
- Laravel 8 or higher
- API key for a weather service (e.g., OpenWeatherMap)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/hello-api.git
   cd hello-api

2. **Install dependencies:**
     ```bash
    composer install

3. **Setup Environment:**
    ```bash
    WEATHER_API_KEY=your_api_key_here

4. **Generate application key:**
    ```bash
    php artisan key:generate

5. **Usage:**
 - Run the development server:
    ```bash
    php artisan serve

6. **Access the API endpoint:**
    Open your browser and go to:
``arduino
http://127.0.0.1:8000/api/hello

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
