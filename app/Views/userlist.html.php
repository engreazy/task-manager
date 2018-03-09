<blockquote>
    <h2>User List [Set Permission]</h2>
    <table>
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?=$user->name;?></td>
                <td><?=$user->email;?></td>
                <td><a href="?route=user/permissions&id=<?=$user->id;?>">Edit Permissions</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</blockquote>
