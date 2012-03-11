<!DOCTYPE html>
<html>

   <head>
      <title>My Awesome Blog - <?php echo $title; ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <base href="/My-Awesome-Blog/">
      <link href="css/normalize.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>

   <body>

      <header>
         <h1><a href="index.php">My Awesome Blog</a></h1>
         <span class="subtitle">A blog about being awesome</span>
      </header>

      <nav>
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="archive/index.php">Archive</a></li>
         </ul>
      </nav>

      <section id="main">
         <h2><?php echo $title; ?></h2>

