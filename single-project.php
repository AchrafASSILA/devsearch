<?php require_once "./includes/header.php" ?>
<?php require_once "./functions/projects.funcs.php" ?>
<?php require_once "./db/db.php" ?>
<!-- Main Section -->
<main class="singleProject my-md">
    <div class="container">
        <div class="layout">
            <div class="column column--1of3">
                <h3 class="singleProject__subtitle">Tools & Stacks</h3>
                <div class="singleProject__toolStack">
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>Figma</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>React Js</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>REST API</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>GraphQL</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>TypeScript</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>Webpack</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>NextJS</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>Postgres</small>
                    </span>
                    <span class="tag tag--pill tag--sub tag--lg">
                        <small>MongoDB</small>
                    </span>
                </div>
                <a class="singleProject__liveLink" href="#" target="_blank"><i class="im im-external-link"></i>Source Code
                </a>
            </div>
            <div class="column column--2of3">
                <img class="singleProject__preview" src="images/project-c.png" alt="portfolio thumbnail" />
                <a href="profile.html" class="singleProject__developer">Md. Shahriar Parvez</a>
                <h2 class="singleProject__title">Portfolio Landing Page for a Coding Mentor</h2>
                <h3 class="singleProject__subtitle">About the Project</h3>
                <div class="singleProject__info">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima harum maxime debitis amet voluptates esse
                    a perferendis tempora, natus pariatur obcaecati odit quisquam fugit deserunt.

                    <br />
                    <br />
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic voluptates earum possimus a perferendis culpa
                    omnis, libero quae soluta, obcaecati amet. Quam earum ad qui reprehenderit eligendi porro ab possimus
                    fugit voluptatem rerum eius sapiente, nemo mollitia aperiam suscipit culpa corrupti officiis dicta soluta
                    ut similique! Iste soluta quae tempora alias assumenda? Nam nesciunt nihil enim tempore cum quo
                    architecto?
                </div>

                <div class="comments">
                    <h3 class="singleProject__subtitle">Feedback</h3>
                    <h5 class="project--rating">
                        36% Postitive Feedback (18 Votes)
                    </h5>

                    <form class="form" action="#" method="POST">
                        <!-- Textarea -->
                        <div class="form__field">
                            <label for="formInput#textarea">Comments: </label>
                            <textarea class="input input--textarea" name="message" id="formInput#textarea" placeholder="Write your comments here..."></textarea>
                        </div>
                        <input class="btn btn--sub btn--lg" type="submit" value="Comments" />
                    </form>
                    <div class="commentList">
                        <div class="comment">
                            <a href="profile.html">
                                <img class="avatar avatar--md" src="https://pbs.twimg.com/profile_images/1335382240931368961/b3wSZKj4_400x400.jpg" alt="user" />
                            </a>
                            <div class="comment__details">
                                <a href="profile.html" class="comment__author">Sulamita Ivanov</a>
                                <p class="comment__info">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit alias numquam perferendis
                                    mollitia minus minima exercitationem possimus ab deserunt qui, soluta iusto doloribus eveniet
                                    similique consequuntur ratione, dignissimos ut magni laborum quo.
                                </p>
                            </div>
                        </div>
                        <div class="comment">
                            <a href="profile.html">
                                <img class="avatar avatar--md" src="https://avatars.githubusercontent.com/u/33843378" alt="user" />
                            </a>
                            <div class="comment__details">
                                <a href="profile.html" class="comment__author">Dennis Ivanov</a>
                                <p class="comment__info">
                                    Consectetur adipisicing elit. Reprehenderit alias numquam perferendis mollitia minus minima
                                    exercitationem possimus ab deserunt qui, ratione, dignissimos ut magni laborum quo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>