@if (session()->has('message'))
    <div class="alert alert-success m-2" style="background-color: #0F5132; border: 2px solid #548770;" role="alert">
        <i class="bi bi-check2-circle"></i> {{ session('message') }}
    </div>
@endif