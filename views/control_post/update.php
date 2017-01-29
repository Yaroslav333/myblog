<?php include ROOT . '/views/layouts/header_control.php'; ?>

<div class="container">

    <div class="row">

        <h4>Редактировать статью #<?php echo $id; ?></h4>

        <div class="col-lg-4">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">

                    <p>Название новости</p>
                    <input type="text" name="title" placeholder="" value="<?php echo $post['title']; ?>">

                    <p>short_content</p>
                    <input type="text" name="short_content" placeholder="" value="<?php echo $post['short_content']; ?>">

                    <p>content</p>

                    <textarea input type="text"  name="content" placeholder="" value="" ><?php echo $post['content']; ?>" > </textarea>



                    <br/><br/>

                    <p>author_name</p>
                    <input type="text" name="author_name" placeholder="" value="<?php echo $post['author_name']; ?>">

                    <p>preview</p>
                    <input type="text" name="preview" placeholder="" value="<?php echo $post['preview']; ?>">


                    <br/><br/>


                    <br/><br/>
                    <p>Категория</p>
                    <select name="category_id">
                        <?php if (is_array($categoryList)): ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php if ($post['category_id'] == $category['id']) echo 'категория новости'; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    <br/><br/>
                    <p>Изображение поста</p>
                    <img src="<?php echo Post::getImage($post['id']); ?>" width="200" alt="" />
                    <input type="file" name="image" placeholder="" value="<?php echo $post['image']; ?>">

                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>


    </div>

</div>