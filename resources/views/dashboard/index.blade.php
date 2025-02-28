@extends('layouts.dashboard')

@section('content')

<div class="dashboard">
    <h2 class="text-3xl font-semibold"><i class="fa-solid fa-users-rectangle"></i> Welcome to Your Dashboard</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-5">
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Contact</p>
                                <p> <i class="fa-regular fa-id-badge"></i></p>
                            </div>
                            <div class="show-body">
                               
                                <h1>
                                    {{ count($contacts) }}
                                </h1>
                                <p>Total Contact</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Services</p>
                                <p><i class="fa-solid fa-screwdriver-wrench"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($services) }}
                                </h1>
                                <p>Total Serivces</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Blog</p>
                                <p><i class="fa-solid fa-comments"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($blogs) }}
                                </h1>
                                <p>Total Blog</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>FAQ</p>
                                <p> <i class="fa-solid fa-question"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($faqs) }}
                                </h1>
                                <p>Total FAQ</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>About</p>
                                <p><i class="fa-solid fa-users"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($about) }}
                                </h1>
                                <p>Total About</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Review</p>
                                <p> <i class="fa-solid fa-star-half-stroke"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($reviews) }}
                                </h1>
                                <p>Total Review</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Gallary</p>
                                <p> <i class="fa-solid fa-image"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($galleries) }}
                                </h1>
                                <p>Total Gallary Images</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p> Achievement</p>
                                <p><i class="fa-solid fa-trophy"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($achievements) }}
                                </h1>
                                <p>Total Achievement</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>Appointment</p>
                                <p><i class="fa-solid fa-calendar-days"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($contacts) }}
                                </h1>
                                <p>Total Appointment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="show-card">
                            <div class="show-head">
                                <p>SEO Pages</p>
                                <p> <i class="fa-solid fa-magnifying-glass-location"></i></p>
                            </div>
                            <div class="show-body">
                                <h1>
                                    {{ count($seoPages) }}
                                </h1>
                                <p>Total SEO Pages</p>
                            </div>
                        </div>
                    </div>

                </div>
              

            </div>

        </div>
    </div>
</div>

@endsection