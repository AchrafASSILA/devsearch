<?php
session_start();
if (isset($_SESSION["username_admin"])) { ?>
  <?php require_once "./includes/header.php"  ?>
  <?php require_once "../functions/developers.funcs.php"  ?>
  <?php require_once "../functions/projects.funcs.php"  ?>
  <?php require_once "../db/db.php"  ?>
  <?php $developers = getDevelopers($db)  ?>
  <?php $projects = getProjects($db) ?>
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
        <img src="./static/images/user.jpg" width="150px" alt="" />
      </div>
    </div>
    <!-- start cards  -->
    <div class="card-box">
      <div class="card">
        <div>
          <div class="numbers"><?php echo count($developers) ?></div>
          <div class="card-name">Developers</div>
        </div>
        <div class="icon">
          <i class="far fa-user"></i>
        </div>
      </div>
      <div class="card">
        <div>
          <div class="numbers"><?php echo count($projects) ?></div>
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
              <td>Bio</td>
              <td>Created</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($developers as $developer) : ?>
              <tr>
                <td><img src="<?php echo "." . $developer->image ?>" style="width:80px;height:80px;border-radius:50%;object-fit:cover;" alt="alt"></td>
                <td><?php echo $developer->first_name ?></td>
                <td><?php echo $developer->last_name ?></td>
                <td><?php echo $developer->email ?></td>
                <td><?php echo $developer->location ?></td>
                <td><?php echo $developer->bio ?></td>
                <td><?php echo $developer->created ?></td>
              </tr>
            <?php endforeach; ?>
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