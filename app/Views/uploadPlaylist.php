<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Gallery</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #FFD700; /* Gold text color */
        }

        .container {
            background-color: #000;
            color: #FFD700; /* Gold text color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 24px;
            margin-top: 10px;
        }

        table {
            background-color: #444; /* Darker background color */
            color: #FFD700; /* Gold text color */
        }

        table th {
            background-color: #333; /* Darker header background color */
            color: #FFD700; /* Gold text color */
        }

        table td {
            vertical-align: middle;
        }

        .btn-add-playlist {
            background-color: #FFD700; /* Gold background color */
            color: #000; /* Black text color */
        }

        .btn-add-playlist:hover {
            background-color: #444; /* Darker background color on hover */
            color: #FFD700; /* Gold text color on hover */
        }

        .btn-delete-playlist {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-delete-playlist:hover {
            background-color: #990000; /* Darker red background color on hover */
        }

        .btn-go-back {
            background-color: #FFD700; /* Gold background color */
            color: #000; /* Black text color */
        }

        .btn-go-back:hover {
            background-color: #444; /* Darker background color on hover */
            color: #FFD700; /* Gold text color on hover */
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Music Gallery</h1>

        <!-- Add New Playlist Form -->
        <div class="mb-4">
            <h2 class="text-center">Add New Playlist</h2>
            <form action="<?= site_url('music/add_playlist') ?>" method="post">
                <div class="mb-3">
                    <label for="playlist_name" class="form-label">Playlist Name:</label>
                    <input type="text" name="playlist_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-add-playlist">Add Playlist</button>
            </form>
        </div>
        <a class="btn btn-go-back" href="/music">Go back</a>

        <!-- Playlists -->
        <h2 class="mt-4">Playlists</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Playlist</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($playlist as $playlist): ?>
                    <tr>
                        <td><?= $playlist['playlist_name'] ?></td>
                        <td>
                            <a href="<?= site_url('music/delete_playlist/' . $playlist['id']) ?>"
                                class="btn btn-delete-playlist btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
