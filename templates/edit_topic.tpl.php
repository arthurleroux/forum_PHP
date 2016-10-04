<div class="container">
    <div class="col-lg-4 col-lg-offset-4 text-center" id="new_topic">
        <?php

        echo $error;
        echo $success;

        ?>
        <form method="post">
            <div class="row">
                <input type="text" class="input" value="<?php echo $topic->getTitle(); ?>" name="title"/>
            </div>
            <div class="row">
                <textarea type="text" class="input" name="content"><?php echo $topic->getContent(); ?></textarea>
            </div>
            <div class="row">
                <input type="submit" value="Edit Topic"/>
            </div>
        </form>
    </div>
</div>