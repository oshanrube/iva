<?php session_start(); error_reporting(E_ALL & ~E_NOTICE); ?>
<html>
<head>
<link href="bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="page-header">
    <h1>Cyphers <small>encryption/decryption engine</small></h1>
  </div>
      <form class="well form-horizontal" enctype="multipart/form-data" style="width: 440px;margin: 0 auto;" method="POST" action="/tmp/action.php">
        <fieldset>
          <legend></legend>
          <?php if($_GET['error']) {?>
          <div class="alert alert-error" id="errorMsgBox">
        		<strong>Oh snap!</strong> <span id="errorMsg"><?php echo $_GET['error']?></span>
			 </div>
			 <?php } ?>
          <div class="control-group">
            <label class="control-label" for="textarea">Text</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" name="text" rows="3"><?php echo $_SESSION['text'];?></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Encrypted Text</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" name="encryptedtext" rows="3"><?php echo $_SESSION['encryptedtext'];?></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">Key</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="key" value="<?php echo $_SESSION['key'];?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">Encryption strength</label>
            <div class="controls">
              <select name="strength" class="span1">
<?php 			for($x=1; $x<7;$x++) {
                echo "<option ";if($x == $_SESSION['strength']){echo "selected";} echo " value=\"$x\">x$x</option>";
               }?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Transportable</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" name="transportable" <?php if($_SESSION['transportable']){echo "checked";} ?>>
                make the encrypted text transportable
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fileInput">File to encrypt</label>
            <div class="controls">
              <input class="input-file" id="fileInput" name="file" type="file">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="encryptedFile">Encrypted file</label>
            <div class="controls">
              <input class="input-file" id="encryptedFile" name="encryptedfile" type="file">
            </div>
          </div>
          <?php if($_SESSION['stats']){?>
          <pre><h3>Statistics</h3>
<?php
          	if($_SESSION['stats']['encryptionTime'])echo "Encryption time		: ".$_SESSION['stats']['encryptionTime']." seconds<br>";
				if($_SESSION['stats']['decryptionTime'])echo "Decryption time		: ".$_SESSION['stats']['decryptionTime']." seconds<br>";
				echo "Encrypted strength	: x".$_SESSION['stats']['strength']."<br>";
				echo "Original text length	: ".$_SESSION['stats']['originalTextLength']."<br>";
				echo "Encrypted text length	: ".$_SESSION['stats']['encryptedTextLength']."<br>";
          ?>
          </pre>
          <?php }?>
          <div class="form-actions" style="padding-left: 0px;text-align: center;">
            <button type="submit" name="action" value="encrypt" class="btn btn-primary">Encrypt</button>
            <button type="submit" name="action" value="decrypt" class="btn btn-primary">Decrypt</button>
            <button type="submit" name="action" value="encryptfile" class="btn btn-success">Encrypt File</button>            
            <button type="submit" name="action" value="decryptfile" class="btn btn-success">Decrypt File</button>
          </div>
        </fieldset>
      </form>
</body>
</html>
<?php session_destroy(); ?>