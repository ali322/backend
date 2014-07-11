<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/project.css" />
        <title><?php echo CHtml::encode(Yii::t('admin',Yii::app()->name)); ?></title>
</head>
<body>
    <div class="container" id="page">
	<?php echo $content; ?>
</div><!-- page -->
</body>
</html>