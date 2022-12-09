<style>
    input[type=text] {
    width: 70%;
    border-radius: 8px;
    padding: 10px;
    margin-top: 9px;
}
textarea {
    width: 70%;
    border-radius: 8px;
    padding: 10px;
    margin-top: 9px;
    width: 70%;
}
input[type="submit"] {
    width: 70%;
    font-size: 18px;
    font-weight: 700;
}


</style>
<h1>inquiry form</h1>


<div class="cform">
<form class="form" id="basic-form" method="POST">
<div class="row">
<div class="col-md-12">
<p class="Name">
<label for="name">Name</label><br>
<input type="text" name="name" id="name" placeholder="Enter your name" >
</p>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p class="useremail">
<label for="email">Email</label><br>
<input type="text" name="email" id="email" placeholder="mail@example.com" >
</p>
</div>
</div>
  <div class="row">
  <div class="col-md-12">
  <p class="Name">
<label for="name">message</label><br>
<textarea name="message" id="message" placeholder="Enter your message"></textarea>
  </p>
 </div>
  
  <p class="usersubmit">
    <input type="submit" onclick="myFunction()" name="submit" value="Send" >

  </p>
  <p id="demo"></p>
</form>
<?php 
if(isset($_POST['submit']))
{
  $n=$_POST['name'];
  $e=$_POST['email'];
  $de=$_POST['message'];
  global $wpdb;
  $table_name = $wpdb->prefix . 'product_inquire';
  $sql=$wpdb->insert($table_name,array("name"=>$n,"email"=>$e,"message"=>$de));
   if($sql==true)
   {
      echo "<script>data is inserted</script>";
   }
   else
       {
      echo "<script>alert('data is not inserted')</script>";
   }
}?>


  
