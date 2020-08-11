<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    edit
    <hr>
    <?php
        if(isset($validation)){
            echo '<p>'.$validation->listErrors().'</p>';
        }
    ?>
    <!-- <form action="/create" method="post"> -->
    <?php echo form_open(); ?>
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        Name: <input type="text" name="name" value="<?= $userData['name']?>"> <br>
        email: <input type="text" name="email" value="<?= $userData['email']?>"> <br>
        address: <input type="text" name="address" value="<?= $userData['address']?>"> <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
        if(isset($userData)){
            print_r($userData);
        }else {
            echo 'user not exist';
        }
    ?>
</body>
</html>