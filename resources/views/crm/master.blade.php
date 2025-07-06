<!doctype html>
<html lang="en">
@include('crm.partials.header')
  <body class="vertical  light  ">
    <div class="wrapper">
        @include('crm.partials.navbar')
        @include('crm.partials.aside')


        @yield('content')


    </div> <!-- .wrapper -->
    @include('crm.partials.footer')

  </body>
</html>
