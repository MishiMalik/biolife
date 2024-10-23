<?php
include_once "includes/functions.php";

$stats = fetchAll($pdo, "SELECT * FROM stats");
$areas = fetchAll($pdo, "SELECT * FROM thematic_areas");
$team = fetchAll($pdo, "SELECT * FROM team");

?>


<!doctype html>
<html lang="en">

<head>
    <title>BioLife</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-xl navbar-light  fixed-top ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo-removebg-preview (1).png" alt="" class="logo">
                </a>
                <button class="navbar-toggler d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-auto " id="collapsibleNavId">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center ">
                        <li class="nav-item">
                            <a class="nav-link active-nav" href="#" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#thematic-area">Thematic Areas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-nav" href="news-and-events.html">News&Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item nav-btn ms-md-3">
                            <button class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#appointment">Schedule Meeting</button>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

    </header>
    <main>
        <section class="hero-section">
            <div class="container">
                <div class="row  ">
                    <div class="col-lg-6 order-lg-1 order-2 hero-text">
                        <div class="mt-xl-5 pt-xl-3 mt-3"></div>
                        <span class="tag-text ">Welcome to BioLife Research Ltd.</span>
                        <h1 class="main-heading mt-3 mb-3">We’ll Ensure You Always Get The Best Result.</h1>
                        <p class="main-text">
                            Lacinia in netus vel a, scelerisque mauris quis et, purus blandit sapien, pharetra, viverra
                            volutpat risus non tortor, cras egestas et maecenas facilisi imperdiet quam fringilla dui
                            mauris enim, nec arcu, interdum sit nisi est facilisi sodales viverra proin et.
                        </p>

                        <div class="d-flex align-items-center flex-sm-row flex-column ">
                            <a href="#contact" class="btn-fill">Contact</a>
                            <div class="px-sm-2 py-2"></div>
                            <a href="#about" class="btn-blank ">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center order-lg-2 order-1">
                        <img src="assets/images/diagnostic-lab-hero-img.jpg" alt="" class="hero-img mx-auto ">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-2">
            <!-- statics -->
            <div class="statistics">
                <div class="container">
                    <div class="row statistics-row align-items-center mx-sm-0 mx-1">

                        <div class="col-lg-3 mb-lg-0 mb-4 d-flex align-items-center statistics-row-header justify-content-center ">
                            <h2 class="m-0 p-0">Our Statistics</h2>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-4">
                            <h1 class="count future" data-number="<?php echo $stats[0]->value ?>"><?php echo $stats[0]->value ?></h1>
                            <p class="mb-0 pb-0">Countries of Operation</p>
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-4">
                            <h1 class="count future" data-number="<?php echo $stats[1]->value ?>"><?php echo $stats[1]->value ?></h1>
                            <p class="mb-0 pb-0">Years of Experience</p>
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-3">
                            <div class="d-flex align-items-center justify-content-center ">
                                <h1 class="count future m-0 p-0" data-number="<?php echo $stats[2]->value ?>"><?php echo $stats[2]->value ?></h1>%
                            </div>
                            <p class="mb-0 pb-0">Customer Satisfaction </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about -->
            <div class=" mt-5 pt-md-5" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 px-4 ">
                            <img src="assets/images/medical.jpeg" alt="" class="img-fluid rounded-3 h-100 object-fit-cover ">
                        </div>
                        <div class="col-lg-6  mt-lg-0 mt-4">
                            <span class="tag-text ">ABOUT US</span>
                            <h1 class="main-heading mt-1 mb-2">Who We Are?</h1>
                            <p class="main-text">
                                BioLife Research Ltd (BRL) is a leading professional consultancy firm established in
                                2018 to catalyze scientific excellence by supporting critical components required to
                                advance sustainable research in Africa. BRL is registered in Kenya as a private limited
                                company. BLRL has an extensive network of labs, researchers and companies across Kenya.
                                The company is in the process of initiating partnerships in additional countries of East
                                Africa.
                            </p>

                            <div class="d-flex align-items-center flex-sm-row flex-column ">
                                <a href="#Mission" class="btn-fill">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mission -->
            <div class=" mt-5 pt-md-5" id="Mission">
                <div class="container">
                    <div class="row align-items-center ">
                        <div class="col-lg-6 order-lg-1 order-2 mt-lg-0 mt-4">
                            <span class="tag-text ">Our Mission</span>
                            <h1 class="main-heading mt-1 mb-2">What is Our Mission?</h1>
                            <p class="main-text">
                                Our core mandate is to enhance sustainable capacity for biomedical and health research
                                in Kenya and in the East African region. We aim to fully equip African researchers and
                                institutions with the capacity to successfully undertake cross-sectoral
                                multidisciplinary research directly translatable to relevant policies and practice.
                            </p>

                            <div class="d-flex align-items-center flex-sm-row flex-column ">
                                <a href="#Vision" class="btn-fill">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-6 px-4   order-lg-2 order-1">
                            <img src="assets/images/mission.jpg" alt="" class="img-fluid rounded-3  object-fit-cover ">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vision -->
            <div class=" mt-5 pt-md-5" id="Vision">
                <div class="container">
                    <div class="row align-items-center ">
                        <div class="col-lg-6 px-4  ">
                            <img src="assets/images/vision.jpg" alt="" class="img-fluid rounded-3  object-fit-cover ">
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-4">
                            <span class="tag-text ">Our Vision</span>
                            <h1 class="main-heading mt-1 mb-2">Do You Know Our Vision?</h1>
                            <p class="main-text">
                                To position Africa as an equal contributor to the global biomedical and health research
                                outputs, in addition to having adequate and sustainable capabilities to find focused
                                solutions relevant and applicable to Africa health challenges.
                            </p>


                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="team  py-md-3">
            <div class="team-div   ">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-lg-12 text-center mb-4">
                            <span class="tag-text ">Our Team</span>
                            <h1 class="main-heading mt-1 mb-2">BioLife Expert Team</h1>
                            <p class="main-text">
                                BRL is led by a professional team composed of in-house subject-matter technical experts
                                who are highly experienced, globally-respected and recognized in health research. BRL
                                employs adaptive staffing model that allows quick assembly from our diverse repository
                                of academic and non-academic research institutions appropriately matched in a project-or
                                task-specific manner. am managers.
                            </p>
                        </div>
                        <?php if (!empty($team)) : ?>
                            <?php foreach ($team as $key => $member) : ?>
                                <div class="col-lg-3 col-md-6 mb-3 team-card" data-bs-toggle="modal" data-bs-target="#team-modal<?php echo $key ?>">
                                    <img src="assets/images/team/<?php echo $member->image; ?>" alt="" class="img-fluid ">
                                    <h3 class="mt-3"><?php echo $member->name; ?></h3>
                                    <p><?php echo $member->designation; ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="services pt-5 mt-md-4" id="services">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div class="col-lg-10 mx-auto  text-center mb-5">
                            <span class="tag-text ">Expertise</span>
                            <h1 class="main-heading mt-1 mb-2">Our Services</h1>
                            <p class="main-text">

                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5  ">
                            <div class="service-card">
                                <img src="assets/images/services/bioinformatics_colourbox30350290-web.jpg" alt="" class="img-fluid ">
                                <h3 class="mt-3 px-2">Bioinformatics and Data Analyses</h3>
                                <p class="px-2 text-dark mb-0"><b>It Include:</b></p>
                                <ul>
                                    <li>
                                        <p class="mb-0 pb-0">Sequence Retrieval</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Sequence Analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Homology and similarity</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0"> Phylogenetic Analysis</p>
                                    </li>

                                    <!-- <li>
                                        <p class="mb-0 pb-0">Protein Function Analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Structural analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Gene Expression Analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Primer design </p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Statistical data analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0"> Machine learning predictions </p>
                                    </li> -->
                                </ul>
                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn-fill" type="button" data-bs-toggle="modal" data-bs-target="#service-1">View All</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5  ">
                            <div class="service-card">
                                <img src="assets/images/services/2.jpg" alt="" class="img-fluid ">
                                <h3 class="mt-3 px-2">Research support</h3>
                                <p class="px-2 text-dark mb-0"><b>It Include:</b></p>
                                <ul>
                                    <li>
                                        <p class="mb-0 pb-0">Training in grantsmanship</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Grant management</p>
                                    </li>
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Research regulatory compliance</p>
                                    </li> -->
                                    <li>
                                        <p class="mb-0 pb-0">Research program management</p>
                                    </li>
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Research ethics and governance</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Supervision and mentorship training of early and mid-career
                                            researchers</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Organization capacity assessment (e.g. OCA tool)</p>
                                    </li> -->
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Research leadership Development</p>
                                    </li> -->
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Manuscript development and preparations</p>
                                    </li> -->
                                    <li>
                                        <p class="mb-0 pb-0">Scientific communications</p>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-center mt-4 mb-3">
                                    <button class="btn-fill" type="button" data-bs-toggle="modal" data-bs-target="#service-2">View All</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5  ">
                            <div class="service-card">
                                <img src="assets/images/services/3.jpeg" alt="" class="img-fluid ">
                                <h3 class="mt-3 px-2">Laboratory management and capacity strengthening</h3>
                                <p class="px-2 text-dark mb-0"><b>It Include:</b></p>
                                <ul>
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Laboratory Quality Management System (LQMS)</p>
                                    </li> -->
                                    <li>
                                        <p class="mb-0 pb-0">Laboratory Management</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Lab equipment management</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Laboratory Information Management Systems (LIMS)</p>
                                    </li>
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Laboratory and operational support for clinical trials and
                                            epidemiology studies.</p>
                                    </li> -->
                                    <!-- <li>
                                        <p class="mb-0 pb-0">Biorepositories and sample handling</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Laboratory operational support for clinical trials and
                                            epidemiological studies.</p>
                                    </li> -->

                                </ul>
                                <div class="d-flex justify-content-center mt-4 mb-3">
                                    <button class="btn-fill" type="button" data-bs-toggle="modal" data-bs-target="#service-3">View All</button>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 ">
                            <div class="service-card">
                                <img src="assets/images/services/4.jpg" alt="" class="img-fluid ">
                                <h3 class="mt-3 px-2">Project monitoring and evaluation (M&E)</h3>
                                <p class="px-2 text-dark mb-0"><b>It Include:</b></p>
                                <ul>
                                    <li>
                                        <p class="mb-0 pb-0">M&E project design</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Data collection and analysis</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Impact assessment</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 pb-0">Reporting M&E to stakeholders.</p>
                                    </li>
                                    <!-- <li>
                                        <p class="mb-0 pb-0">M&E project design and implementation</p>
                                    </li> -->

                                </ul>
                                <div class="d-flex justify-content-center mt-4 mb-3">
                                    <button class="btn-fill" type="button" data-bs-toggle="modal" data-bs-target="#service-4">View All</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thematic-areas  mt-md-4" id="thematic-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 mx-auto text-center ">
                            <span class="tag-text ">Specialized</span>
                            <h1 class="main-heading mt-1 mb-2">Thematic Areas</h1>
                            <p class="main-text">

                            </p>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center ">
                        <?php if (!empty($areas)) : ?>
                            <?php foreach ($areas as $index => $area) : ?>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="thematic-card">
                                        <img src="assets/images/thematic/<?php echo $area->image ?>" alt="">
                                        <div class="thematic-card-text">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#thematic-modal<?php echo $index ?>"><?php echo $area->title ?>&nbsp;&nbsp;&nbsp;&raquo;</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer pt-5 pb-2 mt-5" id="contact">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-md-6 mb-md-0 mb-3  d-flex justify-content-md-start   justify-content-center">
                    <img src="assets/images/logo.png" alt="" class=" rounded-3 img-fluid  ">
                </div>
                <div class="col-md-6  d-flex justify-content-md-end  justify-content-center  ">
                    <button class="btn-fill ms-md-auto  " type="button" data-bs-toggle="modal" data-bs-target="#appointment">
                        Schedule a Meeting
                    </button>
                </div>
            </div>
            <hr class="text-white mt-md-5 mt-3">
            <div class="row">
                <div class="col-lg-6 d-flex mb-lg-0 mb-3 ">
                    <div class="d-flex align-items-start ">
                        <div>
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="mt-2">
                            <h3>Address</h3>
                            <p class="mb-0 pb-0">49 Kandara Road, Kileleshwa, Nairobi Kenya <br>P.O.Box
                                1842-00200</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3  d-flex justify-content-lg-center  justify-content-start mb-lg-0 mb-3 ">
                    <div class="d-flex align-items-start ">

                        <div>
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="mt-2">
                            <h3>Email</h3>
                            <p class="mb-0 pb-0">info@bioliferesearch.org </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 d-flex justify-content-lg-center  justify-content-start   ">
                    <div class="d-flex align-items-start ">

                        <div>
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="mt-2">
                            <h3>Address</h3>
                            <a href="tel:+254722201062" class="mb-0 pb-0">+254722201062 </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-white mt-4">
            <div class="d-flex justify-content-center  align-items-center flex-wrap   mt-4">
                <a class="mb-3 px-3" href="index.html">Home</a>
                <a class="mb-3 px-3" href="index.html">About Us</a>
                <a class="mb-3 px-3" href="index.html">Our Services</a>
                <a class="mb-3 px-3" href="index.html">Thematic Areas</a>
            </div>
        </div>
    </footer>

    <!-- Service 1 -->
    <div class="modal fade" id="service-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Bioinformatics and Data Analyses</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/services/bioinformatics_colourbox30350290-web.jpg" alt="" class="img-fluid ">
                    <p class="px-2 text-dark mb-0 mt-3"><b>It Include:</b></p>
                    <ul>
                        <li>
                            <p class="mb-0 pb-0">Sequence Retrieval</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Sequence Analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Homology and similarity</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0"> Phylogenetic Analysis</p>
                        </li>

                        <li>
                            <p class="mb-0 pb-0">Protein Function Analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Structural analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Gene Expression Analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Primer design </p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Statistical data analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0"> Machine learning predictions </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Service 2 -->
    <div class="modal fade" id="service-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Research support</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/services/2.jpg" alt="" class="img-fluid ">
                    <p class="px-2 text-dark mb-0 mt-3"><b>It Include:</b></p>
                    <ul>
                        <li>
                            <p class="mb-0 pb-0">Training in grantsmanship</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Grant management</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Research regulatory compliance</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Research program management</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Research ethics and governance</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Supervision and mentorship training of early and mid-career
                                researchers</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Organization capacity assessment (e.g. OCA tool)</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Research leadership Development</p>
                        </li>
                        <!-- <li>
                            <p class="mb-0 pb-0">Manuscript development and preparations</p>
                        </li> -->
                        <li>
                            <p class="mb-0 pb-0">Scientific communications</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Service 3 -->
    <div class="modal fade" id="service-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Laboratory management and capacity
                            strengthening</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/services/3.jpeg" alt="" class="img-fluid ">
                    <p class="px-2 text-dark mb-0 mt-3"><b>It Include:</b></p>
                    <ul>
                        <li>
                            <p class="mb-0 pb-0">Laboratory Quality Management System (LQMS)</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Laboratory Management</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Lab equipment management</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Laboratory Information Management Systems (LIMS)</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Laboratory and operational support for clinical trials and
                                epidemiology studies.</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Biorepositories and sample handling</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Laboratory operational support for clinical trials and
                                epidemiological studies.</p>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>


    <!-- Service 4 -->
    <div class="modal fade" id="service-4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Project monitoring and evaluation (M&E)</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/services/4.jpg" alt="" class="img-fluid ">
                    <p class="px-2 text-dark mb-0 mt-3"><b>It Include:</b></p>
                    <ul>
                        <li>
                            <p class="mb-0 pb-0">M&E project design</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Data collection and analysis</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Impact assessment</p>
                        </li>
                        <li>
                            <p class="mb-0 pb-0">Reporting M&E to stakeholders.</p>
                        </li>
                        <!-- <li>
                            <p class="mb-0 pb-0">M&E project design and implementation</p>
                        </li> -->

                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal1 -->
    <?php if (!empty($areas)) : ?>
        <?php foreach ($areas as $index => $area) : ?>
            <div class="modal fade" id="thematic-modal<?php echo $index ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $area->title; ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $area->description; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Schedule and Appointment -->
    <div class="modal fade" id="appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Schedule a Meeting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <form action="" method="post">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Your email</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Select date</label>
                                        <input type="date" class="form-control" min="<?php echo date('Y-m-d') ?>" name="date" id="date" aria-describedby="helpId" placeholder="" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Select Time</label>
                                        <input type="time" class="form-control" name="time" id="time" mind="<?php echo date('H:i'); ?>" aria-describedby="helpId" placeholder="" />
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn-fill" type="button" name="meeting" id="meeting-btn" style="width: 180px">Done</button>
                                    </div>
                                    <!-- <p class="text-danger d-none text-center" id="meeting-waiting">Please wait while the meeting link is being created...</p> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Thanks -->
    <div class="modal fade" id="thanks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <img src="assets/images/flat-round-check-mark-green-600nw-652023034.webp" alt="" class="img-fluid " style="width: 150px; height: auto;" id="meeting-img">
                            </div>
                            <div class="col-lg-12">
                                <h2 class="thanks text-center " style="font-size: 30px; font-weight: 600; color:green;" id="meeting-status">
                                    Thank You
                                </h2>
                                <p class="thanks-text text-center " id="meeting-msg">

                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Team -->
    <?php if (!empty($team)) : ?>
        <?php foreach ($team as $key => $member) : ?>
            <div class="modal fade" id="team-modal<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $member->name; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <?php echo $member->description; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>

    <script>
        function validateEmail(email) {
            // Regular expression pattern for email validation
            var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }

        $("#meeting-btn").click(function() {
            var email = $("#email").val();
            var date = $("#date").val();
            var time = $("#time").val();

            if (date == "" || time == "" || email == "") {
                alert("Please fill all fields");
            } else if (!validateEmail(email)) {
                alert("Please enter valid email address");
            } else {
                $(this).attr("disabled", true)
                $(this).html(`<div class="text-center">
                <div class="spinner-border spinner-border-sm text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                                </div></div>`)
                $("#meeting-waiting").removeClass("d-none")

                var that = $(this)
                $.ajax({
                    url: "includes/ajax.php",
                    method: 'post',
                    data: {
                        "meeting": true,
                        date,
                        time,
                        email
                    },
                    success: function(res) {
                        that.attr("disabled", false)
                        that.html(`Done`)
                        $("#meeting-waiting").addClass("d-none")
                        $("#appointment").modal("hide")

                        res = JSON.parse(res);

                        if (res.status == "success") {

                            $("#meeting-img").attr("src", "assets/images/flat-round-check-mark-green-600nw-652023034.webp")
                            $("#meeting-status").text("Thank You")
                            $("#meeting-status").css("color", "green")
                            $("#meeting-msg").html("Meeting details has been sent to you via email.")
                            $("#thanks").modal('show')

                            $("#email").val("");
                            $("#date").val("");
                            $("#time").val("");
                        } else {
                            $("#meeting-img").attr("src", "assets/images/cancel_77947.png")
                            $("#meeting-status").text("Sorry")
                            $("#meeting-status").css("color", "red")
                            $("#meeting-msg").html('Failed to schedule meeting. Please try again later.')
                            $("#thanks").modal('show')
                        }
                    },
                    error: function() {
                        that.attr("disabled", false)
                        $("#meeting-waiting").addClass("d-none")
                        $("#appointment").modal("hide")

                        $("#meeting-img").attr("src", "assets/images/cancel_77947.png")
                        $("#meeting-status").text("Sorry")
                        $("#meeting-status").css("color", "red")
                        $("#meeting-msg").html('Failed to schedule meeting. Please try again later.')
                        $("#thanks").modal('show')
                    }
                })
            }
        })
    </script>
</body>

</html>