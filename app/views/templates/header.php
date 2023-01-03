<!DOCTYPE html>
<html>
<title><?=ORG_NAME?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=BASEURL?>/css/w3.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Taviraj&display=swap">
<style>
  body, h1, h2, h3, h4, h5 {font-family: "Taviraj", sans-serif}
  .disabled {
    pointer-events: none;
    cursor: not-allowed !important;;
  }

  body, html {
    height: 100%;
    line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("<?=BASEURL?>/templates/w3/images/wallpaper.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<script src="<?=BASEURL?>/templates/w3/js/jquery-3.5.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<body>