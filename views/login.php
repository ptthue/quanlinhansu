
<div class="row">
   <div id="login" class="col-xs-4">
       <form method="post">
        <?php 
          if(isset($_SESSION['err'])){
            echo $_SESSION['err'];
            unset($_SESSION['err']);
          }
         ?>
           <div class="form-group">
               <label>Username</label>
               <input required type="text" name="user" class="form-control" placeholder="Username" />
           </div>
           <div class="form-group">
               <label>Password</label>
               <input required type="password" name="pass" class="form-control" placeholder="Password" />
           </div>
           <button type="submit" name="submit" class="btn btn-primary">Login</button>
       </form>
   </div>
</div>
