<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_type = isset($_POST["form_type"]) ? trim($_POST["form_type"]) : "";

    if ($form_type === "review") {
        $name = trim($_POST["name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $message = trim($_POST["message"] ?? "");

        if ($name !== "" && $email !== "" && $message !== "") {
            $stmt = $conn->prepare("INSERT INTO reviews (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();
            $stmt->close();
            echo "Отзыв успешно отправлен! <br><br><a href='index.html'>Вернуться на сайт</a>";
        } else {
            echo "Пожалуйста, заполните все поля формы отзыва. <br><br><a href='index.html'>Назад</a>";
        }
    } elseif ($form_type === "newsletter") {
        $email = trim($_POST["email"] ?? "");

        if ($email !== "") {
            $stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (?)");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
            echo "Вы успешно подписались на новости! <br><br><a href='index.html'>Вернуться на сайт</a>";
        } else {
            echo "Введите email для подписки. <br><br><a href='index.html'>Назад</a>";
        }
    } elseif ($form_type === "contact") {
        $name = trim($_POST["name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $message = trim($_POST["message"] ?? "");

        if ($name !== "" && $email !== "" && $message !== "") {
            $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);
            $stmt->execute();
            $stmt->close();
            echo "Заявка успешно отправлена! <br><br><a href='index.html'>Вернуться на сайт</a>";
        } else {
            echo "Пожалуйста, заполните все поля контактной формы. <br><br><a href='index.html'>Назад</a>";
        }
    } else {
        echo "Неизвестный тип формы. <br><br><a href='index.html'>Назад</a>";
    }
}

$conn->close();
?>
