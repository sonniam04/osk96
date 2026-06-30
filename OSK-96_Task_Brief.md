# OSK-96 Security Remediation — Task Brief (สำหรับน้อง)

> **โปรเจกต์:** ตรวจสอบและปิดช่องโหว่เว็บไซต์ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 96 — https://osk96.com
> **ประเภทงาน:** Security Remediation (แก้ช่องโหว่ที่พบจาก security assessment)
> **ความเร่งด่วน:** 🔴 วิกฤต — มีหลักฐานข้อมูลรั่วจริง (1,409 บัญชี + รหัสผ่าน plaintext)
> **Stack เดิม:** PHP 5.6 + MariaDB 10.4 บน Shared Hosting (Hostsevenplus / DirectAdmin) หลัง Cloudflare
> **ผู้ช่วย:** ใช้ Claude Code ช่วยได้ทุกขั้น — ในแต่ละ task มี 💬 *Prompt ตัวอย่าง* ให้ก๊อปไปใช้

---

## 0. อ่านก่อนเริ่ม (Context)

เว็บนี้เป็นเว็บเก่ามาก เขียน PHP ล้วน ๆ ต่อ MySQL ตรง ๆ ไม่มี framework. มีการทำ security assessment แล้วพบ **17 ช่องโหว่** แบ่งเป็น:

| ระดับ | จำนวน |
|---|---|
| 🔴 วิกฤต (Critical) | 4 |
| 🟠 สูง (High) | 3 |
| 🟡 ปานกลาง (Medium) | 6 |
| ⚪ ต่ำ/ข้อมูล (Low/Info) | 4 |

**สิ่งที่ยืนยันแล้วว่าเป็นปัญหาจริง:**
- ตาราง `data` (สมาชิก 1,409 คน) เก็บ **password เป็น plaintext** (`password varchar(30)`) — ดึงไปใช้ login ได้จริง
- มี **SQL Injection** ที่ไม่ต้อง login ก็โจมตีได้ (จุดที่ระบุ: `checkpass.php` และกลุ่มไฟล์ `webboard*.php`)
- **Origin IP รั่ว** (`45.136.253.146`) → ผู้โจมตีข้าม Cloudflare WAF เข้าตรงเครื่องแม่ข่ายได้ (รวมถึง port `809`)
- มีไฟล์ debug ที่ไม่ควรเปิด เช่น `phpinfo.php`, แสดง error แบบละเอียด

**ข้อมูลส่วนบุคคลที่เกี่ยวข้อง (PDPA):** ตาราง `data` มีชื่อ-นามสกุล, เลขนักเรียน, วันเกิด, ที่อยู่บ้าน/ที่ทำงาน, เบอร์โทร, email, Facebook, LINE ID + ตาราง `bill`/`bill_detail` มีข้อมูลการเงิน

> ⚠️ **สำคัญมาก — งานนี้แตะข้อมูลส่วนบุคคลจริง** ห้ามดาวน์โหลด dump ฐานข้อมูลออกนอกเครื่องที่ได้รับอนุญาต, ห้ามแชร์ไฟล์ `.sql` ลง chat/cloud สาธารณะ, และทำงานบนสำเนา (staging) เสมอ ไม่แก้ตรง production จนกว่าจะทดสอบผ่าน

---

## 1. ของที่น้องได้รับ (Assets)

อยู่ในโฟลเดอร์โปรเจกต์ `OSK-96/`:

| ไฟล์ | คืออะไร | ใช้ทำอะไร |
|---|---|---|
| `OSK-96 job.docx` | โจทย์งาน + executive summary | อ่านเข้าใจ scope และผลกระทบเชิงธุรกิจ |
| `C1156597-….png` | ข้อมูล hosting / การเข้าถึง | login DirectAdmin, รู้ origin IP/server |
| `oskcomx_….sql` | dump ฐานข้อมูลจริง | ใช้ตั้ง local DB เพื่อทดสอบ (อย่าเอาออกนอกเครื่อง) |

