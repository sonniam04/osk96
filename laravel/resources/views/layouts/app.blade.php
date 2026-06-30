<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>@yield('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) ยินดีต้อนรับทุกท่าน')</title>
<link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
body {
    margin: 0;
    padding: 0;
    background-color: #308EC4;
    font-family: "Microsoft Sans Serif", Tahoma, sans-serif;
    font-size: 14px;
}
</style>
@stack('scripts-head')
</head>

<body>
<table width="960" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" background="{{ asset('images/bg.jpg') }}">
  <tr>
    <td align="center" valign="top">
      <table cellspacing="0" cellpadding="0">

        {{-- Header / Banner --}}
        <tr>
          <td>@include('partials.header')</td>
        </tr>

        {{-- Blue stripe below banner --}}
        <tr>
          <td align="center">
            <img src="{{ asset('images/web-team_over_04.jpg') }}" alt="">
          </td>
        </tr>

        {{-- Main content row: sidebar | content | right --}}
        <tr>
          <td align="left" valign="top">
            <table cellspacing="0" cellpadding="0">
              <tr>
                {{-- Left Sidebar --}}
                <td width="216" valign="top">
                  @include('partials.sidebar')
                </td>

                {{-- Main Content --}}
                <td width="748" align="center" valign="top">
                  @yield('content')
                </td>

                {{-- Right sidebar --}}
                <td width="197" align="right" valign="top">
                  @include('partials.right-sidebar')
                </td>
              </tr>
            </table>
          </td>
        </tr>

        {{-- Bottom stripe --}}
        <tr>
          <td>
            <img src="{{ asset('images/web-team_over_08.jpg') }}" width="1004" height="7" alt="">
          </td>
        </tr>

        {{-- Footer --}}
        @include('partials.footer')

      </table>
    </td>
  </tr>
</table>
</body>
</html>
