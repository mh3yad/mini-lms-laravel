# 📚 Mini LMS CRUD System in Laravel (Dockerized)

A minimal **Learning Management System** backend built with Laravel, running in Docker.  
Includes basic CRUD for **Courses** with a clean architecture using the **Service + Repository** pattern.

---

## 🚀 Features
- **Entities**: Users, Courses, Sessions, StudentCourse 
- **CRUD for Courses** (Index, Create, Update, Delete)
- **FormRequest** validation
- **Service + Repository** architecture
- Seeded teacher user and sample courses
- **Laravel Breeze** 
- Dockerized environment for easy setup with sail
- API + Web routes for Courses

---

## 🛠 Tech Stack
- **Laravel 12.22.1** 
- **PHP  8.4.11**
- **MySQL  8.0.32** 
- **Laravel Sail 1.44** 
- **Laravel Breeze 2.3** 

---

## 📦  Setup Instructions
```bash

 git clone https://github.com/your-username/mini-lms-laravel.git
 cd mini-lms-laravel
 sail up
 npm run dev
