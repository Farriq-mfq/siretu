<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        @yield('title', '-') | {{ config('app.name') }}
    </title>

    <meta name="description" content="" />
    @include('includes.basic-style')
    <link rel="stylesheet" href="{{ url('assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    @include('includes.basic-script')
</body>

</html>
