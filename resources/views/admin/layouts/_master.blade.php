<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>

<body class="theme-cyan">
    <div id="wrapper">
        <div id="content" style="padding-top:100px">
              @yield('content')
          </div>
      </div>
    @include('admin.layouts.foot')
</body>
</html>