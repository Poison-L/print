<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html  lang="zh-CN">

 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <title></title>
</head>
<body>
<div class="container">
<div class="panel panel-default">
      <div class="panel-heading">
        平面美工工作:
      </div>

      <ul class="list-group">
      <?php foreach($this->pics as $post): ?>
        <li class="list-group-item"><img src="<?php echo base_url('img').'/'.$post; ?>" alt="" class="img-thumbnail"></li>
        <?php endforeach; ?>
      </ul>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>