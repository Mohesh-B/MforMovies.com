<html>
  <head>
    <title>
      Post a job
    </title>
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

  }
  
  body {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-image:url('background.jpg');
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: grid;
    place-items: center;
    min-height: 100vh;
    overflow: hidden;
  }
  
  .container {
    background-color: #fff;
    width: 600px;
    height: fit-content;

    position: relative;
    display:grid;
    grid-template-columns: 1fr 1fr;
    place-items: center;
    line-height: 1.0;
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.185);
  }
  .container img {
    width: 250px;
    height: 400px;
    object-fit:fill;
    object-position: center;
  }
  .container-text {
    padding: 10px 40px 10px 10px;
  }
  .container-text h2,h3 {
    font-size: 1.2rem;
    color: #1A2250;
  }
  .container-text p {
    font-size: 14px;
    color: #3B4169;
    margin: 10px 0;
  }
  .container-text input,
  .container-text button, .container-text textarea,.container-text select {
    width: 100%;
    border:transparent ;
    padding: 14px;
    border-radius: 3px;
  }
  .container-text input:hover
  {
    border:solid black 3px;
  }
  .container-text input .container-text select,.container-text textarea{
    border: 2px solid #DADDEC;
    margin: 5px 0 10px;
    font-size: 1rem;
    color: #656880;
  }
  .container-text button {
    background-image: linear-gradient(to right, #89CAFF, #6589FF);
    display: block;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 5px 20px #89caff94;
    transition: box-shadow 0.3s ease-in-out;
  }
  .container-text button:hover {
    box-shadow: 10px;
  }
  .container-text span {
    display: block;
    text-align: center;
    margin: 20px 0 0;
    color: #BABDCB;
    font-size: 12px;
  }
  .close-window {
    position: absolute;
    top: 5px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    }
  option[value=""][disabled] {
    display: none;
  }
  </style>
  </head>
<body>
<div class="container">
    <img
      src="insertmoviebg.jpg"alt="image">
      
    <div class="container-text">
      <h3>INSERT A MOVIE!!</h3><a class="close-window" href="adminindex.php">&times;</a>
      <form action="insertmoviedb.php" method="POST">
      <input type="number" placeholder="Movie Id" name="mid" id="mid" required>
      <input type="text" placeholder="Movie Name" name="mname" required>
      <input type="text" placeholder="Genre" name="gnre" required>
      <input type="type" placeholder="Industry" id="ind" name="ind" required>
      <input type="text" placeholder="Production House Id" name="pid" required>
      <input type="text" placeholder="Director Id" name="did" required>
      <input type="text" placeholder="Lead Actor Id" name="aid" required>
      <input type="text" placeholder="Music_Director Id" name="mdid" required>
      <input type="text" placeholder="Date Of Release(YYYY-MM-DD)" name="dater" required>
      <input type="text" placeholder="Total expense" name="te" required>
      <input type="text" placeholder="Promotion cost" name="pc" required>
      <input type="text" placeholder="Theatre Collection" name="tc" required>
      <input type="text" placeholder="Overseas Collection" name="oc" required>
      <input type="text" placeholder="OTT Collection" name="ott" required>
      <input type="text" placeholder="Other Collection" name="otc" required>
      <button type="submit">Post</button>
      </form>
    </div>
  </div>