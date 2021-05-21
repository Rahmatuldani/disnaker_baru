@extends('layouts.master')

@section('content')
<!-- Page Header -->
<header class="page-header page-header-dark bg-success">
    <div class="page-header-content pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <h1 class="page-header-title">Selamat Datang di BKK - Online</h1>
                    <p class="page-header-text mb-5">Welcome to SB UI Kit Pro, a toolkit for building beautiful web interfaces, created by the development team at Start Bootstrap</p>
                </div>
                <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="100"><img class="img-fluid" src="{{ asset('sb_ui/assets/img/illustrations/programming.svg') }}" /></div>
            </div>
        </div>
    </div>
    <div class="svg-border-waves text-white">
        <!-- Wave SVG Border--><svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }
                    .b {
                        clip-path: url(#a);
                    }
                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }
                </style>
            </defs>
            <clipPath id="a"><rect class="a" width="1920" height="75" /></clipPath>
            <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" /></g>
            <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" /></g>
            <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" /></g>
            <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" /></g>
        </svg>
    </div>
</header>

<section class="bg-light py-10">
    <div class="container col-xl-8 mb-5">
        <!-- Example Colored Cards for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Earnings (Monthly)</div>
                                <div class="text-lg font-weight-bold">$40,000</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="calendar"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Report</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Earnings (Annual)</div>
                                <div class="text-lg font-weight-bold">$215,000</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Report</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Task Completion</div>
                                <div class="text-lg font-weight-bold">24</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Tasks</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Pending Requests</div>
                                <div class="text-lg font-weight-bold">17</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Requests</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container col-xl-6">
        <div class="d-flex align-items-center justify-content-between">
            <h6 class="mb-0">Top Stories</h6>
            <div>
                <a class="text-arrow-icon small" href="#!">View more<i data-feather="arrow-right"></i></a>
            </div>
        </div>
        <hr class="mb-4" />
        <div class="row">
            <div class="media">
                <div class="media-body">
                    <a class="text-dark" href="#!"><h5 class="mt-0">Is the Bootstrap framework the best way to build a mobile responsive website?</h5></a>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <a class="text-arrow-icon small" href="#!">Read more<i data-feather="arrow-right"> </i></a>
                </div>
                <a href="#!"><img class="align-self-start rounded shadow media-img ml-4" src="https://source.unsplash.com/fG1vt_RtUGs/160x160" alt="..." /></a>
            </div>
            <hr class="my-4" />
            <div class="media">
                <div class="media-body">
                    <a class="text-dark" href="#!"><h5 class="mt-0">Is virtual reality the new UI? Exploring the use of virtual reality and 3D user interfaces for everyday products</h5></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt repellat possimus delectus odit vero! Accusantium, omnis! Amet reiciendis ex numquam. Minus corporis, tempore facere placeat repellat ipsum eaque similique neque.</p>
                    <a class="text-arrow-icon small" href="#!">Read more<i data-feather="arrow-right"> </i></a>
                </div>
                <a href="#!"><img class="align-self-start rounded shadow media-img ml-4" src="https://source.unsplash.com/QnSaohz728o/160x160" alt="..." /></a>
            </div>
            <hr class="my-4" />
            <div class="media">
                <div class="media-body">
                    <a class="text-dark" href="#!"><h5 class="mt-0">How cats can improve your workflow productivity</h5></a>
                    <p>Quasi error voluptates, commodi enim voluptate, quisquam vitae temporibus asperiores velit vero aperiam culpa iste eius autem praesentium ducimus similique iusto dolorum.</p>
                    <a class="text-arrow-icon small" href="#!">Read more<i data-feather="arrow-right"></i></a>
                </div>
                <a href="#!"><img class="align-self-start rounded shadow media-img ml-4" src="https://source.unsplash.com/bN9FFTPlLjU/160x160" alt="..." /></a>
            </div>
            <hr class="my-4 d-lg-none" />
        </div>
        <hr class="my-4" />
    </div>
    <div class="svg-border-waves text-dark">
        <!-- Wave SVG Border--><svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }
                    .b {
                        clip-path: url(#a);
                    }
                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }
                </style>
            </defs>
            <clipPath id="a"><rect class="a" width="1920" height="75" /></clipPath>
            <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" /></g>
            <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" /></g>
            <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" /></g>
            <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" /></g>
        </svg>
    </div>
</section>

@endsection

