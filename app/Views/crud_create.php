<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    create
    <hr>
    <?php
        if(isset($validation)){
            echo '<p>'.$validation->listErrors().'</p>';
        }
    ?>
    <!-- <form action="/create" method="post"> -->
    <?php echo form_open(); ?>
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        Name: <input type="text" name="name" value="<?= set_value('name')?>"> <br>
        email: <input type="text" name="email" value="<?= set_value('email') ?>"> <br>
        address: <input type="text" name="address" value="<?= set_value('address')?>"> <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>
    <?php if(isset($input)){
        print_r($input);
    } ?>
</body>
</html>