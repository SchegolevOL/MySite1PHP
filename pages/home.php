<?php if (empty($_SESSION['user']) && $_GET['page']=='1'): ?>
    <form method="post" action="index.php?page=1">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login</label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="pass">
        </div>
        <button type="submit" name ="auth" class="btn btn-primary">Submit</button>
    </form>
<?php endif; ?>
<?php if (!empty($_SESSION['user'])): ?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p>Добро пожаловать, <?=  htmlspecialchars($_SESSION['user']['name']) ?>! <a href="?do=exit">Log out</a>
            </p>
        </div>
    </div>


<?php endif ?>


