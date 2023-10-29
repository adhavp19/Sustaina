
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $water_bottles = $_POST["water_bottles"];
    $shower_duration = $_POST["shower_duration"];
    $local_food = $_POST["local_food"];
    $public_transportation = $_POST["public_transportation"];
    $compost = $_POST["compost"];
    $screen_time = $_POST["screen_time"];
    $lights_and_devices = $_POST["lights_and_devices"];
    $repair_or_repurpose = $_POST["repair_or_repurpose"];
    $sink_usage = $_POST["sink_usage"];

    // Prepare the data to be saved
    $data = "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Age: $age\n";
    $data .= "Plastic Water Bottles: $water_bottles\n";
    $data .= "Shower Duration: $shower_duration\n";
    $data .= "Public Transportation: $local_food\n";
    $data .= "Public Transportation: $public_transportation\n";
    $data .= "Compost: $compost\n";
    $data .= "Screen Time: $screen_time\n";
    $data .= "Lights and Devices: $lights_and_devices\n";
    $data .= "Repair or Repurpose: $repair_or_repurpose\n\n";
    $data .= "Sink Usage: $sink_usage\n\n";

    $file = "survey_data.txt";

// Open the file for writing (create it if it doesn't exist)
$handle = fopen($file, "w");
if ($handle === false) {
    die("Unable to open or create the file for writing.");
}

// Write the data to the file
$result = fwrite($handle, $data);
if ($result === false) {
    die("Error writing data to the file.");
}



$waterScore = 0;
$miscWasteScore = 0;
$electricityScore = 0;
$foodScore = 0;
// Calculate the score for sink usage

if ($sink_usage == "never") {
    $waterScore += 5;
}

if ($sink_usage == "almost_never") {
    $waterScore += 3;
}


if ($sink_usage == "sometimes") {
    $waterScore += 2;
}

if ($sink_usage == "most_of_the_time") {
    $waterScore += 1;
}


if ($sink_usage == "always") {
    $waterScore += 0;
}

// Calculate the score for shower time
if ($shower_duration == "0-5") {
    $waterScore += 5;
}

if ($shower_duration == "5-10") {
    $waterScore += 4;
}

if ($shower_duration == "10-20") {
    $waterScore += 3;
}

if ($shower_duration == "20-30") {
    $waterScore += 2;
}

if ($shower_duration == "30-60") {
    $waterScore += 1;
}
if ($shower_duration == "60+") {
    $waterScore += 0;
}

// Calculate the score for water bottle waste
if ($water_bottles == "0") {
    $miscWasteScore += 5;
}

if ($water_bottles == "1") {
    $miscWasteScore += 3;
}

if ($water_bottles == "2") {
    $miscWasteScore += 2;
}

if ($water_bottles == "3") {
    $miscWasteScore += 1;
}

if ($water_bottles == "4+") {
    $miscWasteScore += 0;
}

// Calculate the score for getting rid of old items

if ($repair_or_repurpose == "always") {
    $miscWasteScore += 5;
}

if ($repair_or_repurpose == "most_of_the_time") {
    $miscWasteScore += 3;
}


if ($repair_or_repurpose == "sometimes") {
    $miscWasteScore += 2;
}

if ($repair_or_repurpose == "almost_never") {
    $miscWasteScore += 1;
}

if ($repair_or_repurpose == "never") {
    $miscWasteScore += 0;
}

// Calculate the score for public transportation

if ($public_transportation == "always") {
    $electricityScore += 5;
}

if ($public_transportation == "most_of_the_time") {
    $electricityScore += 3;
}


if ($public_transportation == "sometimes") {
    $electricityScore += 2;
}

if ($public_transportation == "almost_never") {
    $electricityScore += 1;
}

if ($public_transportation == "never") {
    $electricityScore += 0;
}

// Calculate the score for screen time

if ($screen_time == "less_than_1_hour") {
    $electricityScore += 5;
}

if ($screen_time == "1_to_2_hours") {
    $electricityScore += 3;
}


if ($screen_time == "2_to_4_hours") {
    $electricityScore += 2;
}

if ($screen_time == "4_to_8_hours") {
    $electricityScore += 1;
}

if ($screen_time == "8_plus_hours") {
    $electricityScore += 0;
}

// Calculate the score for lights and devices left on

if ($lights_and_devices == "always") {
    $electricityScore += 5;
}

if ($lights_and_devices == "most_of_the_time") {
    $electricityScore += 3;
}


if ($lights_and_devices == "sometimes") {
    $electricityScore += 2;
}

if ($lights_and_devices == "almost_never") {
    $electricityScore += 1;
}

if ($lights_and_devices == "never") {
    $electricityScore += 0;
}

