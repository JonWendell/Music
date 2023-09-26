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
            background-color: #333; /* Darker background color */
            color: #FFD700; /* Gold text color */
        }

        .container {
            background-color: #333; /* Darker background color */
            color: #FFD700; /* Gold text color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
        }

        .music-list {
            margin-top: 20px;
        }

        table {
            background-color: #444; /* Darker background color */
            color: #FFD700; /* Gold text color */
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #555; /* Slightly lighter border color */
        }

        table th {
            background-color: #555; /* Darker header background color */
            color: #FFD700; /* Gold text color */
        }

        audio {
            width: 100%;
            background-color: #444; /* Darker background color for the audio player */
        }

        audio::-webkit-media-controls-panel {
            background-color: #333; /* Slightly lighter background color for media controls */
        }

        .btn-play {
            background-color: #FFD700; /* Gold background color */
            color: #333; /* Darker text color */
        }

        .btn-delete {
            background-color: #333; /* Darker background color */
            color: #FFD700; /* Gold text color */
        }

        .btn-go-back {
            background-color: #FFD700; /* Gold background color */
            color: #333; /* Darker text color */
        }

        #searchInput {
            background-color: #555; /* Darker search bar background color */
            color: #FFD700; /* Gold text color */
            border-color: #444; /* Slightly lighter border color */
        }

        .btn-success {
            background-color: #FFD700 !important; /* Gold background color for buttons */
            color: #333 !important; /* Darker text color for buttons */
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Music Gallery</h1>

        <!-- Music List -->
        <div class="music-list">
            <!-- Search -->
            <h2 class="text-center">Search Music</h2>
            <input type="text" id="searchInput" class="form-control" placeholder="Search by Title and Playlist">
            <br>
            <div class="text-center">
                <a class="btn btn-success" href="/upload">Upload</a>
                <a class="btn btn-success" href="music/add_playlist">Add new playlist</a>
            </div>
            <h2 class="text-center">Music List</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Playlist</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($music) && count($music) > 0): ?>
                        <?php foreach ($music as $song): ?>
                            <tr>
                                <td><?= $song['title'] ?></td>
                                <td><?= $song['playlist'] ?></td>
                                <td>
                                    <a href="<?= site_url('music/play/' . $song['id']) ?>"
                                        class="btn btn-play btn-sm">Play</a>
                                    <a href="<?= site_url('music/delete/' . $song['id']) ?>"
                                        class="btn btn-delete btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">No music available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Music Play -->
        <?php if (isset($music_to_play)): ?>
            <div class="music-play">
                <h2>Now playing</h2>
                <h3><strong>Title:</strong> <?= $music_to_play['title'] ?></h3>
                <h5><strong>Playlist:</strong> <?= $music_to_play['playlist'] ?></h5><br>
                <audio controls>
                    <source src="<?= base_url('uploads/' . $music_to_play['file_name']) ?>" type="audio/mpeg">
                    <!-- Specify the correct MIME type for the audio file -->
                    Your browser does not support the audio element.
                </audio>
                <div class="text-center">
                    <a href="javascript:history.back()" class="btn btn-go-back">Go Back</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // JavaScript for live search
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>
