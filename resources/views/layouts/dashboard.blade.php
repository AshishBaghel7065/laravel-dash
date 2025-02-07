<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="dashboard-main ubuntu-light">
        <div class="nav-aside" id="aside">
            <div class="aside-nav-menu">
                <h2>Dashboard</h2>
                <ul class="m-0 p-0">
                    <li>
                        <a href="/dashboard">
                            <div class="blog">
                                <i class="fa-solid fa-chart-line"></i> Dashboard
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/contact">
                            <div class="blog">
                                <i class="fa-regular fa-id-badge"></i> Contact
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/blog">
                            <div class="blog">
                                <i class="fa-solid fa-comments"></i> Blog
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/faq">
                            <div class="blog">
                                <i class="fa-solid fa-question"></i> FAQ
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/about">
                            <div class="blog">
                                <i class="fa-solid fa-users"></i> About
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/review">
                            <div class="blog">
                                <i class="fa-solid fa-star-half-stroke"></i> Review
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/seo">
                            <div class="blog">
                                <i class="fa-solid fa-magnifying-glass-location"></i> SEO
                            </div>
                        </a>
                    </li>
                  
                    <li>
                        <a href="/dashboard/achievement">
                            <div class="blog">
                                <i class="fa-solid fa-trophy"></i> Achievement
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/appointment">
                            <div class="blog">
                                <i class="fa-solid fa-calendar-days"></i> Appointment
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="screen" id="screen">
            <div class="navbar">
                <button class="toggle-btn" onclick="toggleAside()">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                <!-- Profile Section with Hover Dropdown -->
                <div class="profile ubuntu-light">
                    <div class="profile-name">
                        AD
                    </div>
                    <!-- Dropdown Menu -->
                    <div class="profiledropdown">
                     <div class="prom">
                        <h5>Devloped by</h5>
                        <h5>❤️ PromotionAdda</h5>
                     </div>
                        <a href="#"><i class="fa-solid fa-user-tie"></i> View Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <b❤️utton type="submit" class="logout ubuntu-light"><i class="fa-solid fa-arrow-trend-up"> </i> Logout</b❤️utton>
                        </form>
                     
                    </div>
                </div>
            </div>

            <div class="main-content">

                @yield('content')
            </div>
          
            
        </div>
    </div>

    <footer>
        <p class="text-sm"> Developed By <span>❤️ PromotionAdda</span> | 2025 © Company Infotech</p>
    </footer>
    <script src="{{ asset('js/dash.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>