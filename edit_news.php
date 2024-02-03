<?php

class NewsEditor
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getNewsById($id)
    {
        $selectQuery = "SELECT * FROM news WHERE id = ?";
        $stmt = $this->conn->prepare($selectQuery);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $news = $result->fetch_assoc();
        return $news;
    }

    public function updateNews($id, $loja, $foto, $titulli, $titulli1, $titulli2, $lajmi, $lajmi1, $lajmi2)
    {
        $updateQuery = $this->conn->prepare("UPDATE news SET
                                    loja = ?,
                                    foto = ?,
                                    titulli = ?,
                                    titulli1 = ?,
                                    titulli2 = ?,
                                    lajmi = ?,
                                    lajmi1 = ?,
                                    lajmi2 = ?
                                    WHERE id = ?");

        $updateQuery->bind_param(
            "ssssssssi",
            $loja,
            $foto,
            $titulli,
            $titulli1,
            $titulli2,
            $lajmi,
            $lajmi1,
            $lajmi2,
            $id
        );

        if ($updateQuery->execute()) {
            return true;
        } else {
            return "Error updating news: " . $updateQuery->error;
        }
    }
}

session_start();
require("database.php");
require("database1.php");

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

    $newsEditor = new NewsEditor($conn);

    $updateResult = $newsEditor->updateNews($id, $loja, $foto, $titulli, $titulli1, $titulli2, $lajmi, $lajmi1, $lajmi2);

    if ($updateResult === true) {
        echo "<div>News updated successfully.</div>";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div>$updateResult</div>";
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $newsEditor = new NewsEditor($conn);
    $news = $newsEditor->getNewsById($id);
    if (!$news) {
        echo "<div>Invalid request. Please select a news item to edit.</div>";
        exit;
    }
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
    <link rel="stylesheet" href="edit_news.css" />
</head>

<body>

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

</body>

</html>
