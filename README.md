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

KerjaMudah is designed to serve a wide range of users who require effective collaboration and project management in a digital environment. The primary target users include:

Small and Medium Enterprises (SMEs)
SMEs that manage multiple projects and teams can use KerjaMudah to coordinate tasks, track progress, and improve internal communication without relying on multiple disconnected tools.

Educational Institutions
Lecturers, students, and academic project teams can utilize KerjaMudah to manage group assignments, share learning resources, discuss project requirements, and monitor task completion efficiently.

Corporate Project Teams
Organizations with cross-functional teams can use the platform to assign responsibilities, manage deadlines, and ensure transparency across departments.


## Features and Functionalities

- User Management : Users can register, log in, and manage their profiles securely, with role-based access to ensure proper project control.

- Project Management  : Create, update, and manage projects efficiently, allowing teams to track progress and maintain clear ownership.

- Task Assignment : Assign tasks to team members with defined deadlines, priorities, and real-time status updates to ensure accountability.

- Resource Sharing : Upload, organize, and manage project-related files such as documents, links, and reference materials in a centralized repository.

- Discussion Threads : Engage in structured discussions through comment threads within each project to ensure clear communication and reduced misinterpretation. 


## Technical Implementation


- Backend Framework: Laravel 10.x
- Frontend: Blade Templates with Bootstrap 5
- Database: MySQL 8.0
- Authentication: Laravel Breeze
- Image Storage: Laravel File Storage
- Development Environment: XAMPP


### Entity Relationship Diagram (ERD)

<p align="center">
  <a href="public/assets/images/erdkerjamudah.png" target="_blank">
    <img src="public/assets/images/erdkerjamudah.png" width="800" alt="KerjaMudah ERD">
  </a>
</p>


Key Relationships:

1. User ↔ Project
Relationship: One-to-Many
Primary Key (PK):
User.user_id
Foreign Key (FK):
Project.owner_id → references User.user_id
Explanation:
One user can create/own many projects, but each project is owned by only one user.

2. Project ↔ Task
Relationship: One-to-Many
Primary Key (PK):
Project.project_id
Foreign Key (FK):
Task.project_id → references Project.project_id
Explanation:
A project can have many tasks, but each task belongs to only one project.

3. User ↔ Task
Relationship: One-to-Many
Primary Key (PK):
User.user_id
Foreign Key (FK):
Task.assigned_to → references User.user_id
Explanation:
One user can be assigned many tasks, but each task is assigned to only one user.

4. Project ↔ Resource
Relationship: One-to-Many
Primary Key (PK):
Project.project_id
Foreign Key (FK):
Resource.project_id → references Project.project_id
Explanation:
A project can have many resources (files), but each resource belongs to one project.

5. User ↔ Resource
Relationship: One-to-Many
Primary Key (PK):
User.user_id
Foreign Key (FK):
Resource.uploadedBy → references User.user_id
Explanation:
A user can upload many resources, but each resource is uploaded by one user.

6. User ↔ Discussion
Relationship: One-to-Many
Primary Key (PK):
User.user_id
Foreign Key (FK):
Discussion.user_id → references User.user_id
Explanation:
A user can post many discussions, but each discussion is posted by one user.

7. Project ↔ Discussion
Relationship: One-to-Many
Primary Key (PK):
Project.project_id
Foreign Key (FK):
Discussion.project_id → references Project.project_id
Explanation:
A project can have many discussion messages, but each discussion belongs to one project.

8. User ↔ Announcement
Relationship: One-to-Many
Primary Key (PK):
User.user_id
Foreign Key (FK):
Announcement.user_id → references User.user_id
Explanation:
A user can create many announcements, but each announcement is created by one user.

9. Project ↔ Announcement
Relationship: One-to-Many
Primary Key (PK):
Project.project_id
Foreign Key (FK):
Announcement.project_id → references Project.project_id
Explanation:
A project can have many announcements, but each announcement belongs to one project.

** Laravel Components Implementation**

- Routes (Web.php)
  
// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Project Management
    Route::resource('projects', ProjectController::class);

    // Task Management
    Route::resource('tasks', TaskController::class);

    // File & Resource Management
    Route::resource('resources', ResourceController::class);

    // Team Collaboration
    Route::post('/projects/{project}/members', [ProjectMemberController::class, 'store'])
        ->name('projects.members.add');
});


- Controllers
  
 Main Controllers Implemented:

HomeController
Handles homepage display and introduction to the KerjaMudah platform.

DashboardController
Displays user-specific dashboards with project summaries and task progress.

ProjectController
Manages project creation, viewing, updating, and deletion.

TaskController
Handles task assignment, status updates, and task tracking within projects.

ResourceController
Manages file uploads and shared resources related to projects.

ProjectMemberController
Handles adding and managing team members within a project.
- Models and Relationships
  
// User Model
class User extends Authenticatable {
    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}

// Project Model
class Project extends Model {
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function resources() {
        return $this->hasMany(Resource::class);
    }
}

// Task Model
class Task extends Model {
    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}


- Views and User Interface

 Views and User Interface

Blade Templates Structure:

layouts/app.blade.php – Main application layout

home.blade.php – Landing page introducing KerjaMudah

