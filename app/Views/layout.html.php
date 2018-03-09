<!DOCTYPE html>
<html>
<head>
  <base href="http://localhost/todo/" />
  <title><?=$title ?></title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<header class="header">
  <h1>Welcome To Task Manager</h1>
  <ul class="nav">
    <li><a href="?route=todo/home">Home</a> </li>
    <li><a href="?route=todo/edit">Add New Task</a> </li>
    <li><a href="?route=todo/read">View All Entry</a> </li>
    <?php if($loggedIn) : ?>
    <li><a href="?route=category/read">View All Category</a> </li>
    <li><a href="?route=user/read">users</a> </li>
    <li><a href="?route=logout">Log out</a> </li>
    <?php else: ?>
    <li><a href="?route=login">Log in</a> </li>
    <?php endif; ?>
  </ul>
</header>
  <main>
    <?=$output ?>
  </main>
<footer class="footer">
  <p><a href="#">Terms & Conditions </a>| <a href="#">Privacy Policy</a> &copy; <span id="year"></span> <a href="?route=todo/home"> todo manager</a> </p>
<p>Designed by O.Israel a Test Project</p>
<script src="js/year.js"></script>
</body>
</html>