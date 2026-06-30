<script type="text/javascript">
function MM_swapImgRestore(){var i,x,a=document.MM_sr;for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++)x.src=x.oSrc;}
function MM_preloadImages(){var d=document;if(d.images){if(!d.MM_p)d.MM_p=new Array();var i,j=d.MM_p.length,a=MM_preloadImages.arguments;for(i=0;i<a.length;i++)if(a[i].indexOf("#")!=0){d.MM_p[j]=new Image;d.MM_p[j++].src=a[i];}}}
function MM_findObj(n,d){var p,i,x;if(!d)d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}if(!(x=d[n])&&d.all)x=d.all[n];for(i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=MM_findObj(n,d.layers[i].document);if(!x&&d.getElementById)x=d.getElementById(n);return x;}
function MM_swapImage(){var i,j=0,x,a=MM_swapImage.arguments;document.MM_sr=new Array;for(i=0;i<(a.length-2);i+=3)if((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x;if(!x.oSrc)x.oSrc=x.src;x.src=a[i+2];}}
</script>

<table width="216" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9" valign="top" background="{{ asset('images/menu_L1.jpg') }}">
      <img src="{{ asset('images/menu_011.jpg') }}" width="9" height="487">
    </td>
    <td width="199" align="left" valign="top">
      <table width="199" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            {{-- Top logo + login button --}}
            <table width="199" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="{{ asset('images/menu_191.jpg') }}" width="196" height="47"></td>
              </tr>
              <tr>
                <td>
                  <a href="{{ route('home') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgHome','','{{ asset('images/menu_over_06.jpg') }}',1)">
                    <img src="{{ asset('images/menu_06.jpg') }}" name="imgHome" width="196" height="23" border="0" alt="หน้าแรก">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_31.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td background="{{ asset('images/menu_28111.jpg') }}">
                  @if(!session('user'))
                    <a href="{{ route('login') }}"
                       onMouseOut="MM_swapImgRestore()"
                       onMouseOver="MM_swapImage('imgLogin','','{{ asset('images/menu_over_43.jpg') }}',1)">
                      <img src="{{ asset('images/menu_43.jpg') }}" name="imgLogin" width="196" height="22" border="0" alt="เข้าสู่ระบบ">
                    </a>
                  @else
                    <a href="{{ route('logout') }}"
                       onMouseOut="MM_swapImgRestore()"
                       onMouseOver="MM_swapImage('imgLogout','','{{ asset('images/menu_over_43.jpg') }}',1)">
                      <img src="{{ asset('images/menu_43.jpg') }}" name="imgLogout" width="196" height="22" border="0" alt="ออกจากระบบ">
                    </a>
                  @endif
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_33.jpg') }}" width="196" height="3"></td></tr>
            </table>

            {{-- Mini calendar widget --}}
            <table width="199" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="{{ asset('images/tabal-right_06.jpg') }}" width="197" height="26" alt="ปฏิทินกิจกรรม"></td>
              </tr>
              <tr>
                <td>
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9" background="{{ asset('images/tabal-right_02.jpg') }}">
                        <img src="{{ asset('images/tabal-right_02.jpg') }}" width="9" height="55">
                      </td>
                      <td width="179" align="center" valign="top" bgcolor="#FFFFCC">
                        @include('partials.mini-calendar')
                      </td>
                      <td width="10" background="{{ asset('images/tabal-right_04.jpg') }}">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td><img src="{{ asset('images/tabal-right_05.jpg') }}" width="197" height="9"></td>
              </tr>
            </table>

            {{-- Club info links --}}
            <table width="199" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="{{ asset('images/tabal-right_11.jpg') }}" width="197" height="26"></td>
              </tr>
              <tr>
                <td>
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9" background="{{ asset('images/tabal-right_02.jpg') }}">
                        <img src="{{ asset('images/tabal-right_02.jpg') }}" width="9" height="55">
                      </td>
                      <td width="170" valign="top" style="font-size:12px; padding:4px;">
                        <a href="#" class="leftmenu">@คณะกรรมการชมรม</a><br>
                        <a href="#" class="leftmenu">@ตัวแทน/ผู้ประสานงาน</a><br>
                        <a href="#" class="leftmenu">@วิสัยทัศน์ ค่านิยม ยุทธศาสตร์</a><br>
                        <a href="#" class="leftmenu">@ระเบียบการบริหารงาน</a><br>
                        <a href="{{ route('bill.index') }}" class="leftmenu">@บัญชีสถานะการเงิน</a><br>
                        <a href="{{ route('download.index') }}" class="leftmenu">@ดาวน์โหลด</a>
                      </td>
                      <td width="10" background="{{ asset('images/tabal-right_04.jpg') }}">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td><img src="{{ asset('images/tabal-right_05.jpg') }}" width="197" height="9"></td>
              </tr>
            </table>

          </td>
        </tr>

        {{-- Webboard section --}}
        <tr>
          <td>
            <table width="197" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="{{ asset('images/menu_newss_02.jpg') }}" width="196" height="45" border="0"></td>
              </tr>
              <tr>
                <td>
                  <a href="{{ route('guestbook.index') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgGb','','{{ asset('images/menu_over_16.jpg') }}',1)">
                    <img src="{{ asset('images/menu_16.jpg') }}" name="imgGb" width="196" height="22" border="0" alt="สมุดเยี่ยม">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_09.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td><img src="{{ asset('images/menu_21.jpg') }}" width="196" height="47" border="0"></td>
              </tr>
            </table>
          </td>
        </tr>

        {{-- Main menu links --}}
        <tr>
          <td>
            <table width="197" border="0" cellpadding="0" cellspacing="0">
              <tr><td><img src="{{ asset('images/menu_07.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 1]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb1','','{{ asset('images/menu_over_08.jpg') }}',1)">
                    <img src="{{ asset('images/menu_08.jpg') }}" name="imgWb1" width="196" height="22" border="0" alt="กระดานข่าว">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_09.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 2]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb2','','{{ asset('images/menu_over_10.jpg') }}',1)">
                    <img src="{{ asset('images/menu_10.jpg') }}" name="imgWb2" width="196" height="22" border="0" alt="ข่าวศิษย์เก่า">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_13.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 30]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb30','','{{ asset('images/menu_over_42.jpg') }}',1)">
                    <img src="{{ asset('images/menu_42.jpg') }}" name="imgWb30" width="196" height="22" border="0" alt="บุญกุศล">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_15.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 5]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb5','','{{ asset('images/menu_over_41.jpg') }}',1)">
                    <img src="{{ asset('images/menu_41.jpg') }}" name="imgWb5" width="196" height="22" border="0" alt="ข่าวน้องๆ">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_17.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 29]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb29','','{{ asset('images/menu_over_40.jpg') }}',1)">
                    <img src="{{ asset('images/menu_40.jpg') }}" name="imgWb29" width="196" height="22" border="0" alt="กิจกรรมชมรม">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_19.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 6]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWb6','','{{ asset('images/menu_over_18.jpg') }}',1)">
                    <img src="{{ asset('images/menu_18.jpg') }}" name="imgWb6" width="196" height="22" border="0" alt="ประชาสัมพันธ์">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_11.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('download.index') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgDl','','{{ asset('images/menu_over_20.jpg') }}',1)">
                    <img src="{{ asset('images/menu_20.jpg') }}" name="imgDl" width="196" height="22" border="0" alt="ดาวน์โหลด">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_31.jpg') }}" width="196" height="3"></td></tr>
              @if(session('user'))
              <tr>
                <td>
                  <a href="{{ route('message.index') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgMsg','','{{ asset('images/menu_over_28.jpg') }}',1)">
                    <img src="{{ asset('images/menu_28.jpg') }}" name="imgMsg" width="196" height="22" border="0" alt="ส่งข้อความ">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_33.jpg') }}" width="196" height="3"></td></tr>
              @endif
              <tr>
                <td>
                  <a href="{{ route('contact.index') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgContact','','{{ asset('images/menu_over_32.jpg') }}',1)">
                    <img src="{{ asset('images/menu_32.jpg') }}" name="imgContact" width="196" height="22" border="0" alt="ติดต่อนายกชมรม">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_33.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('contact.webmaster') }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgWebmaster','','{{ asset('images/menu_over_34.jpg') }}',1)">
                    <img src="{{ asset('images/menu_34.jpg') }}" name="imgWebmaster" width="196" height="22" border="0" alt="ติดต่อ webmaster">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_33.jpg') }}" width="196" height="3"></td></tr>
            </table>
          </td>
        </tr>

        {{-- News section --}}
        <tr>
          <td>
            <img src="{{ asset('images/menu_news_19.jpg') }}" width="196" height="47" border="0">
          </td>
        </tr>
        <tr>
          <td>
            <table width="196" cellspacing="0" cellpadding="0">
              <tr><td><img src="{{ asset('images/menu_07.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 7]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgNews20','','{{ asset('images/menu_news_over_20.jpg') }}',1)">
                    <img src="{{ asset('images/menu_news_20.jpg') }}" name="imgNews20" width="196" height="22" border="0" alt="วิชาชีพ">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_09.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 7]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgNews22','','{{ asset('images/menu_news_over_22.jpg') }}',1)">
                    <img src="{{ asset('images/menu_news_22.jpg') }}" name="imgNews22" width="196" height="22" border="0" alt="คำคม">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_13.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 7]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgNews24','','{{ asset('images/menu_news_over_24.jpg') }}',1)">
                    <img src="{{ asset('images/menu_news_24.jpg') }}" name="imgNews24" width="196" height="22" border="0" alt="เรื่องสุขภาพ">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_15.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 7]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgNews26','','{{ asset('images/menu_news_over_26666.jpg') }}',1)">
                    <img src="{{ asset('images/menu_news_2666.jpg') }}" name="imgNews26" width="196" height="22" border="0" alt="เรื่องของรุ่น 96">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_17.jpg') }}" width="196" height="3"></td></tr>
              <tr>
                <td>
                  <a href="{{ route('webboard.index', ['group_id' => 7]) }}"
                     onMouseOut="MM_swapImgRestore()"
                     onMouseOver="MM_swapImage('imgNews28','','{{ asset('images/menu_news_over_28.jpg') }}',1)">
                    <img src="{{ asset('images/menu_news_28.jpg') }}" name="imgNews28" width="196" height="22" border="0" alt="เรื่องฝันหวาน">
                  </a>
                </td>
              </tr>
              <tr><td><img src="{{ asset('images/menu_19.jpg') }}" width="196" height="3"></td></tr>
            </table>
          </td>
        </tr>

        {{-- Social/external links --}}
        <tr>
          <td>
            <img src="{{ asset('images/menu_newss_19.jpg') }}" width="196" height="47">
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;&nbsp;<a href="https://www.facebook.com/pages/OSK-96/287713091258895" target="_blank">
              <img src="{{ asset('images/facebook_osk96.jpg') }}" width="185" height="50" border="0" alt="Facebook OSK 96">
            </a>
          </td>
        </tr>
        <tr><td style="height:4px;"></td></tr>
        <tr>
          <td>
            &nbsp;&nbsp;<a href="http://www.sk.ac.th/" target="_blank">
              <img src="{{ asset('images/logo_sk.jpg') }}" border="0" alt="โรงเรียนสวนกุหลาบ">
            </a>
          </td>
        </tr>
        <tr><td style="height:4px;"></td></tr>
        <tr>
          <td>
            &nbsp;&nbsp;<a href="http://www.osknetwork.com/" target="_blank">
              <img src="{{ asset('images/osknetwork.jpg') }}" border="0" alt="OSKNETWORK">
            </a>
          </td>
        </tr>
        <tr><td style="height:4px;"></td></tr>
        <tr>
          <td>
            &nbsp;&nbsp;<a href="http://www.suanboard.net/" target="_blank">
              <img src="{{ asset('images/sua.jpg') }}" border="0" alt="สวนบอร์ด">
            </a>
          </td>
        </tr>

      </table>
    </td>
    <td width="8" valign="top" background="{{ asset('images/menu_R1.jpg') }}">
      <img src="{{ asset('images/menu_031.jpg') }}" width="8" height="487">
    </td>
  </tr>
  <tr>
    <td colspan="3">
      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="{{ asset('images/menu_foot_01.jpg') }}" width="19" height="12"></td>
          <td background="{{ asset('images/menu_foot_02.jpg') }}"><img src="{{ asset('images/menu_foot_02.jpg') }}" width="177" height="12"></td>
          <td align="right" background="{{ asset('images/menu_foot_02.jpg') }}"><img src="{{ asset('images/menu_foot_03.jpg') }}" width="17" height="12"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
