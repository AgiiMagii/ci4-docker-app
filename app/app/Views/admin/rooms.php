<div class="container-fluid mt-4">

    <h2 class="mb-4">Telpas</h2>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nosaukums</th>
                <th>Apraksts</th>
                <th>Jauda</th>
                <th>Attēls</th>
                <th width="220">Darbības</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= $room['roomID'] ?></td>

                    <td>
                        <form method="post" action="<?= site_url('rooms/update/' . $room['roomID']) ?>" enctype="multipart/form-data">
                            
                            <?= csrf_field() ?>
                            <input type="text" name="Name" value="<?= esc($room['Name']) ?>" class="form-control">
                    </td>

                    <td>
                        <input type="text" name="Description" value="<?= esc($room['Description']) ?>" class="form-control">
                    </td>

                    <td>
                        <input type="number" name="Capacity" value="<?= esc($room['Capacity']) ?>" class="form-control">
                    </td>

                    <td>
                        <?php if ($room['Picture']): ?>
                            <img src="<?= base_url($room['Picture']) ?>" style="height:60px" class="mb-1">
                        <?php endif; ?>
                        <input type="file" name="Picture" class="form-control form-control-sm">
                    </td>

                    <td class="d-flex gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </form> <!-- forma beidzas šeit -->

                        <!-- Delete forma atsevišķi -->
                        <form method="post" action="<?= site_url('rooms/delete/' . $room['roomID']) ?>" onsubmit="return confirm('Delete room?')">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            <!-- CREATE NEW ROOM -->

            <tr class="table-light">

                <form method="post" action="<?= site_url('rooms/create') ?>">

                    <td>New</td>

                    <td>
                        <input type="text" name="Name" class="form-control" required>
                    </td>

                    <td>
                        <input type="text" name="Description" class="form-control">
                    </td>

                    <td>
                        <input type="number" name="Capacity" class="form-control" required>
                    </td>

                    <td>
                        —
                    </td>

                    <td>

                        <button
                            type="submit"
                            class="btn btn-primary btn-sm">
                            Add Room
                        </button>

                    </td>

                </form>

            </tr>

        </tbody>
    </table>

</div>