@extends('layouts.app')

@section('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) - เข้าสู่ระบบ')

@section('content')
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" style="padding-top:20px;">

      <form action="{{ route('login.post') }}" method="post" name="form1" id="form1">
        @csrf
        <table width="307" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCCFF" bgcolor="#BDD2F9">
          <tr bgcolor="#FFFFFF">
            <td><div align="center" style="color:#FF0000; font-family:Tahoma,sans-serif; font-size:13px; padding:4px;">ระบบจัดการฐานข้อมูลสมาชิกชมรม</div></td>
          </tr>
          <tr>
            <td bgcolor="#000066">
              <table width="307" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
                  <td width="126" align="right" valign="top" class="narmal">เลขประจำตัวนักเรียน</td>
                  <td width="4" class="narmal"><div align="center">:</div></td>
                  <td width="177" valign="top" class="narmal">
                    <input name="username" type="text" id="username" value="{{ old('username') }}" style="width:160px;">
                  </td>
                </tr>
                <tr bgcolor="#BDD2F9">
                  <td width="126" height="20" align="right" valign="top" class="narmal">รหัสผ่าน</td>
                  <td class="narmal"><div align="center">:</div></td>
                  <td valign="top" class="narmal">
                    <input name="password" type="password" id="password" style="width:160px;">
                  </td>
                </tr>
                <tr bgcolor="#BDD2F9">
                  <td height="20" valign="top" class="narmal">&nbsp;</td>
                  <td height="20" valign="top" class="narmal">&nbsp;</td>
                  <td height="20" valign="top" class="narmal">
                    <input type="submit" name="Submit" value="เข้าสู่ระบบ">
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

      <div align="center" style="font-size:12px; margin-top:10px; color:#333;">
        ข้อมูลสมาชิกได้รับการป้องกันและบางส่วนจำเป็นต้องเข้าสู่ระบบก่อนเข้าชมใดที่ต้องการตรวจสอบข้อมูลไขข้อสงสัย<br>
        กรุณาติดต่อตัวแทนชมรมหรือติดต่อผ่านทางเว็บไซต์ระบบ OSK96
        <span style="color:#FF0000;">E-mail</span>
        <a href="mailto:webmaster.osk@gmail.com">webmaster.osk@gmail.com</a>
      </div>
      <p>&nbsp;</p>

    </td>
  </tr>
</table>
@endsection
