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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>