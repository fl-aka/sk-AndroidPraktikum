<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.partial._css')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.partial._header')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('layouts.partial._sidebar')

    @yield('content')
    
    @include('layouts.partial._js')
  </body>
</html>