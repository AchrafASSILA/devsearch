<?php
session_start();
if (isset($_SESSION["username"])) { ?>
  <?php require_once "./includes/header.php"  ?>
  <!-- start main  -->
  <div class="main">
    <div class="topbar">
      <div class="toggle">
        <i class="fas fa-bars" id="toggle"></i>
      </div>
      <div class="search">
        <input type="text" placeholder="Search Here" name="search" id="" />
      </div>
      <div class="user">
        <img src="./public/images/user.jpg" width="150px" alt="" />
      </div>
    </div>
    <!-- start cards  -->
    <div class="card-box">
      <div class="card">
        <div>
          <div class="numbers">1.504</div>
          <div class="card-name">Developers</div>
        </div>
        <div class="icon">
          <i class="far fa-user"></i>
        </div>
      </div>
      <div class="card">
        <div>
          <div class="numbers">400</div>
          <div class="card-name">Projects</div>
        </div>
        <div class="icon">
          <i class="fas fa-project-diagram"></i>
        </div>
      </div>
      <div class="card">
        <div>
          <div class="numbers">600</div>
          <div class="card-name">Messages</div>
        </div>
        <div class="icon">
          <i class="far fa-comment"></i>
        </div>
      </div>
      <div class="card">
        <div>
          <div class="numbers">1200</div>
          <div class="card-name">Visitors</div>
        </div>
        <div class="icon">
          <i class="far fa-user"></i>
        </div>
      </div>
    </div>
    <!-- end cards  -->
    <!-- start data list  -->
    <div class="details">
      <div class="recentDevelopers">
        <div class="cardHeader">
          <h2>Recent Developers</h2>
          <a href="<?php echo "form-dev.php" ?>" class="btn">add developer</a>
        </div>
        <table class="table">
          <thead>
            <tr>
              <td>image</td>
              <td>FirstName</td>
              <td>LastName</td>
              <td>Email</td>
              <td>Location</td>
              <td>Password</td>
              <td>Github</td>
              <td>Linkedin</td>
              <td>Bio</td>
              <td>Created</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
            <tr>
              <td>Assila</td>
              <td>Achraf</td>
              <td>morroco,Casablanca</td>
              <td>achraf@gmail.com</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end data list  -->
  </div>
  <!-- end main  -->

  <?php require_once "./includes/footer.php"  ?>
<?php } else {
  header("Location:/php_devsearch/admin/");
}

?>