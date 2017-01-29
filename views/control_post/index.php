<?php include ROOT.'/views/layouts/header_control.php'; ?>


    <a href="/control/create/"><button>Добавить новость</button></a>

<div class="container">
    <h2>Список новостей</h2>

    <table class="table table-bordered">

        <tr>
            <th>ID новости</th>
            <th>Название новости</th>
            <th>Дата публикации</th>

        </tr>
        <?php foreach ($postList as $post):?>
        <tr>
            <td><?php echo $post['id']; ?></td>
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['date']; ?></td>
            <td><a href="/control/post/update/<?php echo $post['id']; ?>" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
            <td><a href="/control/post/delete/<?php echo $post['id']; ?>" title="Удалить"><i class="glyphicon glyphicon-remove"></i></a></td>



        </tr>
        <?php endforeach; ?>

        </table>


<?php include ROOT.'/views/layouts/footer_control.php'; ?>