<div class="container">
    <div class="col-lg-4 col-lg-offset-4 text-center" id="single_topic">
        <?php

        echo $error;
        echo $success;

        ?>
        <form method="post">
            <div class="row">
                <textarea type="text" class="input" name="content"><?php echo $message->getContent(); ?></textarea>
            </div>
            <div class="row">
                <input type="submit" value="Edit"/>
            </div>
        </form>
    </div>
</div>