// Calculate the score for locally sourced produce

if ($local_food == "always") {
    $foodScore += 5;
}

if ($local_food == "most_of_the_time") {
    $foodScore += 3;
}


if ($local_food == "sometimes") {
    $foodScore += 2;
}

if ($local_food == "almost_never") {
    $foodScore += 1;
}

if ($local_food == "never") {
    $foodScore += 0;
}

// Calculate the score for food compost

if ($compost == "always") {
    $foodScore += 5;
}

if ($compost == "most_of_the_time") {
    $foodScore += 3;
}


if ($compost == "sometimes") {
    $foodScore += 2;
}

if ($compost == "almost_never") {
    $foodScore += 1;
}

if ($compost == "never") {
    $foodScore += 0;
}


$cards = [
    [
        'image' => 'image1.jpg',
        'text' => 'Card 1 Text Here',
    ],
    [
        'image' => 'image2.jpg',
        'text' => 'Card 2 Text Here',
    ],
    [
        'image' => 'image3.jpg',
        'text' => 'Card 3 Text Here',
    ],
];

$waterScoreMessage = '';
$miscWasteScoreMessage = '';
$electricityScoreMessage = '';
$foodScoreMessage = '';

$waterScoreMessage1 = '';
$miscWasteScoreMessage1 = '';
$electricityScoreMessage1 = '';
$foodScoreMessage1 = '';

$waterScoreMessage1 = '<p>Water Waste Category:</p>';

if ($waterScore >= 8) {
    $waterScoreMessage = '<p>You are doing an excellent job in water conservation! You scored a ' . $waterScore . ' out of 10. Nice job! Congratulations on your water-saving efforts! It\'s great to see you\'re being mindful of water conservation. While you\'re doing a fantastic job, it\'s essential to continue this practice and remind ourselves of the importance of conserving water for a sustainable future. Every drop counts, so keep up the good work</p>';
} elseif ($waterScore >= 6) {
    $waterScoreMessage = '<p>You are making good progress in water conservation. You scored a ' . $waterScore . ' out of 10. Keep working! Saving water is incredibly important for several reasons. It helps to preserve this precious resource for future generations, reduces the strain on our ecosystems, and lowers our utility bills. Conserving water is a simple yet powerful way to contribute to a more sustainable and environmentally responsible world. Every drop saved makes a significant impact, and it\'s a responsibility we all share. Let\'s continue to make a difference by using water wisely.</p>';
} else {
    $waterScoreMessage = '<p>Consider adopting more water-saving practices for a better rating. You scored a ' . $waterScore . ' out of 10. Saving water is incredibly important for several reasons. It helps to preserve this precious resource for future generations, reduces the strain on our ecosystems, and lowers our utility bills. Conserving water is a simple yet powerful way to contribute to a more sustainable and environmentally responsible world. Every drop saved makes a significant impact, and it\'s a responsibility we all share. Let\'s continue to make a difference by using water wisely.</p>';
}

$miscWasteScoreMessage1 = '<p>Miscellaneous Waste Category:</p>';

if ($miscWasteScore >= 8) {
    $miscWasteScoreMessage .= '<p>You are doing an excellent job in reducing plastic waste and reusing! You scored a ' . $miscWasteScore . ' out of 10. Nice job! Congratulations on your efforts in reducing plastic waste! Your commitment to a cleaner, more sustainable planet is truly commendable. Every small change adds up to a big difference, and you\'re leading by example. Keep up the fantastic work!</p>';
} elseif ($miscWasteScore >= 6) {
    $miscWasteScoreMessage .= '<p>You are making good progress in reducing plastic waste and reusing. You scored a ' . $miscWasteScore . ' out of 10. Keep working! Reducing plastic waste is unquestionably a positive endeavor. It minimizes pollution, protects wildlife, and conserves natural resources. By making conscious choices to reduce our reliance on single-use plastics, we can contribute to a cleaner and healthier planet for current and future generations.</p>';
} else {
    $miscWasteScoreMessage .= '<p>Consider adopting better practices when it comes to reducing plastic waste and reusing. You scored a ' . $miscWasteScore . ' out of 10. Stop wasting! Reducing plastic waste is unquestionably a positive endeavor. It minimizes pollution, protects wildlife, and conserves natural resources. By making conscious choices to reduce our reliance on single-use plastics, we can contribute to a cleaner and healthier planet for current and future generations.</p>';
}

$electricityScoreMessage1 = '<p>Electricity Category:</p>';

