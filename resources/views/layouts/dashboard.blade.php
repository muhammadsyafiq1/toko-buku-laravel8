<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  @include('includes.dashboard.style')
  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('includes.dashboard.navbar')
      
      <!-- sidebar -->
      @include('includes.dashboard.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
     
     <!-- footer -->
     @include('includes.dashboard.footer')

    </div>
  </div>

  <!-- General JS Scripts -->
  @include('includes.dashboard.script')
  @stack('script')
  <!-- Page Specific JS File -->
</body>
</html>
