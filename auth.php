<?php
//include 'partials/header.php';
//include 'users/users.php';
$admins[] = getAdmins();
// в $admins данные из json

?>
<div class="container">

    <div class="card">
        <div class="card-header">
             <h3> Пожалуйста, авторизуйтесь</h3>
        </div>
        <div class="card-body">
            <?php
            $data = $_POST;
            $login = 'admin';
            $password = '123';

            if (isset($data['auth'])) {
                $errors = array();
                if ($data['login'] != $login) {
                    $errors[] = "Введен некорректный логин!";
                }
                    if ($data['password'] != $password) {
                        $errors[] = 'Введен некорректный пароль!';
                    }
                        if (empty($errors)) {

                            } else {
                            echo '<div class="alert alert-danger">'.array_shift($errors).'</div>';
                        }
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="">

                <div class="form-group">
                    <label>Введите Логин</label>
                    <input name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label>Введите пароль</label>
                    <input name="password" class="form-control">
                </div>
                <button  name="auth" class="btn btn-sm btn-outline-info" ><a href="/">Войти</a></button>
            </form>

        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
?>
