@extends('IsslerBlog.Layouts.IsslerBlogMain')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 698px;">
    <div class="wrapper">
        <div class="text-center fs-1">
            <span class="border border-2 border-light rounded-circle px-3 py-2"><i class="bi bi-envelope-check-fill"></i></span>
        </div>
        <h1 class="text-center my-3">Verify your Email</h1>
        <p>We sent a 6-digit code to email <b>name@example.com</b>, please confirm it below.</p>
        @if (session()->has('incorrect'))
            <span class="mt-0 text-danger">{{ session('incorrect') }}</span>
        @endif
        <form action="{{ route('IsslerBlog.verify') }}" method="POST">
            @csrf
            <input type="hidden" name="code" id="code">
            <div class="otp-card-inputs my-4">
                <input type="text" class="form-control" maxlength="1" autofocus>
                <input type="text" class="form-control" maxlength="1">
                <input type="text" class="form-control" maxlength="1">
                <input type="text" class="form-control" maxlength="1">
                <input type="text" class="form-control" maxlength="1">
                <input type="text" class="form-control" maxlength="1">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="text-decoration-none">Resend code</a>
                <button id="btn-verify" type="submit" class="btn btn-md btn-outline-light" disabled>Verify</button>
            </div>
        </form>
    </div>
</div>
<style>
    body {
        background-image: url('/img/wallpapers/authenticate-wallpaper.jpg');
        background-size: cover;
        background-position: 50% 30%;
        min-height: 100vh;
    }

    .wrapper {
        width: 560px;
        background-color: transparent;
        backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 10px;
        color: white;
        padding: 35px 20px;
    }
    
    .otp-card-inputs {
        display: grid;
        gap: 30px;
        justify-content: center;
        grid-template-columns: repeat(6, auto);
    }

    .otp-card-inputs input {
        width: 60px;
        height: 70px;
        font-size: 35px;
        text-align: center;
        border-radius: 20px;
        border: 1px solid white;
    }

    #btn-verify[disabled]{
        opacity: .6;
        cursor: default;
    }

    a {
        color: #fff;
    }

    a:hover {
        box-shadow: 0px 2px #fff;
    }
</style>

<script>
    const inputs = document.querySelectorAll('.otp-card-inputs input');
    const button = document.getElementById('btn-verify');
    const inputCode = document.getElementById('code');

    inputs.forEach(input => {
        let lastInputStatus = 0;
        input.onkeyup = (e) => {
            const currentElement = e.target;
            const nextElement = input.nextElementSibling;
            const prevElement = input.previousElementSibling;

            if (prevElement && e.keyCode === 8)
            {
                if (lastInputStatus === 1)
                {
                    prevElement.value = '';
                    prevElement.focus();
                }

                button.setAttribute('disabled', true);
                lastInputStatus = 1;
            }
            else
            {
                const reg = /^[0-9]+$/;
                if (!reg.test(currentElement.value))
                {
                    currentElement.value = currentElement.value.replace(/\D/g, '');
                }
                else if (currentElement.value)
                {
                    if (nextElement)
                    {
                        nextElement.focus();
                    }
                    else
                    {
                        button.removeAttribute('disabled');
                        lastInputStatus = 0;
                    }
                }
            }


            
            let combinedValue = '';
            inputs.forEach(input => {
                combinedValue += input.value;
            });
            inputCode.value = combinedValue;
        }
    });
</script>
@endsection