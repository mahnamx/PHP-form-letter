<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $school = $_POST['school'] ?? '';

    if (!$name) {
        $errors['name'] = 'Name is required';
    }

    if (!$email) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (!$school) {
        $errors['school'] = 'Job Title is required';
    }

    if (empty($errors)) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['school'] = $school;
        header('Location: hello.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <?php if (!empty($errors)) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <form method="POST" class="max-w-md mx-auto rounded-md overflow-hidden shadow-md p-6">
        <h1 class="block text-gold text-3xl font-bold mb-10 flex justify-center text-shadow ">PHP Form & Letter Counter</h1>
            <div class="mb-4">
                <label class="block text-white font-bold mb-2" for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?? '' ?>" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-white font-bold mb-2" for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $_POST['email'] ?? '' ?>" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-white font-bold mb-2" for="school">Job Title:</label>
                <input type="text" name="school" id="school" value="<?php echo $_POST['school'] ?? '' ?>" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>
    <style>
    body {
        background-image: url(https://images.unsplash.com/photo-1622858674121-e8cb8b5e6d9f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1064&q=80);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }


  h1 {
  font-size: 3rem;
  color: white;
  text-shadow: 1px 1px gold;
  padding: 3px;
  border: 3px solid gold;
  display: block;
  text-align: center;
}

 
</style>
</body>
</html>
