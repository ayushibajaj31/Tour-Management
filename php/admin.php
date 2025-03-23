<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$con = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnProc2'])) {
        // Handle "Details of a Specific Customer"
        $cust_id = mysqli_real_escape_string($con, $_POST['cust_id']);
        $sql = "CALL proc_admin2($cust_id)";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table-dark table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer First Name</th>
                            <th>Customer Last Name</th>
                            <th>Customer Age</th>
                            <th>Street Address</th>
                            <th>Home City</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['cust_id']}</td>
                        <td>{$row['cust_fname']}</td>
                        <td>{$row['cust_lname']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['street_address']}</td>
                        <td>{$row['home_city']}</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found.";
        }
    }

    if (isset($_POST['btnProc3'])) {
        // Handle "Details of a Trip of a Customer"
        $cust_id = mysqli_real_escape_string($con, $_POST['cust_id']);
        $trip_id = mysqli_real_escape_string($con, $_POST['trip_id']);
        $sql = "CALL proc_admin3($cust_id, $trip_id)";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table-dark table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Street Address</th>
                            <th>Home City</th>
                            <th>Trip ID</th>
                            <th>Trip Start</th>
                            <th>Trip End</th>
                            <th>People Traveling</th>
                            <th>Budget</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['cust_id']}</td>
                        <td>{$row['cust_fname']}</td>
                        <td>{$row['cust_lname']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['street_address']}</td>
                        <td>{$row['home_city']}</td>
                        <td>{$row['trip_id']}</td>
                        <td>{$row['trip_start']}</td>
                        <td>{$row['trip_end']}</td>
                        <td>{$row['people_traveling']}</td>
                        <td>{$row['budget']}</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found.";
        }
    }

    if (isset($_POST['btnProc5'])) {
        // Handle "Trips Between Two Dates"
        $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
        $sql = "CALL proc_admin5('$start_date', '$end_date')";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped table-dark table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Trip ID</th>
                            <th>Trip Start</th>
                            <th>Trip End</th>
                            <th>People Traveling</th>
                            <th>Budget</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['cust_id']}</td>
                        <td>{$row['cust_fname']}</td>
                        <td>{$row['cust_lname']}</td>
                        <td>{$row['trip_id']}</td>
                        <td>{$row['trip_start']}</td>
                        <td>{$row['trip_end']}</td>
                        <td>{$row['people_traveling']}</td>
                        <td>{$row['budget']}</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found.";
        }
    }
}

// Close the database connection
mysqli_close($con);
?>