if ($electricityScore >= 12) {
    $electricityScoreMessage .= '<p>You are doing an excellent job in conserving electricity! Your score is ' . $electricityScore . ' out of 15. Great work! Congratulations on your outstanding energy conservation efforts! Your dedication to reducing energy consumption is not only commendable but also crucial for a more sustainable and eco-friendly future. Keep up the great work, and thank you for making a positive impact!</p>';
} elseif ($electricityScore >= 9) {
    $electricityScoreMessage .= '<p>You are making good progress in conserving electricity. Your score is ' . $electricityScore . ' out of 15. Keep it up! Conserving energy is undeniably a positive choice. It reduces our environmental impact, saves money, and ensures a more sustainable future for all. Embracing energy conservation is a responsible and rewarding way to make a difference in our lives and the world around us.</p>';
} else {
    $electricityScoreMessage .= '<p>Consider adopting better practices to conserve electricity. Your score is ' . $electricityScore . ' out of 15. Stop wasting energy! Conserving energy is undeniably a positive choice. It reduces our environmental impact, saves money, and ensures a more sustainable future for all. Embracing energy conservation is a responsible and rewarding way to make a difference in our lives and the world around us.</p>';
}

$foodScoreMessage1 = '<p>Food Category:</p>';

if ($foodScore >= 8) {
    $foodScoreMessage .= '<p>You are doing an excellent job in sustainable food practices! Your score is ' . $foodScore . ' out of 10. Sustainable food habits are beneficial for many reasons. They help to protect the environment by reducing the ecological footprint of our food production, promote healthier and more nutritious eating, support local economies, and contribute to food security. Embracing sustainable food habits not only benefits our health but also the planet and our communities. It\'s a win-win for everyone!</p>';
} elseif ($foodScore >= 6) {
    $foodScoreMessage .= '<p>You are making good progress in adopting sustainable food habits. Your score is ' . $foodScore . ' out of 10. Sustainable food habits are beneficial for many reasons. They help to protect the environment by reducing the ecological footprint of our food production, promote healthier and more nutritious eating, support local economies, and contribute to food security. Embracing sustainable food habits not only benefits our health but also the planet and our communities. It\'s a win-win for everyone</p>';
} else {
    $foodScoreMessage .= '<p>Consider adopting more sustainable food practices for a better rating. Your score is ' . $foodScore . ' out of 10. Sustainable food habits are beneficial for many reasons. They help to protect the environment by reducing the ecological footprint of our food production, promote healthier and more nutritious eating, support local economies, and contribute to food security. Embracing sustainable food habits not only benefits our health but also the planet and our communities. It\'s a win-win for everyone</p>';
}



// Close the file
fclose($handle);

    

    // Display a summary page with individual ratings for each category
echo '<html>';
echo '<head>';
echo '<title>Survey Summary</title>';
echo '<link rel="stylesheet" type="text/css" href="summary.css">'; // Add a CSS file for styling
echo '</head>';
echo '<body>';


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="survey.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>SUSTAINA</title>
</head>
<body>
    <header>
        <p>Sustainability is key</p>
    </header>
    <nav>
        <div class="logo">
            <img src="photos/Untitled (1).png">
            <h1>SUSTAINA</h1>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <ul>
                <li><a href="#">Hello, there!</a></li>
            </ul>
        </div>
    </nav>
    <h1 id= "title">Welcome, '. $name . '</h1>
    
    
    <div class="card-container">
    <div class="card">
        <img src="photos/Untitled (1).png" alt="Image 1">

        ' . $foodScoreMessage1 . '
    
        ' . $foodScoreMessage . '
    </div>
    <div class="card">
        <img src="photos/Untitled (2).png" alt="Image 2">

        ' . $waterScoreMessage1 . '
      
        ' . $waterScoreMessage . '
    </div>
    </div>
    <div class="card-container">
    <div class="card">
        <img src="photos/Untitled (3).png" alt="Image 3">
        <?php echo $electricityScoreMessage1; ?>

        ' . $electricityScoreMessage1 . '
 
        ' . $electricityScoreMessage . '
    </div>
    <div class="card">
        <img src="photos/Untitled (4).png" alt="Image 4">
      
        ' . $miscWasteScoreMessage1 . '
   
        ' . $miscWasteScoreMessage . '
    </div>
    </div>';


echo '</body>
<footer class="footer-distributed" id="foot">
    <div class="footer-left">
        <h3>Sustaina<span>Works</span></h3>
        <p class="footer-company-name">© ' . date("Y") . ' <strong>Sustaina</strong> All rights reserved</p>
    </div>
    <div class="footer-right">
        <div>
            <p>Columbus, Ohio</p>
        </div>
        <div>
            <p id="email">Sustaina@gmail.com</p>
        </div>
    </div>
</footer>
</html>';



echo '</body>';
echo '</html>';
} 





?>
