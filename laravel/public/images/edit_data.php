<?
session_start();
$conn_db = mysql_connect("osk96-db","osk92_123456","FFqKIgT8vr[7")or die ("Connect Error<Br>".mysql_error());
mysql_select_db("osk92_startup_osk")or die("Connect DB Error<Br>".mysql_error());
mysql_query("set names tis620");
if($_REQUEST["submit"]) {
		$ints = date('YmdGis');
		
//-- insert pic
//-- insert pic
$photo=$_FILES['fname']['tmp_name'];
$photo_name=$_FILES['fname']['name'];
$photo_size=$_FILES['fname']['size'];
$photo_type=$_FILES['fname']['type'];

$a_id=$_POST['a_id'];
$detail=ereg_replace("\n","&nbsp;",$_POST['detail']);
if (!$photo) {	
	$sql="select fname from data where autono=".$_REQUEST["id"];
	$result=mysql_query($sql) or die(mysql_error());
	$r=mysql_fetch_array($result);
	$filename=$r[0];
} 
$ext = strtolower(end(explode('.', $photo_name)));

if ($ext == "jpg" or $ext == "jpeg") {
	// หา pic_id ที่มากที่สุดของ photo
	$sql="select fname from data where autono=".$_REQUEST["id"];
	$result=mysql_query($sql) or die(mysql_error());
	$r=mysql_fetch_array($result);
	$id_max=$r[0];

	$filename=$ints.$ext;
		
	if ($ext =="jpg" or $ext =="jpeg") {
		$ori_img = imagecreatefromjpeg($photo);
	} 

	$ori_size = getimagesize($photo);
	$ori_w = $ori_size[0];
	$ori_h = $ori_size[1];

	if ($ori_w>=$ori_h) {
		$new_w = 95; 
		$new_h = round(($new_w/$ori_w) * $ori_h);
	} else {
		$new_h =125; 
		$new_w = round(($new_h/$ori_h) * $ori_w); 
	}
	$new_img= imagecreatetruecolor($new_w, $new_h);
	imagecopyresized($new_img, $ori_img,0,0,0,0,$new_w, $new_h,$ori_w,$ori_h);
	if($id_max!="") {
			if ($ext =="jpg" or $ext =="jpeg") {
				imagejpeg($new_img,"uploads/member/$filename");
			} 
		
			imagedestroy($ori_img); 
			imagedestroy($new_img);
	 }}
//-- end insert pic
		/*if($_FILES["fname"]["type"]=="fname/gif")
			$imgsn = $ints.".gif";
		elseif($_FILES["fname"]["type"]=="image/pjpeg"||$_FILES["fname"]["type"]=="image/jpeg")
			$imgsn = $ints.".jpg";
		
		if($imgsn!="") {
			$update_image=",fname='$imgsn'";
			copy($_FILES["fname"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/uploads/member/$imgsn") or die("The file couldn't be copied to the server");
		}*/
		$last_edit=date("d/m/Y H:i:s");
	$ip = $_SERVER["REMOTE_ADDR"];
	if($fname==""){ $fname=$fname2;}
		$query="UPDATE data  SET 
		id_osk ='$id_osk',
		username ='$username',
		password ='$password',
		student_id = '$student_id',
		title = '$title',
		c_name ='$c_name',
		name ='$name',
		surname ='$surname',
		birthday ='$birthday2',
		status ='$status',
		work ='$work',
		tel_h ='$tel_h',
		e_mail ='$e_mail',
 		addr1_tambom = '$addr1_tambom',
		addr2_amphur ='$addr2_amphur',
		addr3_province ='$addr3_province',
		postal_code ='$postal_code',
		telephone ='$telephone',
		off ='$off',
		off_amphur ='$off_amphur',
		off_province ='$off_province',
		off_post ='$off_post',
		off_tel ='$off_tel',
 		class1 ='$class1',
		class2 ='$class2',
		class3 ='$class3',
		class4 ='$class4',
		class5 ='$class5',
		last_Edit ='$last_edit',
		ip = '$ip',
		receive_date ='$receive_date',
		foundIn2516base ='$foundIn2516base',
		fname ='$filename',
		sport ='$sport',
       		size ='$size',
		hd ='$hd',
		act_blood ='$act_blood',
		act_rally ='$act_rally',
		act_50_bowl = '$act_50_bowl',
		act_50_new ='$act_50_new',
		act_55 = '$act_55',
		act_51 = '$act_51',
		act_53 = '$act_53',
		act_49 = '$act_49',
		act_47 = '$act_47',
		act_45 ='$act_45',
		point ='$point',
		c_position = '$c_position',
		position = '$position',
		agent = '$agent'
		$update_image WHERE autono=".$_REQUEST["id"];
		mysql_query($query) or die(mysql_error());
		header("location:profile.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta name="robots" content="noindex, nofollow"> 
<title>แก้ไขข้อมูลในระบบ osk</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #308EC4;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color: #FF0000}
.style2 {color: #0000FF}
-->
</style>
<script> 
function checkForm() { 
var frm = document.forms["form1"];
if (frm.password.value!==frm.password2.value) { 
alert("Passwords do not match!"); 
return false; 
} else{
return true;
}
} 
</script>

</head>

<body>
<table width="960" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="98%" align="center" valign="top"><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><?php include("head.php");?></td>
      </tr>
      <tr>
        <td><img src="images/web-team_over_04.jpg" width="1004" height="25" /></td>
      </tr>
      <tr>
        <td height="337" align="left" valign="top"><table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="22%" valign="top"><?php include("left_menu.php");?></td>
            <td width="74%" align="center" valign="top"><table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td><form action="edit_data.php" onSubmit="return checkForm();" method="post" enctype="multipart/form-data" name="form1" id="form1"  >
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><center>
                        <table border="0" width="93%" class="text1">
                          <?
		$conn_db = mysql_connect("osk96-db","osk92_123456","FFqKIgT8vr[7")or die ("Connect Error<Br>".mysql_error());
mysql_select_db("osk92_startup_osk")or die("Connect DB Error<Br>".mysql_error());
mysql_query("set names tis620");
		$query="SELECT * FROM `data` where username='".$_SESSION['U']."'";
      	$result = mysql_query($query) or die(mysql_error());
		$i=mysql_num_rows($result);
		while($row=mysql_fetch_array($result)) 
		{
?>
                          <tr>
                            <td width="100%"><div style="float:right;margin-top:5px;"><!--<a href="profile.php">กลับหน้าทะเบียนข้อมูล</a>--></div><div align="center">
                                <input type="hidden" name="id" value="<?php echo $row["autono"]; ?>" />
                                <font color="#FF00FF">แก้ไขข้อมูลในระบบฐานข้อมูล</font></div>
                                <table border="0" width="775" height="553" class="text1" bgcolor="F8F8F8">
                                  <tr>
                                    <td width="110" height="38" align="right" bgcolor="F8F8F8"><p align="right">เลขประจำตัว:</p></td>
                                    <td width="325" height="38" bgcolor="F8F8F8"><div align="left">
                                      <input type="text" name="student_id" size="15" value="<? echo $row[student_id];?>"readonly="1" />
                                      เลขสมาชิกสมาคม:
                                      <input type="text" name="id_osk" size="5" value="<? echo $row[id_osk];?>" />
                                    </div></td>
                                    <td width="87" height="38" bgcolor="F8F8F8"><p align="right">Username:</p></td>
                                    <td height="38" colspan="3" align="left" bgcolor="F8F8F8"><input name="username" type="text" class="style1" value="<? echo $row[username];?> " size="10"  disabled="disabled"/>
                                      Password
                                      <input type="text" name="password" size="10" value="<? echo $row[password];?>"/></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="22" colspan="1" align="right" bgcolor="F8F8F8"><p align="right">สรรพนาม
                                      :</p></td>
                                    <td width="325" height="22" bgcolor="F8F8F8"><div align="left">
                                      <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="29%"><input type="text" name="title" size="15" value="<? echo $row[title];?>" /></td>
                                          <td height="22" align="right" bgcolor="F8F8F8" class="text1">ว/ด/ป เกิด<span lang="en-us" xml:lang="en-us">:</span></td>
                                          <td height="22" align="left" bgcolor="F8F8F8" class="text1"><input type="text" name="birthday2" size="10" value="<? echo $row[birthday];?>" readonly="1" /></td>
                                        </tr>
                                      </table>
                                    </div></td>
                                    <td width="87" height="22" align="right" bgcolor="F8F8F8"><div align="right"></div></td>
                                    <td height="22" colspan="3" align="left" bgcolor="F8F8F8"><table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="49%">Re-enter password:</td>
                                          <td width="51%"><input type="text" name="password2" size="10" value="<? echo $row[password];?>"/></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="22" align="right" bgcolor="F8F8F8"><p align="right"> ชื่อ<span lang="en-us" xml:lang="en-us">:</span> </p></td>
                                    <td width="325" height="22" bgcolor="F8F8F8"><input type="text" name="name" size="50" value="<? echo $row[name];?>" /></td>
                                    <td height="22" align="right">นามสกุล :</td>
                                    <td height="22" colspan="3" align="left"><input type="text" name="surname" size="40" value="<? echo $row[surname];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="19" align="right" bgcolor="F8F8F8"> สถานะ/อาชีพ<span lang="en-us" xml:lang="en-us">:</span></td>
                                    <td width="325" height="19" bgcolor="F8F8F8"><div align="left">
                                      <input type="text" name="status" size="12" value="<? echo $row[status];?>">
                                    </div></td>
                                    <td height="19" align="right">ภารกิจหน้าที่<span lang="en-us" xml:lang="en-us">:</span></td>
                                    <td height="19" colspan="3" align="left"><input type="text" name="work" size="40" value="<? echo $row[work];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="19" align="right"> อีเมล์<span lang="en-us" xml:lang="en-us">:</span></td>
                                    <td height="19"><div align="left">
                                        <input type="text" name="e_mail" size="50" value="<? echo $row[e_mail];?>" />
                                    </div></td>
                                    <td height="19" ><p align="right">มือถือ<span lang="en-us" xml:lang="en-us">:</span></p></td>
                                    <td height="19" colspan="3" align="left"><div align="left">
                                        <input type="text" name="tel_h" size="30" value="<? echo $row[tel_h];?>" />
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="right" bgcolor="F8F8F8">ที่อยู่ :</td>
                                    <td width="325" rowspan="3" valign="top" bgcolor="F8F8F8"><textarea name="addr1_tambom" cols="50" rows="4" ><? echo $row[addr1_tambom];?></textarea></td>
                                    <td height="22" align="right">อำเภอ / เขต:</td>
                                    <td height="22" colspan="3"><div align="left"><font color="#808000">
                                        <input type="text" name="addr2_amphur" size="30" value="<? echo $row[addr2_amphur];?>" />
                                    </font></div></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="22" align="right" bgcolor="F8F8F8">&nbsp;</td>
                                    <td height="22" align="right">จังหวัด :</td>
                                    <td height="22" colspan="3"><div align="left">
                                        <input type="text" name="addr3_province" size="30" value="<? echo $row[addr3_province];?>"/>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="24" align="right" bgcolor="F8F8F8"><p align="right">&nbsp;</p></td>
                                    <td height="24" align="right"><p align="right">รหัสไปรษณีย์ :</p></td>
                                    <td width="30" height="24"><div align="left">
                                        <input type="text" name="postal_code" size="5" value="<? echo $row[postal_code];?>" />
                                    </div></td>
                                    <td width="69" height="24" ><p align="right">โทรศัพท์<span lang="en-us" xml:lang="en-us">:</span></p></td>
                                    <td width="201" height="24" align="left"><input type="text" name="telephone" size="15" value="<? echo $row[telephone];?>"/></td>
                                  </tr>
								  <tr>
                                    <td height="22" colspan="6" align="right" bgcolor="F8F8F8"><hr />
                                      <div align="center" class="style1">ที่อยู่ที่ทำงาน/ที่อยู่ต่างประเทศ</div></td>
                                    </tr>
                                  <tr>
                                    <td height="22" align="right" bgcolor="F8F8F8">ที่อยู่2/ทำงาน </td>
                                    <td width="325" rowspan="3" bgcolor="F8F8F8"><textarea name="off" cols="50" rows="4"><? echo $row[off];?></textarea></td>
                                    <td height="22" align="right">อำเภอ / เขต: </td>
                                    <td height="22" colspan="3"><div align="left"><font color="#008080">
                                      <input type="text" name="off_amphur" size="30" value="<? echo $row[off_amphur];?>" />
                                    </font></div></td>
                                  </tr>
                                  <tr>
                                    <td width="110" height="23" align="right" bgcolor="F8F8F8">&nbsp;</td>
                                    <td height="23" align="right">จังหวัด:</td>
                                    <td height="23" colspan="3"><div align="left">
                                      <input type="text" name="off_province" size="30"  value="<? echo $row[off_province];?>"/>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="12" >&nbsp;</td>
                                    <td height="12" align="right">รหัสไปรษณีย์:</td>
                                    <td height="12"><font color="#008080">
                                      <input type="text" name="off_post" size="5" value="<? echo $row[off_post];?>"/>
                                    </font></td>
                                    <td height="12"><div align="right">โทรศัพท์<span lang="en-us" xml:lang="en-us">:</span></div></td>
                                    <td height="12" align="left"><input type="text" name="off_tel" size="15" value="<? echo $row[off_tel];?>"/></td>
                                  </tr>
								  <tr>
								    <td height="24" colspan="6" align="right"><hr align="center" /></td>
								    </tr>
                                  <tr>
                                    <td align="right"> ม.ศ.1 ห้อง<span lang="en-us" xml:lang="en-us"> :</span> </td>
                                    <td width="325" height="24"><div align="left">
                                      <input type="text" name="class1" size="2" value="<? echo $row[class1];?>" />
                                      <font size="2"><span lang="en-us" xml:lang="en-us">&nbsp;</span>(ถ้าไม่ทราบห้องหรือไม่ได้เรียนให้ใส่ 
                                        - )</font></div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    <td colspan="3" rowspan="7" align="center" valign="middle"><div align="center">
                                        <table width="200" border="0" align="center">
                                          <tr>
                                            <td><div align="center"><? echo "<img src=\"../uploads/member/$row[fname]\"";?></div></td>
                                          </tr>
                                          <tr>
                                            <td><div align="center"><? echo $row[fname];?></div></td>
                                          </tr>
                                        </table>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td align="right">ม.ศ.2 ห้อง <span lang="en-us" xml:lang="en-us">:</span></td>
                                    <td height="24"><div align="left">
                                      <input type="text" name="class2" size="2" value="<? echo $row[class2];?>" />
                                      <font size="2">(ถ้าไม่ทราบห้องหรือไม่ได้เรียนให้ใส่ - )</font></div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td align="right"> ม.ศ.3 ห้อง<span lang="en-us" xml:lang="en-us"> : </span> </td>
                                    <td height="24"><div align="left">
  <input type="text" name="class3" size="2" value="<? echo $row[class3];?>" />
  &nbsp; <font size="2">(ถ้าไม่ทราบห้องหรือไม่ได้เรียนให้ใส่ - )</font></div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td align="right">ม.ศ.4 ห้อง <span lang="en-us" xml:lang="en-us">:</span></td>
                                    <td height="24"><div align="left">
                                      <input type="text" name="class4" size="2" value="<? echo $row[class4];?>" />
                                      <font size="2">(ถ้าไม่ทราบห้องหรือไม่ได้เรียนให้ใส่ - )</font></div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td align="right"> ม.ศ.5 ห้อง<span lang="en-us" xml:lang="en-us"> :</span> </td>
                                    <td height="24"><div align="left">
                                      <input type="text" name="class5" size="2" value="<? echo $row[class5];?>" />
                                      <font size="2">(ถ้าไม่ทราบห้องหรือไม่ได้เรียนให้ใส่ - )</font></div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td height="24" align="right"><p align="right">งานอดิเรก :</p></td>
                                    <td height="24"><input type="text" name="sport" size="50" value="<? echo $row[sport];?>"/></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td height="24" align="right"><p align="right">ขนาดเสื้อ :</p></td>
                                    <td height="24"><div align="left">
                                      <input name="size" type="text" id="size" value="<? echo $row[size];?>" size="4" maxlength="4"/>
                                    </div></td>
                                    <td height="24" align="right">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td height="24" align="right"> ภาพถ่าย<span lang="en-us" xml:lang="en-us"> :</span></td>
                                    <td height="24" align="left"><input id="fname" name="fname" title="รูป" type="file" size="30" />
                                      <input type="hidden" name="fname2" value="<? echo $row[fname];?>"/></td>
                                    <td height="24" align="right"><p align="right">&nbsp;</p></td>
                                    <td colspan="3" rowspan="2"><div align="left">
                                        <p align="center"><span class="style1">รูปแสดงสถานะปัจจุบันถ้าต้องการเปลี่ยนแปลงกดปุ่ม</span> <span class="style2 style3">Browse </span> <span class="style3 style2">(นามสกุลไฟล์ควรเป็น [ jpg , gif ] และไฟล์ไม่เกิน 200 Kb) </span></p>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="24" align="right">ร่วมงานเลี้ยง :</td>
                                    <td height="24"><input type="text" name="act_55" size="2" value="<? echo $row[act_55];?>" />
55
<input type="text" name="act_53" size="2" value="<? echo $row[act_53];?>" />
53
  <input type="text" name="act_51" size="2" value="<? echo $row[act_51];?>" />
  51
  <input type="text" name="act_49" size="2" value="<? echo $row[act_49];?>" />
49
  <input type="text" name="act_47" size="2" value="<? echo $row[act_47];?>" />
47
<input type="text" name="act_45" size="2" value="<? echo $row[act_45];?>" />
45 <br />
(<span lang="en-gb" xml:lang="en-gb">N-</span>ไม่มา,N/A-ยังไม่จัด)</td>
                                    <td height="24" align="right" bgcolor="F8F8F8">&nbsp;</td>
                                    </tr>
                                </table>
                              <p align="center">
                                <input type="submit" name="submit" value="บันทึกข้อมูล" style="width:80px;" />
                                <span class="narmal">
                                  <input type="button" name="submit2" value="กลับ" style="width:50px;" onclick="document.location.href='profile.php'" />
                                  </span></p></td>
                          </tr>
                          <?php
}
?></form>
                        </table>
                      </center></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </table></td>
            <td width="4%" align="right" valign="top"><p>&nbsp;</p>
                    <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="13">&nbsp;</td>
      </tr>
      <?php include ("footer.php")?>
    </table>
        <img src="images/web-team_over_08.jpg" width="1004" height="7" /></td>
  </tr>
</table>
</body>
</html>
