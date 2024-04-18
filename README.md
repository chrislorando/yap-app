# Yap - Simple Chat Application

## Introduction

Welcome to the Yap project! This repository houses a simple chat application built using the TALL stack (Tailwind CSS, Alpine.js, Laravel, and Livewire). The focus of this project is to create a real-time chat experience without the complexity of websockets, utilizing Livewire's `wire:poll` for state management and updates.

## Project Goals

The primary objective of this project is to serve as an educational tool for learning and mastering Laravel and Livewire 3. By developing a chat application, we aim to demonstrate the practical application of these technologies in a real-world scenario.

## TALL Stack

-   **Tailwind CSS**: A utility-first CSS framework for rapidly building custom designs.
-   **Alpine.js**: A rugged, minimal framework for composing JavaScript behavior in your markup.
-   **Laravel**: A PHP web application framework with expressive, elegant syntax.
-   **Livewire**: A full-stack framework for Laravel that makes building dynamic interfaces simple.

## Features

-   Real-time messaging without websockets.
-   Utilizes `wire:poll` for fetching data at regular intervals.
-   Responsive design with Tailwind CSS.
-   Interactive UI components with Alpine.js.

## Getting Started

To get started with Yap, clone the repository and follow the setup instructions:

```bash
git clone https://github.com/chrislorando/yap-app.git
cd yap
composer install
npm install && npm run dev
php artisan serve
```
