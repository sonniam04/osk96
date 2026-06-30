@extends('layouts.app')

@section('title', 'ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96) ยินดีต้อนรับทุกท่าน')

@push('scripts-head')
<script type="text/javascript">
function MM_swapImgRestore(){var i,x,a=document.MM_sr;for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++)x.src=x.oSrc;}
function MM_preloadImages(){var d=document;if(d.images){if(!d.MM_p)d.MM_p=new Array();var i,j=d.MM_p.length,a=MM_preloadImages.arguments;for(i=0;i<a.length;i++)if(a[i].indexOf("#")!=0){d.MM_p[j]=new Image;d.MM_p[j++].src=a[i];}}}
function MM_findObj(n,d){var p,i,x;if(!d)d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}if(!(x=d[n])&&d.all)x=d.all[n];for(i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=MM_findObj(n,d.layers[i].document);if(!x&&d.getElementById)x=d.getElementById(n);return x;}
function MM_swapImage(){var i,j=0,x,a=MM_swapImage.arguments;document.MM_sr=new Array;for(i=0;i<(a.length-2);i+=3)if((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x;if(!x.oSrc)x.oSrc=x.src;x.src=a[i+2];}}
</script>
@endpush

@section('content')
<table width="100%" cellspacing="0" cellpadding="0">

  {{-- Section: Latest Posts (blog_new) --}}
  <tr>
    <td background="{{ asset('images/bp.jpg') }}">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="{{ asset('images/table-body_011.jpg') }}" width="530" height="27"><a href="{{ route('webboard.index') }}?group_id=1" title="คลิกเพื่อแสดงกระทู้ทั้งหมด"><img src="{{ asset('images/tool_bar2_02.jpg') }}" width="64" height="27" border="0"></a>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" background="{{ asset('images/table-body_02.jpg') }}">
                  <img src="{{ asset('images/table-body_02.jpg') }}" width="5" height="132">
                </td>
                <td width="584" valign="top"><br>
                  <table width="100%" cellspacing="0" cellpadding="0">
                    @forelse($latestPosts as $post)
                    <tr>
                      {{-- Thumbnail column --}}
                      <td width="23%">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="{{ asset('images/table-box_01.jpg') }}" width="129" height="21"></td>
                          </tr>
                          <tr>
                            <td>
                              <table cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="11" valign="top"><img src="{{ asset('images/table-box_02.jpg') }}" width="11" height="87"></td>
                                  <td width="106" height="87" align="center" valign="middle" background="{{ asset('images/table-box_03.jpg') }}">
                                    <a href="{{ route('webboard.index') }}?question_id={{ $post->question_id }}" target="_blank">
                                      @if(!empty($post->question_file))
                                        <img src="/uploads/{{ $post->question_file }}" border="0" width="105" height="87">
                                      @else
                                        <img src="{{ asset('images/0skkk2.jpg') }}" border="0">
                                      @endif
                                    </a>
                                  </td>
                                  <td width="12" valign="top"><img src="{{ asset('images/table-box_04.jpg') }}" width="12" height="87"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td><img src="{{ asset('images/table-box_05.jpg') }}" width="129" height="18"></td>
                          </tr>
                        </table>
                      </td>

                      {{-- Card content column (Image12 border) --}}
                      <td width="77%" align="left" valign="top">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="18" height="128" align="left">
                              <img src="{{ asset('images/Image12_01.jpg') }}" width="18" height="128">
                            </td>
                            <td>
                              <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="{{ asset('images/Image12_02.jpg') }}" width="400" height="11"></td>
                                </tr>
                                <tr>
                                  <td width="440" height="107" background="{{ asset('images/Image12_04.jpg') }}" valign="top" style="padding:4px;">
                                    <a href="{{ route('webboard.index') }}?question_id={{ $post->question_id }}" target="_blank" class="webboard">
                                      {{ $post->question_title }}
                                    </a><br>
                                    {{ mb_substr(strip_tags($post->question_detail ?? ''), 0, 200) }}...
                                  </td>
                                </tr>
                                <tr>
                                  <td><img src="{{ asset('images/Image12_05.jpg') }}" width="400" height="10"></td>
                                </tr>
                              </table>
                            </td>
                            <td width="18" align="right">
                              <img src="{{ asset('images/Image12_03.jpg') }}" width="18" height="128">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    @empty
                    <tr><td colspan="2" align="center" style="padding:20px; color:#666;">ยังไม่มีโพสต์</td></tr>
                    @endforelse
                  </table>
                </td>
                <td align="right" background="{{ asset('images/table-body_04.jpg') }}">
                  <img src="{{ asset('images/table-body_04.jpg') }}" width="5" height="132">
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td><img src="{{ asset('images/table-body_05.jpg') }}" width="594" height="6"></td>
        </tr>
      </table>
    </td>
  </tr>

  {{-- Section: Recent Topics (blog_subject) --}}
  <tr>
    <td background="{{ asset('images/bp.jpg') }}">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="{{ asset('images/tool_bar2_01.jpg') }}" width="530" height="27"><a href="{{ route('webboard.index') }}" title="คลิกเพื่อแสดงกระทู้ทั้งหมด"><img src="{{ asset('images/tool_bar2_02.jpg') }}" width="64" height="27" border="0"></a>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" background="{{ asset('images/table-body_02.jpg') }}">
                  <img src="{{ asset('images/table-body_02.jpg') }}" width="5" height="132">
                </td>
                <td width="584" valign="top">
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr align="center" style="font-weight:bold;">
                      <td width="63%">หัวข้อ</td>
                      <td width="8%">&nbsp;</td>
                      <td width="15%">หมวด</td>
                      <td width="14%">วันเดือนปี</td>
                    </tr>
                    @forelse($recentTopics as $topic)
                    <tr align="left">
                      <td style="padding:2px 4px;">
                        <a href="{{ route('webboard.index') }}?question_id={{ $topic->question_id }}" target="_blank" class="webboard">
                          {{ mb_substr($topic->question_title, 0, 58) }}...
                        </a>
                      </td>
                      <td>&nbsp;</td>
                      <td align="center" style="font-size:11px;">{{ $topic->group_name }}</td>
                      <td align="center" style="font-size:11px;">
                        @php
                          $d = \Carbon\Carbon::parse($topic->question_date);
                          $mm = ['','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
                          echo $d->format('d').' '.$mm[(int)$d->format('m')].' '.substr($d->year+543,2);
                        @endphp
                      </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" align="center" style="padding:10px; color:#666;">ยังไม่มีโพสต์</td></tr>
                    @endforelse
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  {{-- Section: Activities --}}
  <tr>
    <td background="{{ asset('images/bp.jpg') }}">
      <table width="594" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <img src="{{ asset('images/tool_bar3_01.jpg') }}" width="530" height="27">
            <img src="{{ asset('images/tool_bar3_02.jpg') }}" width="64" height="27">
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="4">
              <tr>
                @forelse($activities as $act)
                <td align="center" valign="top" width="25%">
                  <img src="{{ asset('images/0skkk2.jpg') }}" width="120" height="90" border="0">
                  <br>
                  <span style="font-size:11px;">{{ mb_substr($act->a_name, 0, 30) }}</span>
                </td>
                @empty
                <td align="center" colspan="4" style="padding:20px; color:#666;">ยังไม่มีกิจกรรม</td>
                @endforelse
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>

</table>
@endsection
