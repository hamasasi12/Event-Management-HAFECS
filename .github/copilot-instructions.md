# Copilot Instructions for Event-Management-HAFECS

## Project Overview
This is a Laravel-based event management system for HAFECS, supporting seminar registration, payment, and user dashboard features. The architecture leverages Laravel's MVC conventions, Eloquent ORM, Blade templating, and artisan commands.

## Key Components
- **app/Models/**: Eloquent models for core entities (User, Seminar, Payment, SeminarRegistration, etc.)
- **app/Http/Controllers/**: Handles web requests, business logic, and data flow between models and views
- **app/Livewire/**: Livewire components for interactive UI features
- **app/Mail/**: Mailable classes for email notifications
- **app/Events/** & **app/Notifications/**: Event-driven logic and notification delivery
- **resources/views/**: Blade templates for user and admin dashboards, payment flows, and seminar details
- **routes/web.php**: Main web routes; **routes/console.php** for artisan commands
- **config/**: Custom configuration (e.g., midtrans.php for payment gateway)

## Developer Workflows
- **Install dependencies**: `composer install` (PHP), `npm install` (JS/CSS)
- **Run server**: `php artisan serve` (Laravel dev server)
- **Build assets**: `npm run dev` (Vite)
- **Run tests**: `php artisan test` or `vendor/bin/pest`
- **Migrate DB**: `php artisan migrate` (see `database/migrations/`)
- **Seed DB**: `php artisan db:seed`

## Patterns & Conventions
- **Blade templates** use Tailwind CSS and custom styles for UI consistency
- **Livewire** is used for dynamic frontend features (see `app/Livewire/`)
- **Payment integration** via Midtrans (see `config/midtrans.php` and related controllers)
- **Event-driven**: Payment events trigger notifications and emails (see `app/Events/PaymentSuccessful.php`)
- **Custom artisan commands** in `app/Console/Commands/`
- **Environment config**: Use `.env` for secrets and environment-specific settings

## Integration Points
- **Midtrans**: Payment gateway integration (API keys/config in `config/midtrans.php`)
- **Email**: Uses Laravel's mail system, with custom mailables in `app/Mail/`
- **Notifications**: Laravel notification system for transaction updates

## Examples
- To add a new seminar, create a migration/model in `app/Models/Seminar.php`, update `database/migrations/`, and add Blade views in `resources/views/seminars/`
- For new payment flows, update controllers in `app/Http/Controllers/PaymentsController.php` and Blade templates in `resources/views/payments/`

## References
- [Laravel Docs](https://laravel.com/docs)
- [Livewire Docs](https://livewire.laravel.com/docs)
- [Midtrans Docs](https://docs.midtrans.com/)

---
For questions about unclear conventions or missing documentation, ask for clarification or review the README.md and config files.