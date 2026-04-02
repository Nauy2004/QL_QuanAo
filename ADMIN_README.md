# Clothing Store Admin Dashboard

A modern, iOS 16-style admin dashboard for managing a clothing e-commerce store built with Laravel and TailwindCSS.

## Features

### 🧠 Core Features
- **Dashboard**: Revenue overview, order statistics, best-selling products with charts
- **Product Management**: CRUD operations with sizes, colors, images, and stock tracking
- **Order Management**: Order list with status updates (Pending, Shipping, Completed, Cancelled)
- **Customer Management**: Customer information and purchase history
- **Inventory Management**: Stock tracking with low-stock alerts
- **Authentication & Roles**: Admin/Staff login system

### 🎨 UI/UX Features (iOS 16 Style)
- Clean, minimal design with large rounded corners (16-24px border-radius)
- Glassmorphism effects with blurred backgrounds
- Soft shadows and smooth animations
- Apple-style typography (SF Pro)
- iOS blue (#007AFF) primary color
- Background: #F5F5F7
- Responsive design

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd clothing-store-admin
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   # Configure your database in .env file
   php artisan migrate
   php artisan db:seed
   ```

5. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

6. **Start the server**
   ```bash
   php artisan serve
   ```

## Admin Access

### Default Admin Account
- **Email**: admin@example.com
- **Password**: password

### Default Staff Account
- **Email**: staff@example.com
- **Password**: password

Access the admin panel at: `http://localhost:8000/admin/login`

## Project Structure

```
app/
├── Http/Controllers/Admin/     # Admin controllers
├── Models/                     # Eloquent models
database/
├── migrations/                 # Database migrations
├── seeders/                    # Database seeders
resources/
├── views/
│   ├── admin/                  # Admin Blade templates
│   │   ├── layouts/           # Admin layout
│   │   ├── auth/              # Authentication views
│   │   ├── dashboard/         # Dashboard views
│   │   ├── products/          # Product management
│   │   ├── orders/            # Order management
│   │   ├── customers/         # Customer management
│   │   └── inventory/         # Inventory management
routes/
├── web.php                     # Web routes including admin routes
```

## Key Features Implementation

### Authentication
- Role-based access (Admin/Staff)
- Session-based authentication
- Protected admin routes

### Product Management
- Image upload with validation
- Size and color attributes (stored as JSON)
- Category relationships
- Search and filtering

### Order Management
- Status updates via AJAX
- Order details with product relationships
- Customer information tracking

### Dashboard Analytics
- Monthly revenue charts (Chart.js)
- Best-selling products
- Real-time statistics
- Recent orders overview

### Inventory Management
- Stock level monitoring
- Low stock alerts
- Inline stock updates
- Inventory value calculations

## API Endpoints

### Admin Routes (prefix: `/admin`)
- `GET /admin/login` - Login form
- `POST /admin/login` - Authenticate
- `POST /admin/logout` - Logout
- `GET /admin/dashboard` - Dashboard
- `GET /admin/products` - Product list
- `GET /admin/products/create` - Create product form
- `POST /admin/products` - Store product
- `GET /admin/products/{id}/edit` - Edit product form
- `PUT /admin/products/{id}` - Update product
- `DELETE /admin/products/{id}` - Delete product
- `GET /admin/orders` - Order list
- `PATCH /admin/orders/{id}/status` - Update order status
- `GET /admin/customers` - Customer list
- `GET /admin/inventory` - Inventory management

## Technologies Used

- **Backend**: Laravel 12
- **Frontend**: Blade templates with TailwindCSS
- **Database**: MySQL
- **Charts**: Chart.js
- **Icons**: Heroicons (via SVG)
- **Styling**: Custom TailwindCSS with iOS-style utilities

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is licensed under the MIT License.