<?php 
include '../easly/connexion.php';

// Retrieve the selected article from the AJAX request
$selectedArticle = $_POST['article'];

// Prepare and execute the database query to retrieve the price
$stmt = $conn->prepare("SELECT PrixUnitaire FROM article WHERE Nom_Article = ?");
if (!$stmt) {
  $response['success'] = false;
  $response['error'] = 'Database query error: ' . $conn->error;
} else {
  $stmt->bind_param("s", $selectedArticle);
  $stmt->execute();
  $result = $stmt->get_result();

  $response = array();

  if ($result->num_rows > 0) {
    // Fetch the price from the query result
    $row = $result->fetch_assoc();
    $response['success'] = true;
    $response['price'] = $row['PrixUnitaire'];
  } else {
    $response['success'] = false;
  }

  $stmt->close();
}

$conn->close();

// Send the response back to the JavaScript
header('Content-Type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit();
?>
