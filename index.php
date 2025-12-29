<?php
// لا session
// لا include
// اتصال Supabase فقط

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = [
        "parent_name" => $_POST['parent_name'],
        "student_name" => $_POST['student_name'],
        "phone" => $_POST['phone'],
        "reason" => $_POST['reason']
    ];

    $ch = curl_init("https://yqwbregaaeiiwnywngjt.supabase.co/rest/v1/parent_visits");

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inlxd2JyZWdhYWVpaXdueXduZ2p0Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjcwMzMxMTEsImV4cCI6MjA4MjYwOTExMX0.5vAYmKn3kKHttCOo8KDJYEldRMO6mpqXRJ7gK30Nj-4,
        "Content-Type: application/json",
        "Prefer: return=minimal"
    ]);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);
    curl_close($ch);

    $success = true;
}
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<title>نموذج زيارة ولي أمر</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family:Arial;background:#f2f2f2}
form{max-width:400px;margin:30px auto;background:#fff;padding:20px;border-radius:10px}
input,textarea,button{width:100%;padding:10px;margin:8px 0}
button{background:#0066cc;color:#fff;border:none}
</style>
</head>
<body>

<form method="post">
<h3>نموذج زيارة ولي أمر</h3>

<?php if(isset($success)): ?>
<p style="color:green">تم الإرسال بنجاح ✅</p>
<?php endif; ?>

<input name="parent_name" placeholder="اسم ولي الأمر" required>
<input name="student_name" placeholder="اسم الطالب" required>
<input name="phone" placeholder="رقم الهاتف" required>
<textarea name="reason" placeholder="سبب الزيارة" required></textarea>

<button>إرسال</button>
</form>

</body>
</html>
