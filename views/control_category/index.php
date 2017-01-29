<?php include ROOT.'/views/layouts/header_control.php'; ?>

<a href="/admincategory/create/"><button>Добавить категорию</button></a>

<div class="container">
    <h2>Список категорий</h2>

    <table class="table table-bordered">

        <tr>
            <th>ID категории</th>
            <th>Название категории</th>
            <th>Status</th>

        </tr>
        <?php foreach ($categoryList as $category):?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['status']; ?></td>

                <td><a href="/admincategory/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="glyphicon glyphicon-pencil"></i></a></td>
                <td><a href="/admincategory/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="glyphicon glyphicon-remove"></i></a></td>



            </tr>
        <?php endforeach; ?>

    </table>



<?php include ROOT.'/views/layouts/footer_control.php'; ?>
