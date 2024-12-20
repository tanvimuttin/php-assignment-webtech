<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['fname'] ?? '';
    $lastName = $_POST['lname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $dateOfBirth = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $hobbies = $_POST['hobbies'] ?? [];
    $country = $_POST['country'] ?? '';
    $address = $_POST['address'] ?? '';

    // Convert hobbies array to string for display
    $hobbiesString = is_array($hobbies) ? implode(", ", $hobbies) : $hobbies;

    // Style for the response
    $style = "
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            color: #0066cc;
            text-align: center;
        }
        .data-row {
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
    </style>";

    // Prepare the response HTML
    $response = $style;
    $response .= "<div class='container'>";
    $response .= "<h2>Registration Details</h2>";
    
    $response .= "<div class='data-row'><span class='label'>First Name:</span> " . htmlspecialchars($firstName) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Last Name:</span> " . htmlspecialchars($lastName) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Email:</span> " . htmlspecialchars($email) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Password:</span> ********</div>";
    $response .= "<div class='data-row'><span class='label'>Date of Birth:</span> " . htmlspecialchars($dateOfBirth) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Gender:</span> " . htmlspecialchars($gender) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Hobbies:</span> " . htmlspecialchars($hobbiesString) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Country:</span> " . htmlspecialchars($country) . "</div>";
    $response .= "<div class='data-row'><span class='label'>Address:</span> " . htmlspecialchars($address) . "</div>";

    // Add a back button
    $response .= "<div style='text-align: center; margin-top: 20px;'>";
    $response .= "<a href='regis.html' style='background-color: #0066cc; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Back to Form</a>";
    $response .= "</div>";
    
    $response .= "</div>";

    // Optional: Store in database
    // Database connection and insertion code would go here
    
    echo $response;
} else {
    http_response_code(400);
    echo "Invalid request method";
}
?>