<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="/images/pos-logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="/images/pos-logo.png" type="image/x-icon">
    <title>VANPOS</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets-front/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="/assets-front/css/color1.css" media="screen" id="color">
    <style>

    /* The switch - the box around the slider */
      .switch {
       position: relative;
       display: inline-block;
       width: 60px;
       height: 34px;
      }

      /* Hide default HTML checkbox */
      .switch input {
       opacity: 0;
       width: 0;
       height: 0;
      }

      /* The slider */
      .slider {
       position: absolute;
       cursor: pointer;
       top: 0;
       left: 0;
       right: 0;
       bottom: 0;
       background-color: #ccc;
       -webkit-transition: .4s;
       transition: .4s;
      }

      .slider:before {
       position: absolute;
       content: "";
       height: 26px;
       width: 26px;
       left: 4px;
       bottom: 4px;
       background-color: white;
       -webkit-transition: .4s;
       transition: .4s;
      }

      input:checked + .slider {
       background-color: #2196F3;
      }

      input:focus + .slider {
       box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
       -webkit-transform: translateX(26px);
       -ms-transform: translateX(26px);
       transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
       border-radius: 34px;
      }

      .slider.round:before {
       border-radius: 50%;
      }

      .cat-slide {
        display: block;
      }
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin: auto;
        padding: 6px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

        /* Position the "next button" to the right */
      .next {
        right: -2px;
        border-radius: 3px 0 0 3px;
      }

      .prev {
        left: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }
        ul li a.active{
            color:#dd001b
        }
        .home{
            border-radius: 50px;
        }
        .overlays:before{
        position: absolute;
        content:" ";
        top:0;
        left:0;
        width:100%;
        height:100%;
        display: block;
        z-index:0;
        border-radius: 50px;
        background-color: rgba(0, 0, 0, 0.45);
      }
      .contain-bliomi{
        background: #ffffff80;
        padding: 35px;
        border-radius: 30px;
        text-align: left;
      }
      .btn{
          border-radius: 10px
      }
      .form-control{
          font-size:12pt;
      }
      .theme-card .theme-form input{
        font-size:12pt!important;
      }
      .text-primary{
        color:#dd001b!important;
      }
      .btn-solid{
        color:white!important;
      }
      .btn-solid:hover{
        color:black!important;
      }
    </style>

</head>
