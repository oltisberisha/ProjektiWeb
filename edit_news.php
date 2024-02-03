<?php
session_start();
require("database.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $loja = $_POST["loja"];
    $foto = $_POST["foto"];
    $titulli = $_POST["titulli"];
    $titulli1 = $_POST["titulli1"];
    $titulli2 = $_POST["titulli2"];
    $lajmi = $_POST["lajmi"];
    $lajmi1 = $_POST["lajmi1"];
    $lajmi2 = $_POST["lajmi2"];

    // Use prepared statement to prevent SQL injection
    $updateQuery = $conn->prepare("UPDATE news SET
                                    loja = ?,
                                    foto = ?,
                                    titulli = ?,
                                    titulli1 = ?,
                                    titulli2 = ?,
                                    lajmi = ?,
                                    lajmi1 = ?,
                                    lajmi2 = ?
                                    WHERE id = ?");

    $updateQuery->bind_param("ssssssssi", $loja, $foto, $titulli, $titulli1, $titulli2, $lajmi, $lajmi1, $lajmi2, $id);

    if ($updateQuery->execute()) {
        echo "<div>News updated successfully.</div>";
        
        // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div>Error updating news: " . $updateQuery->error . "</div>";
    }

    $updateQuery->close();
}

// Retrieve the news details for the specified ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectQuery = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($conn, $selectQuery);
    $news = mysqli_fetch_assoc($result);
} else {
    echo "<div>Invalid request. Please select a news item to edit.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="editN.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
    <!-- Include your header content here if needed -->

    <main>
        <h2>Edit News</h2>
        <label for="loja">Loja:</label>
        <form action="edit_news.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" id="loja" name="loja" value="<?php echo isset($news['loja']) ? $news['loja'] : ''; ?>">

            <label for="foto">Photo URL:</label>
            <input type="text" id="foto" name="foto" value="<?php echo isset($news['foto']) ? $news['foto'] : ''; ?>" maxlength="500">


            <label for="titulli">Titulli:</label>
            <input type="text" id="titulli" name="titulli" value="<?php echo isset($news['titulli']) ? $news['titulli'] : ''; ?>">

            <label for="titulli1">Titulli1:</label>
            <input type="text" id="titulli1" name="titulli1" value="<?php echo isset($news['titulli1']) ? $news['titulli1'] : ''; ?>">

            <label for="titulli2">Titulli2:</label>
            <input type="text" id="titulli2" name="titulli2" value="<?php echo isset($news['titulli2']) ? $news['titulli2'] : ''; ?>">
            
            <label for="lajmi">Lajmi:</label>
            <input type="text" id="lajmi" name="lajmi" value="<?php echo isset($news['lajmi']) ? $news['lajmi'] : ''; ?>">
            
            <label for="lajmi1">Lajmi1:</label>            
            <input type="text" id="lajmi1" name="lajmi1" value="<?php echo isset($news['lajmi1']) ? $news['lajmi1'] : ''; ?>">
            
            <label for="lajmi2">Lajmi2:</label>
            <input type="text" id="lajmi2" name="lajmi2" value="<?php echo isset($news['lajmi2']) ? $news['lajmi2'] : ''; ?>">


            <button type="submit" name="submit">Update News</button>
        </form>
    </main>

    <!-- Include your footer content here if needed -->
</body>
</html>
