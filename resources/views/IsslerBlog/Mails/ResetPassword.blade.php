@extends('IsslerBlog.Layouts.IsslerBlogMail')

@section('content')
<style>
    .button-4 {
        appearance: none;
        background-color: #FAFBFC;
        border: 1px solid rgba(27, 31, 35, 0.15);
        border-radius: 6px;
        box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
        box-sizing: border-box;
        color: #24292E;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        list-style: none;
        padding: 6px 16px;
        position: relative;
        transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: middle;
        white-space: nowrap;
        word-wrap: break-word;
    }

    .button-4:hover {
        background-color: #F3F4F6;
        text-decoration: none;
        transition-duration: 0.1s;
    }

    .button-4:disabled {
        background-color: #FAFBFC;
        border-color: rgba(27, 31, 35, 0.15);
        color: #959DA5;
        cursor: default;
    }

    .button-4:active {
        background-color: #EDEFF2;
        box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
        transition: none 0s;
    }

    .button-4:focus {
        outline: 1px transparent;
    }

    .button-4:before {
        display: none;
    }

    .button-4:-webkit-details-marker {
        display: none;
    }
</style>
<div style="background-color: #F1F1F1; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-0">
                <p style="font-size: 26px;" class="text-center mt-5 mb-5">Reset your IsslerBlog password</p>
                <div class="bg-white px-3 py-4">
                    <p style="font-size: 14px;" class="text-wrap mb-5">We heard that you lost your IsslerBlog password. Sorry about that!</p>
                    <p style="font-size: 14px;" class="text-wrap mb-4">But don't worry! You can use the following button to reset your password:</p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('IsslerBlog.password.reset', ['token' => $token]) }}">
                            <button class="button-4" role="button">Reset Password</button>
                        </a>
                    </div>

                    <p style="font-size: 14px;" class="mt-5">Thanks, IsslerBlog</p>
                </div>
            </div>
        </div>
    </div>
</div>