dashboard/index.blade.php – User dashboard with project overview

projects/index.blade.php – Project listing page

projects/show.blade.php – Individual project details and tasks

tasks/create.blade.php – Task creation form

resources/index.blade.php – Shared project resources page

   *Design Features:

Responsive Design: Bootstrap framework for mobile-friendly layout

User Interface: Clean and minimal design focused on productivity

Navigation: Role-based and project-based navigation structure

Collaboration Features: Task tracking, shared resources, and team member management


## User Authentication System

### ** Authentication Features**
-User Registration:
New users can register by providing basic information such as name, email, and password. Laravel’s built-in authentication system is used to handle user registration and validation.

-Login System:
Registered users can securely log in to the system using their email and password. The authentication mechanism ensures only valid users can access the platform features.

-Password Reset:
KerjaMudah implements Laravel’s default password recovery functionality, allowing users to reset their password via an email-based reset link.

-Role-Based Access Control:
Authenticated users are granted access to system features based on their role. Each user has access to a personalized dashboard that displays relevant projects, tasks, and resources.

-Session Management:
User sessions are managed securely to maintain authentication state throughout the application usage.

### **Security Measures**
-Password Hashing:
User passwords are securely encrypted using Laravel’s built-in hashing mechanism to prevent plaintext password storage.

-CSRF Protection:
All forms are protected using Laravel’s Cross-Site Request Forgery (CSRF) tokens to prevent unauthorized form submissions.

-Input Validation:
Server-side validation is applied to user inputs during registration, login, and form submissions to ensure data integrity.

-Middleware Protection:
Authentication middleware is used to restrict access to protected routes, ensuring only authenticated users can access dashboards, project management, and task-related features.


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



## Challenges Faced and Solutions
### Challenge 1: Project and Task Relationship Management
Problem:Managing the relationships between users, projects, tasks, and shared resources became complex, especially when displaying project progress and task ownership accurately.
Solution:Proper Eloquent relationships were implemented using hasMany and belongsTo associations. This structured approach simplified data retrieval and ensured consistency across project and task management features.

### Challenge 2: Dynamic Task Status Updates
Problem:Updating task statuses (e.g., pending, in progress, completed) dynamically without requiring users to reload the page.
Solution:AJAX-based requests were implemented to update task status asynchronously, allowing real-time interaction and improving user experience.

### Challenge 3: Role-Based System Access
Problem: Ensuring that only authenticated users could access project management features while maintaining appropriate access control within the system.
Solution:Laravel middleware was used to protect routes and restrict access to authenticated users only. This ensured that sensitive features such as project creation, task assignment, and resource management were securely controlled.

## Future Enhancements
### Real-time Notifications
Instant notifications for task updates, project changes, and announcements to improve team communication.
### File Version Control
Ability to track file changes, manage revisions, and restore previous versions of shared resources.
### User Activity Logs
Logging of user actions such as task updates, project edits, and file uploads for better accountability.
### Advanced Reporting
Generation of project progress reports, task completion statistics, and performance analytics.
### Calendar Integration
Synchronization of task deadlines and project milestones with calendar systems.
### Mobile Application
Development of a dedicated mobile application for easier access and collaboration on the go.

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

- **Team Collaboration** : Working effectively in a group environment
- **Project Management** : Planning and executing a complex web application
- **Problem Solving** : Debugging and resolving technical challenges
- **Documentation** : Creating comprehensive project documentation 


## References

1.Kendall, K. E., & Kendall, J. E. (2019). Systems Analysis and Design (10th ed.). Pearson Education.
2.Connolly, T., & Begg, C. (2015). Database Systems: A Practical Approach to Design, Implementation, and Management (6th ed.). Pearson Education.
3.Sommerville, I. (2016). Software Engineering (10th ed.). Pearson Education.
4.Laravel. (2024). Laravel Documentation. Retrieved from https://laravel.com/docs
5.W3Schools. (2024). Web Development Tutorials. Retrieved from https://www.w3schools.com
6.Lucid Software. (2024). Entity Relationship Diagram (ERD) Guide. Retrieved from https://www.lucidchart.com/pages/er-diagrams


## Conclusion
In conclusion, the KerjaMudah project provides an effective solution for managing projects and team collaboration in a centralized platform. The system design successfully addresses common challenges such as task coordination, communication, and resource sharing by integrating all essential features into one system. Through careful planning and structured database design, the project demonstrates a strong understanding of system analysis principles and serves as a solid foundation for future system development and improvements.

### Key Achievements

- Successfully designed a centralized project management system that integrates tasks, resources, discussions, and announcements.
- Developed a clear and structured ERD with well-defined relationships between User, Project, Task, Resource, Discussion, and Announcement entities.
- Ensured proper task assignment and project ownership to improve accountability and workflow management.
- Designed features that support effective team communication through discussions and announcements within each project.
- Enhanced understanding of system analysis, database design, and teamwork throughout the project development process.
  
### Project Impact
This project provides practical experience in building real-world web applications and demonstrates the ability to work collaboratively in a team environment. The skills gained through this project are directly applicable to professional web development scenarios. 

- Project Completion Date: 11/6/2025
- Course: INFO 3305 Web Application Development
