<?php 
    include('config/db_connect.php');

    $errors=array('email'=>'', 'title'=>'', 'ingredients'=>'');

    if (isset($_POST['submit'])){
        if (empty($_POST['email'])){
            $errors['email'] = 'Please Enter An Email! <br />';
        }
        elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //echo htmlspecialchars($_POST['email']);

            if (empty($_POST['title'])){
                $errors['title'] = 'Please Enter A Title! <br />';
            }
            else {
                //echo htmlspecialchars($_POST['title']);
            }
    
            if (empty($_POST['ingredients'])){
                $errors['ingredients'] = 'Please Enter Ingredients! <br />';
            }
            else {
                //echo htmlspecialchars($_POST['ingredients']);
            }
        }
        else {
            $errors['email'] = 'Please Enter A Valid Email!';
        }
    }

    if(array_filter($errors)){
        //echo 'errors!'
    }
    else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        $sql="INSERT INTO pizzas (title,email,ingredients) VALUES ('title', 'email', 'ingredients')";

        if(mysqli_query($conn,$sql)){
            //header('Location: index.php');
        } else {
            echo 'error!' . mysqli_error($conn);
        }

    }
?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">
            Add A Pizza
        </h4>
        <form action="add.php" class="white" method="POST">
            <lable>Your Email:</lable>
            <input type="text" name="email" >
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <lable>Pizza Title:</lable>
            <input type="text" name="title" >
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <lable>Ingredients:</lable>
            <input type="text" name="ingredients" >
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</html>