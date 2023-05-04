<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Task Application</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.17.2/contents.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }
    .table {
      width: 100%;
    }
    .table_header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      padding: 20px;
      border-radius: 5px;
      background-color: rgb(240, 240, 240);
    }
    .table_header p {
      color: #000000;
    }
    button {
      outline: none;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .add_new {
      padding: 10px 20px;
      color: #FFFFFF;
      background-color: green;
    }
    input {
      padding: 10px 20px;
      margin: 0;
      outline: none;
      border: 1px solid lightgreen;
      border-radius: 6px;
      color: green;
    }
    ::placeholder {
      color: darkgreen;
    }
    .table_section {
      height: 460px;
      overflow: auto;
    }
    table {
      width: 100%;
      table-layout: fixed;
      min-width: 1000px;
      border-collapse: collapse;
    }
    thead, th {
      position: sticky;
      top: 0;
      background-color: #D2D8DB;
      color: black;
      font-size: 15px;
    }
    th, td {
      border-bottom: 1px solid #DDDDDD;
      padding: 10px 20px;
      word-break: break-all;
    }
    tr:hover td {
      color: #2AAA8A;
      background-color: #F6F9FC;
    }
    ::-webkit-scrollbar {
      height: 5px;
      width: 5px;
    }
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
    ::-webkit-scrollbar-thumb {
      box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
    /* 404 page */
    .page_404 {
      padding: 40px 0;
      font-family: 'Arvo', serif;
    }
    .page_404 img {
      width: 100%;
    }
    .four_zero_four_bg h1 {
      font-size: 80px;
    }
    .four_zero_four_bg h3 {
      font-size: 80px;
    }
    .link_404 {
      color: #fff!important;
      padding: 10px 20px;
      background: #39AC31;
      margin: 20px 0;
      display: inline-block;
    }
    .contant_box_404 {
      margin-top: -50px;
    }
    /* Dropdown menu */
     .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
    /* Search container */
    .search-container {
      align-items: center;
      margin-bottom: 0.5rem;
      width: 25%;
      border: 1px solid #ccc;
      margin-left: auto;
      justify-content: flex-end;
    }
    .search-container .input-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem;
    }
    .search-container .input-group input {
      flex: 1;
      border: none;
    }
    .search-container .input-group button {
      border: none;
      background: transparent;
    }
  </style>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-XTv/b+tAVgby+IhXKjGtRyLh0+mFVCgYAK1mTXHmIwvALhswz1lV3qMJqiQe+/o5" crossorigin="anonymous">
  </head>
<body>
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 130%; background-color: rgba(0, 0, 0, 0.5); z-index: -1;"></div>
  <br><br><br>
  <div class="container">
    @yield('content')
  </div>
</body>
</html>