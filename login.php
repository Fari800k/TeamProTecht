if(isset($_POST['createbtn'])) {
    $forename = $_POST['forename'];
    $secondname = $_POST['secondname'];
    $address = $_POST['address'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $check_query = "SELECT * FROM `users` WHERE Username = :username";
    $check_stmt = $pdo->prepare($check_query);
    $check_stmt->bindParam(':username', $new_username);
    $check_stmt->execute();
    $existing_user = $check_stmt->fetch(PDO::FETCH_ASSOC);

    if(!$existing_user) {
        // If username does not exist, proceed to create the user
        $create_query = "INSERT INTO `users` (Fore_name, Second_Name, Address_User, Username, Password) VALUES (:forename, :secondname, :address, :username, :password)";
        $create_stmt = $pdo->prepare($create_query);
        $create_stmt->bindParam(':forename', $forename);
        $create_stmt->bindParam(':secondname', $secondname);
        $create_stmt->bindParam(':address', $address);
        $create_stmt->bindParam(':username', $new_username);
        $create_stmt->bindParam(':password', $hashed_password);

        if($create_stmt->execute()) {
            // User creation successful
            $success_message = "User created successfully!";
        } else {
            // Error in user creation
            $error = "Error creating user. Please try again.";
        }
    } else {
        // Username already exists
        $error = "Username already exists. Please choose a different username.";
    }
}
