<!DOCTYPE html>
<html class="full-height" lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data->head_title?></title>
    <meta name="description" content="Material design landing page template built by TemplateFlip.com"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url()?>assets_front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets_front/css/mdb.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets_front/styles/main.css" rel="stylesheet">
  </head>
  <body id="top">
    <header>
      <!-- Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="navbar">
        <div class="container"><a class="navbar-brand" href="#"><strong><?= $data->menu_title?></strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">              
              <li class="nav-item"><a class="nav-link" href="#projects">About</a></li>
              <li class="nav-item"><a class="nav-link" href="#pricing">Video</a></li>
              <li class="nav-item"><a class="nav-link" href="#team">User Guide</a></li>
              <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul><a class="btn btn-primary btn-rounded my-0" href="<?= base_url()?>auth/Login" >Login</a>
          </div>
        </div>
      </nav>
      <!-- Intro Section-->
      <section class="view hm-gradient" id="intro">
        <div class="full-bg-img d-flex align-items-center">
          <div class="container">
            <div class="row no-gutters">
              <div class="col-md-10 col-lg-6 text-center text-md-left margins">
                <div class="white-text">
                  <div class="wow fadeInLeft" data-wow-delay="0.3s">
                    <h1 class="h1-responsive font-bold mt-sm-5"><?= $data->home_content_title?>.</h1>
                    <div class="h6">
                      <?= $data->home_content?>.
                    </div>
                  </div><br>
                  <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-white dark-grey-text font-bold ml-0" href="#pricing"><i class="fa fa-play mr-1"></i> View Demo</a><a class="btn btn-outline-white"  href="#projects">Learn more</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>
    <div id="content">
<section class="row no-gutters" id="features">
  <div class="col-lg-3 col-md-6 col-sm-12 deep-purple lighten-1 text-white">
    <div class="p-5 text-center wow zoomIn" data-wow-delay=".1s"><i class="fa <?= $data->home_p1_icon?> fa-2x"></i>
      <div class="h5 mt-3"><?= $data->home_p1_title?></div>
      <p class="mt-5"><?= $data->home_p1_content?>.</p>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 purple lighten-1 text-white">
    <div class="p-5 text-center wow zoomIn" data-wow-delay=".3s"><i class="fa <?= $data->home_p2_icon?> fa-2x"></i>
      <div class="h5 mt-3"><?= $data->home_p2_title?></div>
      <p class="mt-5"><?= $data->home_p2_content?>.</p>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 teal lighten-1 text-white">
    <div class="p-5 text-center wow zoomIn" data-wow-delay=".5s"><i class="fa <?= $data->home_p3_icon?> fa-2x"></i>
      <div class="h5 mt-3"> <?= $data->home_p3_title?></div>
      <p class="mt-5"><?= $data->home_p3_content?>.</p>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 light-blue lighten-1 text-white">
    <div class="p-5 text-center wow zoomIn" data-wow-delay=".7s"><i class="fa <?= $data->home_p4_icon?> fa-2x"></i>
      <div class="h5 mt-3"> <?= $data->home_p4_title?></div>
      <p class="mt-5"><?= $data->home_p4_content?>.</p>
    </div>
  </div>
</section>

<section class="py-5" id="projects">
  <div class="container">
    <div class="wow fadeIn">
      <h2 class="text-center h1 my-4">About</h2>
      <p class="px-5 mb-5 pb-3 lead blue-grey-text text-center">
        <?= $data->about_top_content?>
      </p>
    </div>
    <div class="row wow fadeInLeft" data-wow-delay=".3s">
      <div class="col-lg-6 col-xl-5 pr-lg-5 pb-5"><img class="img-fluid rounded z-depth-2" src="<?= base_url()?>assets_front/img/<?= $data->about_image?>" alt="project image"/></div>
      <div class="col-lg-6 col-xl-7 pl-lg-5 pb-4">
          <p class="px-5 mb-5 pb-3 lead blue-grey-text text-left">
            <?= $data->about_right_content?>
          </p>
      </div>
    </div>
    <hr/>    
  </div>
