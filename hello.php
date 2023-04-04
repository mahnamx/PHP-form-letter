<?php
session_start();

$name = $_SESSION['name'] ?? '';
$email = $_SESSION['email'] ?? '';
$school = $_SESSION['school'] ?? '';

if (!$name || !$email || !$school) {
    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-8">
    <div class="max-w-md mx-auto rounded-md overflow-hidden shadow-md p-6">
    <h1 class="text-center text-white text-4xl font-bold mb-4">Welcome, <?php echo $name ?>!</h1>
        <p class="text-white text-center mb-8">Your email is: <strong><?php echo $email ?></strong></p>
        <p class="text-white text-center mb-8">Your Job is: <strong><?php echo $school ?></strong></p>
        <form action="" method="POST">
            <div class="flex justify-center">
                <div class="w-full">
                    <textarea name="text" id="text" rows="10" class="w-full border rounded-md p-2 mb-4" placeholder="Enter your text here..."><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea>
                </div>
            </div>
            <div class="flex justify-center">
                    <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Count Letters</button>
            </div>
        </form>
</br>
        <?php
           if (isset($_POST['submit'])) {
            $text = $_POST['text'];
            $letterCounts = array_count_values(str_split(preg_replace("/[^a-zA-Z]/", "", strtolower($text))));
            $output = [];
            foreach ($letterCounts as $letter => $count) {
                $output[] = "\"$letter\" => $count";
            }
            echo '<div class="flex justify-center mt-8"><div class="w-2/3"><pre class="max-w-full text-white overflow-x-auto">' . htmlspecialchars('[' . implode(', ', $output) . ']') . '</pre></div></div>';
        }
        
        ?>
        <div class="flex justify-center">
                <form action="logout.php" method="POST">
                    <button type="submit" name="logout" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 mt-10 px-4 rounded focus:outline-none focus:shadow-outline">Logout</button>
                </form>
        </div>
    </div>
</div>
<style>
    body {
        background-image: url(https://images.unsplash.com/photo-1622858674121-e8cb8b5e6d9f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>


</body>
</html>
