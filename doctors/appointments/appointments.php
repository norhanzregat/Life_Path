<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Main content -->
  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold"><i class="fa-solid fa-calendar-check me-2 text-primary"></i>My Appointments</h2>
    </div>

    <!-- Filters & Search -->
    <div class="card mb-4">
      <div class="card-body d-flex flex-wrap gap-2 align-items-center">
        <input type="text" id="searchAppointments" class="form-control flex-grow-1" placeholder="Search by patient name or email...">
        <select class="form-select w-auto" id="filterAppointments">
          <option value="all" selected>All</option>
          <option value="upcoming">Upcoming</option>
          <option value="completed">Completed</option>
          <option value="cancelled">Cancelled</option>
        </select>
        <select class="form-select w-auto" id="filterSession">
          <option value="all" selected>All Sessions</option>
          <option value="clinic">Clinic</option>
          <option value="video">Video Call</option>
        </select>
      </div>
    </div>

    <!-- Appointments Table -->
    <div class="card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>Patient</th>
                <th>Email</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>Session</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="appointmentsTable"></tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <script>
    // مصفوفة المرضى مع البيانات و10 مرضى
    const appointments = [
      { name: "John Doe", email: "john@example.com", datetime: "2025-08-30 10:00 AM", status: "upcoming", session: "clinic" },
      { name: "Mary Smith", email: "mary@example.com", datetime: "2025-08-27 03:00 PM", status: "completed", session: "video" },
      { name: "Ali Ahmed", email: "ali@example.com", datetime: "2025-08-25 11:00 AM", status: "cancelled", session: "clinic" },
      { name: "Omar Khalid", email: "omar@example.com", datetime: "2025-08-29 09:00 AM", status: "upcoming", session: "clinic" },
      { name: "Lina Haddad", email: "lina@example.com", datetime: "2025-08-28 02:00 PM", status: "completed", session: "video" },
      { name: "Sara Ali", email: "sara@example.com", datetime: "2025-08-31 01:00 PM", status: "upcoming", session: "clinic" },
      { name: "Hassan Omar", email: "hassan@example.com", datetime: "2025-08-26 10:30 AM", status: "cancelled", session: "video" },
      { name: "Noor Fares", email: "noor@example.com", datetime: "2025-08-27 11:15 AM", status: "completed", session: "video" },
      { name: "Fadi Nasser", email: "fadi@example.com", datetime: "2025-08-30 12:00 PM", status: "upcoming", session: "clinic" },
      { name: "Rania Saleh", email: "rania@example.com", datetime: "2025-08-29 03:30 PM", status: "upcoming", session: "video" }
    ];

    const table = document.getElementById('appointmentsTable');

    function renderTable() {
      table.innerHTML = "";
      appointments.forEach(appt => {
        const row = document.createElement('tr');
        row.dataset.status = appt.status;
        row.dataset.session = appt.session;

        row.innerHTML = `
          <td>${appt.name}</td>
          <td>${appt.email}</td>
          <td>${appt.datetime}</td>
          <td><span class="status-${appt.status}">${appt.status.charAt(0).toUpperCase() + appt.status.slice(1)}</span></td>
          <td>${appt.session === "video" ? `<a href="https://meet.google.com/ehs-wios-oqj" target="_blank" class="btn btn-sm btn-primary">
          <i class="fa-solid fa-video"></i> Video Call</a>` : 
          `<span class="session-clinic">Clinic</span>`}</td>
          <td>
            <button class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i></button>
            <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
            <button class="btn btn-sm btn-danger"><i class="fa-solid fa-xmark"></i></button>
          </td>
        `;
        table.appendChild(row);
      });
    }

    renderTable();

    // فلترة وجدول البحث
    const searchInput = document.getElementById('searchAppointments');
    const filterStatus = document.getElementById('filterAppointments');
    const filterSession = document.getElementById('filterSession');

    function filterAppointments() {
      const searchText = searchInput.value.toLowerCase();
      const status = filterStatus.value;
      const session = filterSession.value;

      Array.from(table.rows).forEach(row => {
        const patient = row.cells[0].textContent.toLowerCase();
        const email = row.cells[1].textContent.toLowerCase();
        const rowStatus = row.dataset.status;
        const rowSession = row.dataset.session;

        const matchesSearch = patient.includes(searchText) || email.includes(searchText);
        const matchesStatus = status === 'all' || rowStatus === status;
        const matchesSession = session === 'all' || rowSession === session;

        row.style.display = matchesSearch && matchesStatus && matchesSession ? '' : 'none';
      });
    }

    searchInput.addEventListener('input', filterAppointments);
    filterStatus.addEventListener('change', filterAppointments);
    filterSession.addEventListener('change', filterAppointments);
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
