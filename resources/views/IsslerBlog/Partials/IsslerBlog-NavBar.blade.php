<style>
.nav-item a {
    display: inline-block;
}

.nav-item:not(.dropdown) a:hover {
    color: #fff;
    box-shadow: 0 2px #fff;
}

.nav-link.active.dropdown-toggle:hover {
    color: #fff;
    box-shadow: 0 2px #fff;
}

i {
    margin-right: 5px;
}
</style>
<nav class="navbar navbar-expand-xl sticky-top navbar-dark bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('IsslerBlog.index') }}"><img src="https://cdn-icons-png.flaticon.com/512/6930/6930122.png" alt="IsslerBlog Icon" width="30" height="30">IsslerBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('IsslerBlog.index') }}"><i class="bi bi-house-fill"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('IsslerBlog.category', ['category' => 'F']) }}">Front-End</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('IsslerBlog.category', ['category' => 'B']) }}">Back-End</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('IsslerBlog.category', ['category' => 'M']) }}">Mobile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('IsslerBlog.category', ['category' => 'G']) }}">Guides</a>
                </li>
                <li class="nav-item">
                    @guest    
                        <a class="nav-link active" href="{{ route('IsslerBlog.authenticate') }}#login"><i class="bi bi-person-fill"></i> Sign In</a>
                    @endguest
                    @auth
                        <li class="nav-item dropdown" id="profileDropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" id="profileDropdownToggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i>Profile</a>

                            <ul class="dropdown-menu" aria-labelledby="profileDropdownToggle">

                                <li class="dropdown dropend">

                                    <a class="dropdown-item dropdown-toggle" href="#" id="editUserDropdownToggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Edit User</a>

                                    <ul class="dropdown-menu dropdown-menu-end ms-2" aria-labelledby="editUserDropdownToggle">

                                        <li><a class="dropdown-item" href="#">Change Username</a></li>

                                        <li><a class="dropdown-item" href="#">Reset Password</a></li>
                                        
                                        <li><hr class="dropdown-divider"></li>
                                        <form action="#" method="post">
                                            @csrf
                                            <li><button class="dropdown-item text-danger" type="submit">Delete User</button></li>
                                        </form>
                                    </ul>

                                </li>

                                <li><hr class="dropdown-divider"></li>
                                <form action="{{ route('IsslerBlog.logout') }}" method="post">
                                    @csrf
                                    <li><button class="dropdown-item text-danger" type="submit">Sign Out</button></li>
                                </form>

                            </ul>

                        </li>
                    @endauth
                </li>
            </ul>
            <form class="d-flex" action="{{ route('IsslerBlog.index') }}" method="GET">
                <div class="input-group">
                    <input name="filter" value="{{ $filters['filter'] ?? '' }}" type="text" class="form-control rounded-start-pill" placeholder="Search" aria-label="Search" aria-describedby="Search-Icon">
                    <span class="input-group-text rounded-end-pill" id="Search-Icon">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>
<script>
    // Evita que o dropdown interno feche quando clicado
    document.getElementById('editUserDropdownToggle').addEventListener('click', function (e) {
        e.stopPropagation();
    });

    // Fecha todos os dropdowns quando clicados fora
    document.addEventListener('click', function (e) {
        const profileDropdown = document.getElementById('profileDropdown');
        const isOpen = profileDropdown.classList.contains('show');
        if (isOpen && e.target.closest('#profileDropdown') === null) {
            profileDropdown.classList.remove('show');
        }
    });
</script>