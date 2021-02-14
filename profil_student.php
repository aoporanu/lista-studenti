<?php include 'elements/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="well">
                <form class="form form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label for="grupa" class="col-md-2 control-label">
                            Grupa
                        </label>
                        <?php
                            $sql = 'SELECT * FROM grupe';
                            if($result = $link->query($sql))
                            {
                                echo '<select name="grupa" id="grupa">';
                                while($grupa = $result->fetch_object())
                                {
                                    echo '<option value="' . $grupa->id . '">' . $grupa->nume . '</option>';
                                }
                                echo '</select>';
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include 'elements/footer.php'; ?>