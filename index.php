<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$msg = "";

if (isset($_POST["login"])) {

    $data = [
        "username" => $_POST["username"],
        "password" => $_POST["password"]
    ];

    $ch = curl_init("http://localhost/objket-mini-project/api/login.php");

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        $msg = "API not reachable";
    } else {
        $result = json_decode($response, true);

        if (is_array($result) && isset($result["status"])) {
            if ($result["status"] === "success") {
                session_start();
                $_SESSION["user"] = $data["username"];
                $_SESSION["login_success"] = "✅ Login successful";
                header("Location: dashboard.php");
                exit;
            } else {
                $msg = $result["message"];
            }
        } else {
            $msg = "Invalid API response";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Objket Login</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #ffffff;
            padding: 35px;
            width: 340px;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .login-box button:hover {
            background: #4338ca;
        }

        .error {
            margin-top: 15px;
            text-align: center;
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Objket Login</h2>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <?php if ($msg != "") { ?>
        <div class="error"><?php echo $msg; ?></div>
    <?php } ?>
</div>

</body>
</html>
