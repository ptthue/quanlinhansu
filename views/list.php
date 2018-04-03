
<div class="row">
   <div class="col-sm-12">
       
       <table class="table table-striped">
           <tr id="tbl-first-row">
               <td width="3%">#</td>
               <td width="30%">Fullname</td>
               <td width="25%">Username</td>
               <td width="27%">Email</td>
               <td width="5%">Level</td>
               <td width="5%">Edit</td>
               <td width="5%">Delete</td>
           </tr>
           <?php 
              while ($row = $User->fetch_row()) {
              
            ?>
            <tr>
          <td><?php echo $row['user_id'] ?></td>
          <td><?php echo $row['user_full'] ?></td>
          <td><?php echo $row['user_name'] ?></td>
          <td><?php echo $row['user_mail'] ?></td>
          <td><?php echo $row['user_level'] ?></td>
          <td><a href="index.php?controllers=user&page_layout=admin&action=edit&userid=<?php echo $row['user_id'] ?>">Edit</a></td>
          <td><a href="index.php?controllers=user&page_layout=admin&action=del&userid=<?php echo $row['user_id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
       </table>
       <div aria-label="Page navigation">
           <ul class="pagination">
               <?php echo $paginate->get_list_pages() ?>
           </ul>
       </div>
   </div>
</div>
