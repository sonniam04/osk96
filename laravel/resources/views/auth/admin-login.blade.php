<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) - Admin</title>
<link href="{{ asset('style.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
body {
  margin: 0; padding: 0;
  background-color: #38B8F5;
}
.style1 { color: #FF0000; }
</style>
</head>
<body>

@include('partials.header')

<table border="0" cellpadding="0" cellspacing="0" width="960" align="center" bgcolor="#FFFFFF" background="{{ asset('images/bg.jpg') }}">
  <tr>
    <td>

      <form name="form1" method="post" action="{{ route('admin.login.post') }}">
        @csrf
        <table width="307" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCCFF" bgcolor="#BDD2F9" style="margin-top:30px;">
          <tr bgcolor="#FFFFFF">
            <td><div align="center" class="style1" style="font-family:Tahoma,sans-serif; font-size:13px; padding:4px;">ระบบจัดการฐานข้อมูลสมาชิกชมรม</div></td>
          </tr>
          <tr>
            <td bgcolor="#000066">
              <table width="303" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr bgcolor="#BDD2F9">
                  <td height="10" colspan="3">&nbsp;</td>
                </tr>

                @if(session('error'))
                <tr bgcolor="#BDD2F9">
                  <td colspan="3" align="center" style="color:#CC0000; font-size:12px; padding:4px;">
                    {{ session('error') }}
                  </td>
                </tr>
                @endif

                <tr bgcolor="#BDD2F9">
                  <td width="103" align="right" valign="top" class="narmal">Username</td>
                  <td width="6" class="narmal"><div align="center">:</div></td>
                  <td width="179" valign="top" class="narmal">
                    <input name="username" type="text" id="username">
                  </td>
                </tr>
                <tr bgcolor="#BDD2F9">
                  <td width="103" height="20" align="right" valign="top" class="narmal">Password</td>
                  <td class="narmal"><div align="center">:</div></td>
                  <td valign="top" class="narmal">
                    <input name="password" type="password" id="password">
                  </td>
                </tr>
                <tr bgcolor="#BDD2F9">
                  <td height="20" valign="top" class="narmal">&nbsp;</td>
                  <td height="20" valign="top" class="narmal">&nbsp;</td>
                  <td height="20" valign="top" class="narmal">
                    <input type="submit" name="Submit" value="Login">
                  </td>
                </tr>
                <tr bgcolor="#BDD2F9">
                  <td height="24" colspan="3" valign="top"><div align="center">&nbsp;</div></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </form>

      <div align="center" style="font-size:12px; margin-top:12px; color:#333;">
        ข้อมูลสมาชิกได้รับการป้องกันและบางส่วนจำเป็นต้องเข้าสู่ระบบก่อนเข้าชมใดที่ต้องการตรวจสอบข้อมูลไขข้อสงสัย<br>
        กรุณาติดต่อตัวแทนชมรมหรือติดต่อผ่านทางเว็บไซต์ระบบ OSK96
        <span class="style1">E-mail</span>
        <a href="mailto:webmaster.osk@gmail.com">webmaster.osk@gmail.com</a>
      </div>
      <br><br><br><br><br><br><br><br><br><br>

    </td>
  </tr>
</table>

@include('partials.footer')

</body>
</html>
