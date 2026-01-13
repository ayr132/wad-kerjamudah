<p align="center"><a href="https://www.iium.edu.my/v2/" target="_blank"><img src="public/assets/images/Copy%20of%20IIUM_LOGO_ELEMENTS_TAWHIDIC_FULL_COLOUR-1536x205.png" width="600" alt="IIUM Logo"></a></p>

<h1 align="center">KULLIYYAH OF INFORMATION AND COMMUNICATION TECHNOLOGY</h1>
<h1 align="center">INFO 3305 WEB APPLICATION DEVELOPMENT</h1>
<h2 align="center">SEMESTER 1 2025/2026</h2>
<h2 align="center">SECTION 5</h2>

<!-- <p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

# KerjaMudah

# KerjaMudah - Management: KerjaMudah - Employees Collaboration Portal

## Group Information

**Group Name**: W-hackers
**Section**: 5

**Group Members** :
- Aiman bin Ahmad Zainulkamal - 2311929
- Muhammad Aiman Haziq bin Razali - 2312039
- Mohammad Zaimmudin bin Zaidi - 2319523
- Aris Syazwan bin Zainul Aman  - 2313947

## Project Overview

Introduction :
KerjaMudah a modern, web-based collaboration platform developed to help organizations and institutions manage projects and teamwork more efficiently. The platform provides a centralized digital workspace where teams can collaborate, communicate, share resources, and manage tasks seamlessly. By integrating project management, resource sharing, and communication tools into a single system, KerjaMudah minimizes workflow disruptions, improves productivity, and enhances team coordination. Designed with simplicity and scalability in mind, KerjaMudah supports organizations in streamlining operations, improving collaboration efficiency, and achieving better project outcomes.


## Project Objectives

The primary objective of KerjaMudah is to deliver a centralized collaboration platform that enhances teamwork and project coordination within organizations. It aims to improve communication and transparency among team members through structured task management and discussion tools. KerjaMudah also seeks to simplify the sharing, organization, and accessibility of project-related resources. Additionally, the platform is designed to optimize time management, reduce operational inefficiencies, and support organizations in delivering projects more effectively, on time, and within scope.

## Target Users


## Features and Functionalities

- User Management : Users can register, log in, and manage their profiles securely, with role-based access to ensure proper project control.

- Project Management  : Create, update, and manage projects efficiently, allowing teams to track progress and maintain clear ownership.

- Task Assignment : Assign tasks to team members with defined deadlines, priorities, and real-time status updates to ensure accountability.

- Resource Sharing : Upload, organize, and manage project-related files such as documents, links, and reference materials in a centralized repository.

- Discussion Threads : Engage in structured discussions through comment threads within each project to ensure clear communication and reduced misinterpretation. 


## Technical Implementation

** Technology Stack**

- Backend Framework: Laravel 10.x
- Frontend: Blade Templates with Bootstrap 5
- Database: MySQL 8.0
- Authentication: Laravel Breeze
- Image Storage: Laravel File Storage
- Development Environment: XAMPP

** Database Design**

<!-- Database Schema Overview
Our database consists of [X] main tables designed to handle users, restaurants, menus, orders, and related data:
Core Tables:

- users - Customer and restaurant owner accounts
- restaurants - Restaurant information and details
- menu_items - Food items with pricing and descriptions
- orders - Customer order records
- order_items - Individual items within each order
- categories - Food categories for menu organization -->

### Entity Relationship Diagram (ERD)

link

Key Relationships:

<!-- - Users can have multiple Orders (One-to-Many)
- Restaurants can have multiple Menu Items (One-to-Many)
- Orders can have multiple Order Items (One-to-Many)
- Menu Items belong to Categories (Many-to-One) -->

** Laravel Components Implementation**

- Routes (Web.php)
  
<!-- php
`// Authentication Routes`
Auth::routes();

`// Public Routes`
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');

`// Customer Protected Routes`
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::resource('orders', OrderController::class);
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
});

`// Restaurant Owner Protected Routes`
Route::middleware(['auth', 'restaurant'])->group(function () {
    Route::get('/restaurant/dashboard', [RestaurantOwnerController::class, 'dashboard'])->name('restaurant.dashboard');
    Route::resource('menu-items', MenuItemController::class);
}); -->

- Controllers
  
  <!-- *Main Controllers Implemented are below :*

  1. HomeController: Handles homepage display and restaurant listings
  2. RestaurantController: Manages restaurant information and menu display
  3. OrderController: Processes order creation, tracking, and management
  4. MenuItemController: Handles CRUD operations for menu items
  5. CartController: Manages shopping cart functionality
  6. CustomerController: Customer dashboard and profile management
  7. RestaurantOwnerController: Restaurant owner dashboard and analytics -->

- Models and Relationships
  
<!-- php// User Model
class User extends Authenticatable {
    public function orders() {
        return $this->hasMany(Order::class);
    }
    
    public function restaurant() {
        return $this->hasOne(Restaurant::class);
    }
}

// Restaurant Model  
class Restaurant extends Model {
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function menuItems() {
        return $this->hasMany(MenuItem::class);
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
} -->

- Views and User Interface

  <!-- *Blade Templates Structure:*
  - layouts/app.blade.php - Main application layout
  - home.blade.php - Homepage with restaurant listings
  - restaurants/index.blade.php - Restaurant browsing page
  - restaurants/show.blade.php - Individual restaurant menu
  - orders/create.blade.php - Order placement form
  - dashboard/customer.blade.php - Customer dashboard
  - dashboard/restaurant.blade.php - Restaurant owner dashboard

