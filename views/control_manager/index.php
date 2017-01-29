<?php include ROOT.'/views/layouts/header_control.php'; ?>

    <a href="/adminmanager/create/"><button>Добавить менеджера</button></a>

    <div class="container">
    <h2>Список менеджеров</h2>

    <table class="table table-bordered">

        <tr>
            <th>ID менеджера</th>
            <th>Имя менеджера</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>email</th>
            <th>Должность</th>


        </tr>
        <?php foreach ($managerList as $manager):?>
            <tr>
                <td><?php echo $manager['id']; ?></td>
                <td><?php echo $manager['name']; ?></td>
                <td><?php echo $manager['login']; ?></td>
                <td><?php echo $manager['password']; ?></td>
                <td><?php echo $manager['email']; ?></td>
                <td><?php echo $manager['role']; ?></td>

                <td><a href="/adminmanager/update/<?php echo $manager['id']; ?>" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
                <td><a href="/adminmanager/delete/<?php echo $manager['id']; ?>" title="Удалить"><i class="glyphicon glyphicon-remove"></i></a></td>



            </tr>
        <?php endforeach; ?>

    </table>



<?php include ROOT.'/views/layouts/footer_control.php'; ?>