**สิ่งที่ยังขาด & ต้องไปเอามาก่อน:**
- [ ] **Source code PHP ทั้งเว็บ** — ดึงจาก DirectAdmin (File Manager / FTP) หรือขอ backup จากผู้ดูแล (โฟลเดอร์นี้มีแค่ DB dump ยังไม่มีโค้ด)
- [ ] สิทธิ์เข้า DirectAdmin / Cloudflare (ขอจากหัวหน้า/เจ้าของเว็บ)
- [ ] ยืนยันว่ามี environment staging ให้ทดสอบ หรือต้องตั้งเอง

---

## 2. ลำดับการทำงาน (Phases)

ทำตามลำดับนี้ — **อย่าข้าม Phase 0**

### Phase 0 — ตั้งสภาพแวดล้อมทดสอบ (ก่อนแก้อะไรทั้งสิ้น)
ห้ามแก้ production ตรง ๆ. ตั้ง local/staging ที่จำลองของจริง:

1. ติดตั้ง PHP 5.6 + MariaDB (แนะนำใช้ Docker เพื่อให้ตรงเวอร์ชัน)
2. import `oskcomx_….sql` เข้า local DB
3. วาง source code ที่ดึงมา แล้วทำให้เว็บรันได้ใน local
4. ตั้ง git repo + commit baseline ("as-is") เพื่อ track ทุกการแก้ และ rollback ได้

💬 *Prompt Claude Code:* `"ช่วยเขียน docker-compose สำหรับ PHP 5.6 + Apache + MariaDB 10.4 เพื่อรันเว็บ PHP legacy นี้ในเครื่อง พร้อม import ไฟล์ .sql ตอน startup"`

---

### Phase 1 — 🔴 วิกฤต (ทำให้เสร็จระดับ 24–48 ชม.)

#### 1.1 ปิด SQL Injection ทุกจุด
**เป้า:** `checkpass.php` (หน้า login) และไฟล์กลุ่ม `webboard*.php` เป็นอันดับแรก แล้วไล่ทั้งเว็บ

วิธีแก้มาตรฐาน: เปลี่ยนทุก query ที่เอา input ผู้ใช้มาต่อ string → ใช้ **prepared statement (parameterized query)**

```php
// ❌ เดิม (เสี่ยง SQLi)
$sql = "SELECT * FROM data WHERE username='".$_POST['user']."' AND password='".$_POST['pass']."'";
$result = mysql_query($sql);

// ✅ ใหม่ (mysqli prepared statement)
$stmt = $mysqli->prepare("SELECT * FROM data WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $_POST['user']);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
// แล้วค่อยตรวจรหัสผ่านด้วย password_verify() (ดูข้อ 1.3)
```

ขั้นตอน:
- [ ] ค้นทุกจุดที่มี `mysql_query` / `mysqli_query` / การต่อ string ใน SQL
- [ ] แทนด้วย prepared statement ทั้งหมด
- [ ] จุดที่ใส่ค่าในชื่อ table/column ไม่ได้ (parameterize ไม่ได้) → ใช้ whitelist ตรวจค่า
- [ ] ทดสอบ inject เช่น `' OR '1'='1`, `'; DROP--`, payload ใน query string ของ webboard

💬 *Prompt Claude Code:* `"ไฟล์นี้มี SQL Injection ตรงไหนบ้าง ช่วยแก้ทุก query ให้เป็น mysqli prepared statement โดยรักษา logic เดิมไว้ และอธิบายว่าแก้อะไรไปบ้าง"` (วางทีละไฟล์)

#### 1.2 ปิดทางเข้า Origin IP โดยตรง — รับเฉพาะ Cloudflare
ผู้โจมตีข้าม Cloudflare ได้เพราะรู้ IP จริง `45.136.253.146`