   *Design Features:*
   - Responsive Design: Bootstrap 5 for mobile-first approach
   - Color Scheme: Modern orange and white theme representing food industry
   - Navigation: Intuitive menu structure with user role-based options
   - Interactive Elements: Dynamic cart updates, real-time order tracking -->


## User Authentication System

### ** Authentication Features**
<!-- - **Registration System**: Email validation, password confirmation, role selection
- **Login System**: Secure authentication with "Remember Me" option
- **Password Reset**: Email-based password recovery system
- **Role-Based Access**: Different dashboards for customers and restaurant owners as admin
- **Profile Management**: Users can update their information and preferences

### **Security Measures**
- Password encryption using Laravel's built-in hashing
- CSRF protection on all forms
- Input validation and sanitization
- Middleware protection for authenticated routes -->


## Installation and Setup Instructions
### Prerequisites :
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 8.0
- XAMPP 

### Step-by-Step Installation

1. Clone the Repository

bash/n
git clone https://github.com/ayr132/wad-kerjamudah.git/n
cd QuickPlate

2. Install Dependencies

bashcomposer install
npm install

3. Environment Configuration

bashcp .env.example .env
php artisan key:generate

4. Database Setup

bash# Configure database in .env file
php artisan migrate
php artisan db:seed

5. Start Development Server

bashphp artisan serve
npm run dev

## Testing and Quality Assurance

###  Functionality Testing

 <!-- - User registration and login system
 - Restaurant browsing and menu display
 - Shopping cart add/remove functionality
 - Order placement and confirmation
 - Order status tracking
 - Restaurant owner menu management
 - Admin user management
 - Responsive design across devices -->

### Browser Compatibility

<!-- -  Google Chrome (Latest)
-  Mozilla Firefox (Latest)
-  Safari (Latest)
-  Microsoft Edge (Latest) -->

### Performance Testing

<!-- - Page load times under 3 seconds
- Database queries optimized
- Image compression implemented
- Responsive design tested on multiple screen sizes -->


<!-- ## Challenges Faced and Solutions
### Challenge 1: Complex Order Management
- Problem: Managing relationships between orders, order items, and menu items
- Solution: Implemented proper Eloquent relationships and created pivot tables for many-to-many relationships
### Challenge 2: Real-time Order Tracking
- Problem: Updating order status in real-time without page refresh
- Solution: Used AJAX calls to update order status dynamically
### Challenge 3: Role-based Authentication
- Problem: Different user types requiring different access levels
- Solution: Implemented middleware to check user roles and redirect appropriately

## Future Enhancements
### Phase 2 Features (Potential Improvements)
- **Real-time Notifications**: Push notifications for order updates
- **Payment Integration**: Stripe or PayPal payment processing
- **GPS Tracking** : Real-time delivery tracking with maps
- **Rating System** : Customer reviews and restaurant ratings
- **Advanced Analytics** : Detailed sales reports and customer insights
- **Mobile App** : Native mobile application for iOS and Android

### Scalability Considerations

- Database optimization for larger datasets
- Caching implementation for improved performance
- API development for mobile app integration
- Load balancing for high traffic scenarios


## Learning Outcomes
### Technical Skills Gained

- Laravel Framework: Understanding of MVC architecture and Eloquent ORM
- Database Design: Creating efficient database schemas and relationships
- Authentication: Implementing secure user authentication systems
- Frontend Development: Building responsive interfaces with Bootstrap
- Version Control: Using Git and GitHub for project management -->

### Soft Skills Developed

<!-- - **Team Collaboration** : Working effectively in a group environment
- **Project Management** : Planning and executing a complex web application
- **Problem Solving** : Debugging and resolving technical challenges
- **Documentation** : Creating comprehensive project documentation -->


## References

<!-- 1. Laravel Documentation. (2024). Laravel 10.x Documentation. Retrieved from https://laravel.com/docs/10.x
2. Bootstrap Documentation. (2024). Bootstrap 5.3 Documentation. Retrieved from https://getbootstrap.com/docs/5.3/
3. MySQL Documentation. (2024). MySQL 8.0 Reference Manual. Retrieved from https://dev.mysql.com/doc/refman/8.0/en/
4. MDN Web Docs. (2024). Web Development Resources. Retrieved from https://developer.mozilla.org/
5. Stack Overflow. (2024). Programming Q&A Platform. Retrieved from https://stackoverflow.com/ -->


## Conclusion
<!-- QuickPlate successfully demonstrates the implementation of a comprehensive food ordering system using Laravel framework. The project showcases proficiency in web development fundamentals including MVC architecture, database design, user authentication, and responsive web design. -->

### Key Achievements

<!-- - Successfully implemented all required Laravel components (Routes, Controllers, Views, Models)
- Created a functional food ordering system with user role management
- Developed a responsive, user-friendly interface
- Demonstrated understanding of database relationships and CRUD operations
- Applied security best practices for user authentication -->

### Project Impact
<!-- This project provides practical experience in building real-world web applications and demonstrates the ability to work collaboratively in a team environment. The skills gained through this project are directly applicable to professional web development scenarios. -->

- Project Completion Date: 11/6/2025
- Course: INFO 3305 Web Application Development
