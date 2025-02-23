<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Jawatan Pensyarah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #007bff;
            color: white;
        }
        .add-btn {
            cursor: pointer;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UiTM Form</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="apply.php">Apply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="application_status.php">Application Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php 
                session_start();
                if (isset($_SESSION['username'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <li><a class="dropdown-item" href="admin_dashboard.php">Admin Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
    

    <div class="container">
        <h1 class="text-center mb-4">Permohonan Jawatan Pensyarah</h1>
        
        <form method="POST" action="submit_form.php" enctype="multipart/form-data">
            <!-- Photo Upload -->
            <div class="mb-3 text-center">
                <label for="profile-pic" class="form-label">Muat Naik Gambar</label>
                <input type="file" class="form-control" id="profile-pic" name="profile-pic" accept="image/*" required>
            </div>

            <!-- Fakulti and Bidang -->
            <div class="row mb-3">
                <div class="col">
                    <label for="fakulti" class="form-label">Fakulti</label>
                    <input type="text" class="form-control" id="fakulti" name="fakulti" placeholder="Masukkan Fakulti" required>
                </div>
                <div class="col">
                    <label for="bidang" class="form-label">Bidang</label>
                    <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Masukkan Bidang" required>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penuh</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter your full name" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="ic" class="form-label">Nombor Kad Pengenalan</label>
                    <input type="text" class="form-control" id="ic" name="ic" placeholder="Enter your ID number" required>
                </div>
                <div class="col">
                    <label for="passport" class="form-label">Nombor Kad Pengenalan Lama / Passport</label>
                    <input type="text" class="form-control" id="passport" name="passport">
                </div>
            </div>
            <div class="mb-3">
                <label for="nationality" class="form-label">Kewarganegaraan</label>
                <select class="form-select" id="nationality" name="nationality" required>
                    <option value="M">Malaysia</option>
                    <option value="B">Bukan</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="dob" class="form-label">Tarikh Lahir</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="col">
                    <label for="state" class="form-label">Negeri Lahir</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="State of birth">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="bangsa" class="form-label">Bangsa</label>
                    <input type="text" class="form-control" id="bangsa" name="bangsa" placeholder="Contoh: Melayu, Cina, India" required>
                </div>
                <div class="col">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Contoh: Islam, Hindu, Buddha" required>
                </div>
            </div>

            <!-- Marital Status and Gender -->
            <div class="row mb-3">
                <div class="col">
                    <label for="marital-status" class="form-label">Taraf Perkahwinan</label>
                    <select class="form-select" id="marital-status" name="marital-status" required>
                        <option value="">Pilih</option>
                        <option value="Bujang">Bujang</option>
                        <option value="Kahwin">Kahwin</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                    </select>
                </div>
                <div class="col">
                    <label for="spouse_name" class="form-label">Nama Suami/Isteri</label>
                    <input type="text" class="form-control" id="spouse_name" name="spouse_name" placeholder="Enter the detail if related">
                </div>
                <div class="col">
                    <label for="gender" class="form-label">Jantina</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="">Pilih</option>
                        <option value="Lelaki">Lelaki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat Surat Menyurat</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <!-- Contact Details -->
            <div class="row mb-3">
                <div class="col">
                    <label for="phone" class="form-label">No. Tel. Rumah</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="col">
                    <label for="office_phone" class="form-label">No. Telefon Pejabat</label>
                    <input type="text" class="form-control" id="office_phone" name="office_phone">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Enter the detail">
            </div>
            <div class="mb-3">
                <label for="work_address" class="form-label">Alamat Tempat Bekerja</label>
                <textarea class="form-control" id="work_address" name="work_address" rows="3" required></textarea>
            </div>
    
            <h5 class="mt-4">Sejarah Kelayakan Akademik</h5>
            <table class="table table-bordered" id="academic-table">
                <thead class="table-secondary">
                    <tr>
                        <th>Nama Kelayakan / Bidang</th>
                        <th>Pangkat / Kelas / CGPA</th>
                        <th>Kelulusan Bahasa Malaysia</th>
                        <th>Nama Institusi</th>
                        <th>Tarikh Lulus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Qualification" name="qualification[]"></td>
                        <td><input type="text" class="form-control" placeholder="Grade / CGPA" name="grade[]"></td>
                        <td><input type="text" class="form-control" placeholder="Yes / No" name="malay_qualification[]"></td>
                        <td><input type="text" class="form-control" placeholder="Institution" name="institution[]"></td>
                        <td><input type="date" class="form-control" name="graduation_date[]"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Delete</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary add-btn" onclick="addRow('academic-table')">Add Row</button>

            <h5 class="mt-4">Keahlian Profesional</h5>
            <table class="table table-bordered" id="professional-table">
                <thead class="table-secondary">
                    <tr>
                        <th>Nama Badan Profesional</th>
                        <th>Nombor Ahli</th>
                        <th>Tarikh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Professional Body" name="professional_body[]"></td>
                        <td><input type="text" class="form-control" placeholder="Membership No" name="membership_number[]"></td>
                        <td><input type="date" class="form-control" name="membership_date[]"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Delete</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary add-btn" onclick="addRow('professional-table')">Add Row</button>

            <div class="text-center mt-5">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Universiti Teknologi MARA. All Rights Reserved.</p>
    </footer>

    <script>
        function addRow(tableId) {
            const table = document.getElementById(tableId).querySelector('tbody');
            const row = table.querySelector('tr').cloneNode(true);
            row.querySelectorAll('input').forEach(input => input.value = '');
            table.appendChild(row);
        }

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-row')) {
                const row = e.target.closest('tr');
                row.remove();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

