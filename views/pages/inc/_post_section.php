<div class="container post_section mt-4 mb-4 pt-4 page">

    <div class="post_info"> <a href="" class="nav-link d-flex m-auto">
            <img src="" alt=" " class="img-fluid profile_img me-2 rounded-circle bg-light">
            <div class="posted_by">Lokeshwar Deb</div>
            <!-- <input type="text" class="form-control"> -->
        </a>
        <div class="poster_time text-secondary">8hr ago</div>
    </div>

    <hr>

    <div class="post_contents">
        <div class="post_text">
            Hello World ! this is the first post on this websute,

            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quam dolores, reiciendis iste alias nisi rerum exercitationem autem recusandae ex itaque. Id atque iure nostrum expedita. Corporis rerum sequi ipsam!

        </div>

        <div class="post_media_section container text-center pt-4 pb-4">
            <img src="/assets/img/assignment.png" alt="">
        </div>
    </div>


    <hr>


    <div class="actions_section text-center">
        <div class="row">
            <div class="col-4">
                <i class="fa-brands fa-gratipay text-danger"></i>

                3k
            </div>
            <div class="col-4 text-right">
                <i class="fa-regular fa-comment"></i>

                339
            </div>
            <div class="col-4">
                <i class="fa-solid fa-share"></i>

                564

            </div>
        </div>
    </div>

    <hr>



    <div class="actions_section text-center">
        <div class="row">
            <div class="col-4">
                <button type="button" class="btn like_button" onclick="lk_buttion()">
                    <!-- <i class="fa-regular fa-heart"></i> -->
                    <div class="inc"><i class="fa-regular fa-heart " id="like"></i></div>
<div class="brand_like d-none"><i class="fa-regular fa-heart text-danger " id="brand_like"></i></div>

<input type="text"  name="" id="" class="like_input_class_value">

<!-- <i class="fa-regular fa-heart text-danger d-none" id="not_liked"></i> -->
<!-- <i class="fa-brands fa-gratipay d-none text-dark" id="brand_like"></i> -->
Like
</button>
</div>
            <div class="col-4" id="comment_section" onclick="comments()">
                <button type="button" class="btn ">
                    <i class="fa-regular fa-comment"></i>
                    Comment
                </button>
            </div>
            <div class="col-4">
                <button type="button" class="btn">
                    <i class="fa-solid fa-share"></i>
                    Share
            </div>
            </button>
        </div>

        <div id="write_comment" class="mt-4 d-none">
            <textarea name="" id="" cols="30" rows="10" placeholder="Write your comment" class="form-control mt-4 mb-4"></textarea>
            <button type="submit" class="btn btn-primary">Post</button>
        </div>

    </div>

    <hr>

</div>