- [ ] ที่ระดับ firewall/host (ผ่าน DirectAdmin หรือขอ Hostsevenplus): อนุญาต inbound 80/443 เฉพาะ [Cloudflare IP ranges](https://www.cloudflare.com/ips/) เท่านั้น
- [ ] ปิด/บล็อก port ที่ไม่จำเป็น โดยเฉพาะ **809** ที่ใช้หลบ nginx WAF
- [ ] ระดับแอป (กันชั้นสอง) ใน `.htaccess` / โค้ด: ปฏิเสธ request ที่ไม่ผ่าน Cloudflare
- [ ] หลังปิดแล้ว พิจารณาเปลี่ยน origin IP (ขอ Hostsevenplus) เพราะ IP เดิมรั่วไปแล้ว

💬 *Prompt Claude Code:* `"ช่วยทำ .htaccess (Apache) ที่อนุญาต request เฉพาะจาก Cloudflare IP ranges ล่าสุดเท่านั้น ส่วน IP อื่นให้ตอบ 403"`

#### 1.3 เปลี่ยนระบบเก็บรหัสผ่าน → bcrypt + บังคับ reset ทั้งหมด
ปัจจุบัน plaintext ใน `data.password (varchar 30)`

- [ ] ขยายคอลัมน์: `ALTER TABLE data MODIFY password VARCHAR(255) NOT NULL;`
- [ ] เปลี่ยนตอน login ให้ใช้ `password_hash()` / `password_verify()` (bcrypt — PHP 5.6 รองรับ `PASSWORD_DEFAULT`)
- [ ] Migrate: hash รหัสเดิมทั้งหมด หรือ (ปลอดภัยกว่า) **บังคับ reset password ทั้ง 1,409 บัญชี** แล้ว hash ตอนตั้งใหม่
- [ ] ทำหน้า "ลืม/รีเซ็ตรหัสผ่าน" ที่ส่งลิงก์ทาง email ถ้ายังไม่มี
- [ ] เก็บ log ว่าใครยัง migrate ไม่เสร็จ

```php
// ตอนสมัคร/ตั้งรหัสใหม่
$hash = password_hash($plainPassword, PASSWORD_DEFAULT);
// เก็บ $hash ลง DB

// ตอน login
if (password_verify($_POST['pass'], $row['password'])) { /* ผ่าน */ }
```

💬 *Prompt Claude Code:* `"ช่วยเขียน migration plan เปลี่ยน password จาก plaintext เป็น bcrypt สำหรับ PHP 5.6 + แก้หน้า login ให้ใช้ password_verify และ fallback สำหรับ user ที่ยังไม่ migrate"`

#### 1.4 ลบไฟล์ debug + ปิด error ละเอียด + rotate รหัส DB
- [ ] ลบ `phpinfo.php` และไฟล์ทดสอบอื่น ๆ ออกจาก public
- [ ] ตั้ง `display_errors = Off` (ใน `php.ini` / `.htaccess`) และ log error ลงไฟล์แทน
- [ ] **เปลี่ยนรหัสผ่าน DB** (เพราะถือว่ารั่วไปกับ source/incident แล้ว) แล้วอัปเดต config
- [ ] ตรวจว่าไฟล์ config (DB credentials) ไม่อยู่ใน path ที่เข้าถึงจาก web ได้

💬 *Prompt Claude Code:* `"ช่วยหาไฟล์ใน repo ที่เปิดเผยข้อมูล sensitive (phpinfo, backup, .sql, error verbose, DB credentials hardcoded) และแนะนำว่าควรลบ/ย้าย/ปิดตัวไหน"`

---

### Phase 2 — 🟠 สูง (3 รายการ)
ทำหลัง Phase 1 เสร็จ ตัวอย่างที่ต้องไล่เช็ค (ยืนยันรายการจริงกับ assessment report ฉบับเต็มอีกครั้ง):
- [ ] **Authentication / Session**: cookie ตั้ง `HttpOnly`, `Secure`, `SameSite`; regenerate session id หลัง login; กัน session fixation
- [ ] **Broken Access Control**: หน้า admin / แก้ไขข้อมูลสมาชิก / bill ต้องเช็คสิทธิ์ทุกครั้ง (กัน IDOR — เปลี่ยน id ใน URL แล้วเห็นข้อมูลคนอื่น)
- [ ] **File Upload** (webboard มี `question_file`/`ans_file`): จำกัดชนิดไฟล์, เปลี่ยนชื่อไฟล์, เก็บนอก webroot หรือกันการ execute

💬 *Prompt Claude Code:* `"ตรวจ session/cookie handling และ access control ในโค้ดนี้ มี IDOR หรือหน้า admin ที่ไม่เช็คสิทธิ์ไหม"`

---

### Phase 3 — 🟡 ปานกลาง (6 รายการ)
- [ ] **XSS**: escape output ทุกที่ที่แสดง input ผู้ใช้ (โดยเฉพาะ webboard/guestbook) ด้วย `htmlspecialchars()`
- [ ] **CSRF**: ใส่ token ในฟอร์มสำคัญ (login, แก้ข้อมูล, โพสต์)
- [ ] **Security headers**: `Content-Security-Policy`, `X-Frame-Options`, `X-Content-Type-Options`, `Strict-Transport-Security`
- [ ] บังคับ HTTPS ทุกหน้า (redirect http→https)
- [ ] ตรวจ input validation ทั่วไป (เบอร์, email, ความยาว)
- [ ] (ไล่รายการที่เหลือตาม report)

### Phase 4 — ⚪ ต่ำ/ข้อมูล (4 รายการ)
- [ ] ปิด server version disclosure (banner Apache/PHP/nginx)
- [ ] ลบ comment/ไฟล์ที่เผยข้อมูลโครงสร้าง
- [ ] ตั้ง directory listing = off
- [ ] (ตามรายการที่เหลือ)

---

## 3. Acceptance Criteria (เกณฑ์ว่างานเสร็จ)

งานถือว่าเสร็จเมื่อ:
- [ ] ทุก query ที่รับ input ผู้ใช้ใช้ prepared statement — ทดสอบ inject แล้วไม่หลุด
- [ ] รหัสผ่านทั้งหมดเป็น bcrypt — ไม่มี plaintext เหลือใน `data.password`
- [ ] login ตรงที่ origin IP ไม่ได้ (ต้องผ่าน Cloudflare เท่านั้น), port 809 ปิด
- [ ] ไม่มี `phpinfo.php` / error verbose / DB credentials ที่เข้าถึงจาก web ได้
- [ ] บังคับ reset password ครบ 1,409 บัญชี (หรือมีแผน migrate ที่ track ได้)
- [ ] ช่องโหว่ทั้ง 17 รายการมีสถานะ: แก้แล้ว / mitigate / accept (พร้อมเหตุผล)
- [ ] เว็บยังทำงานได้ครบทุกฟังก์ชันเดิม (regression test ผ่าน)

---

## 4. Deliverables (สิ่งที่ต้องส่ง)
1. Source code ที่แก้แล้ว (ใน git, commit แยกตามช่องโหว่/phase พร้อม message ชัดเจน)
2. **Remediation report** — ตารางช่องโหว่ 17 รายการ + before/after + วิธีทดสอบ
3. คู่มือ deploy ขึ้น production + checklist ตรวจหลัง deploy
4. แผน/สถานะการบังคับ reset password สมาชิก
5. รายการ config ที่เปลี่ยนฝั่ง server (Cloudflare, firewall, php.ini, .htaccess)

---

## 5. ข้อควรระวัง / Constraints
- **PHP 5.6 = end-of-life** ไม่มี security patch แล้ว → แนะนำเสนอ roadmap อัปเกรด (เฟสถัดไป) แต่งานนี้โฟกัสปิดช่องโหว่บนของเดิมก่อน
- Shared hosting = สิทธิ์จำกัด บางอย่าง (เช่น firewall, เปลี่ยน IP) อาจต้องแจ้ง Hostsevenplus ดำเนินการให้
- **PDPA**: เหตุการณ์นี้เข้าข่ายข้อมูลรั่ว — แจ้งหัวหน้าให้ประเมินหน้าที่แจ้งเหตุ/สื่อสารกับสมาชิก (เป็นงานฝั่ง management ไม่ใช่ dev แต่ต้องไม่ลืม)
- มีปัญหา/ติดสิทธิ์เข้าถึง → escalate หาหัวหน้าทันที อย่าเดา

---

## 6. ติดต่อ / ถ้าติด
- ติดเรื่องเทคนิค: ถาม Claude Code (มี prompt ตัวอย่างในแต่ละ task) หรือพี่ในทีม
- ติดเรื่องสิทธิ์เข้าถึง (DirectAdmin/Cloudflare/Hostsevenplus): แจ้งหัวหน้าโปรเจกต์
- เจอข้อมูลรั่วเพิ่ม/ของแปลก: หยุดแล้วแจ้งทันที อย่าแก้เงียบ ๆ
