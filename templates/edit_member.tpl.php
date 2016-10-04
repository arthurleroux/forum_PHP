<div class="container">
    <div class="col-lg-8 col-lg-offset-2 text-center" id="members_list">
        <div class="row">
            <h2><?php echo $member->getPseudo()?></h2>
            <form method="post">
                <div class="row">
                   <h4>
                       Admin :
                       Oui <input type="radio" name="admin" value="1" <?php if ($member->getIsAdmin()) { echo "checked"; } ?>>
                       Non <input type="radio" name="admin" value="0" <?php if (!$member->getIsAdmin()) { echo "checked"; } ?>>
                   </h4>
                    <input type="submit" value="Edit"/>
                </div>
            </form>
        </div>
    </div>
</div>