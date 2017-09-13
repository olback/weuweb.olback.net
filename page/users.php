<?php require "login/loginheader.php"; ?>

<article class="content">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Users </h3>
                    <p class="title-description"> List of users. </p>
                </div>
            </div>
        </div>
        <div class="items-search">
            <div class="input-group">    
                <span class="input-group-btn">    
                    <button onclick="location.href=actions.php?v=0" type="button" class="btn btn-secondary" style="margin-right: 7px;">Admin panel</button>
                    <button type="button" class="btn btn-primary" disabled="disabled">Users</button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p>Lorem ipsum...</p>
        <a href="actions.php?v=0">Admin</a>
    </div>
</article>