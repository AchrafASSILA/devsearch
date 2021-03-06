<?php require_once './includes/header.php'; ?>
<?php require_once './db/db.php'; ?>
<?php
require_once "./functions/developers.funcs.php";
$developers = getDevelopers($db);
?>
<!-- Main Section -->
<main class="home">
    <section class="hero-section text-center">
        <div class="container container--narrow">
            <div class="hero-section__box">
                <h2>CONNECT WITH <span>DEVELOPERS</span></h2>
                <h2>FROM AROUND THE WORLD</h2>
            </div>

            <div class="hero-section__search">
                <form class="form" action="#" method="get">
                    <div class="form__field">
                        <label for="formInput#search">Search Developers </label>
                        <input class="input input--text" id="formInput#search" type="text" name="search" placeholder="Search by developer name" />
                    </div>

                    <input class="btn btn--sub btn--lg" type="submit" value="Search" />
                </form>
            </div>
        </div>
    </section>
    <!-- Search Result: DevList -->
    <section class="devlist">
        <div class="container">
            <div class="grid grid--three">
                <?php foreach ($developers as $developer) : ?>
                    <div class="column card">
                        <div class="dev">
                            <a href="profile.php?id=<?php echo $developer->id ?>" class="card__body">
                                <div class="dev__profile">
                                    <img class="avatar avatar--md" src="<?php echo $developer->image ?>" alt="image" />
                                    <div class="dev__meta">
                                        <h3><?php echo $developer->first_name . " " . $developer->last_name ?></h3>
                                        <h5><?php echo $developer->bio ?></h5>
                                    </div>
                                </div>
                                <p class="dev__info">
                                    <?php echo $developer->description ?>
                                </p>
                                <?php
                                $owner = $developer->id;
                                $skills = getDeveloperSkills($db, $owner);
                                ?>
                                <div class="dev__skills">
                                    <?php foreach ($skills as $skill) : ?>
                                        <span class="tag tag--pill tag--main">
                                            <small><?php echo $skill->name ?></small>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <div class="pagination">
        <ul class="container">
            <li><a href="#" class="btn btn--disabled">&#10094; Prev</a></li>
            <li><a href="#" class="btn btn--sub">01</a></li>
            <li><a href="#" class="btn">02</a></li>
            <li><a href="#" class="btn">03</a></li>
            <li><a href="#" class="btn">04</a></li>
            <li><a href="#" class="btn">05</a></li>
            <li><a href="#" class="btn">06</a></li>
            <li><a href="#" class="btn">07</a></li>
            <li><a href="#" class="btn">08</a></li>
            <li><a href="#" class="btn">09</a></li>
            <li><a href="#" class="btn">10</a></li>
            <li><a href="#" class="btn">Next &#10095;</a></li>
        </ul>
    </div>
</main>
<?php require_once './includes/footer.php'; ?>