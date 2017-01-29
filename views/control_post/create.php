<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container" xmlns="http://www.w3.org/1999/html">

    <div class="row">

        <h4>Добавить новую новость</h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Название новости</p>
                    <input type="text" name="title" placeholder="" value="">

                    <p>short_content</p>
                    <input type="text" name="short_content" placeholder="" value="">

                    <p>content</p>
                   <textarea input type="text"  name="content" placeholder="" value="" > </textarea>



                    <br/><br/>

                    <p>author_name</p>
                    <input type="text" name="author_name" placeholder="" value="">

                    <p>preview</p>
                    <input type="text" name="preview" placeholder="" value="">





                    <br/><br/>
                    <p>Категория</p>
                    <select name="category_id">
                        <?php if (is_array($categoryList)): ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <br/><br/>

                    <p>Изображение статьи</p>
                    <input type="file" name="image" placeholder="" value="">
                    <br/><br/>

                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>