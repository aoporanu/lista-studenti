<?php
require_once 'elements/header.php';
?>

<?php

    $name_err = $capacitate_err = '';
    $nume = $capacitate = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['nume']))
        {
            $name_err = 'Trebuie sa introduci numele salii';
        }
        else
        {
            $nume = test_input($_POST['nume'], $link);
            if($nume == 'exista')
        	{
        		$name_err = 'O sala cu numele acesta exista deja in baza de date';
        	}
        }
        
        if(empty($_POST['capacitate']))
        {
            $capacitate_err = 'Capacitatea salii trebuie sa fie completata.';
        }
        else
        {
        	$capacitate = test_input($_POST['capacitate']);
        }
        
        if(empty($name_err) && empty($capacitate_err))
        {
            $sql = 'INSERT INTO sali SET nume="' . $link->escape_string($nume) . '",' .
                'capacitate="' . $link->escape_string($capacitate) . '";';
            if($result = $link->query($sql))
			{
				$message = '<div class="alert alert-success">Sala de cursuri a fost adaugata.</div>';
			}
            else
            {
                $message = '<div class="alert alert-danger">Nu s-au putut salva preferintele pentru curs.</div>';
            }
        }
    }
    
    function test_input($data, $link='') {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($link !== '')
        {
        	$sql = 'SELECT * FROM sali WHERE nume="' . $data . '" LIMIT 1';
        	if($result = $link->query($sql))
        	{
        		if($result->num_rows === 1)
        		{
        			return 'exista';
        			
        		}
        		else
	        	{
	        		return $data;
	        	}
        	}
        	
        }
        else
        {
        	return $data;
        }
        
    }
?>

<?php if(!empty($message)) {
    echo $message;
}
?>
<div class="col-md-9 col-xs-12 center-block">
    <form action="" method="post" class="form form-horizontal">
    <legend>Adaugare sala de curs.</legend>
    <div class="form-group">
        <label class="col-md-2 control-label" for="nume">Nume sala</label>
        <div class="col-md-8">
            <input type="text" id="nume" name="nume" class="form-control" value="<?php echo isset($_POST['nume']) ? $_POST['nume'] : ''; ?>" autocomplete="off" />
            <?php if(!empty($nume_err)): ?>
                <div class="alert alert-danger">
                    <?php echo $nume_err; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="capacitate">Capacitate</label>
        <div class="col-md-8">
            <input type="text" id="capacitate" nume="capacitate" class="form-control" value="<?php echo isset($_POST['capacitate']) ? $_POST['capacitate'] : ''; ?>" autocomplete="off" />
            <?php if(!empty($capacitate_err)): ?>
                <div class="alert alert-danger">
                    <?php echo $capacitate_err; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <input type="submit" value="Adauga sala" class="btn btn-success pull-right" />
        </div>
    </div>
</form>
</div>


<?php
require_once 'elements/footer.php';