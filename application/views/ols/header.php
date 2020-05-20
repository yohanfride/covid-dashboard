<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title><?= $title?> - SMAP </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url(); ?>assets/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url(); ?>assets/css/colors/default.css" id="theme" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/pages/file-upload.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />    
    <link href="<?= base_url(); ?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Daterange picker plugins css -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SMAP</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url();?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="<?= base_url(); ?>/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="<?= base_url(); ?>/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <!-- ============================================================== -->                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                             
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                             
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                             
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                             
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url(); ?>/assets/images/users/<?php 
                                                if(!empty($user_now->photo))
                                                    echo $user_now->photo;
                                                else 
                                                    echo'default.png';
                                             ?>" alt="user" class="" /> 
                                <span class="hidden-md-down">
                                    <?php 
                                        if(isset($user_now->fullname)){
                                            echo $user_now->fullname;
                                        } else {
                                            echo $user_now->username;
                                        }
                                    ?> &nbsp;
                                    <i class="fa fa-angle-down"></i>
                                </span> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?= base_url(); ?>/assets/images/users/<?php 
                                                if(!empty($user_now->photo))
                                                    echo $user_now->photo;
                                                else 
                                                    echo'default.png';
                                             ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php 
                                                    if(!empty($user_now->fullname)){
                                                        echo $user_now->fullname;
                                                    } else {
                                                        echo $user_now->username;
                                                    }
                                                ?></h4>
                                                <p class="text-muted"><?= $user_now->email;?></p><a href="<?= base_url()?>user/myprofile" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url()?>user/myprofile"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="<?= base_url()?>user/setting"><i class="ti-settings"></i> Password Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url()?>auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if( ($user_now->role == 'Super Admin') or ($user_now->role == 'Administrator') ){ ?>
                        <li class="nav-small-cap">--- Administrator</li>

                        <!-- <?php if($user_now->role == 'Super Admin'){ ?>                         
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Administrator Management <span class="label label-rounded label-danger">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Administrator List</a></li>
                                <li><a href="index2.html">Add New Administrator</a></li>                                
                            </ul>
                        </li>
                        <?php } ?> -->
                        <li><a class="waves-effect waves-dark <?= ( $title == 'Dashboard List' )?'active':''; ?>" href="<?= base_url()?>"><i class="icon-Dashboard"></i>Dashboard</a></li>  
                        <li><a class="waves-effect waves-dark" href="<?= base_url()?>front/setting" aria-expanded="false"><i class="icon-Monitor-Tablet"></i><span class="hide-menu">Front Setting</a>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Coach Management</span></a>
                            <ul aria-expanded="false" class="collapse <?= ( ($title == 'Coach Management') or ($title == 'Coach Add') )?'in':''; ?>">
                                <li ><a class="<?= ( $title == 'Coach Management' )?'active':''; ?>" href="<?= base_url()?>coach">Coach List Account</a></li>
                                <li><a class="<?= ( $title == 'Coach Add' )?'active':''; ?>" href="<?= base_url()?>coach/add">Add New Coach</a></li>                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Aerobics-3 "></i><span class="hide-menu">Athlete Management</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Athlete Management' )?'active':''; ?>" href="<?= base_url()?>athlete">Athlete List Account</a></li>
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Add New Athlete</a></li>                                
                            </ul>
                        </li>                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Notepad"></i><span class="hide-menu">Questionnaire</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Question List') or ($title == 'Question Add') or ($title == 'Question Edit') or  $title == 'Questionnaire List' or $title == 'Questionnaire Detail')?'in':''; ?>">
                                <li><a class="<?= ( ($title == 'Question List') or ($title == 'Question Add') or ($title == 'Question Edit') )?'active':''; ?>" href="<?= base_url()?>question">Question List</a></li>
                                <li><a class="<?= ( $title == 'Questionnaire List' or $title == 'Questionnaire Detail')?'active':''; ?>" href="<?= base_url()?>questionnaire/">Questionnaire List</a></li>                                
                            </ul>
                        </li>                            
                        <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Aerobics"></i><span class="hide-menu">Athlete</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete List') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Athlete List' )?'active':''; ?>" href="<?= base_url()?>athlete/lists">Athlete List</a></li>
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Motion Sensor</a></li>                                
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Hearth Sensor</a></li>                                
                            </ul>
                        </li>   
                        <li><a class="waves-effect waves-dark" href="<?= base_url()?>schedule" aria-expanded="false"><i class="icon-Calendar-4"></i><span class="hide-menu">Schedule</a>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Bar-Chart"></i><span class="hide-menu">Analytic</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Questionnaire Question List' )?'active':''; ?>" href="<?= base_url()?>athlete">Performance Athlete</a></li>
                                <li><a class="<?= ( $title == 'Questionnaire List' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Health Condition Athlete</a></li>                                
                            </ul>
                        </li>   

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Bar-Chart"></i><span class="hide-menu">Calories</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Food List') or ($title == 'Food Add') or ($title == 'Food Edit') or ( $title == 'Calories' ) )?'in':''; ?>">
                                <li><a class="<?= ( ($title == 'Food List') or ($title == 'Food Add') or ($title == 'Food Edit')  )?'active':''; ?>" href="<?= base_url()?>food">Food</a></li>
                                <li><a class="<?= ( $title == 'Calories' )?'active':''; ?>" href="<?= base_url()?>kalori">Calories</a></li>                                
                            </ul>
                        </li> 
                          

                        <?php } ?>   

                        <?php if( ($user_now->role == 'Coach') ){ ?>
                        <li class="nav-small-cap">--- Coach</li>
                        <li><a class="waves-effect waves-dark <?= ( $title == 'Dashboard List' )?'active':''; ?>" href="<?= base_url()?>"><i class="icon-Dashboard"></i>Dashboard</a></li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Aerobics-3"></i><span class="hide-menu">Athlete Management</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Athlete Management' )?'active':''; ?>" href="<?= base_url()?>athlete/">Athlete List</a></li>
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Add New Athlete</a></li>                                
                            </ul>
                        </li>
                        <li><a class="waves-effect waves-dark <?= ( $title == 'Questionnaire List' )?'active':''; ?>" href="<?= base_url()?>questionnaire/"><i class="icon-Notepad"></i>Questionnaire</a></li>  
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Calendar-4"></i><span class="hide-menu">Schedule</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Schedule List') or ($title == 'Schedule Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Schedule List' )?'active':''; ?>" href="<?= base_url()?>schedule">Schedule List</a></li>
                                <li><a class="<?= ( $title == 'Schedule Add' )?'active':''; ?>" href="<?= base_url()?>schedule/add/">Add New Schedule</a></li>                                
                            </ul>
                        </li>                        

                        <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Aerobics"></i><span class="hide-menu">Athlete</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete List') or ($title == 'Athlete Add') or ($title == 'Athlete Detail')  )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Athlete List' || $title == 'Athlete Detail' )?'active':''; ?>" href="<?= base_url()?>athlete/lists">Athlete List</a></li>
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Motion Sensor</a></li>                                
                                <li><a class="<?= ( $title == 'Athlete Add' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Hearth Sensor</a></li>                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Bar-Chart"></i><span class="hide-menu">Analytic</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Questionnaire Question List' )?'active':''; ?>" href="<?= base_url()?>athlete">Performance Athlete</a></li>
                                <li><a class="<?= ( $title == 'Questionnaire List' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Health Condition Athlete</a></li>                                
                            </ul>
                        </li> 
                        
                        <?php } ?>      

                        <?php if( ($user_now->role == 'Athlete') ){ ?>
                        <li class="nav-small-cap">--- Athlete</li>
                        <li><a class="waves-effect waves-dark <?= ( $title == 'Dashboard List' )?'active':''; ?>" href="<?= base_url()?>"><i class="icon-Dashboard"></i>Dashboard</a></li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Notepad"></i><span class="hide-menu">Questionnaire</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Questionnaire Management' )?'active':''; ?>" href="<?= base_url()?>questionnaire/">Questionnaire List</a></li>
                                <li><a class="<?= ( $title == 'Questionnaire Add' )?'active':''; ?>" href="<?= base_url()?>questionnaire/add/">Add New Questionnaire</a></li>                                
                            </ul>
                        </li>
                        <li><a class="waves-effect waves-dark <?= ( $title == 'Schedule' )?'active':''; ?>" href="<?= base_url()?>schedule" aria-expanded="false"><i class="icon-Calendar-4"></i><span class="hide-menu">Schedule</a>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Bar-Chart"></i><span class="hide-menu">Performance</a>
                            <ul aria-expanded="false" class="collapse  <?= ( ($title == 'Athlete Management') or ($title == 'Athlete Add') )?'in':''; ?>">
                                <li><a class="<?= ( $title == 'Motion Sensor' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Motion Sensor</a></li>                                
                                <li><a class="<?= ( $title == 'Hearth Sensor' )?'active':''; ?>" href="<?= base_url()?>athlete/add/">Athlete Hearth Sensor</a></li>                                
                            </ul>
                        </li>                                                  
                        <?php } ?>  
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->               