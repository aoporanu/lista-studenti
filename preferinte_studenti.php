<?php require_once 'elements/header.php' ?>
    <div class="container">
        <div class="well">
            <?php
            $sql = 'SELECT * FROM preferinte_student LEFT JOIN users ON preferinte_student.user_id=users.id WHERE examen_id="' . $link->escape_string($_GET['examen_id']) . '"';
            if($result = $link->query($sql))
            { ?>
                <table class="table table-striped">
                    <tr>
                        <th>Nume student</th>
                        <th>Data</th>
                        <th>Ora</th>
                        <th>Actiuni</th>
                    </tr>
                <?php while($preferinte = $result->fetch_object())
                { ?>
                    <tr>
                        <td><?php echo $preferinte->username ?></td>
                        <td><?php echo $preferinte->data ?></td>
                        <td><?php echo $preferinte->ora ?></td>
                        <td><a href="reprogramare_examen.php?examen_id=<?php echo $preferinte->examen_id ?>">Reprogramare</a> | <a href="scrie_mesaj.php?student_id=<?php echo $preferinte->user_id; ?>&examen_id=<?php echo $preferinte->examen_id ?>">Mesaj</a></td>
                    </tr>
                <?php } ?>
                </table>
            <?php }
            ?>
        </div>
    </div>

<?php require_once 'elements/footer.php' ?>
