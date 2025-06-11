<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hallane - Dashboard</title>
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
        font-size: 20px;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: background 0.2s;
      }

      .header-actions button:hover {
        background: #e2e8f0;
      }

      /* Stats Cards */
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
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

      /* Content Grid */
      .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
      }

      .chart-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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

      /* Recent Bookings */
      .recent-bookings {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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

      /* Top Clients */
      .clients-section {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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
    </style>
  </head>
  <body>
    <div class="sidebar">
      <img src="./icon/hallane.png" alt="logo" class="logo" />
      <div class="nav-item active">Dashboard</div>
      <div class="nav-item">Bookings</div>
      <div class="nav-item">Halls</div>
      <div class="nav-item">Clients</div>
      <div class="nav-item">Settings</div>

      <div class="user-info">
        <div class="user-avatar">AK</div>
        <div>
          <div style="font-weight: 600">adnane keskau</div>
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
          <button>🔔</button>
          <button>✉️</button>
        </div>
      </div>

      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon bookings">📊</div>
          <div class="stat-info">
            <h3>143</h3>
            <p>Active Bookings</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon halls">🏛️</div>
          <div class="stat-info">
            <h3>22</h3>
            <p>Total Halls</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon revenue">💰</div>
          <div class="stat-info">
            <h3>$7,850</h3>
            <p>Revenue (this month)</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon clients">👥</div>
          <div class="stat-info">
            <h3>1,098</h3>
            <p>Total Clients</p>
          </div>
        </div>
      </div>

      <div class="content-grid">
        <div class="chart-card">
          <div class="chart-header">
            <h3>Monthly Revenue</h3>
            <span class="chart-period">Last 12 months</span>
          </div>
          <div class="chart-placeholder">Revenue Chart Area</div>
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
          <button class="add-hall-btn">+ Add New Hall</button>
        </div>
        <table class="halls-table">
          <thead>
            <tr>
              <th>Hall Name</th>
              <th>Location</th>
              <th>Capacity</th>
              <th>Price/hr</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Banquet Hall A</td>
              <td>Downtown</td>
              <td>200</td>
              <td>$150</td>
              <td>
                <span class="status-badge status-available">Available</span>
              </td>
              <td><button class="view-btn">View</button></td>
            </tr>
            <tr>
              <td>Conference Hall B</td>
              <td>Westside</td>
              <td>120</td>
              <td>$110</td>
              <td><span class="status-badge status-booked">Booked</span></td>
              <td><button class="view-btn">View</button></td>
            </tr>
            <tr>
              <td>Wedding Hall</td>
              <td>Uptown</td>
              <td>350</td>
              <td>$250</td>
              <td>
                <span class="status-badge status-available">Available</span>
              </td>
              <td><button class="view-btn">View</button></td>
            </tr>
            <tr>
              <td>Ballroom C</td>
              <td>City Center</td>
              <td>400</td>
              <td>$300</td>
              <td>
                <span class="status-badge status-maintenance">Maintenance</span>
              </td>
              <td><button class="view-btn">View</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="clients-section" style="margin-top: 30px">
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
