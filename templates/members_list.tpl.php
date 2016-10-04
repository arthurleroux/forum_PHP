<div class="container">
    <div class="col-lg-8 col-lg-offset-2" id="members_list">
        <div class="row">
            <?php
            foreach ($members as $member) { ?>
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-1">
                            <h4><?php echo $member->getPseudo()?> : </h4>
                        </div>
                        <div class="col-lg-5">
                            <?php if ($member->getIsAdmin() == 1) {
                                echo "<h4>est administrateur</h4>";
                            }
                            else {
                                echo "<h4>n'est pas administrateur</h4>";
                            }

                            ?>
                        </div>
                        <div class="col-lg-3">
                           <h4> <a href="edit_member.php?id=<?php echo $member->getId()?>">Edit</a> | <a href="delete_member.php?id=<?php echo $member->getId()?>">Delete</a></h4>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>