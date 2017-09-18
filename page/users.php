<?php require "login/loginheader.php"; ?>
<?php require "login/dbconf.php"; ?>

<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Users </h3>
                    <p class="title-description"> List of all registerd users. </p>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline">
                <div class="input-group">      
                    <span class="input-group-btn">
                        <a href="actions.php?v=0"><button type="button" class="btn btn-primary" style="margin-right: 7px;">Admin</button></a>
                        <button type="button" class="btn btn-primary" disabled="disabled">Users</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">                    
                        <section>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="nb">Name</th>
                                        <th class="nb">Username</th>
                                        <th class="nb">Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--<tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td></tr>-->
                                    <?php
                                        // Create connection
                                        $conn = new mysqli($host, $username, $password, $db_name);
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        } 

                                        mysqli_set_charset($conn, 'utf8');
                                        // Select id for future implementations. Use id as uniqe identifyer as i want user to be able to change it.
                                        $sql = "SELECT id, username, name, class FROM members";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            echo '<style>.red:hover{color:red!important;}</style>';
                                            while($row = $result->fetch_assoc()) {
                                                echo '
                                                    <tr>
                                                        <td>'.$row['name'].'</td>
                                                        <td>'.$row['username'].'</td>
                                                        <td>'.$row['class'].'</td>
                                                    </tr>
                                                ';
                                            }
                                        }
                                        $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>