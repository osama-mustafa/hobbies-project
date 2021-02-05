@extends('layouts.app')

@section('page_title', 'About the project')
@section('page_description')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Info') }}</div>

                <div class="card-body">
                    Instant PHP Platforms on DigitalOcean, Linode, and more. Featuring push-to-deploy, Redis, queues, and everything else you could need to launch and deploy impressive Laravel applications.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
