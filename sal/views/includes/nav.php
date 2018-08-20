<nav class="navbar sticky-top navbar-expand-md navbar-light" id="nav">
  <div class="container">
    
    <a class="navbar-brand text-white" href="/">
      <h2 class="my-0">SAL <img src="/public/images/leo.png" alt="leo"></h2>
      <small>SAVE AN AMUR LEOPARD</small>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-3">
        <li class="nav-item">
          <a class="nav-link px-lg-3 active" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-lg-3" href="about">About&nbsp;Us</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link px-lg-3" href="contact">Contact&nbsp;Us</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link px-lg-3" href="/forum">Forum</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if(!authCheck()):  ?>
        <li class="nav-item">
          <a href="login" class="nav-link px-lg-3">Log In</a>
        </li>
        <li class="nav-item">
          <a href="register" class="nav-link px-lg-3">Register</a>
        </li>
        <?php else: ?>
        <li class="nav-item person-name">
          <a class="nav-link text-white pt-3"><?= $user->name ?></a>
          <ul class="list-unstyled person-dropdown">
            <li class="nav-item"><a href="/profile" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="/logout" class="nav-link">Log Out</a></li>
          </ul>
        </li>
        <li>
          <div style="height: 50px;width: 50px;overflow: hidden;" class="table-bordered rounded-circle">
            <img src="<?= $user->image? $user->image : "/public/images/no-user.jpg" ?>" class="img-fluid" alt="user image">
          </div>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>