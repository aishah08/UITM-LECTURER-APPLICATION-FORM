<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "borang_uitm";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle file upload
$profile_pic = $_FILES['profile-pic']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($profile_pic);
if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)) {
    // File upload successful
} else {
    echo "Sorry, there was an error uploading your file.";
}


    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO applications (nama, ic, passport, nationality, dob, state_of_birth, bangsa, agama, marital_status, spouse_name, gender, address, phone, office_phone, email, pekerjaan, work_address, fakulti, bidang, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssss", $nama, $ic, $passport, $nationality, $dob, $state_of_birth, $bangsa, $agama, $marital_status, $spouse_name, $gender, $address, $phone, $office_phone, $email, $pekerjaan, $work_address, $fakulti, $bidang, $target_file);

    // Set parameters and execute
    $nama = $_POST['nama'];
    $ic = $_POST['ic'];
    $passport = $_POST['passport'];
    $nationality = $_POST['nationality'];
    $dob = $_POST['dob'];
    $state_of_birth = $_POST['state'];
    $bangsa = $_POST['bangsa'];
    $agama = $_POST['agama'];
    $marital_status = $_POST['marital-status'];
    $spouse_name = $_POST['spouse_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $office_phone = $_POST['office_phone'];
    $email = $_POST['email'];
    $pekerjaan = $_POST['pekerjaan'];
    $work_address = $_POST['work_address'];
    $fakulti = $_POST['fakulti'];
    $bidang = $_POST['bidang'];

    // Execute the statement
    $stmt->execute();

    // Get the last inserted application ID
    $application_id = $stmt->insert_id;

    // Insert academic qualifications
    $qualification = $_POST['qualification'];
    $grade = $_POST['grade'];
    $malay_qualification = $_POST['malay_qualification'];
    $institution = $_POST['institution'];
    $graduation_date = $_POST['graduation_date'];

    for ($i = 0; $i < count($qualification); $i++) {
        $stmt = $conn->prepare("INSERT INTO academic_qualifications (application_id, qualification_name, grade, malay_qualification, institution_name, graduation_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $application_id, $qualification[$i], $grade[$i], $malay_qualification[$i], $institution[$i], $graduation_date[$i]);
        $stmt->execute();
    }

    // Insert professional memberships
    $professional_body = $_POST['professional_body'];
    $membership_number = $_POST['membership_number'];
    $membership_date = $_POST['membership_date'];

    for ($i = 0; $i < count($professional_body); $i++) {
        $stmt = $conn->prepare("INSERT INTO professional_memberships (application_id, professional_body_name, membership_number, membership_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $application_id, $professional_body[$i], $membership_number[$i], $membership_date[$i]);
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect or show success message
    echo "Permohonan anda telah berjaya dihantar!";
}
?>
