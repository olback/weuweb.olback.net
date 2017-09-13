<?php require "login/loginheader.php"; ?>

<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Admin </h3>
                    <p class="title-description"> Files uploaded by users, waiting for validation. </p>
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
    <div class="col-md-6">
        <p>Lorem ipsum...</p>
        <a href="actions.php?v=0">Admin</a>
    </div>
</article>