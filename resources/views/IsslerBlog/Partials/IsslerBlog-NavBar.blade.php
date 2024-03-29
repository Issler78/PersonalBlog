<style>
.nav-item a{
    display: inline-block;
}
.nav-item a:hover {
    color: #fff;
    box-shadow: 0 2px #fff;
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
                    <a class="nav-link active" href="{{ route('IsslerBlog.index') }}"><i class="bi bi-house-fill"></i> Home</a>
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
                        <a class="nav-link active" href="{{ route('IsslerBlog.authenticate') }}"><i class="bi bi-person-fill"></i> Sign In</a>
                    @endguest
                    @auth
                        <a class="nav-link active" href="#"><i class="bi bi-person-fill"></i> Profile</a>
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