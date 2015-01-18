 <?php include_once('functions.php'); ?>
 <?php $project_name = "Project"; ?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title><?php echo($project_name)?>Style Guide</title>
<meta name="viewport" content="width=device-width">
<!-- Style Guide Boilerplate Styles -->
<link rel="stylesheet" href="css/styleguide.css">
<link rel="stylesheet" href="css/bootstrap.css">

<!-- Replace below stylesheet with your own stylesheet -->
<link rel="stylesheet" href="css/theme.css">
</head>
<body   data-spy="scroll" data-target=".navbar-default" data-offset="60" >
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> <a class="navbar-brand" href="#"><strong><?php echo($project_name)?></strong> Style Guide</a> </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown active"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select an element: <b class="caret"></b></a>
        <ul class="dropdown-menu  scroll-menu sg-sect">
          <?php listElementsAsOptions('docs'); ?>
          <?php listElementsAsOptions('foundation'); ?>
          <li role="presentation" class="divider"></li>
          <li role="presentation" class="dropdown-header">Base Styles</li>
          <?php listMarkupAsOptions('base'); ?>
          <li role="presentation" class="divider"></li>
          <li role="presentation" class="dropdown-header">Patterns</li>
          <?php listMarkupAsOptions('patterns'); ?>
        </ul>
      </li>
    </ul>
  </div>
</div>
<!--/.sg-header-->

<div class="sg-body sg-container container">
<div class="row">
  <h1 class="page-header">Style Guide Documentation</h1>
  <?php showDocs(); ?>
</div>
<!--/.row-->
<div class="row">
  <h1 class="page-header">Foundation</h1>
  <?php showFoundation(); ?>
</div>
<!--/.row-->

<div class="row sg-base-styles">
  <h1 class="page-header">Base Styles</h1>
  <?php showMarkup('base'); ?>
  </div><!--/.sg-base-styles-->
  <div class="row sg-pattern-styles">
    <h1 class="page-header">Patterns<small> - Design and mark-up patterns unique to your site.</small></h1>
    <?php showMarkup('patterns'); ?>
  </div>
  <!--/.sg-pattern-styles-->
</div>
<!--/.sg-body-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/scrollspy.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/sg-plugins.js"></script>
<script src="js/sg-scripts.js"></script>
</body>
</html>