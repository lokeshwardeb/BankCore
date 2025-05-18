<!-- navbar section starts here -->
<div class="container-fluid bg-secondary sticky-top  border-bottom border-1 border-dark">
            <div class="navbar_section bg-secondary container-fulid">
                <nav class="navbar">
                    <a href="/dashboard" class="nav-link"><div class="brand_title ms-4 me-4 fs-3">UBook</div></a>
                    <div class="search_icon_section">
                    <!-- <div class=" d-flex">
                        <input type="text" class="form-control" placeholder="Search on UBook">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div> -->
                    </div>
                    

                    <?php


require_once __DIR__ . '/_search_bar.php';








?>


                    <ul class="nav text-center m-auto bg-secondary">
                        <li class=" nav text-center "><a href="/dashboard" class="nav-link text-dark text-center">Home</a></li>
                        <li class=" nav text-center"><a href="" class="nav-link text-dark text-center">Connects</a></li>
                        <li class=" nav text-center"><a href="" class="nav-link text-dark text-center">Settings</a></li>
                        <li class=" nav text-center float-end">
                            <a href="/profiles" class="nav-link profile_link text-dark text-center">
                                <div class="profile_link_section">
                                    <img src="" class="img-fluid rounded-circle bg-secondary profile_img" alt=" ">
                                    Lokeshwar Deb
                                </div>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </div>
        <!-- navbar section ends here -->