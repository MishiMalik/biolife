<?php
session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (str_contains($_SERVER['PHP_SELF'], "admin")) {
    include_once "../includes/connection.php";
} else {
    include_once dirname(__DIR__) . "/includes/connection.php";
}

function redirect($path) {
    echo "<script>window.location.href = '$path'</script>";
}

function login(DB $pdo) {
    $conn = $pdo->open();

    $query = "SELECT id, email, password FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($query);

    $email = $_POST['email'];
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['user'] = $user;

            $pdo->close();
            redirect("index.php");
        } else {
            $pdo->close();
            return json_encode(["error" => "Email or password is wrong!"]);
        }
    } else {
        $pdo->close();
        return json_encode(["error" => "Email or password is wrong!"]);
    }
}

function fetch(DB $pdo, $query) {
    $conn = $pdo->open();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
}

function fetchAll(DB $pdo, $query) {
    $conn = $pdo->open();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function findById(DB $pdo, $table, $id) {
    $conn = $pdo->open();

    $query = "SELECT * FROM {$table} WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function findByQuery(DB $pdo, $query) {
    $conn = $pdo->open();

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetch();
}

function findAllByQuery(DB $pdo, $query) {
    $conn = $pdo->open();

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function findAll(DB $pdo, $table) {
    $conn = $pdo->open();

    $query = "SELECT * FROM {$table}";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function valueParams($length) {
    $params = "";
    for ($i = 0; $i < $length; $i++) {
        $params .= "?";
        $params .= $i !== $length - 1 ? "," : "";
    }

    return $params;
}

function insert(DB $pdo, $table, $data) {
    $conn = $pdo->open();

    $query = "INSERT INTO {$table} (" . implode(',', array_keys($data)) . ") VALUES (" . valueParams(count($data)) . ")";
    $stmt = $conn->prepare($query);
    $stmt->execute(array_values($data));

    return $conn->lastInsertId();
}

function update(DB $pdo, $table, $data, $idCol, $idColVal) {
    $conn = $pdo->open();

    $properties_pairs = [];
    $properties_values = [];
    foreach ($data as $key => $value) {
        $properties_pairs[] = "{$key}=?";
        $properties_values[] = $value;
    }

    $sql = "UPDATE  " . $table . "  SET ";
    $sql .= implode(", ", $properties_pairs);
    $sql .= " WHERE " . $idCol . " = '" . $idColVal . "'";

    $stmt = $conn->prepare($sql);
    if ($stmt->execute($properties_values)) {
        return true;
    } else {
        return false;
    }
}

function delete(DB $pdo, $table, $idCol, $idVal) {
    $conn = $pdo->open();

    $query = "DELETE FROM {$table} WHERE {$idCol} = '{$idVal}'";
    $stmt = $conn->prepare($query);
    if ($stmt->execute())
        return true;
    else
        return false;
}

function sendMail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['SMTP_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USERNAME'];                     //SMTP username
        $mail->Password   = $_ENV['SMTP_PASSWORD'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = $_ENV['SMTP_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['APP_NAME']);
        $mail->addAddress($to);     //Add a recipient
        $mail->addReplyTo($_ENV['MAIL_FROM'], $_ENV['APP_NAME']);
        $mail->addCC($_ENV['MAIL_FROM']);
        $mail->addBCC($_ENV['MAIL_FROM']);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
    }
}
