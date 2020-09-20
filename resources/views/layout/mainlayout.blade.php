<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>


  <body>
 <!-- Image loader -->
<div id='loader' style="display:none; z-index:1200 ">
  <img src='https://cdn.dribbble.com/users/148670/screenshots/5252136/dots.gif' width='150px' height='100px'>
</div>
<!-- Image loader -->

 @include('layout.partials.nav')

        @include('layout.partials.header')

 @yield('content')


 @include('layout.partials.footer-scripts')

 
  </body>
</html>