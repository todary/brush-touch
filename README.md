<p align="center"><a href="https://brush-touch.com/dashboard/logo/logo.PNG" target="_blank"><img src="https://brush-touch.com/dashboard/logo/logo.PNG" width="150" alt="Laravel Logo"></a></p>
# Brush Touch API

The Brush Touch API provides endpoints for user management and order processing. It allows users to register, log in, create orders, view their orders, and log out securely.

## Table of Contents
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
- [Environment Setup](#environment-setup)
- [API Endpoints](#api-endpoints)
    - [Register User](#register-user)
    - [Login User](#login-user)
    - [Create Order](#create-order)
    - [Logout User](#logout-user)
- [Testing with Postman](#testing-with-postman)
- [License](#license)

---

## Getting Started

### Prerequisites
- **PHP** 8.0 or higher
- **Composer**
- **Laravel** 9.x

### Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/brush-touch.git
   cd brush-touch


## API Endpoints

Registers a new user.

Endpoint: POST {{base_url}}/register


Request Body:

### Register User
-- **Headers:** Accept: application/json,Accept-Language:en

### Request Body:


1. **Request**:
   ```bas
   { "name": "John Doe",
   "email": "johndoe@example.com",
    "password": "password123",
    "password_confirmation": "password123"
    }

1. **Response:**:
   ```bas
     {"user": {
        "id": 3,
        "name": "John Doe",
        "email": "johndoe@example.com",
        "email_verified_at": null,
        "created_at": "2024-10-26T00:23:43.000000Z",
        "updated_at": "2024-10-26T00:23:43.000000Z"
    },
    "token": "3|TIJ8Ds4LTHIhkWIO7mkmAxc2rp8d9q470ecGhK3J266ee763"
   }

#### login User
Endpoint: POST {{base_url}}/login

-- **Headers:** Accept: application/json,Accept-Language:en


### Request Body:


1. **Request**:
   ```bas
   {"email": "johndoe@example.com",
   "password":"password123"}


1. **Response:**:

   ```bas
    {"user": {
        "id": 3,
        "name": "John Doe",
        "email": "johndoe@example.com",
        "email_verified_at": null,
        "created_at": "2024-10-26T00:23:43.000000Z",
        "updated_at": "2024-10-26T00:23:43.000000Z"
    },
    "token": "3|TIJ8Ds4LTHIhkWIO7mkmAxc2rp8d9q470ecGhK3J266ee763"
   }

#### logout User
Endpoint: POST {{base_url}}/logout

-- **Headers:** Accept: application/json, Authorization: Bearer {{auth_token}},Accept-Language:en

### Request Body:


1. **Request**:
   ```bas

1. **Response:**:
   ```bas
   {
    "message": "You have been logged out successfully. You can  log in again using your credentials."
   }
#### create order
Endpoint: POST {{base_url}}/create-order

-- **Headers:** Accept: application/json, Authorization: Bearer {{auth_token}},Accept-Language:en


### Request Body:


1. **Request**:
   ```bas
   {
     "services": [
    {
      "service_id": 1,
      "hours": 2
    },
    {
      "service_id": 2,
      "hours": 3
    }
    ]
   }



1. **Response:**:
   ```bas
   {
   "status": "success",
   "order": {
    "id": 1,
    "user_id": 4,
    "user_name": "John Doe",
    "user_email": "johndoe@example.com",
    "total_price": 330.47,
    "order_status": "Pending",
    "created_at": "2024-10-26 00:23:55",
    "updated_at": "2024-10-26 00:23:55",
    "services": [
      {
        "id": 1,
        "service_id": 1,
        "service_name": "Service 1",
        "hours": 2,
        "price": 74.05,
        "total_price": 148.1
      },
      {
        "id": 2,
        "service_id": 2,
        "service_name": "Service 2",
        "hours": 3,
        "price": 60.79,
        "total_price": 182.37
      }
    ]
   },
   "message": "Your order has been created successfully. Thank you for your purchase!"
   }
