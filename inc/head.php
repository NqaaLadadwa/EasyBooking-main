<head>
<meta charset='utf-8' />
<link href=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.0/main.min.css " rel="stylesheet"></link>
  
<style>
    body {
   font-family: 'lato', sans-serif;
}

.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
}
h2 small {
  font-size: 0.5em;
}

.responsive-table li {
  border-radius: 3px;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
}
.responsive-table .table-header {
  background-color:  #3CAA9F;
  font-size: 15px;
  color:white;
  text-align: center;
  -webkit-text-stroke-width: 1px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.responsive-table .table-row {
  text-align: center;
  background-color:white;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.responsive-table .col-1 {
  flex-basis: 10%;
}
.responsive-table .col-2 {
  flex-basis: 25%;
}
.responsive-table .col-3 {
  flex-basis: 22%;
}
.responsive-table .col-4 {
  flex-basis: 22%;
}
.responsive-table .col-5 {
  flex-basis: 25%;
}
@media all and (max-width: 767px) {
  .responsive-table .table-header {
    display: none;
  }
  .responsive-table li {
    display: block;
  }
  .responsive-table .col {
    flex-basis: 100%;
  }
  .responsive-table .col {
    display: flex;
    padding: 10px 0;
  }
  .responsive-table .col:before {
    color: #6c7a89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}
</style>

 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Booking - For Easy and Fast reservation</title>
    <link rel="icon" href="assets/images/bg/sm-logo.png" type="image/gif" sizes="20x20">

    <!-- css file link -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- box-icon -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css">

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">

    <!-- jquery ui -->
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

    <!-- swiper-slide -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- slick-slide -->
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">

    <!-- select 2 -->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!-- odometer css -->
    <link rel="stylesheet" href="assets/css/odometer.css">

    <!-- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>