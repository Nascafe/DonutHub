# 🍩 DonutHub Management System

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-cyan)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📌 Project Information

| Field | Details |
|-------|---------|
| **Course** | INFO 3305 — Web Application Development |
| **Section** | 02 |
| **Group Name** | Tung Tung Tung S-Sahur |
| **Topic** | Food and Beverages |
| **Project Title** | DonutHub Management System |
| **Lecturer** | Asst. Prof. Nor Azura Binti Kamarulzaman |
| **Faculty** | Kulliyyah of Information and Communication Technology |
| **University** | International Islamic University Malaysia (IIUM) |

### 👥 Group Members

| No. | Name | Matric No. |
|-----|------|------------|
| 1. | ABANG MOHAMAD NADSREEN BIN ABANG ADRUS | 2314113 |
| 2. | CHE MUHAMMAD QALIFF ZULHAKEEM BIN CHE ROHIN | 2312159 |
| 3. | ANHA AYAMON | 2316026 |
| 4. | MUJIPIR RAHMAN SAHAR MALIKA PARVIN | 2319594 |
| 5. | ASMA ESMAIL ALMRHAM | 2212282 |
| 6. | HARIZ IMRAN BIN MUHAMMAD HANAFIS | 2316687 |

🎥 **Presentation Video:** https://youtu.be/yrNaXPOTnsk

---

## 📖 Table of Contents

