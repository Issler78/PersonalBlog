@extends('IsslerBlog.Layouts.IsslerBlogMail')

@section('content')
<style>
    .dark-theme {
        --bs-body-bg: #2B3035;
        --bs-body-color: #fff;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-white: #fff;
        --bs-black: #000;
    }
</style>
<div style="background-color: #F1F1F1; padding: 20px;">
    <p style="font-size: 16px;">Hello, {{ $username }};</p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-0">
                <p style="font-size: 26px;" class="text-center my-5">Your @php echo( $postOrReply ? 'Post' : 'Reply' ); @endphp has been Replied!</p>

                <div class="w-100 border border-2 border-secondary rounded p-3 mb-2 dark-theme">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <div class="rounded-circle bg-success d-flex justify-content-center align-items-center border border-black" style="width: 2rem; height: 2rem;">
                                <span>{{ getInitials($userReply->username) }}</span>
                            </div>
                            <span class="text-body-secondary">
                                {{ $userReply->username }}
                                @if ($userReply->email === env('MAIL_FROM_ADDRESS'))
                                    <i class="bi bi-check2-circle"></i>
                                @endif
                            </span>
                        </div>
                        <small class="text-body-tertiary">{{ $reply->created_at }}</small>
                    </div>
                    <hr class="my-2 border-2 text-body-secondary">
                    <div class="mx-2 mt-3 mb-2">
                        <span class="mb-3">{!! html_entity_decode( addStyles($reply->body) ) !!}</span>
                    </div>
                </div>

                <p style="font-size: 16px;" class="text-center m-0">Check it out <a href="{{ route('IsslerBlog.show', ['id' => $reply->post_id]) }}">here</a>!</p>
                
            </div>
        </div>
    </div>
</div>
@endsection