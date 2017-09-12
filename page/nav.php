<?php require "login/loginheader.php"; ?>
<div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
    			            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Search feature not implemented yet -->
                    <!--<div class="header-block header-block-search hidden-sm-down">
                        <form role="search">
                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>-->                
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['name'];?>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu">
                                    <?php if($_SESSION['admin'] == "1") {echo '
                                    <a class="dropdown-item" href="actions.php?a=admin">
    			                        <i class="fa fa-user icon"></i>
    			                        Admin
                                    </a>
                                    ';}?>
                                    <a class="dropdown-item" href="actions.php?a=profile">
    			                        <i class="fa fa-user icon"></i>
    			                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/login/logout.php">
    			                        <i class="fa fa-power-off icon"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <!--<div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div>-->
                                <?php echo $site_name; ?>
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                
                                <!-- Dashboard -->
                                <li class="<?php if(($_SESSION['page'] == '') || (!isset($_SESSION['page']))){echo 'active';}?>">
                                    <a href="actions.php?a=">
                                        <i class="fa fa-home"></i> Home
                                    </a>
                                </li>

                                <!-- Upload -->
                                <li class="<?php if($_SESSION['page'] == 'upload'){echo 'active';}?>">
                                    <a href="actions.php?a=upload">
                                        <i class="fa fa-upload"></i> Upload
                                    </a>
                                </li>

                                <!-- Snippets -->
                                <li class="<?php if($_SESSION['page'] == 'snippets'){echo 'active';}?>">
                                    <a href="actions.php?a=snippets">
                                        <i class="fa fa-code"></i> Code snippets
                                    </a>
                                </li>

                                <!-- About -->
                                <li class="<?php if($_SESSION['page'] == 'about'){echo 'active';}?>">
                                    <a href="actions.php?a=about">
                                        <i class="fa fa-info-circle"></i> About
                                    </a>
                                </li>

                                <!--<li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Items Manager
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="items-list.html">Items List</a>
                                        </li>
                                        <li>
                                            <a href="item-editor.html">Item Editor</a>
                                        </li>
                                    </ul>
                                </li>-->

                                <hr>

                                <!-- Christer on YT -->
                                <li>
                                    <a href="https://www.youtube.com/channel/UC54S4DEAslCe2dRRZSFcuMQ" target="_blank">
    					    	        <i class="fa fa-youtube-play"></i> Christer on YouTube
                                    </a>
                                </li>

                                <!-- Web Dev -->
                                <li>
                                    <a href="">
                                        <i class="fa fa-link"></i> Web Dev
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="https://www.w3schools.com/" target="_blank">w3schools</a>
                                        </li>
                                        <li>
                                            <a href="https://developer.mozilla.org/en-US/" target="_blank">MDN</a>
                                        </li>
                                        <li>
                                            <a href="https://webdesignskolan.se/" target="_blank">Webdesignskolan</a>
                                        </li>
                                    </ul>
                                </li> <!-- /end Web Dev... -->

                                <!-- HTS -->
                                <li>
                                    <a href="">
                                        <i class="fa fa-link"></i> HTS
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="http://hts.se" target="_blank">HTS.se</a>
                                        </li>
                                        <li>
                                            <a href="http://htsit.se" target="_blank">HTSIT.se</a>
                                        </li>
                                    </ul>
                                </li> <!-- /end HTS... -->
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-xs-4"></div>
                                                <div class="col-xs-4"><label class="title">fixed</label></div>
                                                <div class="col-xs-4"><label class="title">static</label></div>
                                            </div>
                                            <div class="row hidden-md-down">
                                                <div class="col-xs-4"><label class="title">Sidebar:</label></div>
                                                <div class="col-xs-4">
                                                    <label>
    				                                    <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
    				                                    <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"><label class="title">Header:</label></div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!--<div class="row">
                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>-->
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue" data-theme="blue"></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
    					            <i class="fa fa-cog"></i> Customize
                                </a>
                            </li>
                        </ul>
                    </footer>
                </aside>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>