<?php
session_start();

// إذا لم يكن هناك جلسة نشطة، اطرده لصفحة تسجيل الدخول
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "db.php";
// ... باقي كود صفحة الأدمن الخاص بك
?>
<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM reservations");
?>

<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }

include "db.php"; // تأكدي أن هذا الملف موجود

// --- هنا نضع أكواد الحسابات الجديدة ---
$total_res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM reservations"))['total'];

$today_date = date('Y-m-d');
$today_res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM reservations WHERE date_rdv = '$today_date'"))['total'];

$popular_service_query = mysqli_query($conn, "SELECT service, COUNT(service) AS count FROM reservations GROUP BY service ORDER BY count DESC LIMIT 1");
$popular_service = mysqli_fetch_assoc($popular_service_query);
?>
<?php
// جلب عدد الحجوزات لكل خدمة
$chart_query = mysqli_query($conn, "SELECT service, COUNT(*) as count FROM reservations GROUP BY service");
$services = [];
$counts = [];

while($row = mysqli_fetch_assoc($chart_query)) {
    $services[] = $row['service'];
    $counts[] = $row['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin - Reservations</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body{
      font-family: Arial;
      background:#f8f8f8;
    }
    h2{
      text-align:center;
      color:#e91e63;
    }
    table{
      width:90%;
      margin:auto;
      border-collapse:collapse;
      background:white;
    }
    th, td{
      border:1px solid #ccc;
      padding:10px;
      text-align:center;
    }
    th{
      background:#e91e63;
      color:white;
    }
  </style>
</head>
<body>

<h2>📋 Liste des rendez-vous</h2>

<div style="width: 90%; margin: 10px auto;">
   <a href="index.php" style="text-decoration: none; color: #e91e63; font-weight: bold;">← العودة لصفحة الحجز</a>
   <a href="logout.php" style="color: red;">تسجيل الخروج 🚪</a>
</div>

<h2>📋 إدارة المواعيد والإحصائيات</h2>

<style>
  .stats-container { display: flex; justify-content: space-around; gap: 20px; margin: 20px auto; width: 95%; }
  .stat-card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); flex: 1; text-align: center; border-top: 5px solid #e91e63; }
  .stat-card h3 { margin: 0; color: #666; font-size: 0.9rem; }
  .stat-card p { margin: 10px 0 0; color: #e91e63; font-size: 1.8rem; font-weight: bold; }
</style>

<div class="stats-container">
  <div class="stat-card">
    <h3>إجمالي الحجوزات</h3>
    <p><?php echo $total_res; ?></p>
  </div>
  <div class="stat-card" style="border-top-color: #4caf50;">
    <h3>حجوزات اليوم</h3>
    <p><?php echo $today_res; ?></p>
  </div>
  <div class="stat-card" style="border-top-color: #2196f3;">
    <h3>الأكثر طلباً</h3>
    <p style="font-size: 1.2rem;"><?php echo $popular_service['service'] ?? 'لا يوجد'; ?></p>
  </div>
</div>



<table>
  <tr>
    <th>Nom</th>
    <th>Téléphone</th>
    <th>Service</th>
    <th>Date</th>
    <th>Heure</th>
  </tr>

  <?php while($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['nom'] ?></td>
    <td><?= $row['telephone'] ?></td>
    <td><?= $row['service'] ?></td>
    <td><?= $row['date_rdv'] ?></td>
    <td><?= $row['heure'] ?></td>
  </tr>
  <?php } ?>

</table>

<div style="width: 40%; margin: auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
    <canvas id="myChart"></canvas>
</div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie', // يمكنك تغييره إلى 'bar' إذا أردتِ أعمدة
    data: {
        labels: <?php echo json_encode($services); ?>,
        datasets: [{
            label: 'عدد الحجوزات',
            data: <?php echo json_encode($counts); ?>,
            backgroundColor: [
                '#e91e63', // وردي
                '#4caf50', // أخضر
                '#2196f3', // أزرق
                '#ff9800'  // برتقالي
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            title: { display: true, text: 'توزيع الحجوزات حسب الخدمة' }
        }
    }
});
</script>


</body>
</html>