<?php
    // start session
    session_start();

    require "includes/functions.php";

    /*
      Decide what page to load depending on the url the user visit

      localhost:9000/auth/login -> includes/auth/do_login.php
      localhost:9000/auth/signup -> includes/auth/do_signup.php
      localhost:9000/task/add -> includes/task/add_task.php
      localhost:9000/task/complete -> includes/task/complete_task.php
      localhost:9000/task/delete -> includes/task/delete_task.php
    */
    // global variable $_SERVER
    $path = $_SERVER["REQUEST_URI"];
    // so that the question mark thing works
    $path = parse_url( $path, PHP_URL_PATH );

    // once you figure out the path, then we need to load relevent content based on the path
    switch ($path) {
      // pages routes
      case '/login':
        require "pages/login.php";
        break;
      case '/signup':
        require "pages/signup.php";
        break;
      case '/logout':
        require "pages/logout.php";
        break;
      case '/profile':
        require "pages/profile.php";
        break;
      case '/admin':
        require "pages/admindashboard.php";
        break;
      case '/review':
        require "pages/review.php";
        break;
      //admin pages routes
      case '/admin/manage_foods':
        require "pages/admin/manage_foods.php";
        break;
      case '/admin/manage_foods/add':
        require "pages/admin/manage_foods_add.php";
        break;
      case '/admin/manage_foods/edit':
        require "pages/admin/manage_foods_edit.php";
        break;
      // actions routes
      case '/auth/login':
        require "includes/auth/do_login.php";
        break;
      case '/auth/signup':
        require "includes/auth/do_signup.php";
        break;
      case '/foods/add':
        require "includes/foods/add.php";
        break;
      case '/foods/edit':
        require "includes/foods/edit.php";
        break;
      //orders routes
      case '/orders/beef':
        require "pages/orders/beef.php";
        break;
      case '/orders/chicken':
        require "pages/orders/chicken.php";
        break;
      case '/orders/drinks':
        require "pages/orders/drinks.php";
        break;
      case '/orders/noodles':
        require "pages/orders/noodles.php";
        break;
      case '/orders/rice':
        require "pages/orders/rice.php";
        break;
      case '/orders/sides':
        require "pages/orders/sides.php";
        break;
      case '/orders/western':
        require "pages/orders/western.php";
        break;
      //homepage
      default:
        require "pages/home.php";
        break;
    }
?>