</section>
<section class="text-center py-5 indigo darken-1 text-white" id="pricing">
  <div class="container">
    <div class="wow fadeIn">
      <h2 class="h1 pt-5 pb-3">Video</h2>      
    </div>
    <div class="row wow fadeInLeft" data-wow-delay=".3s">
      <div class="col-lg-2 col-xl-2 pr-lg-2 pb-2"></div>
      <div class="col-lg-8 col-xl-8 pr-lg-2 pb-2">
         <iframe class="img-fluid rounded z-depth-2 col-lg-12 col-md-12 col-sm-12" style="height: 450px;" 
         src="<?= $data->video_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe> 
      </div>           

    </div>    
  </div>
</section>
<section class="py-5" id="team">
  <div class="container">
    <div class="wow fadeIn">
      <h2 class="h1 pt-5 pb-3 text-center">User Guide</h2>
      <p class="px-5 mb-5 pb-3 lead text-center blue-grey-text">
        <?= $data->userg_top_content?>
      </p>
    </div>
    <div class="row pt-5 wow fadeInRight" data-wow-delay=".3s">
      <div class="col-lg-6 col-xl-7 mb-3">        
          <p class="px-5 mb-5 pb-3 lead blue-grey-text text-left">
            <?= $data->userg_left_content?>
          </p>        
      </div>
      <div class="col-lg-6 col-xl-5 mb-3"><img class="img-fluid rounded z-depth-2" src="<?= base_url()?>assets_front/img/<?= $data->userg_image?>" alt="project image"/></div>
    </div>
  </div>
</section>
<section id="contact" style="background-image:url('assets_front/img/bg2.jpg');">
  <div class="rgba-black-strong py-5">
    <div class="container">
      <div class="wow fadeIn">
        <h2 class="h1 text-white pt-5 pb-3 text-center">Contact us</h2>
        <p class="text-white px-5 mb-5 pb-3 lead text-center">
          <?= $data->contact_top_content?>
        </p>
      </div>
      <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
        <div class="card-body p-5">
          <div class="row">
            <div class="col-md-8">
              <form action="https://formspree.io/youremail@example.com" method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="md-form">
                      <input class="form-control" id="name" type="text" name="name" required="required"/>
                      <label for="name">Your name</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="md-form">
                      <input class="form-control" id="email" type="text" name="_replyto" required="required"/>
                      <label for="email">Your email</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="md-form">
                      <input class="form-control" id="subject" type="text" name="subject" required="required"/>
                      <label for="subject">Subject</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="md-form">
                      <textarea class="md-textarea" id="message" name="message" required="required"></textarea>
                      <label for="message">Your message</label>
                    </div>
                  </div>
                </div>
                <div class="center-on-small-only mb-4">
                  <button class="btn btn-indigo ml-0" type="submit"><i class="fa fa-paper-plane-o mr-2"></i> Send</button>
                </div>
              </form>
            </div>
            <div class="col-md-4">
              <ul class="list-unstyled text-center">
                <li class="mt-4"><i class="fa fa-map-marker indigo-text fa-2x"></i>
                  <p class="mt-2"><?= $data->contact_address?></p>
                </li>
                <li class="mt-4"><i class="fa fa-phone indigo-text fa-2x"></i>
                  <p class="mt-2"><?= $data->contact_phone?></p>
                </li>
                <li class="mt-4"><i class="fa fa-envelope indigo-text fa-2x"></i>
                  <p class="mt-2"><?= $data->contact_email?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section></div>
    <footer class="page-footer indigo darken-2 center-on-small-only pt-0 mt-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mb-5 flex-center"><a class="px-3"><i class="fa fa-facebook fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-twitter fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-google-plus fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-linkedin fa-lg white-text"></i></a></div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container-fluid">          
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="<?= base_url()?>assets_front/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets_front/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets_front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets_front/js/mdb.min.js"></script>
    <script>new WOW().init();</script>
  </body>
</html>