1. [Project Overview](#-project-overview)
2. [Project Objectives](#-project-objectives)
3. [Target Users](#-target-users)
4. [Features and Functionalities](#-features-and-functionalities)
5. [Technical Implementation](#-technical-implementation)
6. [Laravel Component Implementation](#-laravel-component-implementation)
7. [User Authentication System](#-user-authentication-system)
8. [Installation and Setup Instructions](#-installation-and-setup-instructions)
9. [Project Structure](#-project-structure)
10. [Testing and Quality Assurance](#-testing-and-quality-assurance)
11. [Challenges Faced and Solutions](#-challenges-faced-and-solutions)
12. [Future Enhancements](#-future-enhancements)
13. [Learning Outcomes](#-learning-outcomes)
14. [References](#-references)
15. [Conclusion](#-conclusion)

---

## 🌟 Project Overview

**DonutHub** is a web-based donut shop management system developed using the **Laravel MVC framework** to streamline both customer interactions and business operations. The application provides an online platform where customers can browse categorized donut menus, add items to a cart, and place orders — whether for walk-in or online purchases.

At the same time, it enables administrators and staff to efficiently manage their products, categories, orders, and overall shop activities through a centralized system. By digitizing these processes, DonutHub improves service speed, which enhances the overall user experience for both customers and shop management.

The system features a modern, responsive interface designed with a warm donut-themed color palette (vibrant orange `#FF4E02` and rich brown `#4A3220`), giving users a delightful, appetizing experience as they explore freshly made donuts.

---

## 🎯 Project Objectives

The main objective of DonutHub is to create an efficient and user-friendly system that simplifies donut shop operations while enhancing customer convenience.

- **Primary Goal:** Build a functional donut ordering platform that connects customers with the shop seamlessly.
- **Technical Goal:** Implement Laravel MVC architecture with full CRUD operations on donuts, orders, carts, and reviews.
- **User Experience Goal:** Provide an intuitive, responsive, and visually appealing interface for customers, staff, and admins.
- **Business Goal:** Enable real-time cart management, smooth order tracking, and efficient inventory monitoring.
- **Operational Goal:** Reduce errors in order handling and deliver a modern digital experience that supports business growth and customer satisfaction.

---

## 👤 Target Users

DonutHub is designed for three primary user roles:

- **Customers** — Individuals who want to browse donut menus, place orders online, track delivery progress, and leave reviews.
- **Staff** — Shop employees who handle daily operations such as updating order status, managing stock, and processing walk-in orders.
- **Administrators** — System managers who oversee the entire platform, manage user accounts, organize menu categories, and access sales analytics.

---

## ✨ Features and Functionalities

### 🛍️ Customer Features

- **User Registration & Login** — Secure account creation with email validation and password confirmation.
- **Donut Browsing** — View all available donuts with images, descriptions, and prices.
- **Category Filtering** — Browse donuts by category (e.g., Classic, Limited Edition, Box Sets).
- **Shopping Cart** — Add, update, or remove items; modify quantities; view total cost in real time.
- **Box Set Selection** — Choose from curated bundles: *Party of Three*, *Half-Dozen Box*, or *The Dozen Box*.
- **Secure Checkout** — Place orders with order confirmation and payment processing.
- **Order Tracking** — View real-time status updates (Pending → Preparing → Ready → Completed).
- **Order History** — Access previous orders for reference and reordering convenience.
- **Review System** — Leave star ratings and written feedback to share donut experiences.
- **Profile Management** — Update personal details and password securely.

### 👨‍🍳 Staff Features

- **Order Queue Dashboard** — View all incoming orders in real time.
- **Order Status Updates** — Change order status as it progresses through preparation stages.
- **Stock Management** — Update donut availability and inventory levels.
- **Walk-In Order Processing** — Create manual orders for in-store customers, integrating walk-in and online operations.

### 👑 Admin Features

- **Admin Dashboard** — Overview of total orders, revenue, top-selling donuts, and recent activity.
- **User Management** — Create, view, edit, or remove customer and staff accounts.
- **Menu Management (CRUD)** — Add, edit, or delete donut items with images, descriptions, and prices.
- **Category Management** — Organize donut categories to keep the menu structured and navigable.
- **Order Management** — Monitor and update all orders (online and walk-in).
- **Sales Reports & Analytics** — Generate insights on revenue trends, popular items, and overall performance.

---

## 🛠 Technical Implementation

### 🧱 Technology Stack

| Layer | Technology |
|-------|------------|
| **Backend Framework** | Laravel 10.x |
| **Programming Language** | PHP 8.1+ |
| **Frontend** | Blade Templates + Tailwind CSS 3.x |
| **Database** | MySQL 8.0 |
| **Authentication** | Laravel Breeze |
| **Asset Bundler** | Vite |
| **File Storage** | Laravel File Storage (public disk) |
| **Version Control** | Git & GitHub |
| **Development Environment** | XAMPP / Laravel Sail |

### 🗄️ Database Design

The DonutHub database is designed around six core tables that manage users, products, transactions, and payments.

#### Core Tables

| Table | Purpose |
|-------|---------|
| `users` | Stores customer, staff, and admin accounts (with role field) |
| `donuts` | Holds donut details — category, name, description, price, stock |
| `cart` | Tracks items added to each user's cart |
| `orders` | Records customer orders (total, type, status) |
| `order_items` | Stores individual items within each order |
| `payment` | Manages payment records (amount, method, status) |

#### Entity Relationship Diagram (ERD)

```
┌───────────────┐         ┌───────────────┐
│     Users     │1───────*│     Cart      │
│───────────────│         │───────────────│
│ PK user_id    │         │ PK id         │
│ name          │         │ FK user_id    │
│ email         │         │ FK donut_id   │
│ password      │         │ quantity      │
└───────┬───────┘         └───────┬───────┘
        │                         │
        │1                        │*
        │                         │
        │*                        ▼
┌───────▼───────┐         ┌───────────────┐
│    Orders     │         │    Donuts     │
│───────────────│1───────*│───────────────│
│ PK order_id   │         │ PK donut_id   │
│ FK user_id    │         │ category      │
│ total         │         │ dname         │
│ type          │         │ ddescription  │
└───────┬───────┘         │ dprice        │
        │                 │ dstock        │
        │1                └───────▲───────┘
        │                         │
        │*                        │*
┌───────▼───────┐         ┌───────┴───────┐
│   Payment     │         │  order_items  │
│───────────────│         │───────────────│
│ PK payment_id │         │ FK order_id   │
│ FK order_id   │         │ FK donut_id   │
│ payamount     │         │ quantity      │
│ paymethod     │         └───────────────┘
│ paystatus     │
└───────────────┘
```

#### Key Relationships

- **Users → Orders:** One-to-Many (a user can place multiple orders)
- **Users → Cart:** One-to-Many (a user can add multiple items to cart)
- **Orders → Order Items:** One-to-Many (an order contains multiple donut items)
- **Donuts → Order Items:** One-to-Many (a donut can appear in many orders)
- **Orders → Payment:** One-to-One (each order has one payment record)
- **Donuts → Cart:** One-to-Many (a donut can be added to multiple users' carts)

---

## ⚙️ Laravel Component Implementation

### 🛣️ Routes (`routes/web.php`)

The application uses well-organized RESTful routes grouped by access level:

```php
// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/category/{category}', [MenuController::class, 'category'])->name('menu.category');
Route::get('/menu/{donut}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// Authenticated routes (customer)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{donut}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/item/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/item/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Admin/Staff routes
    Route::middleware('role:admin,staff')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    });
});

require __DIR__.'/auth.php';
```

### 🎮 Controllers

The system implements the following main controllers:

| Controller | Responsibility |
|------------|----------------|
| `HomeController` | Manages homepage, about page, and landing display |
| `MenuController` | Displays donut menu, individual items, and category filtering |
| `CartController` | Handles add/remove/update operations on the shopping cart |
| `CheckoutController` | Processes checkout submissions and creates orders |
| `OrderController` | Manages customer order history and details |
| `ReviewController` | Handles customer reviews and feedback |
| `ProfileController` | Manages user profile editing, updates, and deletion |
| `Admin\DashboardController` | Provides analytics overview for admin/staff |
| `Admin\OrderController` | Manages all incoming orders with status updates |
| `Admin\ReportController` | Generates sales reports and insights |

### 🧬 Models and Relationships

```php
// User Model
class User extends Authenticatable {
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
    public function isAdmin() {
        return $this->role === 'admin';
    }
    public function isStaff() {
        return $this->role === 'staff';
    }
}

// Donut Model
class Donut extends Model {
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}

// Order Model
class Order extends Model {
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
```

### 🖼️ Views and User Interface

#### Blade Templates Structure

```
resources/views/
├── layouts/
│   ├── storefront.blade.php       # Public-facing main layout
│   └── admin.blade.php            # Admin dashboard layout
├── home.blade.php                 # Homepage with hero & box sets
├── about.blade.php                # About DonutHub page
├── menu/
│   ├── index.blade.php            # Full donut menu
│   └── show.blade.php             # Individual donut detail
├── cart/
│   └── index.blade.php            # Shopping cart
├── orders/
│   ├── index.blade.php            # Order history
│   └── show.blade.php             # Order details & tracking
├── reviews/
│   └── index.blade.php            # Customer reviews
├── admin/
│   ├── dashboard.blade.php        # Admin analytics dashboard
│   ├── orders/                    # Admin order management
│   └── reports/                   # Sales reports
└── auth/
    ├── login.blade.php            # Login (custom themed)
    ├── register.blade.php         # Registration
    ├── forgot-password.blade.php  # Password recovery
    ├── reset-password.blade.php   # Password reset
    └── verify-email.blade.php     # Email verification
```

#### Design Features

- **Responsive Design** — Built mobile-first using Tailwind CSS utility classes for seamless display across devices.
- **Warm Color Palette** — Signature donut-themed colors: orange (`#FF4E02`), brown (`#4A3220`), and cream (`#F1E8DF`).
- **Interactive Elements** — Hover animations on donut cards, smooth scale transforms, and dynamic cart updates.
- **Custom Typography** — Bold display headings paired with clean body fonts for a playful yet professional feel.
- **Themed Authentication** — Custom-designed login page with branded background and circular avatar.
- **Decorative Visuals** — SVG patterns, wavy backgrounds, and circular donut ring motifs reinforcing the brand identity.

---

## 🔐 User Authentication System

### Authentication Features

- **Registration System** — Email validation, password confirmation, and automatic role assignment (customer by default).
- **Login System** — Secure session-based authentication with "Remember Me" support.
- **Password Reset** — Email-based password recovery using Laravel's signed token system.
- **Email Verification** — Optional email verification for new accounts.
- **Password Confirmation** — Secure-area re-confirmation for sensitive operations.
- **Role-Based Access Control** — Three roles (`customer`, `staff`, `admin`) with middleware-enforced routing.
- **Profile Management** — Users can update name, email, and password from their profile page.

### Security Measures

- 🔒 **Password Hashing** — Passwords are hashed using Laravel's built-in `Hash` facade (Bcrypt).
- 🛡 **CSRF Protection** — All forms include `@csrf` directives to prevent cross-site request forgery.
- ✅ **Input Validation** — Server-side validation rules guard against invalid or malicious input.
- 🚫 **SQL Injection Prevention** — Eloquent ORM and query bindings prevent injection attacks.
- 🔐 **Middleware Protection** — Authenticated routes use `auth` middleware; admin routes use `role:admin,staff`.
- ⏱ **Rate Limiting** — Throttling on login attempts (`throttle:6,1`) and verification requests.
- 🔑 **Signed URLs** — Email verification links use signed URLs to prevent tampering.

---

## 🚀 Installation and Setup Instructions

### Prerequisites

Make sure your system has the following installed:

- **PHP** >= 8.1
- **Composer** (latest version)
- **Node.js** >= 16 and **NPM** >= 8
- **MySQL** 8.0 (or MariaDB equivalent)
- **XAMPP** / **Laragon** / **Laravel Sail** for local development
- **Git** for version control

### Step-by-Step Installation

#### 1️⃣ Clone the Repository

```bash
git clone https://github.com/[your-username]/DonutHub.git
cd DonutHub
```

#### 2️⃣ Install PHP Dependencies

```bash
composer install
```

#### 3️⃣ Install Node Dependencies

```bash
npm install
```

#### 4️⃣ Set Up Environment File

```bash
cp .env.example .env
php artisan key:generate
```

#### 5️⃣ Configure Database

Open the `.env` file and update the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=donuthub
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in phpMyAdmin or via MySQL CLI:

```sql
CREATE DATABASE donuthub;
```

#### 6️⃣ Run Migrations and Seeders

```bash
php artisan migrate
php artisan db:seed
```

This will set up all tables and seed default data (donuts, categories, admin user, etc.).

#### 7️⃣ Create Symbolic Link for Storage

```bash
php artisan storage:link
```

#### 8️⃣ Build Frontend Assets

```bash
npm run build
```

For development mode with hot reload:

```bash
npm run dev
```

#### 9️⃣ Start the Development Server

```bash
php artisan serve
```

The application will be accessible at **http://127.0.0.1:8000**.

### Default Test Accounts

After seeding, use these credentials to log in:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@donuthub.com | password |
| Staff | staff@donuthub.com | password |
| Customer | customer@donuthub.com | password |

---

## 📂 Project Structure

```
DonutHub/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                  # Laravel Breeze auth controllers
│   │   │   ├── Admin/                 # Admin-specific controllers
│   │   │   ├── HomeController.php
│   │   │   ├── MenuController.php
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php
│   │   │   ├── OrderController.php
│   │   │   ├── ReviewController.php
│   │   │   └── ProfileController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php     # Role-based access control
│   ├── Models/
│   │   ├── User.php
│   │   ├── Donut.php
│   │   ├── Category.php
│   │   ├── Cart.php
│   │   ├── Order.php
│   │   ├── OrderItem.php
│   │   ├── Payment.php
│   │   └── Review.php
│   └── Providers/
├── database/
│   ├── migrations/                    # Database schema files
│   ├── seeders/                       # Default data seeders
│   └── factories/                     # Model factories for testing
├── public/
│   └── images/
│       └── donuts/                    # Donut product images
├── resources/
│   ├── views/                         # Blade templates
│   ├── css/                           # Tailwind styles
│   └── js/                            # JavaScript files
├── routes/
│   ├── web.php                        # Main web routes
│   ├── auth.php                       # Authentication routes
│   └── console.php                    # Artisan console commands
├── tests/
│   ├── Feature/                       # Feature tests
│   └── Unit/                          # Unit tests
├── .env.example                       # Environment template
├── composer.json                      # PHP dependencies
├── package.json                       # Node dependencies
├── tailwind.config.js                 # Tailwind configuration
├── vite.config.js                     # Vite bundler config
└── README.md                          # This file
```

---

## 🧪 Testing and Quality Assurance

### Functionality Testing

The following test scenarios were verified manually and via automated Laravel tests:

- ✅ User registration with email validation
- ✅ Login and logout flow
- ✅ Password reset via email link
- ✅ Donut menu browsing and category filtering
- ✅ Adding, updating, and removing cart items
- ✅ Quantity adjustment and total recalculation
- ✅ Checkout process and order creation
- ✅ Order status tracking and display
- ✅ Admin/staff role-based route access
- ✅ Admin CRUD operations on donuts
- ✅ Order status updates from admin panel
- ✅ Review submission and display
- ✅ Profile editing and password change
- ✅ Responsive design across screen sizes

### Browser Compatibility

The application was tested and confirmed working on:

| Browser | Version | Status |
|---------|---------|--------|
| Google Chrome | Latest | ✅ Pass |
| Mozilla Firefox | Latest | ✅ Pass |
| Microsoft Edge | Latest | ✅ Pass |
| Safari | Latest | ✅ Pass |
| Opera | Latest | ✅ Pass |

### Performance Testing

- ⚡ Average page load time under **3 seconds** on local environment.
- 🗄 Database queries optimized using **Eloquent eager loading** to prevent N+1 problems.
- 🖼 Donut images compressed and served from optimized public storage.
- 📱 Responsive layout tested on multiple screen sizes (mobile, tablet, desktop).
- 🎨 Tailwind CSS purged for production builds to minimize CSS file size.

---

## 💪 Challenges Faced and Solutions

### Challenge 1: Managing Cart State for Guests vs. Authenticated Users

- **Problem:** Determining how the cart should behave when a guest user adds items before logging in.
- **Solution:** Restricted cart functionality to authenticated users only by wrapping cart routes in the `auth` middleware. Guests are prompted to log in or register before adding items, ensuring data consistency.

### Challenge 2: Role-Based Access Control for Multiple Roles

- **Problem:** Implementing different dashboards and permissions for customer, staff, and admin roles within a single authentication system.
- **Solution:** Created a custom `RoleMiddleware` that accepts multiple role parameters (e.g., `role:admin,staff`) and checks the authenticated user's `role` field before granting access. The dashboard route uses conditional redirection based on user role.

### Challenge 3: Complex Order-Item Relationships

- **Problem:** Managing relationships where an order contains multiple donuts, each with its own quantity and price snapshot.
- **Solution:** Created an `order_items` pivot-like table that stores `order_id`, `donut_id`, `quantity`, and a price snapshot, allowing accurate historical order data even if donut prices change later.

### Challenge 4: Real-Time Cart Updates Without Page Reload

- **Problem:** Updating cart quantities and totals dynamically when users change item counts.
- **Solution:** Used Laravel's PATCH/DELETE routes with form submissions and Blade re-rendering. The cart total is recalculated server-side on each update, ensuring accuracy without complex JavaScript state management.

### Challenge 5: Designing a Cohesive Visual Identity

- **Problem:** Creating an interface that feels warm, playful, and on-brand for a donut shop while remaining professional and usable.
- **Solution:** Established a fixed color palette (orange `#FF4E02`, brown `#4A3220`, cream `#F1E8DF`) and applied Tailwind utility classes consistently. Decorative SVG elements (circular ring patterns, wavy backgrounds) reinforce the donut theme.

### Challenge 6: Coordinating Team Collaboration Across 6 Members

- **Problem:** Avoiding merge conflicts and overlapping work in a large team.
- **Solution:** Adopted feature-branch Git workflow, with each member working on isolated modules (auth, menu, cart, admin, etc.). Used GitHub pull requests for code review and merging into the main branch.

---

## 🔮 Future Enhancements

### Phase 2 Potential Improvements

- 💳 **Payment Gateway Integration** — Integrate Stripe, PayPal, or local Malaysian gateways (FPX, Touch 'n Go eWallet).
- 📲 **Real-Time Notifications** — Push notifications and live order status updates using Laravel Echo and Pusher.
- 📍 **Delivery Tracking** — GPS-based real-time delivery tracking with Google Maps integration.
- ⭐ **Advanced Review System** — Photo uploads, verified purchase tags, and helpful-vote functionality.
- 📊 **Advanced Analytics** — Sales charts (using Chart.js), customer behavior insights, and inventory forecasting.
- 🎁 **Loyalty & Rewards Program** — Points system, referral codes, and member-exclusive discounts.
- 📱 **Native Mobile App** — Build iOS and Android apps using Flutter or React Native, connected via Laravel API.
- 🤖 **AI-Powered Recommendations** — Suggest donuts based on order history and preferences.
- 🌐 **Multi-Language Support** — Add Malay, Mandarin, and Arabic translations for broader accessibility.
- 🏪 **Multi-Branch Support** — Allow multiple physical store locations to use the same system.

### Scalability Considerations

- Implement **Redis caching** for frequently accessed data (menu, popular items).
- Optimize database with **indexes** on commonly queried fields (user_id, order_id, status).
- Set up a **CDN** (Cloudflare, AWS CloudFront) for serving images and static assets.
- Consider **load balancing** for high-traffic scenarios.
- Build a **public REST API** to support mobile apps and third-party integrations.

---

## 🎓 Learning Outcomes

### Technical Skills Gained

- **Laravel Framework Mastery** — MVC architecture, Eloquent ORM, Blade templating, middleware, and routing.
- **Database Design** — Designing normalized relational schemas with proper foreign-key relationships.
- **Authentication Systems** — Building secure login, registration, and role-based access using Laravel Breeze.
- **Frontend Development** — Crafting responsive, modern UIs with Tailwind CSS utility-first methodology.
- **RESTful Design** — Implementing resource-based routes following REST conventions.
- **Git & Collaboration** — Branching strategies, pull requests, and resolving merge conflicts in a team setting.
- **Security Best Practices** — CSRF protection, input validation, password hashing, and SQL injection prevention.

### Soft Skills Developed

- **Team Collaboration** — Working effectively in a 6-member group with diverse strengths and schedules.
- **Project Management** — Breaking down a large project into manageable tasks and meeting deadlines.
- **Problem Solving** — Debugging complex issues across the full stack (database, backend, frontend).
- **Communication** — Discussing technical concepts clearly, both within the team and in presentations.
- **Time Management** — Balancing project work with other coursework throughout the semester.
- **Documentation** — Writing clear, structured documentation (this README, code comments, proposal).

### Key Achievements

- ✅ Successfully implemented all required Laravel components (Routes, Controllers, Models, Views).
- ✅ Built a fully functional, multi-role donut shop management system with CRUD operations.
- ✅ Designed a visually distinctive, brand-consistent interface using Tailwind CSS.
- ✅ Demonstrated understanding of complex database relationships (one-to-many, pivot tables).
- ✅ Applied security best practices for authentication, authorization, and input validation.
- ✅ Delivered comprehensive documentation, mockups, and presentation materials.

### Project Impact

This project gave us hands-on experience building a real-world web application from scratch — from initial proposal and ERD design to deployment-ready code. The skills we gained are directly transferable to professional web development roles, internships, and future capstone projects. Working as a team also strengthened our ability to collaborate using industry-standard tools like Git and GitHub.

---

## 📚 References

1. Laravel Documentation. (2024). *Laravel 10.x Documentation*. Retrieved from https://laravel.com/docs/10.x
2. Tailwind CSS Documentation. (2024). *Tailwind CSS 3.x Documentation*. Retrieved from https://tailwindcss.com/docs
3. MySQL Documentation. (2024). *MySQL 8.0 Reference Manual*. Retrieved from https://dev.mysql.com/doc/refman/8.0/en/
4. Laravel Breeze. (2024). *Laravel Breeze Starter Kit*. Retrieved from https://laravel.com/docs/10.x/starter-kits#laravel-breeze
5. MDN Web Docs. (2024). *Web Development Resources*. Retrieved from https://developer.mozilla.org/
6. Stack Overflow. (2024). *Programming Q&A Platform*. Retrieved from https://stackoverflow.com/
7. PHP: The Right Way. (2024). Retrieved from https://phptherightway.com/
8. Eloquent: Relationships. (2024). *Laravel Documentation*. Retrieved from https://laravel.com/docs/10.x/eloquent-relationships

---

## 🏆 Conclusion

**DonutHub** successfully demonstrates the implementation of a comprehensive donut shop management system using the Laravel framework. The project showcases proficiency in essential web development concepts including MVC architecture, relational database design, role-based authentication, RESTful routing, and responsive UI design with Tailwind CSS.

Through this project, our group — **Tung Tung Tung S-Sahur** — gained valuable practical experience in building a real-world web application that connects customers, staff, and administrators in a unified platform. Beyond the technical achievements, we developed important soft skills such as teamwork, project planning, and clear communication that will serve us well in our future careers as developers.

DonutHub stands as a testament to what a dedicated team can accomplish in one semester, and provides a solid foundation for future enhancements such as payment integration, mobile applications, and advanced analytics.

> *"Spreading joy, one glazed ring at a time."* 🍩

---

## 📋 Project Details

- **Course:** INFO 3305 — Web Application Development
- **Section:** 02
- **Semester:** 2025/2026
- **Submission Date:** 9 May 2026
- **Status:** ✅ Completed

---

**© 2026 DonutHub Management System — Group Tung Tung Tung S-Sahur**
*Kulliyyah of Information and Communication Technology, International Islamic University Malaysia*
