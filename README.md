# Yap - Simple Chat Application

![image](https://github.com/chrislorando/yap-app/assets/10240380/f2a24ee0-9104-465e-9d4b-bdc1e4c77849)

## Introduction

"Yap" is a straightforward chat application that draws inspiration from popular messaging platforms such as WhatsApp, Telegram, etc. It is crafted using the TALL stack, which stands for Tailwind CSS, Alpine.js, Laravel, and Livewire. The project emphasizes the use of Livewire's `wire:poll` for real-time functionality, deliberately avoiding the complexity of websockets.

## Educational Purpose

The creation of Yap serves a personal educational purpose. It is a practical project aimed at delving deeper into the intricacies of Laravel and Livewire 3, understanding their capabilities, and applying them to build a functional and interactive chat application.

## TALL Stack Components

-   **Tailwind CSS**: A utility-first CSS framework for designing custom user interfaces with speed and efficiency.
-   **Alpine.js**: A minimalistic JavaScript framework for composing behavior directly in your markup.
-   **Laravel**: A PHP web application framework with an expressive, elegant syntax, providing tools and resources for robust backend development.
-   **Livewire 3**: A full-stack framework for Laravel that simplifies the creation of dynamic interfaces, leveraging server-side rendering.

## Features

-   Simple and intuitive chat interface.
-   Real-time message exchange using `wire:poll`.
-   No use of websockets, ensuring ease of deployment and maintenance.

## Getting Started

To set up the Yap project on your local machine, follow these steps:

```bash
git clone https://github.com/chrislorando/yap-app.git
cd yap
composer install
npm install && npm run dev
php artisan serve
```

## References

https://www.youtube.com/watch?v=8Ek8M0XGDBU
