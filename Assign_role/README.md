# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

# Tạo API Service cho :
   	+ Login API
    + Registet API
  	+ List_book API 

1.	Tạo project Laravel bằng Lumen :

	<b>composer create-project --prefer-dist laravel/lumen myproject </b>
    
    <br>

2.	Tải package Lumen-generator để thao tác artisan giống như Laravel 	

	<b>composer require flipbox/lumen-generator</b>
	
    
      <br>
    
 3.	Tải Package Lumen-Passport qua câu lệnh : 

    <b>composer require dusterio/lumen-passport</b>
    
    
      <br>

4.  Cài đặt khóa mã hóa và những thứ khác cho Hộ chiếu ( Passport ).
  
       <b>php artisan passport:install </b>
       
       
       <br>  
       
5. Khởi động Lumen : 

    <b>php -S localhost:8000 -t public</b>

    
