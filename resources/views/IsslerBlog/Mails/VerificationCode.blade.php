@extends('IsslerBlog.Layouts.IsslerBlogMail')

@section('content')
<div style="background-color: #F1F1F1; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-0">
                <p style="font-size: 26px;" class="text-center mt-5 mb-2">Your verification code:</p>
                <p style="font-size: 26px;" class="text-center mb-5">{{ $code }}</p>
                <div class="bg-white px-3 py-4">
                    <p style="font-size: 16px;" class="text-wrap mb-4">Hello, {{ $user->username }};</p>
                    <p style="font-size: 14px;" class="text-wrap mb-5">You have recently tried to login, to complete use the code above.</p>
                    <p style="font-size: 14px;">Thanks, IsslerBlog</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection