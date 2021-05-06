<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Sacred Heart of Jesus Catholic School Student Web Portal</title>
     <!-- Bootstrap Scripts -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
     <link href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- Font -->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
     <!-- FontAwesome for Icons -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
     integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <!-- CSS File -->
     <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    
     <!-- Table Sorter -->
     <link href="{{ asset('css/tableSorter.css') }}" rel="stylesheet" />
     <script defer src="{{ asset('js/tableSorter.js') }}"></script>

    <!-- Sweetalert2 JS and CSS-->
    <script src="{{ asset('js/sweetalert2@10.min.js') }}"
    integrity="sha512-Wv8c8chIOY6Gt4Fesj+VYlEt+Qd+GIIKcoZGtPPh7l6Edc0QZlJoYQGVoQIBDDAFSzRNbJfnS9ml47BGRNdNiQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert2@10.min.css') }}" integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>



<body id="mainbody">
    <div id="master">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-xl fixed-top navbar-light">
            <img src="{{ asset('images/logo.jpg') }}" class="mt-n1 mr-2" style="width: 30px; height: 30px">
            <p class="p-0 m-0" style="color: #d11d27; font-weight: 600">Sacred Heart of Jesus Catholic School</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-ellipsis-v" style="color: #d11d27"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="/changePassword">Change Password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div> 
        </nav>

        <div class="mdrecords-body">

            @yield('content')

        </div>

</body>
</html>
