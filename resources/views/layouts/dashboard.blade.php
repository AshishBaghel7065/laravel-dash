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

<style>
    .custom-alert {
        position: fixed;
        top: 40px;
        right: 30px;
        /* background-color: #ff4d4d; */
        background-color: white;
        color: white;
        font-weight: 700;
        padding: 0px 20px;
        padding-top: 10px;
        border-radius:50px;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        width: 350px;
        font-size: 14px;
        font-weight: 500;
        z-index: 1000;
        animation: fadeIn 0.5s ease-in-out;
    }

    .custom-alert.success {
        background-color: white;
        color: green
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .progress {
        height: 1px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
        margin-top: 8px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: white;
        transition: width 10s linear;
    }
</style>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="custom-alert" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="error-progress" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @endif
    
        @if(session('success'))
            <div class="custom-alert success" id="success-alert">
                {{ session('success') }}
                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="success-progress" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @endif
    </div>
    
    <script>
        function startCountdown(alertId, progressId) {
            let alertElement = document.getElementById(alertId);
            let progressElement = document.getElementById(progressId);
    
            if (alertElement) {
                let width = 100;
                let interval = setInterval(() => {
                    width -= 5; // Decrease width by 10% every second
                    progressElement.style.width = width + "%";
                    progressElement.setAttribute("aria-valuenow", width);
    
                    if (width <= -10) {
                        clearInterval(interval);
                        alertElement.style.display = 'none';
                        location.reload(); // Refresh the page after alert disappears
                    }
                },1000);
            }
        }
    
        // Start countdown for error and success alerts
        startCountdown('error-alert', 'error-progress');
        startCountdown('success-alert', 'error-progress');
    </script>
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