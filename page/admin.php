<?php require "login/loginheader.php"; ?>
<?php require "login/dbconf.php"; ?>

<article class="content items-list-page">
    <h1>Admin dashboard</h1>
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <p class="title-description"> Files uploaded by users, waiting for validation. </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card items">
        <ul class="item-list striped">
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row">            
                    <div class="item-col item-col-header item-col-title">
                        <div> <span>Name</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-sales">
                        <div> <span>Type</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-category">
                        <div class="no-overflow"> <span>Size</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-author">
                        <div class="no-overflow"> <span>Author</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-date">
                        <div> <span>Date/Time</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                </div>
            </li>
            <?php
                // Create connection
                $conn = new mysqli($host, $username, $password, $db_name);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT id, name, type, size, by_user, upload_date FROM upload";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    echo '<style>.red:hover{color:red!important;}</style>';
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <li class="item">
                                <div class="item-row">
                                    <div class="item-col fixed pull-left item-col-title">
                                        <div class="item-heading">Filename</div>
                                            <div>
                                                <h4 class="item-title"> '.$row['name'].' </h4>
                                            </div>
                                        </div>
                                        <div class="item-col item-col-sales">
                                            <div class="item-heading"></div>
                                                <div> '.$row['type'].' </div>
                                            </div>
                                                    
                                            <div class="item-col item-col-category no-overflow">
                                                <div class="item-heading"></div>
                                                <div class="no-overflow"> '.$row['size'].' </div>
                                            </div>
                                            <div class="item-col item-col-author">
                                                <div class="item-heading">Author</div>
                                                <div class="no-overflow"> '.$row['by_user'].' </div>
                                            </div>
                                            <div class="item-col item-col-date">
                                                <div class="item-heading">Date/Time</div>
                                                <div class="no-overflow"> '.$row['upload_date'].' </div>
                                            </div>
                                            <div class="item-col fixed item-col-actions-dropdown">
                                                <div class="item-actions-dropdown">
                                                    <a href="actions.php?d='.$row['id'].'">
                                                        <span><i class="fa fa-download"></i></span>
                                                    </a>
                                                </div>
                                                <div class="item-actions-dropdown">
                                                <form method="POST" id="remid-'.$row['id'].'" action="actions.php">
                                                <input type="hidden" value="'.$row['id'].'" name="r">
                                                    <a href="javascript:void(0)" class="red" onclick="document.getElementById(\'remid-'.$row['id'].'\').submit();">
                                                        <span><i class="fa fa-close"></i></span>
                                                    </a>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li> <!--/ End item -->
                        ';
                    }
                }
                $conn->close();
            ?>
                </div>
            </li>
        </ul>
    </div>
</article>