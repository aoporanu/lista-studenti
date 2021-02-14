<div class="col-md-4 col-xs-12 col-sm-12">
        <div class="header">
            <h3>Actiuni</h3>
            <i class="fa fa-horizontal"></i>
        </div>
        <?php if($_SESSION['user']['role_id'] === '1'): ?>
            <!-- prof -->
            <a href="<?php echo $base_url; ?>cursurile_mele.php">Cursurile mele</a>
            <div class="clearfix"></div>
            <a href="<?php echo $base_url; ?>export_examene.php?mod=single">Export examene</a>
            <div class="clearfix"></div>
            <a href="<?php echo $base_url; ?>add_user.php?user_id=<?php echo $_SESSION['user']['user_id']; ?>">Editare profil</a>
        <?php elseif($_SESSION['user']['role_id'] === '2'): ?>
            <!-- student -->
            <a href="<?php echo $base_url; ?>edit_profil.php?user_id=<?php echo $_SESSION['user']['user_id'] ?>">Editare profil</a>
            <div class="clearfix"></div>
            <a href="<?php echo $base_url; ?>examenele_mele.php">Examenele mele</a>
        <?php elseif($_SESSION['user']['role_id'] === '0'): ?>
            <a href="<?php echo $base_url; ?>cursuri.php" class="btn btn-danger">Reindexeaza cursurile</a>
            <div class="clearfix"></div>
            <ul>
                <li><a href="<?php echo $base_url; ?>add_user.php">Adaugare profesori</a></li>
                <li><a href="<?php echo $base_url; ?>add_user.php">Adaugare elevi</a></li>
                <li><a href="<?php echo $base_url; ?>adauga_sala.php">Adauga o sala</a></li>
                <li><a href="<?php echo $base_url; ?>adauga_grupe.php">Adauga o grupe</a></li>
                <li><a href="<?php echo $base_url; ?>sali.php">Vezi salile</a></li>
                <li><a href="<?php echo $base_url; ?>grupe.php">Vezi grupele</a></li>
                <li><a href="<?php echo $base_url; ?>grupe.php">Vezi profesori</a></li>
                <li><a href="<?php echo $base_url; ?>grupe.php">Vezi elevi</a></li>
                <li><a href="<?php echo $base_url; ?>export_total.php">Export final examene</a></li>
                <li><a href="<?php echo $base_url; ?>edit_profil.php?user_id=<?php echo $_SESSION['user']['user_id'] ?>">Editare profil</a></li>
            </ul>
        <?php endif; ?>
    </div>