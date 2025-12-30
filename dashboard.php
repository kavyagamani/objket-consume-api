<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

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

        .dashboard-box {
            background: #ffffff;
            padding: 35px;
            width: 380px;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .success {
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        button {
            padding: 10px 25px;
            background: #dc2626;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

<div class="dashboard-box">

    <?php
    if (isset($_SESSION["login_success"])) {
        echo "<div class='success'>" . $_SESSION["login_success"] . "</div>";
        unset($_SESSION["login_success"]);
    }
    ?>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?></h2>

    <form method="post">
        <button name="logout">Logout</button>
    </form>

    <?php
    if (isset($_POST["logout"])) {

        $ch = curl_init("http://localhost/objket-mini-project/api/logout.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        session_destroy();
        header("Location: index.php");
        exit;
    }
    ?>

</div>

</body>
</html>
