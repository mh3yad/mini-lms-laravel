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
 ```

## API Examples

# 📚 Courses API Documentation

This API allows you to perform CRUD (Create, Read, Update, Delete) operations on **Courses**.

---

## 🔹 Base URL

```
{{api_url}} = http://localhost/api
```

---

## 1️⃣ Get All Courses

**Method:** `GET`  
**Endpoint:**
```
GET {{api_url}}/courses
```

**Description:**  
Retrieve a list of all courses.

**Success Response (200 OK):**
```json
[
    {
        "id": 1,
        "title": "Laravel Basics",
        "description": "Learn the fundamentals of Laravel.",
        "teacher_id": 3
    },
    {
        "id": 2,
        "title": "Vue.js Essentials",
        "description": "Introduction to Vue.js framework.",
        "teacher_id": 5
    }
]
```

---

## 2️⃣ Create a New Course

**Method:** `POST`  
**Endpoint:**
```
POST {{api_url}}/courses
```

**Request Body (JSON):**
```json
{
    "title": "api3",
    "description": "desc",
    "teacher_id": 3
}
```

**Description:**  
Creates a new course.

**Success Response (201 Created):**
```json
{
    "id": 15,
    "title": "api3",
    "description": "desc",
    "teacher_id": 3,
    "created_at": "2025-08-11T10:00:00.000000Z"
}
```

---

## 3️⃣ Update a Course

**Method:** `PUT`  
**Endpoint:**
```
PUT {{api_url}}/courses/{id}
```

**Example:**
```
PUT {{api_url}}/courses/1
```

**Request Body (JSON):**
```json
{
    "title": "Updated Title",
    "description": "Updated description",
    "teacher_id": 4
}
```

**Description:**  
Updates an existing course.

**Success Response (200 OK):**
```json
{
    "id": 1,
    "title": "Updated Title",
    "description": "Updated description",
    "teacher_id": 4,
    "updated_at": "2025-08-11T10:05:00.000000Z"
}
```

---

## 4️⃣ Delete a Course

**Method:** `DELETE`  
**Endpoint:**
```
DELETE {{api_url}}/courses/{id}
```

**Example:**
```
DELETE {{api_url}}/courses/12
```

**Description:**  
Deletes an existing course by ID.

**Success Response (204 No Content):**
```json
{}
```

---
