<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  @include('includes.auth.style')
  @stack('style')
</head>

<body>
  @yield('content')

  <!-- General JS Scripts -->
  @include('includes.auth.script')
  @stack('script')

  <!-- Page Specific JS File -->
</body>
</html>
