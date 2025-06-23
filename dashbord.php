<?php
include "db.php"; // الاتصال بقاعدة البيانات
$halls = $pdo->query("SELECT * FROM hall")->fetchAll();
$stmt = $pdo->query("SELECT COUNT(*) FROM hall");
$totalHalls = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hallane - Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
          sans-serif;
        background-color: #f8f9fa;
        display: flex;
        height: 100vh;
      }

      /* Sidebar */
      .sidebar {
        width: 200px;
        background-color: #2d5a3d;
        color: white;
        padding: 20px 0;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
      }

      .logo {
        width: 125px;
        height: auto;
        margin-top: -16px;
      }

      .nav-item {
        padding: 12px 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: background 0.2s;
        font-size: 14px;
      }

      .nav-item:hover {
        background: rgba(255, 255, 255, 0.1);
      }

      .nav-item.active {
        background: rgba(255, 255, 255, 0.15);
        border-right: 3px solid white;
      }

      .user-info {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 12px;
      }

      .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #22543d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
      }

      /* Main Content */
      .main-content {
        margin-left: 200px;
        flex: 1;
        padding: 30px;
        overflow-y: auto;
        position: relative;
      }

      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
      }

      .header h1 {
        font-size: 28px;
        font-weight: 600;
        color: #2d3748;
      }

      .header p {
        color: #718096;
        font-size: 14px;
        margin-top: 4px;
      }

      .header-actions {
        display: flex;
        gap: 15px;
      }

      .header-actions button {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: background 0.2s;
        color: #4a5568;
      }

      .header-actions button:hover {
        background: #e2e8f0;
      }

      /* Stats Cards - Using Position */
      .stats-container {
        position: relative;
        height: 120px;
        margin-bottom: 30px;
      }

      .stat-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 16px;
        position: absolute;
        width: calc(25% - 15px);
        height: 100px;
      }

      .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
      }

      .stat-icon.bookings {
        background: #e6f3e6;
        color: #2d5a3d;
      }
      .stat-icon.halls {
        background: #ffe6f0;
        color: #c53030;
      }
      .stat-icon.revenue {
        background: #e6f7e6;
        color: #22543d;
      }
      .stat-icon.clients {
        background: #fff2e6;
        color: #c05621;
      }

      .stat-info h3 {
        font-size: 24px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 4px;
      }

      .stat-info p {
        color: #718096;
        font-size: 14px;
      }

      /* Content - Using Position */
      .content-container {
        position: relative;
        height: 380px;
        margin-bottom: 30px;
      }

      .chart-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        position: absolute;
        left: 0;
        width: calc(65% - 15px);
        height: 100%;
      }

      .recent-bookings {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        position: absolute;
        right: 0;
        width: calc(35% - 15px);
        height: 100%;
        overflow-y: auto;
      }

      .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .chart-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
      }

      .chart-period {
        color: #718096;
        font-size: 12px;
      }

      .chart-placeholder {
        height: 300px;
        background: linear-gradient(135deg, #f7fafc, #edf2f7);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #a0aec0;
        font-size: 14px;
      }

      .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .section-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
      }

      .view-all {
        color: #4299e1;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
      }

      .booking-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #e2e8f0;
      }

      .booking-item:last-child {
        border-bottom: none;
      }

      .booking-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
      }

      .booking-info {
        flex: 1;
      }

      .booking-name {
        font-weight: 600;
        color: #2d3748;
        font-size: 14px;
        margin-bottom: 2px;
      }

      .booking-hall {
        color: #718096;
        font-size: 12px;
      }

      .booking-time {
        color: #718096;
        font-size: 12px;
        text-align: right;
      }

      /* Available Halls Table */
      .halls-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
      }

      .halls-header {
        padding: 24px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .halls-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
      }

      .add-hall-btn {
        background: #4299e1;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        text-decoration: none;
        align-items: center;
        gap: 6px;
      }

      .halls-table {
        width: 100%;
        border-collapse: collapse;
      }

      .halls-table th {
        background: #2d5a3d;
        color: white;
        padding: 16px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
      }

      .halls-table td {
        padding: 16px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
      }

      .halls-table tr:hover {
        background: #f7fafc;
      }

      .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
      }

      .status-available {
        background: #c6f6d5;
        color: #22543d;
      }

      .status-booked {
        background: #fed7d7;
        color: #742a2a;
      }

      .status-maintenance {
        background: #feebc8;
        color: #c05621;
      }

      .view-btn {
        background: #e2e8f0;
        color: #4a5568;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
      }

      /* Top Clients - Position Based */
      .clients-section {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        position: relative;
      }

      .client-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #e2e8f0;
      }

      .client-item:last-child {
        border-bottom: none;
      }

      .client-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
      }

      .client-info {
        flex: 1;
      }

      .client-name {
        font-weight: 600;
        color: #2d3748;
        font-size: 14px;
        margin-bottom: 2px;
      }

      .client-bookings {
        color: #718096;
        font-size: 12px;
      }

      .client-revenue {
        color: #22543d;
        font-weight: 600;
        font-size: 14px;
      }

      table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #e2e8f0;
    }

    th {
      background: #2d5a3d;
      color: white;
    }

    tr:hover {
      background-color: #f1f5f9;
    }    
    .delete-btn {
      background: #e53e3e;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 13px;
      cursor: pointer;
      text-decoration:none;
    }
    </style>
  </head>
  <body>
    <div class="sidebar">
      <img src="./icon/hallane.png" alt="logo" class="logo" />
      <div class="nav-item active">
        <i class="fas fa-chart-pie"></i> Dashboard
      </div>
      <a  href="booking.php" class="nav-item" style="color: white; text-decoration :none;"><i class="fas fa-calendar-check"></i> Bookings</a>
      <a href="client.php" class="nav-item" style="color: white; text-decoration :none;"><i class="fas fa-users"></i> Clients</div>

      <div class="user-info">
        <div class="user-avatar">AK</div>
        <div>
          <div style="font-weight: 600">adnane kesksuu</div>
          <div style="color: #a0aec0">Admin</div>
        </div>
      </div>
    </div>

    <div class="main-content">
      <div class="header">
        <div>
          <h1>Dashboard</h1>
          <p>Overview of your hall rental website</p>
        </div>
        <div class="header-actions">
          <button><i class="fas fa-bell"></i></button>
          <button><i class="fas fa-envelope"></i></button>
        </div>
      </div>

      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-icon bookings">
            <i class="fas fa-chart-bar"></i>
          </div>
          <div class="stat-info">
            <h3>143</h3>
            <p>Active Bookings</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon halls">
            <i class="fas fa-building"></i>
          </div>
          <div class="stat-info">
          <h3><?= $totalHalls ?></h3>
          <p>Total Halls</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon revenue">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="stat-info">
            <h3>$7,850</h3>
            <p>Revenue (this month)</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon clients">
          <i class="fa-solid fa-house"></i>
          </div>
          <div class="stat-info">
          <h3><?= $totalHalls ?></h3>
          <p>Total Halls</p>
          </div>
        </div>
      </div>

      <div class="content-container">
        <div class="chart-card">
          <div class="chart-header">
            <h3>Monthly Revenue</h3>
            <span class="chart-period">Last 12 months</span>
          </div>
          <div class="chart-placeholder">
            <i
              class="fas fa-chart-line"
              style="font-size: 48px; opacity: 0.3"
            ></i>
          </div>
        </div>

        <div class="recent-bookings">
          <div class="section-header">
            <h3>Recent Bookings</h3>
            <a href="#" class="view-all">View all</a>
          </div>
          <div class="booking-item">
            <div class="booking-avatar">SW</div>
            <div class="booking-info">
              <div class="booking-name">Sam Wilson</div>
              <div class="booking-hall">Banquet Hall A</div>
            </div>
            <div class="booking-time">Today, 7:00 PM</div>
          </div>
          <div class="booking-item">
            <div class="booking-avatar">LG</div>
            <div class="booking-info">
              <div class="booking-name">Lisa Green</div>
              <div class="booking-hall">Conference Hall B</div>
            </div>
            <div class="booking-time">Tomorrow, 11:00 AM</div>
          </div>
          <div class="booking-item">
            <div class="booking-avatar">ML</div>
            <div class="booking-info">
              <div class="booking-name">Michael Lee</div>
              <div class="booking-hall">Wedding Hall</div>
            </div>
            <div class="booking-time">Fri, 5:00 PM</div>
          </div>
          <div class="booking-item">
            <div class="booking-avatar">EC</div>
            <div class="booking-info">
              <div class="booking-name">Emily Carter</div>
              <div class="booking-hall">Ballroom C</div>
            </div>
            <div class="booking-time">Fri, 8:00 PM</div>
          </div>
        </div>
      </div>

      <div class="halls-section">
        <div class="halls-header">
          <h3>Available Halls</h3>
          <a href="add.php" class="add-hall-btn">
            <i class="fas fa-plus"></i> Add New Hall
          </a>
        </div>
        <table>
      <thead>
        <tr>
          <th>Hall Name</th>
          <th>Location</th>
          <th>Capacity</th>
          <th>Price</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($halls as $hall): ?>
          <tr>
            <td><?= htmlspecialchars($hall['title']) ?></td>
            <td><?= htmlspecialchars($hall['local']) ?></td>
            <td><?= htmlspecialchars($hall['capacity']) ?></td>
            <td>$<?= htmlspecialchars($hall['price']) ?></td>
            <td><span class="status">Available</span></td>
            <td>
              <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this hall?');">
                <input type="hidden" name="hall_id" value="<?= $hall['hall_id'] ?>">
                <a class="delete-btn" href="delete.php?hall_id=<?= $hall['hall_id'] ?>">Delete</a>
                </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
      </div>

      <div class="clients-section">
        <div class="section-header">
          <h3>Top Clients</h3>
          <span class="view-all">View all</span>
        </div>
        <div class="client-item">
          <div
            class="client-avatar"
            style="background: linear-gradient(135deg, #f093fb, #f5576c)"
          ></div>
          <div class="client-info">
            <div class="client-name">Sophia Turner</div>
            <div class="client-bookings">8 Bookings</div>
          </div>
          <div class="client-revenue">$1,200</div>
        </div>
        <div class="client-item">
          <div
            class="client-avatar"
            style="background: linear-gradient(135deg, #4facfe, #00f2fe)"
          ></div>
          <div class="client-info">
            <div class="client-name">Michael Lee</div>
            <div class="client-bookings">6 Bookings</div>
          </div>
          <div class="client-revenue">$980</div>
        </div>
        <div class="client-item">
          <div
            class="client-avatar"
            style="background: linear-gradient(135deg, #43e97b, #38f9d7)"
          ></div>
          <div class="client-info">
            <div class="client-name">Lisa Green</div>
            <div class="client-bookings">5 Bookings</div>
          </div>
          <div class="client-revenue">$860</div>
        </div>
      </div>
    </div>
  </body>
</html>
