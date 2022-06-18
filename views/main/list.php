<form method="post" action="/list">
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Options</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($meetings as $meeting): ?>
    <tr>
        <td><?=$meeting->title?></td>
        <td><?=$meeting->date?></td>
        <td><?=$meeting->time?></td>
        <td>
        <a class="btn btn-primary" href="/info/<?=$meeting->id?>"> Info</a>
        <a class="btn btn-danger" href="/delete/<?=$meeting->id?>"> Delete</a>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</form>
</body>
</html>