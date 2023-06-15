<?php
require_once 'Connect.php';

/*function generateRandomID() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 10;
    $randomID = '';

    for ($i = 0; $i < $length; $i++) {
        $randomID .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomID;
}

$name = $_POST['Name'];
$age = $_POST['Quantity'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$contact = $_POST['Phone'];
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$userType = $_POST["UserType"];
$doctorID = $_POST["DoctorID"];
$address = $_POST["Address"];
$specialty = $_POST["Specialty"];
$SSN = $_POST["SSN"];
$storeID = generateRandomID();
$patientPin = generateRandomID();

// ID GENERATED BY RANDOM FUNCTION
$ID = generateRandomID();
$response = '';

if ($userType === "Patient") {
    $sql = "INSERT INTO Patients (PatientID, PatientSSN, PatientName, Age, Email, Password, Contact, DoctorName, Address, Pin) VALUES ('$ID', '$SSN', '$name', '$age', '$email', '$hashedPassword', '$contact', '$doctorName', '$address', '$patientPin')";
} elseif ($userType === "Doctor") {
    $sql = "INSERT INTO Doctors (DoctorID, DoctorSSN, DoctorName, Email, Password, Specialty, Contact) VALUES ('$ID', '$SSN', '$name', '$email', '$hashedPassword', '$specialty', '$contact')";
} elseif ($userType === "Supervisor") {
    $sql = "INSERT INTO Supervisor (SupervisorID, SupervisorName, Email, Password, Contact) VALUES ('$ID', '$name', '$email', '$hashedPassword', '$contact')";
} elseif ($userType === "Pharmacy") {
    $sql = "INSERT INTO Pharmacy (PharmacyID, PharmacyName, Email, Password, Contact, PharmacyAddress, StoreID) VALUES ('$ID', '$name', '$email', '$hashedPassword', '$contact', '$address', '$storeID')";
} elseif ($userType === "Pharmaceutical Company") {
    $sql = "INSERT INTO PharmaceuticalCompany (CompanyID, CompanyName, Email, Password, Contact) VALUES ('$ID', '$name', '$email', '$hashedPassword', '$contact')";
}
*/

$sql="CREATE TABLE Patients (
  PatientID INT PRIMARY KEY,
  PatientSSN VARCHAR(10),
  PatientName VARCHAR(255),
  Age INT,
  Email VARCHAR(255),
  Password VARCHAR(255),
  Contact VARCHAR(255),
  DoctorName VARCHAR(255),
  Address VARCHAR(255),
  Pin VARCHAR(255)
);
CREATE TABLE Doctors (
  DoctorID INT PRIMARY KEY,
  DoctorSSN VARCHAR(10),
  DoctorName VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(255),
  Specialty VARCHAR(255),
  Contact VARCHAR(255)
);
CREATE TABLE Supervisor (
  SupervisorID INT PRIMARY KEY,
  SupervisorName VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(255),
  Contact VARCHAR(255)
);
CREATE TABLE Pharmacy (
  PharmacyID INT PRIMARY KEY,
  PharmacyName VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(255),
  Contact VARCHAR(255),
  PharmacyAddress VARCHAR(255),
  StoreID VARCHAR(255)
);
CREATE TABLE PharmaceuticalCompany (
  CompanyID INT PRIMARY KEY,
  CompanyName VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(255),
  Contact VARCHAR(255)
);
";


// Perform the insertion
if ($conn->multi_query($sql) === TRUE) {
    $response = "Record created successfully";
} else {
    $response = "Error creating record: " . $conn->error;
}

$conn->close();

echo $response;
?>