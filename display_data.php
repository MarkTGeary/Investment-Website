import php.executables
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database.sql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the tables
$sql_contact = "SELECT * FROM company_contact";
$result_contact = $conn->query($sql_contact);

$sql_business_details = "SELECT * FROM business_details";
$result_business_details = $conn->query($sql_business_details);

$sql_financial_data = "SELECT * FROM financial_data";
$result_financial_data = $conn->query($sql_financial_data);

$sql_additional_info = "SELECT * FROM additional_info";
$result_additional_info = $conn->query($sql_additional_info);

$sql_investor_data = "SELECT * FROM investor_data";
$result_investor_data = $conn->query($sql_investor_data);

// Fetch the data from result sets
$contact_info = $result_contact->fetch_assoc();
$business_info = $result_business_details->fetch_assoc();

$financial_data = [];
while($row = $result_financial_data->fetch_assoc()) {
    $financial_data[] = $row;
}

$additional_data = [];
while($row = $result_additional_info->fetch_assoc()) {
    $additional_data[] = $row;
}

$investor_data = [];
while($row = $result_investor_data->fetch_assoc()) {
    $investor_data[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Information</title>
    <style>
        body {
            background-color: #ebc999;
        }
        header {
            background-color: #4d3227;
            padding: 10px;
            text-align: center;
            color: silver;
        }
        section {
            margin: 20px;
            padding: 20px;
            background-color: whitesmoke;
            border-radius: 8px;
        }
        h2 {
            color: darkorange;
        }
        p, li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Business Information of <b><i><u><div id="headingContainer"></div></u></i></b></h1>
    </header>
    <main>
        <section>
            <h2>Company Contact Information</h2>
            <p><strong>Name:</strong> <span id="contactName"><?php echo $contact_info['contact_name']; ?></span></p>
            <p><strong>Email:</strong> <span id="contactEmail"><?php echo $contact_info['email']; ?></span></p>
            <p><strong>Phone Number:</strong> <span id="contactPhoneNumber"><?php echo $contact_info['phone_number']; ?></span></p>
        </section>

        <section>
            <h2>Company's Product/Service</h2>
            <p id="businessDetails"><?php echo $business_info['details']; ?></p>
        </section>

        <section>
            <h2>LCL Leader</h2>
            <p id="lead.1"><?php // Add appropriate query to fetch LCL Leader info ?></p>
        </section>

        <section>
            <h2>Financial Information</h2>
            <ul id="financialList">
                <?php foreach ($financial_data as $item): ?>
                    <li><?php echo $item['financial_type'] . ': ' . $item['financial_value']; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h2>Assessment Criteria</h2>
            <ul id="assessmentList">
                <?php
                $questions = [
                    "The Company has a Product or Service in the Market and is Revenue Generating with scaling",
                    "The company has a path to profitability within 2 to 3 years",
                    "Opportunity has an exit/money out in 3 to 6 years",
                    "The Return is x3 at a minimum (including investment)",
                    "Is this a Business to Business Opportunity",
                    "Does the company have strong Management Bench Strength/Capabilities",
                    "Is the opportunity in the right sector",
                    "Has there been revenue in the last 12 months of €500,000 with a growth rate of 20+%",
                    "Will this give LCL a shareholding level of 2+%",
                    "Are we within the two companies per year goal for LCL"
                ];
                for ($i = 0; $i < 10; $i++):
                    ?>
                    <li><?php echo $questions[$i] . ': ' . 'N/A'; ?></li>
                <?php endfor; ?>
            </ul>
        </section>

        <section>
            <h2>Additional Criteria</h2>
            <ul id="additionalList">
                <?php foreach ($additional_data as $item): ?>
                    <li><?php echo $item['topic'] . ': ' . $item['information']; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
</body>
</html>
