<div class="container">
    <div class="col-lg-6 col-lg-offset-3" id="single_topic">
        <h2 class="text-center">
            <?php
            echo $topic->getTitle();
            ?>
        </h2>
        <h4>
            <?php
            echo $topic->getContent();
            ?>
        </h4>
        <hr>
        <?php
        foreach ($messages as $message) {
            if ($topic->getId() == $message->getTopicId()) {
                foreach ($members as $member) {
                    if ($member->getId() == $message->getAuthorId()) {
                        echo $member->getPseudo().' le '.$message->getPostDate().' : <br>'.$message->getContent().'<br>';
                    }
                }
                ?>
                <?php if ($_SESSION['id'] == $message->getAuthorId() || $_SESSION['is_admin'] == 1) { ?>
                    <div class="text-center">
                        <a href="edit_message.php?id_message=<?php echo $message->getId()?>">Edit</a> | <a href="delete_message.php?id_message=<?php echo $message->getId()?>">Delete</a>
                    </div>
                <?php
                }
                ?>
                <br>
            <?php
            }
            ?>
        <?php
        }
        ?>
        <?php if (isset($_SESSION['pseudo'])){ ?>
            <form method="post">
                <div class="row">
                    <textarea type="text" class="input" placeholder="content" name="content"></textarea>
                </div>
                <div class="row">
                    <input type="submit" value="Send"/>
                </div>
            </form>
        <?php } ?>
    </div>
</div>


