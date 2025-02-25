<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
   
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        /* Ensure proper display for headings and lists */
.note-editable h1 {
    font-size: 2em;
    font-weight: bold;
}

.note-editable ul, .note-editable ol {
    margin-left: 20px;
}

.note-editable li {
    margin-bottom: 5px;
}

    </style>
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
                        <a href="/dashboard/service">
                            <div class="blog">
                                <i class="fa-solid fa-user-doctor"></i> Service
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
                            <button type="submit" class="logout ubuntu-light"><i class="fa-solid fa-arrow-trend-up"> </i> Logout</button>
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
    <script>
  

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>