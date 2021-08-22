
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <!-- include_ -->
          <div class="container-fluid table-responsive">
              <table class="table table-hover mt-3">
                  <thead class="bg-info text-white">
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Profile</th>
                          <th scope="col">Username</th>
                          <th scope="col">Email</th>
                          <th scope="col">Password</th>
                          <th scope="col">Role</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                   <?php
                        require_once('database/database.php');
                        $users = selectAllUser();
                        foreach ($users as $user) :
                    ?>
                  <!-- include_ -->
                      <tr>
                          <td><?= $user['user_id']?></td>
                          <td><img src="userProcess/images/<?= $user['userProfile']?>" alt="" style="width: 65px; height: 65px; border-radius: 50%;"></td>
                          <td><?= $user['username']?></td>
                          <td><?= $user['email']?></td>
                          <td><?= $user['password']?></td>
                          <td><?= $user['role']?></td>
                          <?php if($user['role'] != 'admin'):?>   
                          <td>
                          <a href="edit_user_html.php?user_id=<?= $user['user_id'] ?>" class="btn btn-primary mr-1"><i class="fa fa-pencil"></i></a>
                          <a href="userProcess/delete_user.php?id=<?= $user['user_id'] ?>" class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash"></i></a>
                          </td>
                          <?php elseif($user['role'] === 'admin'): ?>
                          <td><i class="fa fa-users" aria-hidden="true"></i></td>
                          <?php endif; ?>
                      </tr>                               
                      <?php endforeach; ?>
                  
                  </tbody>
              </table>
          </div>
      
      </div>
    </div>
  </div>
