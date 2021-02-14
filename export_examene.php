<?php require_once 'elements/header.php'; ?>
<div class="well clearfix">
    <?php require_once 'left_menu.php'; ?>
    <div class="col-md-8">
        <h3>Aici iti poti exporta toate cursurile sau o parte din ele</h3>
        <ul>
            <li><a href="export_semestrul_1.php">Semestrul 1</a></li>
            <?php if(date('m') > 4): ?>
                <li><a href="export_semestrul_2.php">Semestrul 2</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php require_once 'elements/footer.php'; ?>