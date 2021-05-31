<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="userIndex.php" style="margin-right : 600px">
      <img src="img/icon2.jpg" alt="Logo" style="width:40px;"><span class="text-primary"> Gardens Delight</span>
  </a>
    <ul class="navbar nav">
      <li class="nav-item">
        <a href="userIndex.php" class="nav-link">Home</a>
      </li>
    <?php if(!isset($_SESSION["name"])){ ?>
      <li class="nav-item">
        <a href="login.php" class="nav-link">Login</a>
      </li>
    <?php } ?>
    <?php if(!isset($_SESSION["name"])){ ?>
      <li class="nav-item">
        <a href="register.php" class="nav-link">Sign Up</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a href="aboutUs.php" class="nav-link">About Us</a>
      </li>
      <?php if(isset($_SESSION["name"])){ ?>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">Logout</a>
        </li>
      <?php } ?>
      <?php if(isset($_SESSION["name"])){ ?>
        <li class="nav-item">
          <a href="updateUser.php" class="nav-link">Change personal info</a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a href="viewCart.php" class="nav-link" >
          <img src="img/icon.png" class="rounded-circle" style="width : 35px">
        </a>
      </li>
    </ul>
    <form class="form-inline" action="searchByName.php" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="name">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
</nav>
