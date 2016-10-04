<div class="container">
    <div class="col-lg-8 col-lg-offset-2" id="topics">
        <div class="col-name">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-1">
                    <h3>Topic</h3>
                </div>
                <div class="col-lg-2">
                    <h3>Author</h3>
                </div>
                <div class="col-lg-2">
                    <h3>Date</h3>
                </div>
            </div>
        </div>

        <?php
        foreach ($topics as $topic) {
        ?>
            <a href='single_topic.php?id=<?php echo $topic->getId()?>'>
                <div class='row topic'>
                    <div class='col-lg-6 col-lg-offset-1'>
                        <h4><?php echo $topic->getTitle()?></h4>
                    </div>
                    <div class='col-lg-2'>
                        <h4>
                            <?php
                            foreach ($members as $member) {
                                if ($topic->getAuthorId() == $member->getId()) {
                                    echo $member->getPseudo();
                                }
                            }
                            ?>
                        </h4>
                    </div>
                    <div class='col-lg-2'>
                        <h5><?php echo $topic->getPostDate()?></h5>
                    </div>
                </div>
              </a>
            <?php if ($_SESSION['id'] == $topic->getAuthorId() || $_SESSION['is_admin'] == 1) { ?>
                <div class="text-center">
                    <a href="edit_topic.php?id=<?php echo $topic->getId()?>">Edit</a> | <a href="delete_topic.php?id=<?php echo $topic->getId()?>">Delete</a>
                </div>
            <?php
            }
            ?>
            <hr>
        <?php
        }
        ?>
    </div>

</div>

