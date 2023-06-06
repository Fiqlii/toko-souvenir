<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="post" action="<?= base_url('login/store') ?>">
                <div class="card p-5">
                    <div class="form-group">
                        <label for="nip">nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= old('nip'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                    </div>
                  <button type="submit" class="btn btn-dark m-3" style="width: 200px;">login</button>
                </div>
                </form>
</body>
</html>